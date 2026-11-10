
<?php

header('Content-Type: application/json; charset=utf-8');

$cep = preg_replace('/\D/', '', $_GET['cep'] ?? '');

if (strlen($cep) !== 8) {
    http_response_code(400);

    echo json_encode([
        'erro' => true,
        'mensagem' => 'CEP inválido. Digite os 8 números.'
    ]);

    exit;
}

$url = "https://viacep.com.br/ws/{$cep}/json/";

$contexto = stream_context_create([
    'http' => [
        'timeout' => 10,
        'ignore_errors' => true
    ]
]);

$resposta = @file_get_contents($url, false, $contexto);

if ($resposta === false) {
    http_response_code(502);

    echo json_encode([
        'erro' => true,
        'mensagem' => 'Não foi possível consultar o CEP.'
    ]);

    exit;
}

$dados = json_decode($resposta, true);

if (!$dados || isset($dados['erro'])) {
    http_response_code(404);

    echo json_encode([
        'erro' => true,
        'mensagem' => 'CEP não encontrado.'
    ]);

    exit;
}

echo json_encode([
    'cep' => $dados['cep'],
    'logradouro' => $dados['logradouro'],
    'bairro' => $dados['bairro'],
    'cidade' => $dados['localidade'],
    'uf' => $dados['uf']
], JSON_UNESCAPED_UNICODE);

