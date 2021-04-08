<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2">
    <title>Bot logs</title>
</head>
<body>

</body>
</html>

<?php
require ('token.php');
require ('send.php');
function getUpdates(){
    $url = "https://api.telegram.org/bot".TOKEN."/getUpdates";
    $response = json_decode(
        file_get_contents($url),
        JSON_OBJECT_AS_ARRAY
    );
    if(count($response['result'])> 0){
        $url1 = "https://api.telegram.org/bot".TOKEN."/getUpdates";
        $lastUpdatedID = getFirstUnviewMessage($response);
        sendHiMessage($response['result'][0]['message']['chat']['id'], $response['result'][0]['message']['text']);
        $params = [
            'offset'=>$lastUpdatedID+1
        ];
        $url1 = $url1 . '?' . http_build_query($params);
        $response1 = json_decode(
            file_get_contents($url1),
            JSON_OBJECT_AS_ARRAY
        );

        if($response1['ok']){
            echo 'Не обработанные сообщения:<br>';
            foreach ($response1['result'] as $update) {
                echo $update['message']['text'];
                echo "<br>";
            }
        }else{
            echo 'not found';
        }

    }
    else{
        echo '<h1 align="center">No unread messages</h1>';
    }
}

getUpdates();



function getFirstUnviewMessage($response){
    return $response['result'][0]['update_id'];
}