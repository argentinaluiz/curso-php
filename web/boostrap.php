<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

//PROVIDERS =================================
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
));

//SERVICOS =================================
//BD
$app['lista_de_posts'] = $app->share(function(){
    include 'bd.php';
    return $bd_lista;
});

//ROTAS =====================================
$app->mount('/posts', include 'posts.php');
$app->run();
?>
