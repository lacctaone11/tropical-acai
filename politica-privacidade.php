<?php include 'includes/config_empresa.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidade | <?php echo $empresa['nome_fantasia']; ?></title>
    <meta name="description" content="Política de Privacidade - <?php echo $empresa['nome_empresa']; ?>">
    <link rel="shortcut icon" href="public/images/favicon_acai.webp" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/global.css?v=<?php echo time(); ?>" rel="stylesheet">
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
            <h1>Política de Privacidade</h1>
        </div>

        <div class="policy-content">
            <h2>1. Informações Gerais</h2>
            <p>A presente Política de Privacidade contém informações sobre coleta, uso, armazenamento, tratamento e proteção dos dados pessoais dos usuários do site <strong><?php echo $empresa['nome_fantasia']; ?></strong>, operado por <strong><?php echo $empresa['nome_empresa']; ?></strong>, inscrita no CNPJ sob nº <strong><?php echo $empresa['cnpj']; ?></strong>, com sede em <?php echo $empresa['endereco']; ?>, <?php echo $empresa['bairro']; ?>, <?php echo $empresa['cidade']; ?>/<?php echo $empresa['estado']; ?>, CEP <?php echo $empresa['cep']; ?>.</p>

            <h2>2. Dados Coletados</h2>
            <p>Os dados pessoais coletados são:</p>
            <ul>
                <li><strong>Nome completo:</strong> para identificação do cliente no pedido</li>
                <li><strong>Telefone/WhatsApp:</strong> para contato sobre o pedido e entrega</li>
                <li><strong>Endereço de entrega:</strong> CEP, rua, número, complemento, bairro, cidade e estado</li>
            </ul>

            <h2>3. Finalidade dos Dados</h2>
            <p>Os dados coletados são utilizados exclusivamente para:</p>
            <ul>
                <li>Processar e entregar pedidos realizados</li>
                <li>Entrar em contato sobre status do pedido</li>
                <li>Melhorar a experiência do usuário</li>
                <li>Cumprir obrigações legais e fiscais</li>
            </ul>

            <h2>4. Compartilhamento de Dados</h2>
            <p>Os dados pessoais não são compartilhados com terceiros, exceto:</p>
            <ul>
                <li>Processadores de pagamento (para transações PIX)</li>
                <li>Serviços de entrega quando aplicável</li>
                <li>Quando exigido por lei ou ordem judicial</li>
            </ul>

            <h2>5. Segurança dos Dados</h2>
            <p>Utilizamos medidas de segurança adequadas para proteger seus dados pessoais, incluindo:</p>
            <ul>
                <li>Conexão segura (HTTPS/SSL)</li>
                <li>Armazenamento criptografado</li>
                <li>Acesso restrito aos dados</li>
            </ul>

            <h2>6. Cookies</h2>
            <p>Utilizamos cookies para melhorar a experiência de navegação, lembrar preferências e analisar o tráfego do site. Você pode desativar os cookies nas configurações do seu navegador.</p>

            <h2>7. Seus Direitos (LGPD)</h2>
            <p>Conforme a Lei Geral de Proteção de Dados (Lei nº 13.709/2018), você tem direito a:</p>
            <ul>
                <li>Confirmar a existência de tratamento de dados</li>
                <li>Acessar seus dados pessoais</li>
                <li>Corrigir dados incompletos ou desatualizados</li>
                <li>Solicitar a exclusão de dados desnecessários</li>
                <li>Revogar o consentimento a qualquer momento</li>
            </ul>

            <h2>8. Retenção de Dados</h2>
            <p>Os dados pessoais são mantidos pelo tempo necessário para cumprir as finalidades descritas, respeitando os prazos legais de guarda de documentos fiscais.</p>

            <h2>9. Contato</h2>
            <p>Para exercer seus direitos ou esclarecer dúvidas sobre esta política, entre em contato:</p>
            <ul>
                <li><strong>E-mail:</strong> <?php echo $empresa['email']; ?></li>
                <li><strong>Telefone:</strong> <?php echo $empresa['telefone']; ?></li>
                <li><strong>Endereço:</strong> <?php echo $empresa['endereco']; ?>, <?php echo $empresa['bairro']; ?>, <?php echo $empresa['cidade']; ?>/<?php echo $empresa['estado']; ?></li>
            </ul>

            <h2>10. Alterações</h2>
            <p>Esta política pode ser atualizada periodicamente. Recomendamos que você revise esta página regularmente para se manter informado sobre como protegemos seus dados.</p>

            <p class="last-update">Última atualização: <?php echo date('d/m/Y'); ?></p>
        </div>
    </div>
</body>
</html>
