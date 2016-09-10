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

$posts->get('/', function(App $app) use ($posts_lista, $em){
    /*$grava = new \SON\Entity\Post;
    $grava->setTitulo('Lorem ipsum dolor sit amet, consectetur adipisicing elit. ');
    $grava->setconteudo('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, officiis ea quod blanditiis laudantium vitae debitis accusamus voluptate assumenda cum! Praesentium, qui, blanditiis voluptatem odio necessitatibus quae vitae numquam aliquid. ');
    
    $em->persist($grava);
    $em->flush();*/
    
    return $app['twig']->render('posts.twig', array('posts' => $posts_lista));
})->bind('lista-posts');

//Posts único - URL posts Nivel 2
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

