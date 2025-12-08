<?php
require_once __DIR__ . '/item/cart_helpers.php';

// Evitar cache do navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$cart          = acai_get_cart();
$totalCarrinho = acai_cart_total($cart);
?>
<style>
    html, body {
        background-color: #f3f5f7 !important;
    }

    /* Header Checkout */
    .checkout-header {
        background: linear-gradient(135deg, var(--primaria) 0%, #4a1d6b 100%);
        padding: 12px 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }

    /* Espaço para compensar o header fixo */
    .faixa-topo {
        margin-top: 69px;
    }

    @media (max-width: 768px) {
        .faixa-topo {
            margin-top: 65px;
        }
    }

    .checkout-header .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .checkout-header .btn-voltar {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 16px;
        background: rgba(255,255,255,0.15);
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .checkout-header .btn-voltar:hover {
        background: rgba(255,255,255,0.25);
        transform: translateX(-3px);
    }

    .checkout-header .btn-voltar i {
        font-size: 16px;
    }

    .checkout-header .header-logo {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checkout-header .header-logo img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.3);
    }

    .checkout-header .header-logo span {
        color: #fff;
        font-size: 18px;
        font-weight: 700;
    }

    .checkout-header .header-seguro {
        display: flex;
        align-items: center;
        gap: 6px;
        color: rgba(255,255,255,0.9);
        font-size: 12px;
    }

    .checkout-header .header-seguro i {
        color: #4caf50;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .checkout-header .header-logo span {
            display: none;
        }

        .checkout-header .btn-voltar span {
            display: none;
        }

        .checkout-header .btn-voltar {
            padding: 10px 12px;
            border-radius: 50%;
        }

        .checkout-header .header-seguro span {
            display: none;
        }
    }

    /* Carrinho colapsável no mobile */
    .cart-toggle-header {
        display: none;
        background: linear-gradient(135deg, var(--primaria) 0%, #4a1d6b 100%);
        color: #fff;
        padding: 12px 15px;
        border-radius: 10px;
        cursor: pointer;
        margin-bottom: 0;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
    }

    .cart-toggle-header:hover {
        opacity: 0.95;
    }

    .cart-toggle-header .cart-toggle-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .cart-toggle-header .cart-toggle-left i {
        font-size: 18px;
    }

    .cart-toggle-header .cart-toggle-left span {
        font-size: 14px;
        font-weight: 600;
    }

    .cart-toggle-header .cart-toggle-right {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .cart-toggle-header .cart-toggle-right .cart-total {
        font-size: 16px;
        font-weight: 700;
    }

    .cart-toggle-header .cart-toggle-right .cart-arrow {
        font-size: 14px;
        transition: transform 0.3s ease;
    }

    .cart-toggle-header.expanded .cart-arrow {
        transform: rotate(180deg);
    }

    #resume-cart-mobile-content {
        transition: max-height 0.4s ease, opacity 0.3s ease, padding 0.3s ease;
        overflow: hidden;
    }

    @media (max-width: 992px) {
        .cart-toggle-header {
            display: flex;
        }

        #resume-social-proof-container {
            margin-bottom: 15px;
        }

        #resume-cart .cart-section-container {
            border-radius: 0 0 10px 10px;
        }

        #resume-cart-mobile-content.collapsed {
            max-height: 0 !important;
            opacity: 0;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        #resume-cart-mobile-content.expanded {
            max-height: 1000px;
            opacity: 1;
        }
    }
