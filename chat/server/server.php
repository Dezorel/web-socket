<?php
use Workerman\Worker;

require_once __DIR__.'/../vendor/autoload.php';

$socket = new Worker('websocket://0.0.0.0:2346');
$socket->count = 5;

$socket->onConnect = function ($connection){
    echo "Create new user \n";
};

$socket->onMessage = function ($connection, $data) use ($socket){
    foreach($socket->connections as $clientConnection){
        $clientConnection->send($data);
    }
};

$socket->onClose = function ($connection){
    echo "User deleted\n";
};

Worker::runAll();
