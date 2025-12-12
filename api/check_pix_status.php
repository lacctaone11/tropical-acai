<?php

// Bynet API
define('BYNET_API_URL', 'https://api-gateway.techbynet.com/api/user/transactions');
define('BYNET_API_KEY', 'a783adf9-6d96-4520-86ac-2e814bfb34e0');

header('Content-Type: application/json');

$transactionId = $_GET['transactionId'] ?? null;

if (!$transactionId) {
    echo json_encode(['success' => false, 'error' => 'Transaction ID nao fornecido']);
    exit;
}

$ch = curl_init(BYNET_API_URL . '/' . $transactionId);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'x-api-key: ' . BYNET_API_KEY,
        'User-Agent: AtivoB2B/1.0',
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

error_log('=== BYNET CHECK PIX STATUS ===');
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

    // Bynet usa PAID para pagamento confirmado
    $isPaid = ($status === 'PAID' || $status === 'paid' || $status === 'approved' || $status === 'APPROVED');

    echo json_encode([
        'success' => true,
        'status' => $status,
        'transaction' => $transaction,
        'paid' => $isPaid
    ]);
} else {
    $errorMessage = 'Erro ao consultar transacao';
    if (isset($responseData['message'])) {
        $errorMessage = $responseData['message'];
    }

    error_log('Erro ao consultar transacao: ' . $errorMessage);

    echo json_encode([
        'success' => false,
        'error' => $errorMessage,
        'httpCode' => $httpCode,
        'response' => $responseData
    ]);
}
