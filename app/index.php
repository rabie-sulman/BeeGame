<?php  
session_start();
$loader = require 'vendor/autoload.php';
require 'Autoloader.php';

//slim app and configuration
$app = new \Slim\Slim();
$app->config(array(
    'templates.path' => './templates'
));

$app->get('/hit',function() use ($app) {
    GameBee::init();
    GameBee::hit();  
    $app->render('front.php', 
        array(
            'status' => GameBee::getStatus(),
            'hiveStatus' => GameBee::getHiveStatus()
            )
    );
    
});
$app->get('/',function() use ($app) {
    GameBee::init();
    $app->render('front.php', 
        array(
            'status' => GameBee::getStatus(),
            'hiveStatus' => GameBee::getHiveStatus()
            )
    );
    
});


$app->notFound(function () use ($app) {
    $app->error(new Exception(null,404));
});


$app->run();  

