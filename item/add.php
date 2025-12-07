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

$productId   = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
$qtd         = isset($_POST['qtd']) ? max(1, (int) $_POST['qtd']) : 1;
$observacoes = isset($_POST['observacoes']) ? trim((string) $_POST['observacoes']) : '';
$opcoes      = isset($_POST['opcoes']) ? (array) $_POST['opcoes'] : [];

$catalog = acai_catalog();

if (!$productId || !isset($catalog[$productId])) {
    echo json_encode([
        'success' => false,
        'message' => 'Produto não encontrado.',
    ]);
    exit;
}

$product = $catalog[$productId];

$cart = acai_get_cart();

if (isset($cart[$productId])) {
    $cart[$productId]['qtd'] += $qtd;
} else {
    $cart[$productId] = [
        'id'                => $productId,
        'title'             => $product['title'],
        'image'             => $product['image'],
        'preco'             => $product['preco'],
        'preco_promocional' => $product['preco_promocional'],
        'unit_price'        => $product['preco_promocional'],
        'qtd'               => $qtd,
        'observacoes'       => $observacoes,
        'opcoes'            => $opcoes,
    ];
}

$cart[$productId]['total'] = round($cart[$productId]['unit_price'] * $cart[$productId]['qtd'], 2);

acai_set_cart($cart);

$totalCarrinho = acai_cart_total($cart);

echo json_encode([
    'success'       => true,
    'message'       => 'Produto adicionado ao carrinho!',
    'totalCarrinho' => acai_format_money($totalCarrinho),
    'items'         => array_values($cart),
]);


