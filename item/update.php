<?php

require_once __DIR__ . '/cart_helpers.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Método inválido.',
    ]);
    exit;
}

$productId = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
$newQty    = isset($_POST['new_qty']) ? (int) $_POST['new_qty'] : 0;

$cart = acai_get_cart();

if (!$productId || !isset($cart[$productId])) {
    echo json_encode([
        'success' => false,
        'message' => 'Item não encontrado no carrinho.',
    ]);
    exit;
}

if ($newQty <= 0) {
    unset($cart[$productId]);
    acai_set_cart($cart);

    $totalCarrinho = acai_cart_total($cart);

    echo json_encode([
        'success'       => true,
        'itemSubtotal'  => acai_format_money(0.0),
        'totalCarrinho' => acai_format_money($totalCarrinho),
        'number'        => $totalCarrinho,
    ]);
    exit;
}

$cart[$productId]['qtd']   = $newQty;
$unitPrice                 = isset($cart[$productId]['unit_price'])
    ? (float) $cart[$productId]['unit_price']
    : (isset($cart[$productId]['preco_promocional']) ? (float) $cart[$productId]['preco_promocional'] : 0.0);
$cart[$productId]['total'] = round($unitPrice * $newQty, 2);

acai_set_cart($cart);

$totalCarrinho = acai_cart_total($cart);

echo json_encode([
    'success'       => true,
    'itemSubtotal'  => acai_format_money($cart[$productId]['total']),
    'totalCarrinho' => acai_format_money($totalCarrinho),
    'number'        => $totalCarrinho,
]);


