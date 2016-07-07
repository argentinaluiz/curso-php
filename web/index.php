<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

//Montando as rotas
$app->mount('/posts', include 'posts.php');

//Vai!
$app->run();


