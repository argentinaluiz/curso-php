<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

//SERVICOS =================================

//BD
$app['lista_de_posts'] = $app->share(function(){
    include 'bd.php';
});

//CONTROLLERS =================================
//index
$index = $app['controllers_factory'];

//Index do site
$index->get('/', function() use($app){
    return new Response('<h1>Home</h1><p><a href="/posts">Ir para a lista de posts</a></p>');
});

//ROTAS =================================
$app->mount('/', $index);
$app->mount('/posts', include 'posts.php');

//Vai!
$app->run();


