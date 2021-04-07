<?php
require "token.php";
$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";

$params = [
    'chat_id'=>1534045363,
    'text'=>'Привет я бот который любит линукс! :З'
];

$urlSend = $urlSend . '?' . http_build_query($params);
$response = json_decode(
    file_get_contents($urlSend),
    JSON_OBJECT_AS_ARRAY
);

if($response['ok']){
    foreach ($response['result'] as $update) {
        echo $update['message']['text'];
        echo "<br>";
    }
}else{
    echo 'not found';
}