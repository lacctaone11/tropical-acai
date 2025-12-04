<?php
$empresa = [
    'nome_empresa' => 'GUIA DE JOINVILLE LTDA',
    'cnpj' => '95.793.717/0001-44',
    'endereco' => 'R Gustavo Grossembacher, 83 - Sala B',
    'bairro' => 'Centro',
    'cidade' => 'Joinville',
    'estado' => 'SC',
    'cep' => '89201-230',
    'telefone' => '(47) 98117-8064',
    'telefone_link' => '5547981178064',
    'email' => 'proconta@netiville.com.br',
    'nome_fantasia' => 'Tropical Açaí'
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termos de Uso | <?php echo $empresa['nome_fantasia']; ?></title>
    <meta name="description" content="Termos de Uso - <?php echo $empresa['nome_empresa']; ?>">
    <link rel="shortcut icon" href="public/images/favicon_acai.webp" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/global.css" rel="stylesheet">
    <style>
        .policy-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
        }
        .policy-header {
            text-align: center;
            padding: 30px 0;
            border-bottom: 2px solid var(--primaria);
            margin-bottom: 30px;
        }
        .policy-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .policy-header h1 {
            color: var(--primaria);
            font-size: 24px;
            margin: 0;
        }
        .policy-content h2 {
            color: var(--primaria);
            font-size: 18px;
            margin: 25px 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .policy-content p, .policy-content li {
            color: #555;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 12px;
        }
        .policy-content ul {
            padding-left: 20px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--primaria);
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .last-update {
            text-align: center;
            color: #999;
            font-size: 12px;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body class="delivery">
    <div class="policy-container">
        <a href="index.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Voltar</a>

        <div class="policy-header">
            <img src="public/images/logo_acai.webp" alt="<?php echo $empresa['nome_fantasia']; ?>">
            <h1>Termos de Uso</h1>
        </div>

        <div class="policy-content">
            <h2>1. Aceitação dos Termos</h2>
            <p>Ao acessar e utilizar o site <?php echo $empresa['nome_fantasia']; ?>, operado por <?php echo $empresa['nome_empresa']; ?>, CNPJ <?php echo $empresa['cnpj']; ?>, você concorda com estes Termos de Uso. Se não concordar com alguma condição, por favor, não utilize nossos serviços.</p>

            <h2>2. Descrição do Serviço</h2>
            <p>O <?php echo $empresa['nome_fantasia']; ?> é um serviço de delivery de açaí e produtos relacionados. Através do nosso site, você pode:</p>
            <ul>
                <li>Visualizar nosso cardápio e promoções</li>
                <li>Realizar pedidos online</li>
                <li>Efetuar pagamentos via PIX</li>
                <li>Acompanhar o status do seu pedido</li>
            </ul>

            <h2>3. Cadastro e Pedidos</h2>
            <p>Para realizar um pedido, você deverá fornecer:</p>
            <ul>
                <li>Nome completo</li>
                <li>Telefone para contato</li>
                <li>Endereço completo de entrega</li>
            </ul>
            <p>Você é responsável pela veracidade das informações fornecidas.</p>

            <h2>4. Preços e Pagamentos</h2>
            <ul>
                <li>Os preços estão em Reais (BRL) e podem ser alterados sem aviso prévio</li>
                <li>Promoções têm prazo de validade determinado</li>
                <li>Aceitamos pagamento via PIX</li>
                <li>O pedido será processado após confirmação do pagamento</li>
            </ul>

            <h2>5. Entrega</h2>
            <ul>
                <li>O prazo estimado de entrega é informado no momento do pedido</li>
                <li>A entrega é realizada no endereço informado pelo cliente</li>
                <li>Em caso de ausência, tentaremos contato pelo telefone informado</li>
                <li>Verifique a área de cobertura antes de realizar o pedido</li>
            </ul>

            <h2>6. Cancelamentos e Reembolsos</h2>
            <ul>
                <li>Cancelamentos devem ser solicitados antes do preparo do pedido</li>
                <li>Após o início do preparo, não será possível cancelar</li>
                <li>Reembolsos serão processados em até 7 dias úteis</li>
                <li>Em caso de problemas com o pedido, entre em contato imediatamente</li>
            </ul>

            <h2>7. Responsabilidades do Usuário</h2>
            <p>O usuário se compromete a:</p>
            <ul>
                <li>Fornecer informações verdadeiras e atualizadas</li>
                <li>Utilizar o site de forma lícita e ética</li>
                <li>Não tentar fraudar ou prejudicar o serviço</li>
                <li>Estar disponível para receber o pedido no horário estimado</li>
            </ul>

            <h2>8. Propriedade Intelectual</h2>
            <p>Todo o conteúdo do site (imagens, textos, logos, design) é de propriedade de <?php echo $empresa['nome_empresa']; ?> e está protegido por leis de direitos autorais. É proibida a reprodução sem autorização.</p>

            <h2>9. Limitação de Responsabilidade</h2>
            <p><?php echo $empresa['nome_fantasia']; ?> não se responsabiliza por:</p>
            <ul>
                <li>Atrasos causados por fatores externos (trânsito, clima, etc.)</li>
                <li>Informações incorretas fornecidas pelo cliente</li>
                <li>Indisponibilidade temporária do site</li>
            </ul>

            <h2>10. Modificações</h2>
            <p>Reservamo-nos o direito de modificar estes termos a qualquer momento. As alterações entram em vigor imediatamente após a publicação no site.</p>

            <h2>11. Foro</h2>
            <p>Fica eleito o foro da comarca de <?php echo $empresa['cidade']; ?>/<?php echo $empresa['estado']; ?> para dirimir quaisquer questões oriundas destes termos.</p>

            <h2>12. Contato</h2>
            <p>Para dúvidas sobre estes termos:</p>
            <ul>
                <li><strong>E-mail:</strong> <?php echo $empresa['email']; ?></li>
                <li><strong>Telefone:</strong> <?php echo $empresa['telefone']; ?></li>
            </ul>

            <p class="last-update">Última atualização: <?php echo date('d/m/Y'); ?></p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
