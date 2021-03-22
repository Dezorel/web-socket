<?php

require __DIR__.'/vendor/autoload.php'; //прописываем путь к файлу автозагрузки

$log = new Monolog\Logger("name");  // обращаемся к классам (в папке монолог)
$log->pushHandler(new Monolog\Handler\StreamHandler( //создаём обработчик, как именно будет сохраняться записи (логи);
    'app.log',       //создаём файл app.log
    Monolog\Logger::INFO         //записываем логи уровня Warning
//Так же существуют другие типы: Debug, info, notice, warning, error, critical, alert, emergency
));
$log->addInfo("Test");   //помещаем запись (слово Тест)


