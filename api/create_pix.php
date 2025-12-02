<?php
require_once __DIR__ . '/../item/cart_helpers.php';


header('Content-Type: application/json');

// Black Cat Pagamentos API
define('BLACKCAT_API_URL', 'https://api.blackcatpagamentos.com/v1/transactions');
define('BLACKCAT_PUBLIC_KEY', 'pk_jnbuj9JZy7pQJTdfahRmVpziMgQAIKNCMCDstmQ4pJthriVP');
define('BLACKCAT_SECRET_KEY', 'sk_8vY_tuYwmV8q8hL37uafgrYL-Gyeef3WC5SLwhnp53dEko55');

$input = file_get_contents('php://input');
$dados = json_decode($input, true);

if (!$dados) {
    echo json_encode(['success' => false, 'error' => 'Dados não fornecidos']);
    exit;
}

$dadosPessoais = $dados['dadosPessoais'] ?? $dados;
$dadosFrete = $dados['dadosFrete'] ?? [];
$amount = floatval($dados['amount'] ?? 0);

if (empty($dadosPessoais['nome']) || empty($dadosPessoais['email']) || empty($dadosPessoais['cpf'])) {
    echo json_encode([
        'success' => false, 
        'error' => 'Dados do cliente incompletos. Nome, e-mail e CPF são obrigatórios.'
    ]);
    exit;
}

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


$items = [];
foreach ($cart as $item) {
    $preco = floatval($item['preco_promocional'] ?? $item['preco'] ?? 0);
    $quantidade = intval($item['qtd'] ?? 1);
    
    if ($preco > 0 && $quantidade > 0) {
        $items[] = [
            'title' => $item['title'] ?? 'Produto',
            'quantity' => $quantidade,
            'unitPrice' => intval($preco * 100),
            'tangible' => true,
            'externalRef' => 'item-' . ($item['id'] ?? uniqid())
        ];
    }
}

if (empty($items)) {
    $items[] = [
        'title' => 'Pedido Tropical Açaí',
        'quantity' => 1,
        'unitPrice' => $amountInCents,
        'tangible' => true,
        'externalRef' => 'pedido-' . time()
    ];
}

$cpfLimpo = preg_replace('/\D/', '', $dadosPessoais['cpf'] ?? '');

if (empty($cpfLimpo) || strlen($cpfLimpo) !== 11) {
    echo json_encode([
        'success' => false,
        'error' => 'CPF inválido. Por favor, verifique o CPF informado.'
    ]);
    exit;
}

$telefoneOriginal = $dadosPessoais['telefone'] ?? $dadosPessoais['celular'] ?? $dadosPessoais['phone'] ?? '';
$telefoneLimpo = preg_replace('/\D/', '', $telefoneOriginal);

if (empty($telefoneLimpo) || strlen($telefoneLimpo) < 10) {
    echo json_encode([
        'success' => false,
        'error' => 'Telefone do cliente é obrigatório. Por favor, preencha o telefone no checkout.'
    ]);
    exit;
}

if (strlen($telefoneLimpo) === 10) {

    $telefoneLimpo = substr($telefoneLimpo, 0, 2) . '9' . substr($telefoneLimpo, 2);
}

if (strlen($telefoneLimpo) > 11) {
    $telefoneLimpo = substr($telefoneLimpo, -11);
}










$customerAddress = [
    'street' => $dadosFrete['endereco'] ?? '',
    'streetNumber' => $dadosFrete['numero'] ?? 'S/N',
    'neighborhood' => $dadosFrete['bairro'] ?? '',
    'city' => $dadosFrete['cidade'] ?? '',
    'state' => strtoupper($dadosFrete['estado'] ?? ''),
    'zipCode' => preg_replace('/\D/', '', $dadosFrete['cep'] ?? ''),
    'country' => 'BR',
    'complement' => $dadosFrete['complemento'] ?? ''
];

$enderecoValido = !empty($customerAddress['street']) && 
                  !empty($customerAddress['city']) && 
                  !empty($customerAddress['state']) && 
                  !empty($customerAddress['zipCode']);

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$baseUrl = $protocol . '://' . $host;

$ip = $_SERVER['REMOTE_ADDR'] ?? null;
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
}


