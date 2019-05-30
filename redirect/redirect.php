<?php

function request(string $url, string $fields = '', int $isPost = 1)
    {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, $isPost);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    if ($isPost) {
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    }
    $requestHeaders = array(
    'Content-type: application/x-www-form-urlencoded',
    'Content-Length: ' . strlen($fields),
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);
    return  curl_exec($ch);
}
$fields = http_build_query([
    'return_url' => 'https://id-sandbox.dokobit.com/example/success.php',
]);
$response = request('https://id-sandbox.dokobit.com/api/authentication/create?access_token=labadiena', $fields);
header('Content-Type: application/json');
header('Location: '.json_decode($response)->url);

die;