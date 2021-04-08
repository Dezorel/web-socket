<?php


$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";
$phrasesHi = ['Привет', 'Здравствуй!', 'Добро пожаловать Линуксоид', 'Я ждал тебя, мой подаван', 'У меня припасено много банальных фраз'];
$usersPhrasesHi = ['Привет', 'Здравствуй', 'Ку', 'Бонжур', 'hi'];

$phrasesAngry = ['Тебе здесь не рады!', 'Не правда! Линукс лучшая ОС всех времё и народов'];

function sendHiMessage($chat_id, $userMessage){
    global $phrasesHi;
    global $usersPhrasesHi;
    global $phrasesAngry;
    global $urlSend;

    foreach ($usersPhrasesHi as $usi){
        if(strcmp($userMessage, $usi)==0){
            $params = [
                'chat_id'=>$chat_id,
                'text'=>randomPhrase($phrasesHi)
            ];
            $urlSend = $urlSend . '?' . http_build_query($params);
            $response = json_decode(
                file_get_contents($urlSend),
                JSON_OBJECT_AS_ARRAY
            );
            break;
        }
    }

//    $params = [
//        'chat_id'=>$chat_id,
//        'text'=>'Ты не поздоровался!'
//    ];
//    $urlSend = $urlSend . '?' . http_build_query($params);
//    $response = json_decode(
//        file_get_contents($urlSend),
//        JSON_OBJECT_AS_ARRAY
//    );

}
function randomPhrase($phrases){
    $num = rand(0, count($phrases)-1);
    return $phrases[$num];
}