$payload = [

    'amount' => $amountInCents,

    'paymentMethod' => 'pix',

    'pix' => [

        'expiresInDays' => 1
    ],

    'items' => $items,

    'customer' => [

        'name' => $dadosPessoais['nome'],

        'email' => $dadosPessoais['email'],

        'phone' => $telefoneLimpo,

        'document' => [

            'number' => $cpfLimpo,

            'type' => 'cpf'
        ]
    ],

    'postbackUrl' => $baseUrl . '/api/pix_webhook.php',

    'returnUrl' => $baseUrl . '/pix.php',

    'metadata' => json_encode(['source' => 'acai_mania']),

    'externalRef' => 'pedido-' . time() . '-' . uniqid()
];

if ($enderecoValido) {
    $payload['customer']['address'] = $customerAddress;
}



if ($enderecoValido) {


    $freteValor = 0;
    if (isset($dadosFrete['valor'])) {
        $freteValor = floatval($dadosFrete['valor']);
    } elseif (isset($dadosFrete['frete'])) {
        $freteValor = floatval($dadosFrete['frete']);
    } elseif (isset($dadosFrete['shipping_fee'])) {
        $freteValor = floatval($dadosFrete['shipping_fee']);
    } elseif (isset($dados['freteValor'])) {
        $freteValor = floatval($dados['freteValor']);
    }
    
    $freteValorCents = intval($freteValor * 100);

    $payload['shipping'] = array_merge($customerAddress, [
        'fee' => $freteValorCents
    ]);
    
    error_log('Shipping fee: ' . $freteValorCents . ' centavos (R$ ' . $freteValor . ')');
}

if ($ip) {
    $payload['ip'] = $ip;
}



$payload['buyer'] = [
    'buyer_name' => $dadosPessoais['nome'],
    'buyer_email' => $dadosPessoais['email'],
    'buyer_phone' => $telefoneLimpo,
    'buyer_document' => $cpfLimpo,
    'buyer_document_type' => 'cpf'
];

$auth = base64_encode(BLACKCAT_PUBLIC_KEY . ':' . BLACKCAT_SECRET_KEY);

$ch = curl_init(BLACKCAT_API_URL);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Basic ' . $auth,
        'Content-Type: application/json',
        'Accept: application/json'
    ],
    CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE),
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_TIMEOUT => 30
]);

error_log('=== PIX PAYLOAD (Conforme Documentação Oficial + buyer para adquirente) ===');
error_log(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
error_log('=== Verificação do objeto buyer ===');
error_log('Buyer existe: ' . (isset($payload['buyer']) ? 'SIM' : 'NÃO'));
if (isset($payload['buyer'])) {
    error_log('Buyer completo: ' . json_encode($payload['buyer'], JSON_PRETTY_PRINT));
    error_log('Buyer phone: ' . ($payload['buyer']['buyer_phone'] ?? 'NÃO DEFINIDO'));
}
error_log('=== FIM PAYLOAD ===');

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

error_log('PIX API Response - HTTP Code: ' . $httpCode);
error_log('PIX API Response: ' . substr($response, 0, 500));

if ($error) {
    echo json_encode(['success' => false, 'error' => 'Erro na requisição: ' . $error]);
    exit;
}

$responseData = json_decode($response, true);

if ($responseData === null && json_last_error() !== JSON_ERROR_NONE) {
    $isHtml = (strpos($response, '<!DOCTYPE') !== false || strpos($response, '<html') !== false);
    
    echo json_encode([
        'success' => false,
        'error' => $isHtml ? 'API retornou HTML em vez de JSON. Verifique a URL e credenciais.' : 'Resposta da API não é JSON válido.',
        'httpCode' => $httpCode,
        'response' => substr($response, 0, 500)
    ]);
    exit;
}


$transaction = null;
if (isset($responseData['data']) && is_array($responseData['data'])) {
    $transaction = $responseData['data'];
} elseif (isset($responseData['id']) && isset($responseData['paymentMethod'])) {
    $transaction = $responseData;
}

if ($httpCode === 200 && $transaction !== null) {

    if (empty($transaction['pix']['qrcode'])) {
        echo json_encode([
            'success' => false,
            'error' => 'QR Code não foi gerado pela API',
            'httpCode' => $httpCode,
            'details' => $transaction
        ]);
        exit;
    }

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
        'status' => $transaction['status'] ?? 'waiting_payment'
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

            if (isset($responseData['error']['refusedReason'])) {
                $refusedReason = $responseData['error']['refusedReason'];
                if (isset($refusedReason['description'])) {
                    $errorMessage = $refusedReason['description'];
                }
            }
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
