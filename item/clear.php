<?php
require_once __DIR__ . '/cart_helpers.php';

header('Content-Type: application/json');

// Limpar o carrinho
$_SESSION['cart'] = [];

echo json_encode([
    'success' => true,
    'message' => 'Carrinho limpo'
]);
