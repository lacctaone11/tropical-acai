<?php
require_once __DIR__ . '/item/cart_helpers.php';


$cart = acai_get_cart();
$totalCarrinho = acai_cart_total($cart);
?>
<style>html, body{background-color:var(--primaria) !important;}</style>
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
        </script>

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
                <section id="pix">
        <div class="container">
            <div class="dados-pix">
                <div class="topo-pix">
                    <div class="logo">
                        <img src="public/images/logo_acai.webp" alt="La Barca Açaí">
                    </div>
                    <div class="icone-pix">
                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M40.63 39.563C38.602 39.563 36.6988 38.7897 35.2636 37.3667L27.526 29.6952C26.9956 29.1693 26.0284 29.1693 25.498 29.6952L17.7292 37.3977C16.294 38.8206 14.3908 39.5939 12.3628 39.5939H10.834L20.662 49.338C23.7196 52.3695 28.7116 52.3695 31.7692 49.338L41.6284 39.563H40.63Z" class="fill-slate-400 dark:fill-neutral-500"></path>
                            <path d="M12.3256 12.4044C14.3536 12.4044 16.2568 13.1778 17.692 14.6007L25.4608 22.3032C26.0224 22.86 26.9272 22.86 27.4888 22.3032L35.2576 14.6317C36.6928 13.2087 38.596 12.4354 40.624 12.4354H41.56L31.7008 2.66034C28.6432 -0.371155 23.6512 -0.371155 20.5936 2.66034L10.7656 12.4044H12.3256Z" class="fill-slate-400 dark:fill-neutral-500"></path>
                            <path d="M49.706 20.5096L43.7468 14.6012C43.622 14.6631 43.466 14.694 43.31 14.694H40.5956C39.1916 14.694 37.8188 15.2509 36.8516 16.2407L29.114 23.9123C28.3964 24.6237 27.4292 24.995 26.4932 24.995C25.526 24.995 24.59 24.6237 23.8724 23.9123L16.1036 16.2098C15.1052 15.2199 13.7324 14.6631 12.3596 14.6631H9.02123C8.86523 14.6631 8.74043 14.6322 8.61563 14.5703L2.62523 20.5096C-0.432369 23.5411 -0.432369 28.4905 2.62523 31.522L8.58442 37.4303C8.70922 37.3684 8.83404 37.3375 8.99004 37.3375H12.3284C13.7324 37.3375 15.1052 36.7807 16.0724 35.7908L23.8412 28.0883C25.2452 26.6963 27.71 26.6963 29.114 28.0883L36.8516 35.7599C37.85 36.7497 39.2228 37.3065 40.5956 37.3065H43.31C43.466 37.3065 43.5908 37.3375 43.7468 37.3993L49.706 31.491C52.7636 28.4595 52.7636 23.5411 49.706 20.5096Z" class="fill-slate-400 dark:fill-neutral-500"></path>
                        </svg>
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
                <div class="dados">
                    <div class="title-method">
                        <h2>Pagamento via PIX</h2>
                        <div class="infos-date">
                            <span><i class="fa-regular fa-calendar"></i> <span id="transaction-date"></span></span>
                            <span id="transaction-id">ID -</span>
                        </div>
                    </div>
                    <h3 id="customer-name">-</h3>
                    <div class="dados-pessoa">
                        <div class="pessoa">
                            <span><i class="fa-regular fa-envelope"></i> <span id="customer-email">-</span></span>
                            <span><i class="fa-regular fa-address-card"></i> <span id="customer-cpf">-</span></span>
                        </div>
                        <div class="endereco">
                            <span><i class="fa-regular fa-location-dot"></i> <span id="address">-</span></span>
                        </div>
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
                <div class="area-qrcode">
                    <div class="time-price">
                        <div class="price-pix">
                            <span>Total</span>
                            <strong id="total-price">R$ 0,00</strong>
                        </div>
                        <div class="expira-pix">
                            <span>Expira em:</span>
                            <div class="time-pix">
                                <i class="fa-regular fa-alarm-clock"></i>
                                <div class="minutos">00</div>
                                <span>:</span>
                                <div class="segundos">00</div>
                            </div>
                        </div>
                    </div>
                    <h3>Escaneie o QR CODE ou copie o código</h3>
                    <div class="qrcode">
                        <img id="qrcode-image" src="" alt="QRCode para pagamento" style="display: none;">
                        <div id="qrcode-loading" style="text-align: center; padding: 20px;">
                            <p>Gerando QR Code...</p>
                        </div>
                    </div>
                    <input type="text" id="codePix" value="" readonly>
                     <button type="button" id="copy_pix"><img src="public/images/copy.svg" alt="Copiar Código PIX"><span>Copiar Código</span></button>
                     <h3>Para finalizar sua compra, compense o Pix no prazo limite.</h3>
                     <div class="passos">
                        <div class="passo">
                            <strong>Passo 1</strong>
                            <span>Abra o app do seu banco e entre no ambiente Pix;</span>
                        </div>
                        <div class="passo">
                            <strong>Passo 2</strong>
                            <span>Escolha Pagar com QR Code e aponte a câmera para o código acima, ou cole o código identificador da transação;</span>
                        </div>
                        <div class="passo">
                            <strong>Passo 3</strong>
                            <span>Confirme as informações e finalize sua compra.</span>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
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
        <script defer>
