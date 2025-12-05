<?php
require_once __DIR__ . '/item/cart_helpers.php';
$cart = acai_get_cart();
$totalCarrinho = acai_cart_total($cart);
$cartCount = 0;
foreach ($cart as $cartItem) {
    $cartCount += isset($cartItem['qtd']) ? (int) $cartItem['qtd'] : 0;
}
?>
<style>html, body{background-color:#f3f5f7 !important;}</style>
<!DOCTYPE html>
<html lang="pt-br" translate="no">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta name="google" content="notranslate">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="Ng8LzSxnDpeIq5x1nCgRPwEdxj9ujdHL3YMckxIo">
        <title>Tropical Açaí | Faça seu pedido!</title>
        <meta name="description" content="Promoções Tropical Açaí, confira nossa promoções e faça seu pedido agora!">
        <meta name="theme-color" content="#64268c">
        <meta name="apple-mobile-web-app-status-bar-style" content="#64268c">
        <meta name="msapplication-navbutton-color" content="#64268c">

        <!-- Microsoft Clarity -->
        <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "ufa1audvwf");
        </script>

        <!-- Font Awesome via CDN -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
              integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
              crossorigin="anonymous"
              referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="public/images/favicon_acai.webp" />
        <link rel="shortcut icon" href="public/images/favicon_acai.webp" />
        <link rel="icon" href="public/images/favicon_acai.webp" sizes="32x32" />
        <link rel="icon" href="public/images/favicon_acai.webp" sizes="192x192" />
        <link rel="apple-touch-icon" href="public/images/favicon_acai.webp" />
        <meta name="msapplication-TileImage" content="public/images/favicon_acai.webp" />

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17761107013"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'AW-17761107013');
            gtag('config', 'AW-17761923751');
            gtag('config', 'AW-17761957026');
        </script>

        <!-- CSS Crítico - Evita flash de conteúdo sem estilo -->
        <style>
            body { opacity: 0; }
            body.loaded { opacity: 1; transition: opacity 0.2s ease; }
            .loading__component { opacity: 1 !important; }
        </style>
        <link rel="preload" href="public/css/bootstrap.min.css" as="style">
        <link rel="preload" href="public/css/global.css" as="style">
        <link href="public/css/bootstrap.min.css" rel="stylesheet" media="print" onload="this.media='all'">
        <link href="public/css/global.css" rel="stylesheet" media="print" onload="this.media='all'; document.body.classList.add('loaded');">
        <noscript>
            <link href="public/css/bootstrap.min.css" rel="stylesheet">
            <link href="public/css/global.css" rel="stylesheet">
            <style>body { opacity: 1 !important; }</style>
        </noscript>
    </head>
    <body class="delivery">
        <div class="loading__component">
            <div class="loading__bar"></div> 
            <div class="loading__circle">
                <div class="loading__circle-spinner"></div>
            </div>
        </div>
        <!-- Header Checkout -->
        <header class="checkout-header static">
            <div class="container">
                <a href="index.php" class="btn-voltar">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Voltar</span>
                </a>
                <div class="header-logo">
                    <img src="public/images/logo_acai.webp" alt="Tropical Açaí">
                    <span>Tropical Açaí</span>
                </div>
                <div class="header-seguro">
                    <i class="fa-solid fa-lock"></i>
                    <span>Compra Segura</span>
                </div>
            </div>
        </header>
    <section id="carrinho">
        <div class="container">
            <div class="items-cart">
                <?php if (empty($cart)): ?>
                    <p>Seu carrinho está vazio.</p>
                <?php else: ?>
                    <?php foreach ($cart as $item): ?>
                        <div class="item-cart">
                            <div class="content-item">
                                <div class="image-item">
                                    <img src="<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                         alt="<?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?>"
                                         width="80" height="80">
                                </div>
                                <div class="details-item">
                                    <div class="content-details">
                                        <div>
                                            <h2><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                                            <div class="seletor-item">
                                                <h3 class="price">
                                                    R$ <?php echo acai_format_money(isset($item['total']) ? (float)$item['total'] : ((float)$item['unit_price'] * (int)$item['qtd'])); ?>
                                                </h3>
                                                <div class="selector" data-item="<?php echo (int)$item['id']; ?>">
                                                    <button type="button" class="btn-item qtd-item-minus">
                                                        <svg class="delete-icon " stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" style="color: rgb(244, 67, 54);" height="20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path></svg>
                                                        <svg class="minus-icon d-none" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M5 11V13H19V11H5Z"></path></svg>
                                                    </button>
                                                    <input type="text" class="item-qtd" name="qtd-item" value="<?php echo (int)$item['qtd']; ?>" readonly autocomplete="off">
                                                    <button type="button" class="btn-item qtd-item-plus">
                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php if (!empty($item['opcoes'])): ?>
                                                <div class="opcoes-item">
                                                    <?php foreach ($item['opcoes'] as $idx => $opt): ?>
                                                        <span><span><?php echo $idx + 1; ?></span><?php echo htmlspecialchars($opt, ENT_QUOTES, 'UTF-8'); ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="resume-cart">
                <div class="subtotal">
                    <span>Subtotal:</span>
                    <strong id="totalCart">R$&nbsp;<?php echo acai_format_money($totalCarrinho); ?></strong>
                </div>
                <div class="subtotal">
                    <span>Taxa de Entrega:</span>
                    <strong>R$ 0,00</strong>
                </div>
                <div class="total">
                    <strong>Total</strong>
                    <strong id="totalFinal">R$&nbsp;<?php echo acai_format_money($totalCarrinho); ?></strong>
                </div>
            </div>
            <div class="acoes-cart">
                <a href="index.php" class="btn-action-cart prev"><i class="fa-solid fa-circle-plus"></i><span>Adicionar Mais Itens</span></a>
                <a href="checkout.php" class="btn-action-cart next"><i class="fas fa-credit-card"></i><span>Finalizar Pedido</span></a>
            </div>
            <div class="complementar-pedido">
                <h3><i class="fa-solid fa-circle-plus"></i> Complemente seu pedido:</h3>
                <div class="complementares">
                        <div class="complementar">
                            <div class="image-item">
                                <img src="public/images/brownie_gelado.webp" alt="Brownie Gelado">
                            </div>
                            <div class="dados-item">
                                <h3>Brownie Gelado</h3>
                                <span class="d-block mb-2" style="font-size:13px;line-height:18px;color:#555;">Acompanhamento perfeito para seu açaí </span>
                                <div class="price">
                                    <span>R$13,90</span>
                                    <strong>R$6,90 </strong> 
                                </div>
                                <button type="button" class="add-extra" data-id="7">Adicionar</button>
                            </div>
                        </div>
                                            <div class="complementar">
                            <div class="image-item">
                                <img src="public/images/textura.webp" alt="Açaí Turbo">
                            </div>
                            <div class="dados-item">
                                <h3>Açaí Turbo</h3>
                                <span class="d-block mb-2" style="font-size:13px;line-height:18px;color:#555;">+20% de volume e textura mais gelada</span>
                                <div class="price">
                                    <span>R$11,90</span>
                                    <strong>R$5,90 </strong> 
                                </div>
                                <button type="button" class="add-extra" data-id="8">Adicionar</button>
                            </div>
                        </div>
                                            <div class="complementar">
                            <div class="image-item">
                                <img src="public/images/combo_chef.webp" alt="Combo do Chef (Só Hoje)">
                            </div>
                            <div class="dados-item">
                                <h3>Combo do Chef (Só Hoje)</h3>
                                <span class="d-block mb-2" style="font-size:13px;line-height:18px;color:#555;">Açaí + Brownie + Camada surpresa</span>
                                <div class="price">
                                    <span>R$17,90</span>
                                    <strong>R$8,90 </strong> 
                                </div>
                                <button type="button" class="add-extra" data-id="9">Adicionar</button>
                            </div>
                        </div>
                                    </div>
            </div>
        </div>
    </section>
    <div class="bottomBar">
        <div class="contentBar">
            <a href="index.php" class="active">
                <div class="icon">
                    <i class="fa-solid fa-house"></i>
                </div>
                <span>Cardápio</span>
            </a>
            <a href="cart.php">
                <div class="icon">
                    <?php if ($cartCount > 0): ?>
                        <div class="cart-badge"><?php echo $cartCount; ?></div>
                    <?php endif; ?>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <span>Carrinho</span>
            </a>
            <a href="#">
                <div class="icon">
                    <i class="fa-solid fa-right-to-bracket"></i>
                </div>
                <span>Entrar</span>
            </a>
        </div>
    </div>
        </div>
        <script>
            window.rotas = {
                homeUrl: "index.php",
                cartUrl: "cart.php",
                adicionarCarrinho: "item/add.php",
                updateCarrinho: "item/update.php",
                consulteCarrinho: "item/consult.php",
                gateway: "gateway",
                processar: "processar",
                pix: "checkout/pix"
            };
        </script>
        <script type="text/javascript" src="public/js/jquery.min.js"></script>
        <script defer type="text/javascript" src="public/js/bootstrap.min.js"></script>
        <script defer type="text/javascript" src="public/js/jquery.mask.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script defer type="text/javascript" src="public/js/sweetalert.min.js"></script>
        <script defer type="text/javascript" src="public/js/select2.min.js"></script>
        <script defer type="text/javascript" src="public/js/functions.js"></script>
        <script>
            // Carrossel de complementos - arrastar para navegar
            document.addEventListener('DOMContentLoaded', function() {
                const carousel = document.querySelector('.complementares');
                if (!carousel) return;

                let isDown = false;
                let startX;
                let scrollLeft;

                carousel.addEventListener('mousedown', (e) => {
                    isDown = true;
                    carousel.classList.add('dragging');
                    startX = e.pageX - carousel.offsetLeft;
                    scrollLeft = carousel.scrollLeft;
                });

                carousel.addEventListener('mouseleave', () => {
                    isDown = false;
                    carousel.classList.remove('dragging');
                });

                carousel.addEventListener('mouseup', () => {
                    isDown = false;
                    carousel.classList.remove('dragging');
                });

                carousel.addEventListener('mousemove', (e) => {
                    if (!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - carousel.offsetLeft;
                    const walk = (x - startX) * 2;
                    carousel.scrollLeft = scrollLeft - walk;
                });

                // Touch events para mobile
                carousel.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].pageX - carousel.offsetLeft;
                    scrollLeft = carousel.scrollLeft;
                }, { passive: true });

                carousel.addEventListener('touchmove', (e) => {
                    const x = e.touches[0].pageX - carousel.offsetLeft;
                    const walk = (x - startX) * 2;
                    carousel.scrollLeft = scrollLeft - walk;
                }, { passive: true });
            });
        </script>
            <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"5cb2a07379cd4eefbb95393e110dd461","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>
</html>