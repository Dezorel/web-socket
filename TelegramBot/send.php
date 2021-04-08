<?php


$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";
$phrasesHi = ['Привет', 'Здравствуй!', 'Добро пожаловать Линуксоид', 'Я ждал тебя, мой подаван', 'У меня припасено много банальных фраз для приветсвия'];
$usersPhrasesHi = ['Привет', 'привет', 'Здравствуй','здравствуй', 'Ку', 'ку','Куку', 'куку', 'Бонжур','бонжур', 'Хай', 'хай', 'Hello','hello', 'Hi','hi'];

$phrasesAngry = ['Тебе здесь не рады!', 'Не правда! Линукс лучшая ОС всех времё и народов'];

function sendHiMessage($chat_id, $userMessage){
    global $phrasesHi;
    global $usersPhrasesHi;
    global $phrasesAngry;
    global $urlSend;

    $k = count($usersPhrasesHi);

    foreach ($usersPhrasesHi as $usi){
        if(strnatcasecmp($userMessage, $usi)==0){
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
        $k--;
    }

    if($k==0){
        $params = [
            'chat_id'=>$chat_id,
            'text'=>'Ты не здороваешься! Как некультурно...'
        ];
        $urlSend = $urlSend . '?' . http_build_query($params);
        $response = json_decode(
            file_get_contents($urlSend),
            JSON_OBJECT_AS_ARRAY
        );
    }

}
function randomPhrase($phrases){
    $num = rand(0, count($phrases)-1);
    return $phrases[$num];
}
