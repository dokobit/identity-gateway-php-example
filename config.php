<?php
 
$apiAccessToken = ''; //Get your token from https://www.dokobit.com/developers/request-token


// Small helper functions
function request(string $url, string $fields = '', int $isPost = 0)
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

function printArray(array $arr)
{
    echo '<ul>';
    foreach ($arr as $key => $value) {
        echo '<li style="list-style:none;"><b>' . $key . '</b>: ';
        if (is_array($value)) {
            printArray($value);
        } else {
            echo $value;
        }
        echo '</li>';
    }
    echo '</ul>';
}