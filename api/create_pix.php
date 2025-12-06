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

// Titans Hub API
define('TITANS_API_URL', 'https://api.titanshub.io/v1/transactions');
define('TITANS_PUBLIC_KEY', 'pk_zPl4SZSQDQs2VFNXXhSR7yVzoT9sBh4mkPquAcZjqriQczsX');
define('TITANS_SECRET_KEY', 'sk_uveRUOH7x4mxQMLJSOD-sh_igT5N9PSrzjmW0Q8qYb2CejuK');

// Função para gerar CPF válido
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
        echo json_encode(['success' => false, 'error' => 'Dados não fornecidos']);
        exit;
    }

    $dadosPessoais = $dados['dadosPessoais'] ?? $dados;
    $amount = floatval($dados['amount'] ?? 0);

    // Pegar nome ou usar padrão
    $nome = trim($dadosPessoais['nome'] ?? 'Cliente');
    if (empty($nome)) {
        $nome = 'Cliente';
    }

    // Pegar telefone ou usar padrão
    $telefone = $dadosPessoais['telefone'] ?? $dadosPessoais['celular'] ?? '';
    $telefoneLimpo = preg_replace('/\D/', '', $telefone);
    if (strlen($telefoneLimpo) < 10) {
        $telefoneLimpo = '11999999999';
    }

    // Gerar CPF válido
    $cpf = gerarCpfValido();
    $email = $cpf . '@cliente.com';

    // Verificar amount
    if ($amount <= 0) {
        echo json_encode([
            'success' => false,
            'error' => 'Valor inválido',
            'amount_received' => $amount
        ]);
        exit;
    }

    $amountInCents = intval($amount * 100);

    // Preparar payload para Titans Hub
    $payload = [
        'paymentMethod' => 'pix',
        'amount' => $amountInCents,
        'items' => [[
            'title' => 'Kit Conjunto Infantil',
            'quantity' => 1,
            'unitPrice' => $amountInCents,
            'tangible' => false,
            'externalRef' => 'pedido-' . time()
        ]],
        'customer' => [
            'name' => $nome,
            'email' => $email,
            'phone' => $telefoneLimpo,
            'document' => [
                'type' => 'cpf',
                'number' => $cpf
            ]
        ],
        'pix' => [
            'expiresInDays' => 1
        ]
    ];

    // Autenticação Titans Hub
    $auth_value = base64_encode(TITANS_PUBLIC_KEY . ':' . TITANS_SECRET_KEY);

    // Fazer requisição
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => TITANS_API_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Authorization: Basic ' . $auth_value,
            'Content-Type: application/json'
        ],
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
            'error' => 'Resposta inválida da API',
            'httpCode' => $httpCode,
            'raw' => substr($response, 0, 300)
        ]);
        exit;
    }

    // Verificar sucesso
    if (isset($responseData['pix']['qrcode'])) {
        echo json_encode([
            'success' => true,
            'transactionId' => $responseData['id'],
            'qrcode' => $responseData['pix']['qrcode'],
            'expirationDate' => $responseData['pix']['expirationDate'] ?? '',
            'amount' => $responseData['amount'] / 100,
            'status' => $responseData['status'] ?? 'pending'
        ]);
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
        'error' => 'Exceção: ' . $e->getMessage()
    ]);
}