</style>
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

        <!-- Font Awesome via CDN -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
              integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
              crossorigin="anonymous"
              referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="public/images/favicon_acai.webp"/>
        <link rel="shortcut icon" href="public/images/favicon_acai.webp"/>
        <link rel="icon" href="public/images/favicon_acai.webp" sizes="32x32"/>
        <link rel="icon" href="public/images/favicon_acai.webp" sizes="192x192"/>
        <link rel="apple-touch-icon" href="public/images/favicon_acai.webp"/>
        <meta name="msapplication-TileImage" content="public/images/favicon_acai.webp"/>
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
        <header class="checkout-header">
            <div class="container">
                <a href="cart.php" class="btn-voltar">
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

        <div>
            <div class="faixa-topo">
                <div class="container">
                    <span>
                        Devido à alta demanda, seu pedido só será reservado após a confirmação do pagamento.<br>Atenção: Gerar o PIX não garante a reserva — finalize o pagamento o quanto antes para garantir o seu.✅
                    </span>
                </div>
            </div>
            <div class="content-checkout">
                <div class="container">
                    <div class="content d-flex align-items-start justify-content-between flex-wrap">
                        <div id="content-checkout-three-steps">
                            <div class="bg-white rounded step1-checkout enable_step">
                                <div id="personal-data">
                                    <div class="d-flex flex-col personal-data-container" style="gap:20px;">
                                        <div id="personal-data-header" class="d-flex align-items-start justify-content-start" style="gap:5px;">
                                            <img class="section-title-img" width="35" height="35" alt="Informações Pessoais" src="public/images/user.svg">
                                            <div class="d-flex flex-col" style="color:#2b2b2b;">
                                                <span class="section-title">INFORMAÇÕES PESSOAIS</span>
                                                <span class="section-subtitle">Utilizaremos seus dados para: Identificar seu perfil, notificação de pedidos e acompanhamento de pedidos.</span>
                                            </div>
                                            <img id="icon-edit-personal-data" width="22" height="20" class="d-none" src="public/images/edit.svg" style="margin-left: auto;">
                                        </div>
                                        <div id="personal-data-inputs">
                                            <div class="d-flex flex-col form-group ">
                                                <label>Nome Completo</label>
                                                <div class="input-container">
                                                    <input required="" minlength="2" maxlength="200" id="nome" placeholder="Informe seu nome completo" name="first_name" class="input-default custom-input " type="text" autocomplete="off">
                                                </div>
                                                <span name="first_name_label_error" class="label-error">Error</span>
                                            </div>
                                            <div class="flex flex-col form-group ">
                                                <label>Celular</label>
                                                <div class="input-container">
                                                    <input required="" minlength="15" maxlength="15" id="telefone" placeholder="(00) 00000-0000" name="phone" class="input-default custom-input " type="tel" autocomplete="off">
                                                </div>
                                                <span name="phone_label_error" class="label-error">Error</span>
                                            </div>
                                        </div>
                                        <div id="step1-summary-container" style="padding: 1rem; word-break: break-all"></div>
                                    </div>
                                </div>
                                <button type="button" id="step1-checkout-finish" class="btn-checkout">
                                    <div class="inner-text" style="display: inline-flex;">
                                        <div style="align-self: center;">CONTINUAR</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height: 18px;width: 18px;margin-left: 0.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <div class="bg-white rounded step2-checkout disabled_step" style="padding:15px;margin-top:.6rem;">
                                <div id="delivery-address">
                                    <div class="d-flex flex-col delivery-address-container" style="gap:20px;">
                                        <div class="d-flex align-items-start justify-content-start delivery-address-title" style="gap:10px;">
                                            <img class="section-title-img" width="28" height="20" alt="Endereço de Entrega" src="public/images/shipping.svg">
                                            <div class="d-flex flex-col" style="color:#2b2b2b;">
                                                <span class="section-title">ENDEREÇO DE ENTREGA</span>
                                                <span class="section-subtitle" style="display:none" id="label-next-step-postal-code">Agora precisamos do seu endereço para entrega.</span>
                                                <span class="section-subtitle" id="label-next-step-postal-code-hidden">Para calcular a taxa de entrega é necessário preencher todos os campos acima.</span>
                                            </div>
                                            <img id="icon-edit-delivery-address" width="22" height="20" class="d-none" src="public/images/edit.svg" style="margin-left: auto;">
                                        </div>
                                        <div id="delivery-address-inputs">
                                            <div id="show-cep" class="d-flex flex-col form-group postal_code_container">
                                                <label>CEP</label>
                                                <div class="input-container">
                                                    <input required="" minlength="9" maxlength="9" name="postal_code" id="cep-checkout" placeholder="00000-000" class="input-default" type="tel" autocomplete="off">
                                                </div>
                                                <span name="postal_code_label_error" class="label-error">Error</span>
                                                <span style="font-size:15px;font-weight:400;color:#2b2b2b;margin-top:10px;" id="hidden-zipcode-after-valid">Preencha suas informações de entrega para continuar.</span>
                                            </div>
                                            <div id="delivery-address-next" class="d-none">
                                                <div class="d-flex flex-col form-group address_line_1_container">
                                                    <label>Endereço</label>
                                                    <div class="input-container">
                                                        <input required="" class="input-default" minlength="5" maxlength="200" placeholder="Informe seu endereço sem número" name="address_line_1" id="endereco" type="text" autocomplete="off">
                                                    </div>
                                                    <span name="address_line_1_label_error" class="label-error">Error</span>
                                                </div>
                                                <div class="d-flex row-number-complement" style="gap:5px; align-items: start;">
                                                    <div class="d-flex flex-col form-group address_number_container" style="width: 40%">
                                                        <label class="d-flex">Número</label>
                                                        <div class="input-container">
                                                            <input required="" maxlength="9" name="address_number" id="numero" placeholder="S/N" class="d-flex input-default" type="text" autocomplete="off">
                                                        </div>
                                                        <span name="address_number_label_error" class="label-error">Error</span>
                                                    </div>
                                                    <div class="d-flex flex-col form-group" style="width: 100%">
                                                        <label>Complemento</label>
                                                        <div class="input-container">
                                                            <input placeholder="Apartamento, casa, loja.." name="address_line_2" maxlength="50" class="input-default" type="text" autocomplete="off" id="complemento">
                                                        </div>
                                                        <span class="label-error">Error</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-col form-group address_neighborhood_container">
                                                    <label>Bairro</label>
                                                    <div class="input-container">
                                                        <input required="" minlength="3" maxlength="50" placeholder="Informe seu bairro" name="address_neighborhood" id="bairro" class="input-default" type="text" autocomplete="off" value="-">
                                                    </div>
                                                    <span name="address_neighborhood_label_error" class="label-error">Error</span>
                                                </div>
                                                <div class="d-flex row-state-city" style="gap:5px; align-items: start;">
                                                    <div class="d-flex flex-col form-group state_container" style="width: 50%; display: flex;">
                                                        <label class="state-province-label-container">Estado</label>
                                                        <div class="input-container">
                                                            <select required="" class="input-default input-default-select custom-select" name="state" type="text" id="estado" autocomplete="off">
                                                                <option value="">Selecione</option>
                                                                <option value="AC">Acre</option>
                                                                <option value="AL">Alagoas</option>
                                                                <option value="AP">Amapá</option>
                                                                <option value="AM">Amazonas</option>
                                                                <option value="BA">Bahia</option>
                                                                <option value="CE">Ceará</option>
                                                                <option value="DF">Distrito Federal</option>
                                                                <option value="ES">Espírito Santo</option>
                                                                <option value="GO">Goiás</option>
                                                                <option value="MA">Maranhão</option>
                                                                <option value="MT">Mato Grosso</option>
                                                                <option value="MS">Mato Grosso do Sul</option>
                                                                <option value="MG">Minas Gerais</option>
                                                                <option value="PA">Pará</option>
                                                                <option value="PB">Paraíba</option>
                                                                <option value="PR">Paraná</option>
                                                                <option value="PE">Pernambuco</option>
                                                                <option value="PI">Piauí</option>
                                                                <option value="RJ">Rio de Janeiro</option>
                                                                <option value="RN">Rio Grande do Norte</option>
                                                                <option value="RS">Rio Grande do Sul</option>
                                                                <option value="RO">Rondônia</option>
                                                                <option value="RR">Roraima</option>
                                                                <option value="SC">Santa Catarina</option>
                                                                <option value="SP">São Paulo</option>
                                                                <option value="SE">Sergipe</option>
                                                                <option value="TO">Tocantins</option>
                                                            </select>
                                                        </div>
                                                        <span name="state_label_error" class="label-error">Error</span>
                                                    </div>
                                                    <div class="d-flex flex-col form-group" style="width:100%">
                                                        <label>Cidade</label>
                                                        <div class="input-container">
                                                            <input maxlength="50" required="" class="input-default" name="city" type="text" id="cidade" autocomplete="off">
                                                        </div>
                                                        <span name="city_label_error" class="label-error">Error</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step2-summary-container" style="word-break: break-all"></div>
                                    </div>
                                </div>
                                <div id="shipping-methods" class="d-none">
                                    <div class="d-flex flex-col shipping-methods-container" style="gap:5px;">
                                        <div class="d-flex" style="gap:10px;">
                                            <div class="d-flex flex-col" style="color:#2b2b2b;">
                                                <span style="font-size:14px;font-weight:700;">Entrega</span>
                                            </div>
                                        </div>
                                        <div id="shippings" class="d-flex flex-col">
                                            <label for="shipping_methods_free" class="d-flex flex-row align-items-center form-group label-shipping-methods" style="color: rgb(102, 102, 102); font-weight: 400; width: 100%; cursor: pointer;">
                                                <span style="width: 20%;">
                                                    <div style="min-width: 20px; min-height: 20px; width: 20px; height: 20px; border-radius: 100%; border: 1px solid rgb(187, 187, 187); background-color: rgb(238, 238, 238);" class="custom-radio custom-radio-active"></div>
                                                </span>
                                                <span id="shipping-method-title-82579" style="width: 40%;">
                                                    <span>Padrão</span>
                                                    <input style="width: 1px; height: 1px; opacity: 0;" class="input-default" id="shipping_methods_free" name="shipping_methods" type="radio" value="0" checked>
                                                </span>
                                                <span style="width: 30%;">40-60 min</span>
                                                <span class="flex justify-end label-price-shipping" key="82579" style="width: 30%;">
                                                    <b style="color:#69c289">Grátis</b>
                                                </span>
                                            </label>
                                            <label for="shipping_methods_express" class="d-flex flex-row align-items-center form-group label-shipping-methods" style="color: rgb(102, 102, 102); font-weight: 400; width: 100%; cursor: pointer;">
                                                <span style="width: 20%;">
                                                    <div style="min-width: 20px; min-height: 20px; width: 20px; height: 20px; border-radius: 100%; border: 1px solid rgb(187, 187, 187); background-color: rgb(238, 238, 238);" class="custom-radio"></div>
                                                </span>
                                                <span id="shipping-method-title-82579" style="width: 40%;">
                                                    <span>Expressa</span>
                                                    <input style="width: 1px; height: 1px; opacity: 0;" class="input-default" id="shipping_methods_express" name="shipping_methods" type="radio" value="9.90">
                                                </span>
                                                <span style="width: 30%;">15-30 min</span>
                                                <span class="flex justify-end label-price-shipping" key="82579" style="width: 30%;">
                                                    <b style="color:#69c289">R$ 9,90</b>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="step2-checkout-finish" class="btn-checkout d-none">
                                    <div class="inner-text" style="display: inline-flex;">
                                        <div style="align-self: center;">CONTINUAR</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height: 18px;width: 18px;margin-left: 0.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <div class="bg-white rounded step3-checkout disabled_step" style="padding:15px;margin-top:.6rem;">
                                <div id="payment-methods">
                                    <div class="d-flex flex-col" style="gap:20px;">
                                        <div class="d-flex align-items-start justify-content-start payment-methods-title" style="gap:10px;">
                                            <img width="28" height="20" alt="Formas de Pagamento" src="public/images/payment.svg">
                                            <div class="d-flex flex-col" style="color:#2b2b2b;">
                                                <span class="section-title">FORMAS DE PAGAMENTO</span>
                                                <span class="section-subtitle" id="label-next-step-payment">Para finalizar seu pedido escolha uma forma de pagamento</span>
                                            </div>
                                        </div>

                                        <div id="payment_box_methods_container" style="width: 100%" class="d-flex flex-col">
                                            <!-- PIX -->
                                            <div id="pix_hipercash-box-pix" data-payment-method="pix" data-payment-code="pix_hipercash" class="d-flex flex-col align-items-center rounded box-payment payment-method-is-selected">
                                                <div class="d-flex flex-row align-items-center" id="pix-row" style="width:100%;cursor:pointer;">
                                                    <span>
                                                        <div id="pix_hipercash_radio" class="radios-payment-methods custom-radio-active"></div>
                                                    </span>
                                                    <span class="label-box-methods-payment input-pix" style="white-space:nowrap;">
                                                        <b>PIX</b>
                                                    </span>
                                                </div>
                                                <div id="container-payment-pix_hipercash" class="d-flex flex-col content_payment_method" style="gap:20px;margin-top:20px;width:100%;">
                                                    <p style="font-size:14px;">
                                                        <b>Atente-se aos detalhes:</b>
                                                        <br>Pagamentos via pix são confirmados imediatamente. Você não precisa ter uma chave pix para efetuar o pagamento, basta ter o app do seu banco em seu celular.
                                                    </p>
                                                    <div class="d-flex flex-col w-100 form-group">
                                                        <input type="hidden" name="amount" id="amount" value="<?php echo number_format($totalCarrinho, 2, '.', ''); ?>" autocomplete="off">
                                                        <button type="button" id="general-submit-button">
                                                            <b>PAGAR COM PIX</b>
                                                            <span id="total_button">R$ <?php echo acai_format_money($totalCarrinho); ?></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CARTÃO DE CRÉDITO - DESABILITADO -->
                                            <div id="credit_card_asset-box-credit" class="d-flex flex-col align-items-center rounded box-payment disabled-payment" style="opacity:0.5;pointer-events:none;cursor:not-allowed;">
                                                <div class="d-flex flex-row align-items-center payment-credit-card" id="credit-card-row" style="width:100%;">
                                                    <span>
                                                        <div id="credit_card_asset_radio" class="radios-payment-methods" style="background:#ccc;"></div>
                                                    </span>
                                                    <span class="label-box-methods-payment" style="white-space:nowrap;">
                                                        <b>CARTÃO DE CRÉDITO</b>
                                                    </span>
                                                    <span class="aviso-card" style="display:inline-block !important;margin-left:auto;font-size:11px;color:#fff;font-weight:600;background:#dc3545;padding:2px 8px;border-radius:4px;">Desativado nesta promoção</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="resume-social-proof-container">
                            <div id="resume-cart">
                                <!-- Toggle do Carrinho (Mobile) -->
                                <div class="cart-toggle-header" id="cart-toggle-header" onclick="toggleCart()">
                                    <div class="cart-toggle-left">
                                        <i class="fa-solid fa-shopping-bag"></i>
                                        <span>Ver meu pedido (<?php echo count($cart); ?> <?php echo count($cart) == 1 ? 'item' : 'itens'; ?>)</span>
                                    </div>
                                    <div class="cart-toggle-right">
                                        <span class="cart-total">R$ <?php echo acai_format_money($totalCarrinho); ?></span>
                                        <i class="fa-solid fa-chevron-down cart-arrow"></i>
                                    </div>
                                </div>
                                <div class="bg-white cart-section-container">
                                    <div id="resume-cart-mobile-content" class="collapsed">
                                        <h3>SEU CARRINHO</h3>
                                        <div id="content-list-products">
                                            <?php if (empty($cart)): ?>
                                                <p>Seu carrinho está vazio.</p>
                                            <?php else: ?>
                                                <?php foreach ($cart as $item): ?>
                                                    <div class="produto-cart">
                                                        <div class="quantity"><?php echo (int)$item['qtd']; ?></div>
                                                        <div class="image">
                                                            <img src="<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                                                 alt="<?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?>">
                                                        </div>
                                                        <div class="dados">
                                                            <h3><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                                            <p>Aproveite! Entrega grátis</p>
                                                            <div class="price">
                                                                <span class="price">R$ <?php echo acai_format_money((float)$item['preco']); ?></span>
                                                                <span class="promo">R$ <?php echo acai_format_money((float)$item['preco_promocional']); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="items-end">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="resume-cart-price-title">Items do Pedido</span>
                                                <span class="resume-cart-price-title" id="subtotal_cart">R$ <?php echo acai_format_money($totalCarrinho); ?></span>
                                            </div>
                                            <div class="frete-cart d-flex align-items-center justify-content-between">
                                                <span class="resume-cart-price-title" id="title-frete">Taxa de Entrega</span>
                                                <span class="resume-cart-price-title" id="total_frete">R$ 0,00</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between total-value-resume">
                                                <span style="font-weight:700;">Total do Pedido</span>
                                                <span class="price-total" id="total_cart" style="font-weight:700;">R$ <?php echo acai_format_money($totalCarrinho); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script defer type="text/javascript" src="public/js/functions.js?v=<?php echo time(); ?>"></script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"5cb2a07379cd4eefbb95393e110dd461","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
        <script>
        // Função para alternar o carrinho (colapsável)
        function toggleCart() {
            const cartContent = document.getElementById('resume-cart-mobile-content');
            const cartToggleHeader = document.getElementById('cart-toggle-header');

            if (cartContent && cartToggleHeader) {
                cartContent.classList.toggle('collapsed');
                cartContent.classList.toggle('expanded');
                cartToggleHeader.classList.toggle('expanded');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // PIX é a única opção de pagamento nesta promoção
            const pixBox = document.getElementById('pix_hipercash-box-pix');
            const pixContent = document.getElementById('container-payment-pix_hipercash');

            // Garantir que PIX está sempre visível
            if (pixBox && pixContent) {
                pixBox.classList.add('payment-method-is-selected');
                pixContent.style.display = 'flex';
                pixContent.classList.remove('d-none');
            }
        });
        </script>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>
