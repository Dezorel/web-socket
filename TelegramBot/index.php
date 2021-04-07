<?php
require "token.php";

$url = "https://api.telegram.org/bot".TOKEN."/getUpdates";

$response = json_encode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);

var_dump($response);