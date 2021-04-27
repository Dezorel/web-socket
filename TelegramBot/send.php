<?php


$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";
$phrasesHi = ['Привет', 'Здравствуй!', 'Добро пожаловать Линуксоид', 'Я ждал тебя, мой подаван', 'У меня припасено много банальных фраз для приветсвия'];
$usersPhrasesHi = ['Привет', 'привет', 'Здравствуй','здравствуй', 'Ку', 'ку','Куку', 'куку', 'Бонжур','бонжур', 'Хай', 'хай', 'Hello','hello', 'Hi','hi'];

$phrasesAngry = ['Тебе здесь не рады!', 'Не правда! Линукс лучшая ОС всех времё и народов'];
$usersPhrasesAngry = ['Linux говно', 'Linux govno', 'Linux sheet', 'я пользуюсь windows','Я пользуюсь windows','Я пользуюсь Windows','я пользуюсь Windows',];
$notHiPhrase = ['А поздороваться?', 'Со мной никто не здоровается...', 'Причина востания машин: Отсутсвие приветсвия пользователя'];

function sendMessage($chat_id, $userMessage){
    global $notHiPhrase;
    global $urlSend;
    $noHiCur = sayHi($chat_id, $userMessage);
    $noAnCur = Angry($chat_id, $userMessage);
    if($noHiCur==0 && $noAnCur==0){

    }

}

function sayHi($chat_id, $userMessage){
    global $phrasesHi;
    global $usersPhrasesHi;
    global $urlSend;
    $noHi = count($usersPhrasesHi);

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
        $noHi--;
    }
    return $noHi;
}

function Angry($chat_id, $userMessage){
    global $phrasesAngry;
    global $usersPhrasesAngry;
    global $urlSend;
    $noHi = count($usersPhrasesAngry);

    foreach ($usersPhrasesAngry as $usa){
        if(strnatcasecmp($userMessage, $usa)==0){
            $params = [
                'chat_id'=>$chat_id,
                'text'=>randomPhrase($phrasesAngry)
            ];
            $urlSend = $urlSend . '?' . http_build_query($params);
            $response = json_decode(
                file_get_contents($urlSend),
                JSON_OBJECT_AS_ARRAY
            );
            break;
        }
        $noHi--;
    }
    return $noHi;
}

function noSayHi($chat_id, $userMessage){

    global $notHiPhrase;
    global $urlSend;

    $params = [
        'chat_id'=>$chat_id,
        'text'=>randomPhrase($notHiPhrase)
    ];
    $urlSend = $urlSend . '?' . http_build_query($params);
    $response = json_decode(
        file_get_contents($urlSend),
        JSON_OBJECT_AS_ARRAY
    );
}

function randomPhrase($phrases){
    $num = rand(0, count($phrases)-1);
    return $phrases[$num];
}
