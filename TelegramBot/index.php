<?php
require "token.php";

$url = "https://api.telegram.org/bot".TOKEN."/getUpdates";

$response = json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);

if($response['ok']){
    foreach ($response['result'] as $update) {
        echo $update['message']['text'];
        echo "<br>";
    }
}else{
    echo 'not found';
}