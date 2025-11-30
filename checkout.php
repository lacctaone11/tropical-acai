<?php
require_once __DIR__ . '/item/cart_helpers.php';
$cart          = acai_get_cart();
$totalCarrinho = acai_cart_total($cart);
?>
<style>
    html, body {
        background-color: #f3f5f7 !important;
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
        <title>La Barca Açaí | Faça seu pedido!</title>
        <meta name="description" content="Promoções La Barca Açaí, confira nossa promoções e faça seu pedido agora!">
        <meta name="theme-color" content="#64268c">
        <meta name="apple-mobile-web-app-status-bar-style" content="#64268c">
        <meta name="msapplication-navbutton-color" content="#64268c">

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17642163670"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'AW-17642163670');
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
        <link rel="preload" href="public/css/bootstrap.min.css" as="style">
        <link rel="preload" href="public/css/global.css" as="style">
        <link href="public/css/bootstrap.min.css" rel="stylesheet" media="print" onload="this.media='all'">
        <link href="public/css/global.css" rel="stylesheet" media="print" onload="this.media='all'">
        <noscript>
            <link href="public/css/bootstrap.min.css" rel="stylesheet">
            <link href="public/css/global.css" rel="stylesheet">
        </noscript>
    </head>
    <body class="delivery">
        <div class="loading__component">
            <div class="loading__bar"></div>
            <div class="loading__circle">
                <div class="loading__circle-spinner"></div>
            </div>
        </div>
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
                                                <label>E-mail</label>
                                                <div class="input-container">
                                                    <input required="" minlength="2" maxlength="250" id="email" placeholder="Ex.: seu.e-mail@gmail.com" name="email" class="input-default custom-input " type="email" autocomplete="off">
                                                </div>
                                                <span name="email_label_error" class="label-error">Error</span>
                                            </div>
                                            <div class="d-flex flex-col form-group ">
                                                <label>Nome Completo</label>
                                                <div class="input-container">
                                                    <input required="" minlength="2" maxlength="200" id="nome" placeholder="Informe seu nome completo" name="first_name" class="input-default custom-input " type="text" autocomplete="off">
                                                </div>
                                                <span name="first_name_label_error" class="label-error">Error</span>
                                            </div>
                                            <div class="d-flex flex-col form-group ">
                                                <label>CPF</label>
                                                <div class="input-container ">
                                                    <input required="" minlength="14" maxlength="14" placeholder="000.000.000-00" name="doc" id="cpf" class="input-default custom-input" type="tel" autocomplete="off">
                                                </div>
                                                <span name="doc_label_error" class="label-error">Error</span>
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

                                        <!-- Order Bump Mobile - 3 Ofertas -->
                                        <div id="order-bump-mobile" class="d-none">
                                            <div class="order-bump-title">
                                                <strong>🔥 3 ofertas disponíveis</strong> para você:
                                            </div>
                                            <div class="order-bump-items">
                                                <!-- Item 1 - Brownie Gelado -->
                                                <div class="order-bump-item" data-price="6.90" data-id="7">
                                                    <div class="ob-image">
                                                        <img src="public/images/brownie_gelado.webp" alt="Brownie Gelado">
                                                    </div>
                                                    <div class="ob-info">
                                                        <h4>Brownie Gelado</h4>
                                                        <p>Acompanhamento perfeito para seu açaí</p>
                                                        <div class="ob-prices">
                                                            <span class="ob-old-price">R$ 13,90</span>
                                                            <span class="ob-new-price">R$ 6,90</span>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="ob-add-btn" onclick="addOrderBump(this, 7, 6.90, 'Brownie Gelado')">
                                                        <i class="fa fa-plus"></i> Adicionar
                                                    </button>
                                                </div>

                                                <!-- Item 2 - Açaí Turbo -->
                                                <div class="order-bump-item" data-price="5.90" data-id="8">
                                                    <div class="ob-image">
                                                        <img src="public/images/textura.webp" alt="Açaí Turbo">
                                                    </div>
                                                    <div class="ob-info">
                                                        <h4>Açaí Turbo</h4>
                                                        <p>+20% de volume e textura mais gelada</p>
                                                        <div class="ob-prices">
                                                            <span class="ob-old-price">R$ 11,90</span>
                                                            <span class="ob-new-price">R$ 5,90</span>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="ob-add-btn" onclick="addOrderBump(this, 8, 5.90, 'Açaí Turbo')">
                                                        <i class="fa fa-plus"></i> Adicionar
                                                    </button>
                                                </div>

                                                <!-- Item 3 - Combo do Chef -->
                                                <div class="order-bump-item" data-price="8.90" data-id="9">
                                                    <div class="ob-image">
                                                        <img src="public/images/combo_chef.webp" alt="Combo do Chef">
                                                    </div>
                                                    <div class="ob-info">
                                                        <h4>Combo do Chef (Só Hoje)</h4>
                                                        <p>Açaí + Brownie + Camada surpresa</p>
                                                        <div class="ob-prices">
                                                            <span class="ob-old-price">R$ 17,90</span>
                                                            <span class="ob-new-price">R$ 8,90</span>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="ob-add-btn" onclick="addOrderBump(this, 9, 8.90, 'Combo do Chef')">
                                                        <i class="fa fa-plus"></i> Adicionar
                                                    </button>
                                                </div>
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

                                            <!-- CARTÃO DE CRÉDITO -->
                                            <div id="credit_card_asset-box-credit" class="d-flex flex-col align-items-center rounded box-payment">
                                                <div class="d-flex flex-row align-items-center payment-credit-card" id="credit-card-row" style="width:100%;cursor:pointer;">
                                                    <span>
                                                        <div id="credit_card_asset_radio" class="radios-payment-methods"></div>
                                                    </span>
                                                    <span class="label-box-methods-payment" style="white-space:nowrap;">
                                                        <b>CARTÃO DE CRÉDITO</b>
                                                    </span>
                                                    <span class="aviso-card d-none">Não disponível no momento!</span>
                                                </div>
                                                <div id="credit-card-form-container" class="d-none" style="width:100%;margin-top:20px;padding:20px;background:#f8f9fa;border-radius:8px;">
                                                    <form id="credit-card-form">
                                                        <div class="d-flex flex-col form-group" style="margin-bottom:15px;">
                                                            <label for="cc-number" style="margin-bottom:5px;color:#2b2b2b;font-weight:500;">Número do Cartão</label>
                                                            <input type="text" class="input-default" id="cc-number" placeholder="0000 0000 0000 0000" autocomplete="off" style="width:100%;">
                                                        </div>
                                                        <div class="d-flex flex-col form-group" style="margin-bottom:15px;">
                                                            <label for="cc-name" style="margin-bottom:5px;color:#2b2b2b;font-weight:500;">Nome do Titular</label>
                                                            <input type="text" class="input-default" id="cc-name" placeholder="Nome igual no cartão" autocomplete="off" style="width:100%;">
                                                        </div>
                                                        <div class="d-flex flex-col form-group" style="margin-bottom:15px;">
                                                            <label for="cc-cpf" style="margin-bottom:5px;color:#2b2b2b;font-weight:500;">CPF do Titular</label>
                                                            <input type="text" class="input-default" id="cc-cpf" placeholder="000.000.000-00" autocomplete="off" style="width:100%;">
                                                        </div>
                                                        <div style="display:flex;gap:10px;margin-bottom:15px;">
                                                            <div class="d-flex flex-col form-group" style="flex:1;">
                                                                <label for="cc-validade" style="margin-bottom:5px;color:#2b2b2b;font-weight:500;">Validade</label>
                                                                <input type="text" class="input-default" id="cc-validade" placeholder="MM/AA" autocomplete="off" style="width:100%;">
                                                            </div>
                                                            <div class="d-flex flex-col form-group" style="flex:1;">
                                                                <label for="cc-cvv" style="margin-bottom:5px;color:#2b2b2b;font-weight:500;">CVV</label>
                                                                <input type="text" class="input-default" id="cc-cvv" placeholder="123" autocomplete="off" style="width:100%;">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-col w-100 form-group">
                                                            <button type="button" class="btn-checkout" id="credit-card-pay-button" style="width:100%;">
                                                                <b>PAGAR COM CARTÃO</b>
                                                                <span>R$ <?php echo acai_format_money($totalCarrinho); ?></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="resume-social-proof-container">
                            <div id="resume-cart">
                                <div class="bg-white cart-section-container">
                                    <div id="resume-cart-mobile-content">
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
                            <div id="social-proof-container">
                                <div class="orderBup">
                                    <span class="title-orderBump">
                                        <strong>3 ofertas disponíveis</strong>
                                        para você:
                                    </span>
                                    <input type="checkbox" name="orderBump_7" id="orderBump_7" value="7" class="extra-item d-none" autocomplete="off">
                                    <label class="item-orderBup" for="orderBump_7">
                                        <div class="ob-purchased">
                                            <span>Oferta adquirida</span>
                                            <img src="public/images/verified.svg" alt="Oferta Adiquirida">
                                        </div>
                                        <div class="trash">
                                            <img src="public/images/trash.svg" alt="Remover item">
                                        </div>
                                        <div class="image">
                                            <img src="public/images/brownie_gelado.webp" alt="Brownie Gelado">
                                        </div>
                                        <div class="dados">
                                            <h3>Brownie Gelado</h3>
                                            <span>Acompanhamento perfeito para seu açaí </span>
                                            <div class="price-list">
                                                <span class="antes">R$ 13,90</span>
                                                <span class="atual">R$ 6,90</span>
                                            </div>
                                        </div>
                                        <div class="selecionar">
                                            <span>
                                                <span></span>
                                            </span>
                                            <strong>Pegar oferta</strong>
                                        </div>
                                    </label>
                                    <input type="checkbox" name="orderBump_8" id="orderBump_8" value="8" class="extra-item d-none" autocomplete="off">
                                    <label class="item-orderBup" for="orderBump_8">
                                        <div class="ob-purchased">
                                            <span>Oferta adquirida</span>
                                            <img src="public/images/verified.svg" alt="Oferta Adiquirida">
                                        </div>
                                        <div class="trash">
                                            <img src="public/images/trash.svg" alt="Remover item">
                                        </div>
                                        <div class="image">
                                            <img src="public/images/textura.webp" alt="Açaí Turbo">
                                        </div>
                                        <div class="dados">
                                            <h3>Açaí Turbo</h3>
                                            <span>+20% de volume e textura mais gelada</span>
                                            <div class="price-list">
                                                <span class="antes">R$ 11,90</span>
                                                <span class="atual">R$ 5,90</span>
                                            </div>
                                        </div>
                                        <div class="selecionar">
                                            <span>
                                                <span></span>
                                            </span>
                                            <strong>Pegar oferta</strong>
                                        </div>
                                    </label>
                                    <input type="checkbox" name="orderBump_9" id="orderBump_9" value="9" class="extra-item d-none" autocomplete="off">
                                    <label class="item-orderBup" for="orderBump_9">
                                        <div class="ob-purchased">
                                            <span>Oferta adquirida</span>
                                            <img src="public/images/verified.svg" alt="Oferta Adiquirida">
                                        </div>
                                        <div class="trash">
                                            <img src="public/images/trash.svg" alt="Remover item">
                                        </div>
                                        <div class="image">
                                            <img src="public/images/combo_chef.webp" alt="Combo do Chef (Só Hoje)">
                                        </div>
                                        <div class="dados">
                                            <h3>Combo do Chef (Só Hoje)</h3>
                                            <span>Açaí + Brownie + Camada surpresa</span>
                                            <div class="price-list">
                                                <span class="antes">R$ 17,90</span>
                                                <span class="atual">R$ 8,90</span>
                                            </div>
                                        </div>
                                        <div class="selecionar">
                                            <span>
                                                <span></span>
                                            </span>
                                            <strong>Pegar oferta</strong>
                                        </div>
                                    </label>
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
        <style>
            /* Estilos para validação do formulário de cartão */
            #credit-card-form .input-default.is-valid {
                border-color: #28a745 !important;
                background-color: #f0fff4;
            }
            #credit-card-form .input-default.is-invalid {
                border-color: #dc3545 !important;
                background-color: #fff5f5;
            }
            #credit-card-form .input-default:focus.is-valid {
                box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            }
            #credit-card-form .input-default:focus.is-invalid {
                box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
            }

            /* Order Bump Mobile - Lista de 3 Ofertas */
            #order-bump-mobile {
                margin-bottom: 20px;
                padding: 15px;
                background: linear-gradient(135deg, #fff9e6 0%, #fff3cd 100%);
                border-radius: 12px;
                border: 2px dashed #f79f1a;
            }

            .order-bump-title {
                text-align: center;
                font-size: 15px;
                color: #333;
                margin-bottom: 15px;
            }

            .order-bump-title strong {
                color: #d63384;
            }

            .order-bump-items {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .order-bump-item {
                display: flex;
                align-items: center;
                background: #fff;
                border-radius: 10px;
                padding: 10px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                gap: 10px;
            }

            .order-bump-item.added {
                background: #e8f5e9;
                border: 2px solid #4caf50;
            }

            .ob-image {
                width: 60px;
                height: 60px;
                min-width: 60px;
                border-radius: 8px;
                overflow: hidden;
                background: #f5f5f5;
            }

            .ob-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .ob-info {
                flex: 1;
                min-width: 0;
            }

            .ob-info h4 {
                font-size: 13px;
                font-weight: 700;
                color: #333;
                margin: 0 0 3px 0;
                text-transform: uppercase;
            }

            .ob-info p {
                font-size: 11px;
                color: #777;
                margin: 0 0 5px 0;
                line-height: 1.2;
            }

            .ob-prices {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .ob-old-price {
                font-size: 12px;
                color: #e53935;
                text-decoration: line-through;
            }

            .ob-new-price {
                font-size: 15px;
                font-weight: 700;
                color: #2e7d32;
            }

            .ob-add-btn {
                background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
                color: #fff;
                border: none;
                border-radius: 20px;
                padding: 8px 14px;
                font-size: 12px;
                font-weight: 600;
                cursor: pointer;
                white-space: nowrap;
                display: flex;
                align-items: center;
                gap: 5px;
                transition: all 0.3s ease;
            }

            .ob-add-btn:hover {
                background: linear-gradient(135deg, #45a049 0%, #388e3c 100%);
                transform: scale(1.05);
            }

            .ob-add-btn.added {
                background: #9e9e9e;
                pointer-events: none;
            }

            .ob-add-btn.added i:before {
                content: "\f00c";
            }

            /* Esconder order bump original no mobile */
            @media (max-width: 992px) {
                #social-proof-container .orderBup {
                    display: none !important;
                }
            }

            /* Mostrar order bump original apenas no desktop */
            @media (min-width: 993px) {
                #order-bump-mobile {
                    display: none !important;
                }
            }
        </style>
        <script defer type="text/javascript" src="public/js/functions.js"></script>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"5cb2a07379cd4eefbb95393e110dd461","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Carrossel Order Bump Mobile
            const carouselTrack = document.getElementById('carousel-track');
            const dots = document.querySelectorAll('.carousel-dots .dot');
            let currentIndex = 0;
            let startX = 0;
            let isDragging = false;

            function updateCarousel(index) {
                if (!carouselTrack) return;
                currentIndex = index;
                carouselTrack.style.transform = `translateX(-${index * 100}%)`;
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });
            }

            // Dots click
            dots.forEach(dot => {
                dot.addEventListener('click', function() {
                    updateCarousel(parseInt(this.dataset.index));
                });
            });

            // Swipe para mobile
            if (carouselTrack) {
                carouselTrack.addEventListener('touchstart', function(e) {
                    startX = e.touches[0].clientX;
                    isDragging = true;
                }, { passive: true });

                carouselTrack.addEventListener('touchmove', function(e) {
                    if (!isDragging) return;
                }, { passive: true });

                carouselTrack.addEventListener('touchend', function(e) {
                    if (!isDragging) return;
                    const endX = e.changedTouches[0].clientX;
                    const diff = startX - endX;

                    if (Math.abs(diff) > 50) {
                        if (diff > 0 && currentIndex < 2) {
                            updateCarousel(currentIndex + 1);
                        } else if (diff < 0 && currentIndex > 0) {
                            updateCarousel(currentIndex - 1);
                        }
                    }
                    isDragging = false;
                }, { passive: true });
            }

            // Mostrar order bump mobile quando step3 estiver ativo
            function checkStep3Active() {
                const step3 = document.querySelector('.step3-checkout');
                const orderBumpMobile = document.getElementById('order-bump-mobile');

                if (step3 && orderBumpMobile) {
                    if (step3.classList.contains('enable_step')) {
                        orderBumpMobile.classList.remove('d-none');
                    } else {
                        orderBumpMobile.classList.add('d-none');
                    }
                }
            }

            // Observer para detectar mudanças na classe do step3
            const step3Element = document.querySelector('.step3-checkout');
            if (step3Element) {
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName === 'class') {
                            checkStep3Active();
                        }
                    });
                });

                observer.observe(step3Element, { attributes: true });
            }

            // Verificar estado inicial
            checkStep3Active();

            // Sincronizar checkboxes mobile com desktop
            const mobileCheckboxes = document.querySelectorAll('.extra-item-mobile');
            const desktopCheckboxes = document.querySelectorAll('.extra-item');

            mobileCheckboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    if (desktopCheckboxes[index]) {
                        desktopCheckboxes[index].checked = this.checked;
                        // Disparar evento change para atualizar totais
                        desktopCheckboxes[index].dispatchEvent(new Event('change'));
                    }
                });
            });

            desktopCheckboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    if (mobileCheckboxes[index]) {
                        mobileCheckboxes[index].checked = this.checked;
                    }
                });
            });

            // ========== ALTERNÂNCIA ENTRE PIX E CARTÃO ==========
            const pixBox = document.getElementById('pix_hipercash-box-pix');
            const cardBox = document.getElementById('credit_card_asset-box-credit');
            const pixRow = document.getElementById('pix-row');
            const cardRow = document.getElementById('credit-card-row');
            const pixRadio = document.getElementById('pix_hipercash_radio');
            const cardRadio = document.getElementById('credit_card_asset_radio');
            const pixContent = document.getElementById('container-payment-pix_hipercash');
            const cardContent = document.getElementById('credit-card-form-container');

            function selectPix() {
                if (!pixBox || !cardBox) return;

                // Ativar PIX
                pixBox.classList.add('payment-method-is-selected');
                pixRadio.classList.add('custom-radio-active');
                pixContent.style.display = 'flex';
                pixContent.classList.remove('d-none');

                // Desativar Cartão
                cardBox.classList.remove('payment-method-is-selected');
                cardRadio.classList.remove('custom-radio-active');
                cardContent.style.display = 'none';
                cardContent.classList.add('d-none');
            }

            function selectCard() {
                if (!pixBox || !cardBox) return;

                // Ativar Cartão
                cardBox.classList.add('payment-method-is-selected');
                cardRadio.classList.add('custom-radio-active');
                cardContent.style.display = 'block';
                cardContent.classList.remove('d-none');

                // Desativar PIX
                pixBox.classList.remove('payment-method-is-selected');
                pixRadio.classList.remove('custom-radio-active');
                pixContent.style.display = 'none';
                pixContent.classList.add('d-none');
            }

            // Event listeners para clique
            if (pixRow) {
                pixRow.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectPix();
                });
            }
            if (cardRow) {
                cardRow.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectCard();
                });
            }

            // Estado inicial - PIX selecionado
            if (pixBox && pixBox.classList.contains('payment-method-is-selected')) {
                pixContent.style.display = 'flex';
                pixContent.classList.remove('d-none');
            }
        });

        // ========== FUNÇÃO ADICIONAR ORDER BUMP ==========
        function addOrderBump(button, id, price, name) {
            // Prevenir múltiplos cliques
            if (button.classList.contains('added')) return;

            // Marcar botão como adicionado
            button.classList.add('added');
            button.innerHTML = '<i class="fa fa-check"></i> Adicionado';

            // Marcar item como adicionado
            const item = button.closest('.order-bump-item');
            if (item) {
                item.classList.add('added');
            }

            // Sincronizar com checkbox do desktop (order bump original)
            const desktopCheckbox = document.getElementById('orderBump_' + id);
            if (desktopCheckbox && !desktopCheckbox.checked) {
                desktopCheckbox.checked = true;
                desktopCheckbox.dispatchEvent(new Event('change', { bubbles: true }));
            }

            // Atualizar valores na tela
            updateCartTotals(price);

            // Feedback visual
            showAddedFeedback(name);
        }

        function updateCartTotals(addedPrice) {
            // Pegar total atual
            const totalCartEl = document.getElementById('total_cart');
            const subtotalCartEl = document.getElementById('subtotal_cart');
            const totalButtonEl = document.getElementById('total_button');
            const amountInput = document.getElementById('amount');
            const cardButtonEl = document.querySelector('#credit-card-pay-button span');

            if (totalCartEl) {
                // Parse do valor atual (ex: "R$ 47,90" -> 47.90)
                let currentTotal = parseFloat(totalCartEl.textContent.replace('R$', '').replace('.', '').replace(',', '.').trim());
                let newTotal = currentTotal + addedPrice;

                // Formatar novo valor
                const formattedTotal = 'R$ ' + newTotal.toFixed(2).replace('.', ',');

                // Atualizar todos os elementos de total
                totalCartEl.textContent = formattedTotal;

                if (subtotalCartEl) {
                    let currentSubtotal = parseFloat(subtotalCartEl.textContent.replace('R$', '').replace('.', '').replace(',', '.').trim());
                    let newSubtotal = currentSubtotal + addedPrice;
                    subtotalCartEl.textContent = 'R$ ' + newSubtotal.toFixed(2).replace('.', ',');
                }

                if (totalButtonEl) {
                    totalButtonEl.textContent = formattedTotal;
                }

                if (amountInput) {
                    let currentAmount = parseFloat(amountInput.value);
                    amountInput.value = (currentAmount + addedPrice).toFixed(2);
                }

                if (cardButtonEl) {
                    cardButtonEl.textContent = formattedTotal;
                }
            }
        }

        function showAddedFeedback(name) {
            // Criar toast de feedback
            const toast = document.createElement('div');
            toast.style.cssText = `
                position: fixed;
                bottom: 100px;
                left: 50%;
                transform: translateX(-50%);
                background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
                color: #fff;
                padding: 12px 24px;
                border-radius: 25px;
                font-size: 14px;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
                z-index: 9999;
                animation: slideUp 0.3s ease;
            `;
            toast.innerHTML = `<i class="fa fa-check-circle"></i> ${name} adicionado!`;

            // Adicionar animação CSS
            if (!document.getElementById('toast-animation-style')) {
                const style = document.createElement('style');
                style.id = 'toast-animation-style';
                style.textContent = `
                    @keyframes slideUp {
                        from { opacity: 0; transform: translateX(-50%) translateY(20px); }
                        to { opacity: 1; transform: translateX(-50%) translateY(0); }
                    }
                    @keyframes fadeOut {
                        from { opacity: 1; }
                        to { opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
            }

            document.body.appendChild(toast);

            // Remover após 2 segundos
            setTimeout(() => {
                toast.style.animation = 'fadeOut 0.3s ease forwards';
                setTimeout(() => toast.remove(), 300);
            }, 2000);
        }
        </script>
    </body>
</html>