$(document).ready(function() {

    var dadosPessoais = JSON.parse(localStorage.getItem("dadosPessoais")) || {};
    var dadosFrete = JSON.parse(localStorage.getItem("dadosFrete")) || {};
    var amount = parseFloat(localStorage.getItem('totalCarrinho') || 0);

    if (dadosPessoais.nome) {
        $('#customer-name').text(dadosPessoais.nome);
    }
    if (dadosPessoais.email) {
        $('#customer-email').text(dadosPessoais.email);
    }
    if (dadosPessoais.cpf) {
        $('#customer-cpf').text(dadosPessoais.cpf);
    }

    if (dadosFrete.cep) {
        var enderecoTexto = `CEP: ${dadosFrete.cep} <br> ${dadosFrete.endereco}, ${dadosFrete.numero} - ${dadosFrete.bairro} ${dadosFrete.cidade} - ${dadosFrete.estado}`;
        $('#address').html(enderecoTexto);
    }

    var hoje = new Date();
    var dataFormatada = hoje.toLocaleDateString('pt-BR', { day: '2-digit', month: 'short', year: 'numeric' });
    $('#transaction-date').text(dataFormatada);

    $('#total-price').html('<i class="fa-solid fa-spinner fa-spin"></i>');
    $('.time-pix').html('<i class="fa-solid fa-spinner fa-spin"></i>');

    createPixTransaction();
    
    async function createPixTransaction() {
        try {

            console.log('=== DEBUG PIX ===');
            console.log('Dados pessoais do localStorage:', dadosPessoais);
            console.log('Telefone (celular):', dadosPessoais.celular);
            console.log('Telefone (telefone):', dadosPessoais.telefone);

            if (!dadosPessoais.nome || !dadosPessoais.email || !dadosPessoais.cpf) {
                alert('Dados pessoais incompletos. Por favor, volte ao checkout e preencha todos os dados.');
                window.location.href = 'checkout.php';
                return;
            }

            if (!dadosPessoais.celular && !dadosPessoais.telefone) {
                alert('Telefone é obrigatório. Por favor, volte ao checkout e preencha o telefone.');
                console.error('ERRO: Telefone não encontrado nos dados pessoais!');
                window.location.href = 'checkout.php';
                return;
            }

            var telefone = dadosPessoais.celular || dadosPessoais.telefone || '';
            var telefoneLimpo = telefone.replace(/\D/g, '');
            
            console.log('Telefone original:', telefone);
            console.log('Telefone limpo:', telefoneLimpo);
            console.log('Tamanho do telefone limpo:', telefoneLimpo.length);
            
            if (telefoneLimpo.length < 10) {
                alert('Telefone inválido. Por favor, volte ao checkout e preencha um telefone válido.');
                window.location.href = 'checkout.php';
                return;
            }

            if (!dadosPessoais.celular && dadosPessoais.telefone) {
                dadosPessoais.celular = dadosPessoais.telefone;
            }
            if (!dadosPessoais.telefone && dadosPessoais.celular) {
                dadosPessoais.telefone = dadosPessoais.celular;
            }

            dadosPessoais.celular = dadosPessoais.celular || dadosPessoais.telefone || '';
            dadosPessoais.telefone = dadosPessoais.telefone || dadosPessoais.celular || '';
            
            console.log('Dados pessoais antes de enviar:', dadosPessoais);
            
            const payload = {
                dadosPessoais: dadosPessoais,
                dadosFrete: dadosFrete,
                amount: amount
            };
            
            console.log('Payload completo:', payload);
            
            const response = await fetch('api/create_pix.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(payload)
            });
            
            const data = await response.json();
            
            if (data.success) {

                const qrcodeUrl = `https://quickchart.io/qr?text=${encodeURIComponent(data.qrcode)}&ecLevel=Q&margin=0&size=300`;
                $('#qrcode-image').attr('src', qrcodeUrl).show();
                $('#qrcode-loading').hide();
                $('#codePix').val(data.qrcode);

                var valorFormatado = data.amount.toFixed(2).replace('.', ',');
                $('.price-pix strong').text('R$ ' + valorFormatado);
                $('#total-price').text('R$ ' + valorFormatado);

                $('#transaction-id').text('ID ' + data.transactionId);

                $('.time-pix').html('<i class="fa-regular fa-alarm-clock"></i><div class="minutos">00</div><span>:</span><div class="segundos">00</div>');

                const expirationDate = new Date();
                expirationDate.setMinutes(expirationDate.getMinutes() + 20);
                startCountdown(expirationDate);

                console.log('✅ PIX gerado com sucesso! Transaction ID:', data.transactionId);
                console.log('🔄 Iniciando verificação automática de pagamento...');
                startPaymentStatusCheck(data.transactionId);
            } else {

                $('#total-price').text('R$ 0,00');
                $('.time-pix').html('<i class="fa-regular fa-alarm-clock"></i><div class="minutos">00</div><span>:</span><div class="segundos">00</div>');
                
                var errorMsg = data.error || 'Erro desconhecido';

                if (data.details) {
                    console.error('Erro na API - Detalhes completos:', data);

                    if (data.details.validation_errors) {
                        var validationErrors = data.details.validation_errors;
                        for (var field in validationErrors) {
                            if (field.toLowerCase().indexOf('phone') !== -1 || 
                                field.toLowerCase().indexOf('telefone') !== -1 ||
                                validationErrors[field].toLowerCase().indexOf('phone') !== -1 ||
                                validationErrors[field].toLowerCase().indexOf('telefone') !== -1) {
                                errorMsg = 'Telefone do comprador é obrigatório. Por favor, volte ao checkout e preencha o telefone corretamente.';
                                break;
                            }
                        }
                    }

                    if (data.details.description) {
                        errorMsg += '\n\n' + data.details.description;
                    }
                }
                
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao gerar PIX',
                        text: errorMsg,
                        confirmButtonText: 'OK'
                    });
                } else {
                    alert('Erro ao gerar PIX: ' + errorMsg);
                }
                console.error('Erro na API:', data);
            }
        } catch (error) {

            $('#total-price').text('R$ 0,00');
            $('.time-pix').html('<i class="fa-regular fa-alarm-clock"></i><div class="minutos">00</div><span>:</span><div class="segundos">00</div>');
            
            console.error('Erro:', error);
            alert('Erro ao processar pagamento. Verifique o console para mais detalhes.');
        }
    }
    
    function startCountdown(expirationDate) {
        function updateTimer() {
            const now = new Date();
            const diff = expirationDate - now;
            
            if (diff <= 0) {
                $('.minutos').text('00');
                $('.segundos').text('00');
                return;
            }
            
            const minutos = Math.floor(diff / 60000);
            const segundos = Math.floor((diff % 60000) / 1000);
            
            $('.minutos').text(minutos.toString().padStart(2, '0'));
            $('.segundos').text(segundos.toString().padStart(2, '0'));
            
            setTimeout(updateTimer, 1000);
        }
        
        updateTimer();
    }

    let paymentConfirmed = false;
    let statusCheckInterval = null;
    
    function startPaymentStatusCheck(transactionId) {
        console.log('=== Iniciando verificação de status ===');
        console.log('Transaction ID:', transactionId);
        
        if (!transactionId) {
            console.error('Transaction ID não fornecido para verificação de status!');
            return;
        }

        if (statusCheckInterval) {
            clearInterval(statusCheckInterval);
        }
        
        const startTime = Date.now();
        const maxDuration = 20 * 60 * 1000;

        checkPaymentStatus(transactionId);

        statusCheckInterval = setInterval(async function() {
            if (paymentConfirmed) {
                console.log('Pagamento já confirmado, parando verificação');
                clearInterval(statusCheckInterval);
                return;
            }
            
            if (Date.now() - startTime > maxDuration) {
                console.log('Tempo máximo de verificação atingido, parando');
                clearInterval(statusCheckInterval);
                return;
            }
    
            await checkPaymentStatus(transactionId);
        }, 5000);
    }

    async function checkPaymentStatus(transactionId) {
        try {
            console.log('Verificando status da transação:', transactionId);
            
            const response = await fetch(`api/check_pix_status.php?transactionId=${transactionId}`);
            const data = await response.json();
            
            console.log('Status check response:', data);


            if (data.success && data.status) {
                const status = data.status.toLowerCase();
                console.log('Transaction status atual:', status);

                if (status === 'paid' || status === 'approved') {
                paymentConfirmed = true;
                    if (statusCheckInterval) {
                        clearInterval(statusCheckInterval);
                    }
                    console.log('✅ Pagamento confirmado! Status:', status);
                    console.log('Redirecionando para success.php...');

                    setTimeout(function() {
                        window.location.href = 'success.php';
                    }, 500);
                    return;
                }

                if (status === 'waiting_payment' || status === 'pending') {
                    console.log('⏳ Aguardando pagamento... Status:', status);
                }

                if (status === 'refused' || status === 'cancelled') {
                    console.log('❌ Pagamento recusado ou cancelado:', status);
                    if (statusCheckInterval) {
                        clearInterval(statusCheckInterval);
                    }

                }
            } else {
                console.warn('Resposta inesperada ao verificar status:', data);
                if (data.error) {
                    console.error('Erro ao verificar status:', data.error);
                }
            }
        } catch (error) {
            console.error('Erro ao verificar status:', error);

        }
    }

    $(document).on('click', 'button#copy_pix', async function () {
        const copia = $(this);
        const texto = $(this).find('span').text();
        const code = $('#codePix').val();
        
        if (!code) {
            alert('QR Code ainda não foi gerado. Aguarde...');
            return;
        }
        
        navigator.clipboard.writeText(code).then(() => {
            $(this).find('span').text('Código PIX Copiado');
            setTimeout(function() {
                copia.find('span').text(texto);
            }, 4000);
        }).catch(err => {
            console.error("Erro ao copiar: ", err);

            $('#codePix').select();
            document.execCommand('copy');
            $(this).find('span').text('Código PIX Copiado');
            setTimeout(function() {
                copia.find('span').text(texto);
            }, 4000);
        });
    });
});   
</script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"5cb2a07379cd4eefbb95393e110dd461","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>
</html>