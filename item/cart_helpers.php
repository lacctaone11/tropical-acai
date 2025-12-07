<?php

session_start();

/**
 * Catálogo simples de produtos usados no carrinho.
 * Os IDs e preços foram extraídos das páginas de produto e do checkout.
 */
function acai_catalog(): array
{
    return [

        24 => [
            'title'             => '2 Copos de Açaí 300ml',
            'image'             => 'public/images/copo2.webp',
            'preco'             => 39.80,
            'preco_promocional' => 19.90,
        ],
        25 => [
            'title'             => '2 Copos de Açaí 500ml',
            'image'             => 'public/images/copo2.webp',
            'preco'             => 43.80,
            'preco_promocional' => 23.90,
        ],
        26 => [
            'title'             => '2 Copos de Açaí 700ml',
            'image'             => 'public/images/copo2.webp',
            'preco'             => 53.80,
            'preco_promocional' => 26.90,
        ],
        27 => [
            'title'             => '2 Copos de Açaí 1L',
            'image'             => 'public/images/copo2.webp',
            'preco'             => 75.80,
            'preco_promocional' => 37.90,
        ],

        28 => [
            'title'             => '2 Copos de Açaí 300ml Zero',
            'image'             => 'public/images/zero2.webp',
            'preco'             => 45.80,
            'preco_promocional' => 22.90,
        ],
        29 => [
            'title'             => '2 Copos de Açaí 500ml Zero',
            'image'             => 'public/images/zero2.webp',
            'preco'             => 49.80,
            'preco_promocional' => 25.90,
        ],
        31 => [
            'title'             => '2 Copos de Açaí 1L Zero',
            'image'             => 'public/images/zero2.webp',
            'preco'             => 83.80,
            'preco_promocional' => 41.90,
        ],

        7 => [
            'title'             => 'Brownie Gelado',
            'image'             => 'public/images/brownie_gelado.webp',
            'preco'             => 13.90,
            'preco_promocional' => 6.90,
        ],
        8 => [
            'title'             => 'Açaí Turbo',
            'image'             => 'public/images/textura.webp',
            'preco'             => 11.90,
            'preco_promocional' => 5.90,
        ],
        9 => [
            'title'             => 'Combo do Chef (Só Hoje)',
            'image'             => 'public/images/combo_chef.webp',
            'preco'             => 17.90,
            'preco_promocional' => 8.90,
        ],
    ];
}

/**
 * Garante que o array de carrinho exista na sessão.
 */
function acai_get_cart(): array
{
    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    return $_SESSION['cart'];
}

/**
 * Salva o carrinho na sessão.
 */
function acai_set_cart(array $cart): void
{
    $_SESSION['cart'] = $cart;
}

/**
 * Calcula o total do carrinho.
 */
function acai_cart_total(array $cart): float
{
    $total = 0.0;
    foreach ($cart as $item) {
        $total += isset($item['total']) ? (float) $item['total'] : 0.0;
    }

    return round($total, 2);
}

/**
 * Formata um valor para padrão brasileiro.
 */
function acai_format_money(float $value): string
{
    return number_format($value, 2, ',', '');
}


