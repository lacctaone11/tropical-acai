<?php
// Configuração de dados por domínio
$dominios = [
    // Domínio: tropicalacai.lahtref.shop
    'tropicalacai.lahtref.shop' => [
        'nome_empresa' => 'AILTON REINALDO RODRIGUES SILVEIRA',
        'cnpj' => '',
        'endereco' => 'AV PRES VARGAS, 771',
        'bairro' => 'Getulio Vargas',
        'cidade' => 'Bagé',
        'estado' => 'RS',
        'cep' => '96412-660',
        'telefone' => '(53) 98117-8024',
        'telefone_link' => '5553981178024',
        'email' => 'contato@tropicalacai.lahtref.shop',
        'nome_fantasia' => 'Tropical Açaí'
    ],

    // Domínio: brasilwebnet.rest
    'brasilwebnet.rest' => [
        'nome_empresa' => 'AURORA AVIACAO AGRICOLA LTDA',
        'cnpj' => '',
        'endereco' => 'R ALF ALFERES PAULO SALDANHA, 670 - SALA 6',
        'bairro' => 'São Francisco',
        'cidade' => 'Boa Vista',
        'estado' => 'RR',
        'cep' => '69305-260',
        'telefone' => '(95) 98117-8024',
        'telefone_link' => '5595981178024',
        'email' => 'contato@brasilwebnet.rest',
        'nome_fantasia' => 'Tropical Açaí'
    ],

    // Localhost (para testes)
    'localhost' => [
        'nome_empresa' => 'AILTON REINALDO RODRIGUES SILVEIRA',
        'cnpj' => '',
        'endereco' => 'AV PRES VARGAS, 771',
        'bairro' => 'Getulio Vargas',
        'cidade' => 'Bagé',
        'estado' => 'RS',
        'cep' => '96412-660',
        'telefone' => '(53) 98117-8024',
        'telefone_link' => '5553981178024',
        'email' => 'contato@tropicalacai.lahtref.shop',
        'nome_fantasia' => 'Tropical Açaí'
    ]
];

// Identificar domínio atual
$dominio_atual = $_SERVER['HTTP_HOST'] ?? 'localhost';
$dominio_atual = preg_replace('/^www\./', '', $dominio_atual); // Remove www.

// Pegar dados do domínio ou usar padrão (localhost)
$empresa = $dominios[$dominio_atual] ?? $dominios['localhost'];
