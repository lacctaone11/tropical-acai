<?php
require_once __DIR__ . '/item/cart_helpers.php';
$cart = acai_get_cart();
$totalCarrinho = acai_cart_total($cart);
?>
<style>
    html, body {
        background-color: var(--primaria) !important;
    }
    .success-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
    }
   .success-message {
    background: white;
    color: #438f70;
    padding: 30px;
    text-align: center;
    
    
}
    .success-message h1 {
        font-size: 18px;
        margin-bottom: 15px;
        font-weight: 700;
    }
    .success-message p {
        font-size: 13px;
        margin: 0;
        opacity: 0.95;
    }
    .success-icon {
        font-size: 18px;
        margin-bottom: 20px;
        animation: scaleIn 0.5s ease-out;
    }
    @keyframes scaleIn {
        from {
            transform: scale(0);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }
    .orderBup {
        background: white;
        padding: 10px;
       
    }
    .upsell-total {
    background: #438f70;
    color: white;
    padding: 10px;
    border-radius: 10px;
    text-align
: center;
    margin-top: 20px;
    font-size: 18px;
    font-weight: 700;
}
    .btn-comprar-upsell {
        background: linear-gradient(135deg, #ca6e39 0%, #b85d2a 100%);
        color: white;
        border: none;
        padding: 18px 40px;
        font-size: 18px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 10px;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(202, 110, 57, 0.3);
    }
    .btn-comprar-upsell:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(202, 110, 57, 0.4);
    }
    .btn-comprar-upsell:active {
        transform: translateY(0);
    }
    .btn-comprar-upsell:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
    .header-success {
    text-align: center;
    
    padding: 20px 15px 10px;
    background: white;
    border-radius: 10px 10px 0px 0px;
}
    .header-success .logo {
    margin-bottom: 20px;
    width: 50px;
    height: 50px;
}
    .header-success .logo img {
            width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    }
  .order-info {
    background: white;
    padding: 25px;
    
}
    .order-info h3 {
        color: var(--primaria);
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .info-item i {
        color: var(--primaria);
        font-size: 18px;
        margin-right: 12px;
        margin-top: 3px;
        min-width: 20px;
    }
    .info-item-content {
        flex: 1;
    }
    .info-item-content strong {
        display: block;
        color: #2b2b2b;
        font-size: 14px;
        margin-bottom: 5px;
    }
    .divisor {
    display: flex;
    align-items: center;
    background: white;
}
    .info-item-content span {
        color: #666;
        font-size: 14px;
    }
    .delivery-time {
        background: linear-gradient(135deg, #64268c 0%, #4a1d6b 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        margin-top: 20px;
    }
    .delivery-time i {
        font-size: 32px;
        margin-bottom: 10px;
    }
    .delivery-time strong {
        display: block;
        font-size: 24px;
        margin-top: 10px;
    }
    .delivery-time span {
        font-size: 16px;
        opacity: 0.9;
    }
</style>
<!DOCTYPE html>
<html lang="pt-br" translate="no">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta name="google" content="notranslate">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="Ng8LzSxnDpeIq5x1nCgRPwEdxj9ujdHL3YMckxIo">
    <title>Pedido Confirmado! | La Barca Açaí</title>
    <meta name="description" content="Seu pedido foi confirmado com sucesso!">
    <meta name="theme-color" content="#64268c">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="public/images/favicon_acai.webp" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17642163670"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-17642163670');
    </script>

    <link rel="preload" href="public/css/bootstrap.min.css" as="style">
    <link rel="preload" href="public/css/global.css" as="style">
    <link href="public/css/bootstrap.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="public/css/global.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/global.css" rel="stylesheet">
    </noscript>

    <!-- Event snippet for Compra conversion page -->
    <script>
        // Pegar valor do pedido do localStorage
        var orderValue = parseFloat(localStorage.getItem('totalCarrinho') || '0');
        if (orderValue <= 0) {
            // Fallback: tentar pegar do PHP
            orderValue = <?php echo $totalCarrinho > 0 ? $totalCarrinho : '0'; ?>;
        }

        // Gerar ID único de transação
        var transactionId = 'LB_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);

        // Disparar evento de conversão apenas se houver valor
        if (orderValue > 0) {
            gtag('event', 'conversion', {
                'send_to': 'AW-17642163670/mom2CMWQ7MYbENabuNxB',
                'value': orderValue,
                'currency': 'BRL',
                'transaction_id': transactionId
            });

            // Limpar para evitar conversão duplicada
            localStorage.removeItem('totalCarrinho');
        }
    </script>
</head>
<body class="delivery">
    <div class="loading__component">
        <div class="loading__bar"></div>
        <div class="loading__circle">
            <div class="loading__circle-spinner"></div>
        </div>
    </div>
    <div class="success-container">
        <div class="header-success">
            <div class="logo">
                <img src="public/images/logo_acai.webp" alt="La Barca Açaí" width="200" height="200" loading="lazy">
            </div>
           
        </div>
          <div class="divisor">
                    <div>
                        <svg width="15" height="30" viewBox="0 0 15 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_2805_43738" fill="white">
                                <path d="M0 0C8.28427 0 15 6.71573 15 15C15 23.2843 8.28427 30 0 30V0Z"></path>
                            </mask>
                            <path d="M0 0C8.28427 0 15 6.71573 15 15C15 23.2843 8.28427 30 0 30V0Z" fill="var(--primaria)"></path>
                            <path d="M0 -1C8.83656 -1 16 6.16344 16 15H14C14 7.26801 7.73199 1 0 1V-1ZM16 15C16 23.8366 8.83656 31 0 31V29C7.73199 29 14 22.732 14 15H16ZM0 30V0V30ZM0 -1C8.83656 -1 16 6.16344 16 15C16 23.8366 8.83656 31 0 31V29C7.73199 29 14 22.732 14 15C14 7.26801 7.73199 1 0 1V-1Z" fill="var(--primaria)" mask="url(#path-1-inside-1_2805_43738)"></path>
                        </svg>
                    </div>
                    <svg width="650" height="1" viewBox="0 0 650 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="0.5" x2="650" y2="0.5" stroke="var(--primaria)" stroke-dasharray="8 8"></line>
                    </svg>
                    <div>
                        <svg width="15" height="30" viewBox="0 0 15 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_2805_43741" fill="white">
                                <path d="M15 30C6.71573 30 -5.87108e-07 23.2843 -1.31134e-06 15C-2.03558e-06 6.71573 6.71573 7.24234e-07 15 0L15 30Z"></path>
                            </mask>
                            <path d="M15 30C6.71573 30 -5.87108e-07 23.2843 -1.31134e-06 15C-2.03558e-06 6.71573 6.71573 7.24234e-07 15 0L15 30Z" fill="var(--primaria)"></path>
                            <path d="M15 31C6.16344 31 -1 23.8366 -1 15L0.999999 15C0.999999 22.732 7.26801 29 15 29L15 31ZM-1 15C-1 6.16345 6.16344 -0.999999 15 -1L15 1C7.26801 1 0.999998 7.26801 0.999999 15L-1 15ZM15 0L15 30L15 0ZM15 31C6.16344 31 -1 23.8366 -1 15C-1 6.16345 6.16344 -0.999999 15 -1L15 1C7.26801 1 0.999998 7.26801 0.999999 15C0.999999 22.732 7.26801 29 15 29L15 31Z" mask="url(#path-1-inside-1_2805_43741)"></path>
                        </svg>
                    </div>
                </div>
       

        <div class="success-message">
            <div class="success-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h1>Pedido Confirmado!</h1>
            <p>Seu pagamento foi aprovado com sucesso. Aguarde enquanto seu pedido está sendo preparado.</p>
        </div>

        <div class="order-info">
          
            <div class="info-item">
                <i class="fa-solid fa-user"></i>
                <div class="info-item-content">
                    <strong>Cliente</strong>
                    <span id="order-customer-name">-</span>
                </div>
            </div>
           
            <div class="info-item">
                <i class="fa-solid fa-location-dot"></i>
                <div class="info-item-content">
                    <strong>Endereço de Entrega</strong>
                    <span id="order-address">-</span>
                </div>
            </div>
            <div class="info-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primaria)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-timer-icon lucide-timer"><line x1="10" x2="14" y1="2" y2="2"/><line x1="12" x2="15" y1="14" y2="11"/><circle cx="12" cy="14" r="8"/></svg>
                <div class="info-item-content">
                    <strong>Tempo estimado de preparo e entrega: </strong>
                    <span class="order-address">40 minutos</span>
                </div>
            </div>
            
        </div>

        <div class="orderBup">
            <span class="title-orderBump">
                <strong>Mega oferta</strong>
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
                    
                </div>
              
            </label>
            <div class="upsell-total">
                <span>Por apenas: <strong>R$ 10,90</strong></span>
            </div>
            <button type="button" class="btn-comprar-upsell" id="btn-comprar-upsell">
                <i class="fa-solid fa-shopping-cart"></i> Comprar Agora
            </button>
        </div>
    </div>

    <script type="text/javascript" src="public/js/jquery.min.js"></script>
    <script defer type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer type="text/javascript" src="public/js/sweetalert.min.js"></script>
    <script defer type="text/javascript" src="public/js/functions.js"></script>
    <script>
        window.rotas = {
            homeUrl: "index.php",
            cartUrl: "cart.php",
            adicionarCarrinho: "item/add.php",
            updateCarrinho: "item/update.php",
            consulteCarrinho: "item/consult.php",
            gateway: "gateway",
            processar: "processar",
            pix: "pix.php"
        };

        $(document).ready(function() {

            var dadosPessoais = JSON.parse(localStorage.getItem("dadosPessoais")) || {};
            var dadosFrete = JSON.parse(localStorage.getItem("dadosFrete")) || {};

            if (dadosPessoais.nome) {
                $('#order-customer-name').text(dadosPessoais.nome);
            }
            if (dadosPessoais.email) {
                $('#order-customer-email').text(dadosPessoais.email);
            }
            if (dadosPessoais.cpf) {
                $('#order-customer-cpf').text(dadosPessoais.cpf);
            }

            if (dadosFrete.cep) {
                var enderecoTexto = `${dadosFrete.endereco}, ${dadosFrete.numero} - ${dadosFrete.bairro}, ${dadosFrete.cidade} - ${dadosFrete.estado}, CEP: ${dadosFrete.cep}`;
                if (dadosFrete.complemento) {
                    enderecoTexto = `${dadosFrete.endereco}, ${dadosFrete.numero} - ${dadosFrete.complemento}, ${dadosFrete.bairro}, ${dadosFrete.cidade} - ${dadosFrete.estado}, CEP: ${dadosFrete.cep}`;
                }
                $('#order-address').text(enderecoTexto);
            }

            var hoje = new Date();
            var dataFormatada = hoje.toLocaleDateString('pt-BR', { 
                day: '2-digit', 
                month: 'long', 
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            $('#order-date').text(dataFormatada);

            $('.extra-item').prop('disabled', true);

            $('#btn-comprar-upsell').on('click', function() {
                const btn = $(this);
                const originalText = btn.html();

                $('.loading__circle').css('display', 'flex');
                btn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin"></i> Adicionando...');

                const productIds = [7, 8, 9];
                let completed = 0;
                let hasError = false;

                productIds.forEach(function(productId, index) {
                    $.ajax({
                        type: 'POST',
                        url: window.rotas.adicionarCarrinho,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        data: {
                            product_id: productId,
                            qtd: 1,
                            observacoes: 'orderBump'
                        },
                        success: function(response) {
                            completed++;
                            if (completed === productIds.length && !hasError) {

                                $('.loading__circle').css('display', 'none');
                                btn.prop('disabled', false).html(originalText);

                                localStorage.setItem('totalCarrinho', '10.90');

                                var dadosPessoais = JSON.parse(localStorage.getItem("dadosPessoais")) || {};
                                var dadosFrete = JSON.parse(localStorage.getItem("dadosFrete")) || {};

                                if (!dadosPessoais.nome || !dadosPessoais.email || !dadosPessoais.cpf) {
                                    if (typeof Swal !== 'undefined') {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Dados incompletos',
                                            text: 'Por favor, complete seus dados pessoais no checkout antes de continuar.',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            window.location.href = 'checkout.php';
                                        });
                                    } else {
                                        alert('Por favor, complete seus dados pessoais no checkout antes de continuar.');
                                        window.location.href = 'checkout.php';
                                    }
                                    return;
                                }

                                if (!dadosPessoais.celular && !dadosPessoais.telefone) {
                                    if (typeof Swal !== 'undefined') {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Telefone obrigatório',
                                            text: 'Por favor, informe seu telefone no checkout antes de continuar.',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            window.location.href = 'checkout.php';
                                        });
                                    } else {
                                        alert('Por favor, informe seu telefone no checkout antes de continuar.');
                                        window.location.href = 'checkout.php';
                                    }
                                    return;
                                }

                                window.location.href = 'pix.php';
                            }
                        },
                        error: function(xhr, status, error) {
                            hasError = true;
                            $('.loading__circle').css('display', 'none');
                            btn.prop('disabled', false).html(originalText);
                            
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro',
                                    text: 'Erro ao adicionar produtos. Tente novamente.',
                                    confirmButtonText: 'OK'
                                });
                            } else {
                                alert('Erro ao adicionar produtos. Tente novamente.');
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>

