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
    <title>Contato | <?php echo $empresa['nome_fantasia']; ?></title>
    <meta name="description" content="Entre em contato - <?php echo $empresa['nome_empresa']; ?>">
    <link rel="shortcut icon" href="public/images/favicon_acai.webp" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/global.css" rel="stylesheet">
    <style>
        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
        }
        .contact-header {
            text-align: center;
            padding: 30px 0;
            border-bottom: 2px solid var(--primaria);
            margin-bottom: 30px;
        }
        .contact-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .contact-header h1 {
            color: var(--primaria);
            font-size: 24px;
            margin: 0;
        }
        .contact-cards {
            display: grid;
            gap: 20px;
            margin-top: 30px;
        }
        .contact-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            border: 1px solid #e9ecef;
        }
        .contact-card i {
            font-size: 40px;
            color: var(--primaria);
            margin-bottom: 15px;
        }
        .contact-card h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
        .contact-card p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }
        .contact-card a {
            color: var(--primaria);
            text-decoration: none;
            font-weight: 600;
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
        .whatsapp-btn {
            display: inline-block;
            background: #25D366;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 15px;
            transition: all 0.3s;
        }
        .whatsapp-btn:hover {
            background: #128C7E;
            color: white;
            transform: translateY(-2px);
        }
        .company-info {
            background: linear-gradient(135deg, var(--primaria) 0%, #4a1d6b 100%);
            color: white;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
        }
        .company-info h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .company-info p {
            font-size: 14px;
            margin: 5px 0;
            opacity: 0.9;
        }
    </style>
</head>
<body class="delivery">
    <div class="contact-container">
        <a href="index.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Voltar</a>

        <div class="contact-header">
            <img src="public/images/logo_acai.webp" alt="<?php echo $empresa['nome_fantasia']; ?>">
            <h1>Fale Conosco</h1>
        </div>

        <div class="contact-cards">
            <div class="contact-card">
                <i class="fa-brands fa-whatsapp"></i>
                <h3>WhatsApp</h3>
                <p>Atendimento rápido pelo WhatsApp</p>
                <a href="https://wa.me/<?php echo $empresa['telefone_link']; ?>" target="_blank" class="whatsapp-btn">
                    <i class="fa-brands fa-whatsapp"></i> Chamar no WhatsApp
                </a>
            </div>

            <div class="contact-card">
                <i class="fa-regular fa-envelope"></i>
                <h3>E-mail</h3>
                <p>Para dúvidas, sugestões ou reclamações</p>
                <p><a href="mailto:<?php echo $empresa['email']; ?>"><?php echo $empresa['email']; ?></a></p>
            </div>

            <div class="contact-card">
                <i class="fa-solid fa-phone"></i>
                <h3>Telefone</h3>
                <p>Ligue para nós</p>
                <p><strong><?php echo $empresa['telefone']; ?></strong></p>
            </div>

            <div class="contact-card">
                <i class="fa-regular fa-clock"></i>
                <h3>Horário de Funcionamento</h3>
                <p>Segunda a Domingo</p>
                <p><strong>10:00 às 22:00</strong></p>
            </div>
        </div>

        <div class="company-info">
            <h3><i class="fa-solid fa-building"></i> Dados da Empresa</h3>
            <p><strong><?php echo $empresa['nome_empresa']; ?></strong></p>
            <p>CNPJ: <?php echo $empresa['cnpj']; ?></p>
            <p><?php echo $empresa['endereco']; ?></p>
            <p><?php echo $empresa['bairro']; ?> - <?php echo $empresa['cidade']; ?>/<?php echo $empresa['estado']; ?></p>
            <p>CEP: <?php echo $empresa['cep']; ?></p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
