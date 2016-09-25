<?php

include 'bd.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application as App;

//Servico para obter Lista de posts
$posts_lista = $app['lista_de_posts'];

//Controller Posts
$posts = $app['controllers_factory'];

//Lista de posts
$posts->get('/', function(App $app) use ($posts_lista, $em){
    return $app['twig']->render('posts.twig', array('posts' => $posts_lista));
})->bind('lista-posts');

//Formulario para criar novo post
$posts->get('/novo', function(App $app){
    return $app['twig']->render('criar_post.twig');
})->bind('form-criar-post');

//Cadastrar post
$posts->post('/new',function(App $app){   
})->bind('grava-post');

//Formulario para editar post
$posts->get('/editar/{id}',function(App $app, $id){
    return $app['twig']->render('editar_post.twig');
})->bind('form-editar-post');

//Editar post
$posts->post('/update/{id}',function(App $app, $id){
})->bind('edita-post');

//Deletar post
$posts->post('/update/{id}',function(App $app, $id){
})->bind('deleta-post');


//Posts único
$posts->get('/{id}', function(App $app, $id) use ($posts_lista){ 
    $retorno = false;
    
    foreach ($posts_lista as $post){
        if($post['id'] == $id){
            $titulo = $post['id'];
            $conteudo = $post['conteudo'];
            $retorno = true;
        } 
    }
    
    if($retorno){
        return $app['twig']->render('single.twig', array('titulo' => $titulo, 'conteudo' => $conteudo));
    } else {        
        return new Response($app['twig']->render('error.twig', array('id' => $id)), 404);      
    }
    
});

//IMPORTANTE! Retornar controller
return $posts;

