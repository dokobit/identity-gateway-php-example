<?php

include '../config.php';


$response = request("https://id-sandbox.dokobit.com/api/authentication/{$_GET['session_token']}/status?access_token=".$apiAccessToken);

printArray(json_decode($response, true));
