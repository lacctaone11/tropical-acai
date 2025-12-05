<?php

// Titans Hub API
define('TITANS_API_URL', 'https://api.titanshub.io/v1/transactions');
define('TITANS_PUBLIC_KEY', 'pk_zPl4SZSQDQs2VFNXXhSR7yVzoT9sBh4mkPquAcZjqriQczsX');
define('TITANS_SECRET_KEY', 'sk_uveRUOH7x4mxQMLJSOD-sh_igT5N9PSrzjmW0Q8qYb2CejuK');

header('Content-Type: application/json');

$transactionId = $_GET['transactionId'] ?? null;

if (!$transactionId) {
    echo json_encode(['success' => false, 'error' => 'Transaction ID não fornecido']);
    exit;
}

// Autenticação Titans Hub (Basic Auth: public_key:secret_key)
$auth = base64_encode(TITANS_PUBLIC_KEY . ':' . TITANS_SECRET_KEY);

$ch = curl_init(TITANS_API_URL . '/' . $transactionId);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Basic ' . $auth,
        'Content-Type: application/json',
        'Accept: application/json'
    ],
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_TIMEOUT => 30
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo json_encode(['success' => false, 'error' => 'Erro na requisição: ' . $error]);
    exit;
}

$responseData = json_decode($response, true);

error_log('=== TITANS CHECK PIX STATUS ===');
error_log('Transaction ID: ' . $transactionId);
error_log('HTTP Code: ' . $httpCode);
error_log('Response: ' . substr($response, 0, 500));

$transaction = null;
if (isset($responseData['data']) && is_array($responseData['data'])) {
    $transaction = $responseData['data'];
} elseif (isset($responseData['id']) && isset($responseData['paymentMethod'])) {
    $transaction = $responseData;
}

if ($httpCode === 200 && $transaction !== null) {
    $status = $transaction['status'] ?? 'unknown';

    error_log('Transaction Status: ' . $status);

    echo json_encode([
        'success' => true,
        'status' => $status,
        'transaction' => $transaction,
        'paid' => ($status === 'paid' || $status === 'approved')
    ]);
} else {
    $errorMessage = 'Erro ao consultar transação';
    if (isset($responseData['message'])) {
        $errorMessage = $responseData['message'];
    }

    error_log('Erro ao consultar transação: ' . $errorMessage);

    echo json_encode([
        'success' => false,
        'error' => $errorMessage,
        'httpCode' => $httpCode,
        'response' => $responseData
    ]);
}
