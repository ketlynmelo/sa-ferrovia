
<?php

date_default_timezone_set('America/Sao_Paulo');

$apiKey = '0483cc90a28a4aec8c29a3cbce3e317d';

$latitude = -26.3044;
$longitude = -48.8487;

$url = 'https://api.openweathermap.org/data/2.5/weather?' .
    http_build_query([
        'lat' => $latitude,
        'lon' => $longitude,
        'appid' => $apiKey,
        'units' => 'metric',
        'lang' => 'pt_br'
    ]);

$clima = null;
$erroClima = false;

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 10
]);

$resposta = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$erroCurl = curl_error($ch);

curl_close($ch);

$clima = null;
$erroClima = false;
$mensagemErroClima = '';

if ($resposta === false) {
    $erroClima = true;
    $mensagemErroClima = 'Erro de conexão: ' . $erroCurl;
} else {
    $dados = json_decode($resposta, true);

    if ($status === 200 && isset(
        $dados['main']['temp'],
        $dados['weather'][0]['description']
    )) {
        $clima = $dados;
    } else {
        $erroClima = true;

        $mensagemErroClima =
            'HTTP ' . $status . ': ' .
            ($dados['message'] ?? 'Resposta inesperada da API');
    }
}
