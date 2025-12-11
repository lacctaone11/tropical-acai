<?php
// Configuração de dados por domínio
$dominios = [
    // Domínio 1: seudireitobrasil.shop
    'seudireitobrasil.shop' => [
        'nome_empresa' => 'GUIA DE JOINVILLE LTDA',
        'cnpj' => '95.793.717/0001-44',
        'endereco' => 'R Gustavo Grossembacher, 83 - Sala B',
        'bairro' => 'Centro',
        'cidade' => 'Joinville',
        'estado' => 'SC',
        'cep' => '89201-230',
        'telefone' => '(47) 98117-8064',
        'telefone_link' => '5547981178064',
        'email' => 'contato@seudireitobrasil.shop',
        'nome_fantasia' => 'Tropical Açaí'
    ],

    // Domínio 2: tropicalacai.seuguiaonline.sbs
    'tropicalacai.seuguiaonline.sbs' => [
        'nome_empresa' => 'MARTA FLORES E CIA LTDA',
        'cnpj' => '94.982.915/0001-93',
        'endereco' => 'R DOS ANDRADAS, 68',
        'bairro' => 'Centro',
        'cidade' => 'Alegrete',
        'estado' => 'RS',
        'cep' => '97541-000',
        'telefone' => '(55) 98117-8024',
        'telefone_link' => '5555981178024',
        'email' => 'contato@tropicalacai.seuguiaonline.sbs',
        'nome_fantasia' => 'Tropical Açaí'
    ],

    // Domínio 3: seuacessobr.sbs
    'seuacessobr.sbs' => [
        'nome_empresa' => 'ASSOCIACAO DOS DOCENTES DA UNIVERSIDADE DE CAXIAS DO SUL',
        'cnpj' => '97.403.893/0001-58',
        'endereco' => 'AV FRANCISCO GETULIO VARGAS, 1130 - BL I Sala 118',
        'bairro' => 'Petrópolis',
        'cidade' => 'Caxias do Sul',
        'estado' => 'RS',
        'cep' => '95070-560',
        'telefone' => '(54) 98117-8024',
        'telefone_link' => '5554981178024',
        'email' => 'contato@seuacessobr.sbs',
        'nome_fantasia' => 'Tropical Açaí'
    ],

    // Domínio 4: tropicalacai.lahtref.shop
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

    // Localhost (para testes - usa dados do primeiro domínio)
    'localhost' => [
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
    ]
];

// Identificar domínio atual
$dominio_atual = $_SERVER['HTTP_HOST'] ?? 'localhost';
$dominio_atual = preg_replace('/^www\./', '', $dominio_atual); // Remove www.

// Pegar dados do domínio ou usar padrão (localhost)
$empresa = $dominios[$dominio_atual] ?? $dominios['localhost'];
