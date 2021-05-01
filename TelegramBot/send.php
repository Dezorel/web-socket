<?php


$urlSend = "https://api.telegram.org/bot".TOKEN."/sendMessage";
require ('phrases.php');

function sendMessage($chat_id, $userMessage){

    $NotHiPhrase = sayHi($chat_id, $userMessage);
    $NotAngryPhrase = Angry($chat_id, $userMessage);
    $NotHAYPhrase = HowAreYou($chat_id, $userMessage);
    $NoMenu = Menu($chat_id, $userMessage);
    $NoWAY = WhoAreYou($chat_id, $userMessage);

    if($NotHiPhrase==0 && $NotAngryPhrase==0 && $NotHAYPhrase == 0 && $NoMenu == 0 && $NoWAY == 0){
        noSayHi($chat_id);
    }
}

function sayHi($chat_id, $userMessage): int
{
    global $phrasesHi;
    global $usersPhrasesHi;

    $userMessage = mb_strtolower($userMessage);
    $countOfPhrase = count($usersPhrasesHi);

    foreach ($usersPhrasesHi as $usi){
        if(strnatcasecmp($userMessage, $usi)==0){
            sendRandomPhrase($chat_id, $phrasesHi);

            break;
        }
        $countOfPhrase--;
    }
    return $countOfPhrase;
}

function Angry($chat_id, $userMessage): int
{
    global $phrasesAngry;
    global $usersPhrasesAngry;

    $userMessage = mb_strtolower($userMessage);
    $countOfPhrase = count($usersPhrasesAngry);

    foreach ($usersPhrasesAngry as $usa){
        if(strnatcasecmp($userMessage, $usa)==0){
            sendRandomPhrase($chat_id,$phrasesAngry);
            break;
        }
        $countOfPhrase--;
    }
    return $countOfPhrase;
}

function HowAreYou($chat_id, $userMessage): int
{
    global $phrasesHowAreYou;
    global $userPhrasesHowAreYou;

    $userMessage = mb_strtolower($userMessage);
    $countOfPhrase = count($userPhrasesHowAreYou);

    foreach ($userPhrasesHowAreYou as $ushay){
        if(strnatcasecmp($userMessage, $ushay)==0){
            sendRandomPhrase($chat_id, $phrasesHowAreYou);
            break;
        }
        $countOfPhrase--;
    }
    return $countOfPhrase;
}

function Menu($chat_id, $userMessage): int
{
    global $urlSend;
    $temp = 0;
    $userMessage = mb_strtolower($userMessage);

        if(strnatcasecmp($userMessage, '/menu')==0){

            $params = [
                'chat_id'=>$chat_id,
                'text'=>'Ваше меню',
                'reply_markup'=>json_encode(array('keyboard'=> [
                    ['здравствуй','Как дела','Викторина'],
                    ['Кто ты', 'Something else']]))
            ];
            $urlSend = $urlSend . '?' . http_build_query($params);
            $response = json_decode(
                file_get_contents($urlSend),
                JSON_OBJECT_AS_ARRAY
            );
            $temp = 1;
        }
        return $temp;
}

function WhoAreYou($chat_id, $userMessage): int
{
    global $phrasesWhoAreYou;
    global $userPhrasesWhoAreYou;

    $userMessage = mb_strtolower($userMessage);
    $countOfPhrase = count($userPhrasesWhoAreYou);

    foreach ($userPhrasesWhoAreYou as $upway){
        if(strnatcasecmp($userMessage, $upway)==0){
            sendRandomPhrase($chat_id,$phrasesWhoAreYou);
            break;
        }
        $countOfPhrase--;
    }
    return $countOfPhrase;
}

function noSayHi($chat_id){
    global $notHiPhrase;
    sendRandomPhrase($chat_id, $notHiPhrase);
}
function randomPhrase($phrases){
    $num = rand(0, count($phrases)-1);
    return $phrases[$num];
}
function sendRandomPhrase($chat_id, $phrases){
    global $urlSend;
    $params = [
        'chat_id'=>$chat_id,
        'text'=>randomPhrase($phrases)
    ];
    $urlSend = $urlSend . '?' . http_build_query($params);
    $response = json_decode(
        file_get_contents($urlSend),
        JSON_OBJECT_AS_ARRAY
    );
}
function sendThisMessage($chat_id, $msg){
    global $urlSend;
    $params = [
        'chat_id'=>$chat_id,
        'text'=>$msg
    ];
    $urlSend = $urlSend . '?' . http_build_query($params);
    $response = json_decode(
        file_get_contents($urlSend),
        JSON_OBJECT_AS_ARRAY
    );
}

