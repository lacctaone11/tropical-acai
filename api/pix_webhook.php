<?php
/**
 * Webhook para receber notificações da API Black Cat Pagamentos
 *
 * Este arquivo recebe notificações quando uma transação PIX é atualizada.
 * Configure a URL deste arquivo no campo 'postbackUrl' em api/create_pix.php
 */

header('Content-Type: application/json');

$logFile = __DIR__ . '/webhook_log.txt';
$logData = date('Y-m-d H:i:s') . " - " . file_get_contents('php://input') . "\n";
file_put_contents($logFile, $logData, FILE_APPEND);

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Dados inválidos']);
    exit;
}

if (isset($data['type']) && $data['type'] === 'transaction') {
    $transaction = $data['data'] ?? [];
    $transactionId = $transaction['id'] ?? null;
    $status = $transaction['status'] ?? '';
    
    if ($transactionId) {







        $statusFile = __DIR__ . '/transactions/' . $transactionId . '.json';
        $dir = dirname($statusFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        file_put_contents($statusFile, json_encode($transaction, JSON_PRETTY_PRINT));

        if ($status === 'paid' || $status === 'approved') {


            
            error_log("Pagamento confirmado - Transaction ID: " . $transactionId);
        }
    }
}

http_response_code(200);
echo json_encode(['success' => true, 'message' => 'Webhook recebido']);

