<?php
include '../config.php';

header('Content-Type: application/json');

$url = 'https://id-sandbox.dokobit.com/api/authentication/create?access_token='.$apiAccessToken;
$fields = http_build_query([
    'return_url' => $_REQUEST['return_url'],
]);
echo request($url, $fields, 1);

