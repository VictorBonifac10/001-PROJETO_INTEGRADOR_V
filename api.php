<?php
// URL da API BioInsumos
$url = 'https://api.cnptia.embrapa.br/bioinsumos/v1/produtos-biologicos';

// Credenciais da API BioInsumos
$consumerKey = 'zZDwlSYCQgmmasQo_JTGxO7zxP0a';
$consumerSecret = 'nvcpAyil1PZucxza1SMc9NfOEBga';
$accessToken = '3b432efb-872d-3cae-8d50-59317d45a619';

// Montagem dos cabeçalhos para a requisição à API
$headers = array(
    'Consumer-Key: ' . $consumerKey,
    'Authorization: Bearer ' . $accessToken
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Erro na requisição para a API BioInsumos';
} else {
    echo $response;
}

curl_close($ch);
?>
