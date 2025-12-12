<?php
// Capturar erros
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Headers primeiro
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Bynet API
define('BYNET_API_URL', 'https://api-gateway.techbynet.com/api/user/transactions');
define('BYNET_API_KEY', 'a783adf9-6d96-4520-86ac-2e814bfb34e0');

// Funcao para gerar CPF valido
function gerarCpfValido() {
    $n = [];
    for ($i = 0; $i < 9; $i++) {
        $n[$i] = rand(0, 9);
    }

    $d1 = 0;
    for ($i = 0; $i < 9; $i++) {
        $d1 += $n[$i] * (10 - $i);
    }
    $d1 = 11 - ($d1 % 11);
    if ($d1 >= 10) $d1 = 0;
    $n[9] = $d1;

    $d2 = 0;
    for ($i = 0; $i < 10; $i++) {
        $d2 += $n[$i] * (11 - $i);
    }
    $d2 = 11 - ($d2 % 11);
    if ($d2 >= 10) $d2 = 0;
    $n[10] = $d2;

    return implode('', $n);
}

try {
    $input = file_get_contents('php://input');
    $dados = json_decode($input, true);

    if (!$dados) {
        echo json_encode(['success' => false, 'error' => 'Dados nao fornecidos']);
        exit;
    }

    $dadosPessoais = $dados['dadosPessoais'] ?? $dados;
    $amount = floatval($dados['amount'] ?? 0);

    // Pegar nome ou usar padrao
    $nome = trim($dadosPessoais['nome'] ?? 'Cliente');
    if (empty($nome)) {
        $nome = 'Cliente';
    }

    // Pegar telefone ou usar padrao
    $telefone = $dadosPessoais['telefone'] ?? $dadosPessoais['celular'] ?? '';
    $telefoneLimpo = preg_replace('/\D/', '', $telefone);
    if (strlen($telefoneLimpo) < 10) {
        $telefoneLimpo = '11999999999';
    }

    // Gerar CPF valido
    $cpf = gerarCpfValido();
    $email = $cpf . '@cliente.com';

    // Verificar amount
    if ($amount <= 0) {
        echo json_encode([
            'success' => false,
            'error' => 'Valor invalido',
            'amount_received' => $amount
        ]);
        exit;
    }

    $amountInCents = intval(round($amount * 100));
    $orderId = 'WP' . time();

    // Preparar payload para Bynet - EXATAMENTE conforme exemplo do DEV
    $payload = [
        'amount' => $amountInCents,
        'currency' => 'BRL',
        'paymentMethod' => 'pix',
        'installments' => 1,
        'postbackUrl' => '',
        'metadata' => '{"orderId":"' . $orderId . '"}',
        'traceable' => true,
        'customer' => [
            'name' => $nome,
            'email' => $email,
            'phone' => $telefoneLimpo,
            'document' => [
                'type' => 'cpf',
                'number' => $cpf
            ],
            'externalRef' => 'CUSTOMER-' . time(),
            'address' => [
                'street' => 'Av Paulista',
                'streetNumber' => '1000',
                'complement' => '',
                'zipCode' => '01310100',
                'neighborhood' => 'Bela Vista',
                'city' => 'Sao Paulo',
                'state' => 'SP',
                'country' => 'BR'
            ]
        ],
        'items' => [[
            'title' => 'Kit Infantil',
            'unitPrice' => $amountInCents,
            'quantity' => 1,
            'tangible' => true,
            'externalRef' => 'ORDER-' . $orderId
        ]],
        'pix' => [
            'expiresInDays' => 1
        ],
        'shipping' => [
            'fee' => 0,
            'address' => [
                'street' => 'Av Paulista',
                'streetNumber' => '1000',
                'complement' => '',
                'zipCode' => '01310100',
                'neighborhood' => 'Bela Vista',
                'city' => 'Sao Paulo',
                'state' => 'SP',
                'country' => 'BR'
            ]
        ]
    ];

    // Fazer requisicao para Bynet - OTIMIZADO
    $jsonPayload = json_encode($payload);
    $curl = curl_init(BYNET_API_URL);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $jsonPayload,
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Content-Type: application/json',
            'x-api-key: ' . BYNET_API_KEY,
            'User-Agent: AtivoB2B/1.0',
            'Connection: keep-alive',
            'Content-Length: ' . strlen($jsonPayload)
        ],
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_ENCODING => 'gzip, deflate',
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    ]);

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $curlError = curl_error($curl);
    curl_close($curl);

    if ($curlError) {
        echo json_encode(['success' => false, 'error' => 'Erro cURL: ' . $curlError]);
        exit;
    }

    $responseData = json_decode($response, true);

    if ($responseData === null) {
        echo json_encode([
            'success' => false,
            'error' => 'Resposta invalida da API',
            'httpCode' => $httpCode,
            'raw' => substr($response, 0, 500)
        ]);
        exit;
    }

    // Verificar sucesso - Bynet retorna status 200 e data com qrCode
    if ($httpCode === 200 && isset($responseData['data'])) {
        $data = $responseData['data'];

        // Bynet pode retornar qrCode ou pix.qrcode
        $qrCode = $data['qrCode'] ?? $data['pix']['qrcode'] ?? $data['pix']['qrCode'] ?? null;

        if ($qrCode) {
            echo json_encode([
                'success' => true,
                'transactionId' => $data['id'],
                'qrcode' => $qrCode,
                'expirationDate' => $data['pix']['expirationDate'] ?? '',
                'amount' => ($data['amount'] ?? $amountInCents) / 100,
                'status' => $data['status'] ?? 'WAITING_PAYMENT'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'QR Code nao retornado',
                'httpCode' => $httpCode,
                'details' => $responseData
            ]);
        }
    } else {
        $errorMsg = $responseData['message'] ?? $responseData['error'] ?? 'Erro desconhecido';
        echo json_encode([
            'success' => false,
            'error' => $errorMsg,
            'httpCode' => $httpCode,
            'details' => $responseData
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Excecao: ' . $e->getMessage()
    ]);
}
