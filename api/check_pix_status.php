<?php

// Titans Hub API
define('TITANS_API_URL', 'https://api.titanshub.io/v1/transactions');
define('TITANS_PUBLIC_KEY', 'pk_zPl4SZSQDQs2VFNXXhSR7yVzoT9sBh4mkPquAcZjqriQczsX');
define('TITANS_SECRET_KEY', 'sk_uveRUOH7x4mxQMLJSOD-sh_igT5N9PSrzjmW0Q8qYb2CejuK');

header('Content-Type: application/json');

$transactionId = $_GET['transactionId'] ?? null;

if (!$transactionId) {
    echo json_encode(['success' => false, 'error' => 'Transaction ID nao fornecido']);
    exit;
}

// Autenticação Titans Hub
$auth_value = base64_encode(TITANS_PUBLIC_KEY . ':' . TITANS_SECRET_KEY);

$ch = curl_init(TITANS_API_URL . '/' . $transactionId);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Basic ' . $auth_value,
        'Content-Type: application/json',
        'Accept: application/json',
        'Connection: keep-alive'
    ],
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_TIMEOUT => 5,
    CURLOPT_CONNECTTIMEOUT => 3,
    CURLOPT_ENCODING => 'gzip, deflate',
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo json_encode(['success' => false, 'error' => 'Erro na requisicao: ' . $error]);
    exit;
}

$responseData = json_decode($response, true);

if ($httpCode === 200 && isset($responseData['status'])) {
    $status = $responseData['status'];

    // Titans Hub usa 'paid' para pagamento confirmado
    $isPaid = ($status === 'paid' || $status === 'PAID' || $status === 'approved' || $status === 'APPROVED');

    echo json_encode([
        'success' => true,
        'status' => $status,
        'transaction' => $responseData,
        'paid' => $isPaid
    ]);
} else {
    $errorMessage = 'Erro ao consultar transacao';
    if (isset($responseData['message'])) {
        $errorMessage = $responseData['message'];
    }

    echo json_encode([
        'success' => false,
        'error' => $errorMessage,
        'httpCode' => $httpCode,
        'response' => $responseData
    ]);
}
