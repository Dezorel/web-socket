<?php
require "token.php";

$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";
$phrasesHi = ['Привет', 'Здравствуй!', 'Добро пожаловать Линуксоид', 'Я ждал тебя, мой подаван', 'У меня припасено много банальных фраз'];
$phrasesAngry = ['Тебе здесь не рады!', 'Не правда! Линукс лучшая ОС всех времё и народов'];

$params = [
    'chat_id'=>1534045363,
    'text'=>randomPhrase($phrasesHi)
];
$urlSend = $urlSend . '?' . http_build_query($params);
$response = json_decode(
    file_get_contents($urlSend),
    JSON_OBJECT_AS_ARRAY
);

function randomPhrase($phrases){
    $num = rand(0, count($phrases)-1);
    return $phrases[$num];
}