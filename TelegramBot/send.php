<?php


$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";
require ('phrases.php');

function sendMessage($chat_id, $userMessage){

    $noHiCur = sayHi($chat_id, $userMessage);
    $noAnCur = Angry($chat_id, $userMessage);

    if($noHiCur==0 && $noAnCur==0){
        noSayHi($chat_id);
    }
}

function sayHi($chat_id, $userMessage): int
{
    global $phrasesHi;
    global $usersPhrasesHi;
    global $urlSend;
    $userMessage = mb_strtolower($userMessage);
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

function Angry($chat_id, $userMessage): int
{
    global $phrasesAngry;
    global $usersPhrasesAngry;
    global $urlSend;
    $userMessage = mb_strtolower($userMessage);
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

function noSayHi($chat_id){
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
