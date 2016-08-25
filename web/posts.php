<?php

include 'bd.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application as App;

//Servico para obter Lista de posts
$posts_lista = $app['lista_de_posts'];

//Controller Posts
$posts = $app['controllers_factory'];

//Lista de posts - URL posts Nivel 1

$posts->get('/', function(App $app) use ($posts_lista){
    return $app['twig']->render('posts.twig', array('posts' => $posts_lista));
})->bind('lista-posts');

//Posts único - URL posts Nivel 2
$posts->get('/{id}', function(App $app, $id) use ($posts_lista){    
});

//IMPORTANTE! Retornar controller
return $posts;

