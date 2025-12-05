<?php
require_once __DIR__ . '/../item/cart_helpers.php';

header('Content-Type: application/json');

// Titans Hub API
define('TITANS_API_URL', 'https://api.titanshub.io/v1/transactions');
define('TITANS_PUBLIC_KEY', 'pk_zPl4SZSQDQs2VFNXXhSR7yVzoT9sBh4mkPquAcZjqriQczsX');
define('TITANS_SECRET_KEY', 'sk_uveRUOH7x4mxQMLJSOD-sh_igT5N9PSrzjmW0Q8qYb2CejuK');

// Função para gerar CPF válido
function gerarCpf() {
    $cpf = '';
    for ($i = 0; $i < 9; $i++) {
        $cpf .= rand(0, 9);
    }
    $soma1 = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma1 += $cpf[$i] * (10 - $i);
    }
    $resto1 = $soma1 % 11;
    $digito1 = ($resto1 < 2) ? 0 : 11 - $resto1;
    $soma2 = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma2 += $cpf[$i] * (11 - $i);
    }
    $soma2 += $digito1 * 2;
    $resto2 = $soma2 % 11;
    $digito2 = ($resto2 < 2) ? 0 : 11 - $resto2;
    $cpf .= $digito1 . $digito2;
    return $cpf;
}

$input = file_get_contents('php://input');
$dados = json_decode($input, true);

if (!$dados) {
    echo json_encode(['success' => false, 'error' => 'Dados não fornecidos']);
    exit;
}

$dadosPessoais = $dados['dadosPessoais'] ?? $dados;
$dadosFrete = $dados['dadosFrete'] ?? [];
$amount = floatval($dados['amount'] ?? 0);

// Pegar nome ou usar padrão
$nome = $dadosPessoais['nome'] ?? 'Cliente';
if (empty(trim($nome))) {
    $nome = 'Cliente';
}

// Pegar telefone ou usar padrão
$telefone = $dadosPessoais['telefone'] ?? $dadosPessoais['celular'] ?? $dadosPessoais['phone'] ?? '';
$telefoneLimpo = preg_replace('/\D/', '', $telefone);
if (empty($telefoneLimpo) || strlen($telefoneLimpo) < 10) {
    $telefoneLimpo = '11999999999'; // Telefone padrão
}

// Gerar CPF válido
$cpf = gerarCpf();

// Gerar email baseado no CPF
$email = $cpf . '@cliente.com';

// Calcular valor
$cart = acai_get_cart();
$totalCarrinho = acai_cart_total($cart);

if ($amount == 0) {
    $amount = $totalCarrinho;
}

$amountInCents = intval($amount * 100);

if ($amountInCents <= 0) {
    echo json_encode(['success' => false, 'error' => 'Valor inválido']);
    exit;
}

// Montar items para Titans Hub
$items = [];
foreach ($cart as $item) {
    $preco = floatval($item['preco_promocional'] ?? $item['preco'] ?? 0);
    $quantidade = intval($item['qtd'] ?? 1);

    if ($preco > 0 && $quantidade > 0) {
        $items[] = [
            'title' => $item['title'] ?? 'Produto',
            'quantity' => $quantidade,
            'unitPrice' => intval($preco * 100),
            'tangible' => false,
            'externalRef' => 'item-' . ($item['id'] ?? uniqid())
        ];
    }
}

if (empty($items)) {
    $items[] = [
        'title' => 'Pedido Tropical Açaí',
        'quantity' => 1,
        'unitPrice' => $amountInCents,
        'tangible' => false,
        'externalRef' => 'pedido-' . time()
    ];
}

// Preparar payload para Titans Hub
$payload = [
    'paymentMethod' => 'pix',
    'amount' => $amountInCents,
    'items' => $items,
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

// Autenticação Titans Hub (Basic Auth: public_key:secret_key)
$auth_value = base64_encode(TITANS_PUBLIC_KEY . ':' . TITANS_SECRET_KEY);

// Fazer requisição
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => TITANS_API_URL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => [
        'accept: application/json',
        'Authorization: Basic ' . $auth_value,
        'content-type: application/json'
    ],
]);

error_log('=== TITANS PIX PAYLOAD ===');
error_log(json_encode($payload, JSON_PRETTY_PRINT));

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$error = curl_error($curl);
curl_close($curl);

error_log('TITANS PIX Response HTTP: ' . $httpCode);
error_log('TITANS PIX Response: ' . substr($response, 0, 1000));

if ($error) {
    echo json_encode(['success' => false, 'error' => 'Erro na requisição: ' . $error]);
    exit;
}

$responseData = json_decode($response, true);

if ($responseData === null) {
    echo json_encode([
        'success' => false,
        'error' => 'Resposta inválida da API',
        'httpCode' => $httpCode,
        'response' => substr($response, 0, 500)
    ]);
    exit;
}

// Verificar se tem QR Code na resposta (Titans retorna direto no objeto)
$transaction = null;
if (isset($responseData['data']) && is_array($responseData['data'])) {
    $transaction = $responseData['data'];
} elseif (isset($responseData['id'])) {
    $transaction = $responseData;
}

if ($transaction && isset($transaction['pix']['qrcode'])) {
    $_SESSION['pix_transaction_id'] = $transaction['id'];
    $_SESSION['pix_transaction_data'] = $transaction;

    echo json_encode([
        'success' => true,
        'transactionId' => $transaction['id'],
        'qrcode' => $transaction['pix']['qrcode'],
        'secureId' => $transaction['secureId'] ?? '',
        'secureUrl' => $transaction['secureUrl'] ?? '',
        'expirationDate' => $transaction['pix']['expirationDate'] ?? '',
        'amount' => $transaction['amount'] / 100,
        'status' => $transaction['status'] ?? 'pending'
    ]);
} else {
    $errorMessage = 'Erro ao criar transação PIX';

    if (isset($responseData['message'])) {
        $errorMessage = $responseData['message'];
    } elseif (isset($responseData['error'])) {
        if (is_string($responseData['error'])) {
            $errorMessage = $responseData['error'];
        } elseif (is_array($responseData['error']) && isset($responseData['error']['description'])) {
            $errorMessage = $responseData['error']['description'];
        }
    }

    echo json_encode([
        'success' => false,
        'error' => $errorMessage,
        'httpCode' => $httpCode,
        'response' => $response,
        'details' => $responseData
    ]);
}
