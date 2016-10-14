<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

require_once 'bootstrap.php';

//ROTAS =====================================
$app->get('/', function(Silex\Application $app){
    return $app->redirect($app['url_generator']->generate('lista-posts'));
});
$app->mount('/posts', include 'posts.php');
$app->run();
