<?php
require "token.php";
$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";
$phrasesHi = ['Привет', 'Здравствуй!', 'Добро пожаловать Линуксоид', 'Я ждал тебя, мой подаван'];

$params = [
    'chat_id'=>1534045363,
    'text'=>randomPhrase($phrasesHi)
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

function randomPhrase($phrases){
    $num = rand(0, count($phrases)-1);
    return $phrases[$num];
}
