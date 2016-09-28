<?php

include 'bd.php';

use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application as App;

//Controller Posts
$posts = $app['controllers_factory'];

//Lista de posts
$posts->get('/', function(App $app){
    return $app['twig']->render('posts.twig');
})->bind('lista-posts');

//Formulario para criar novo post
$posts->get('/novo', function(App $app){
    return $app['twig']->render('criar_post.twig');
})->bind('form-criar-post');

//Cadastrar post
$posts->post('/new',function(App $app, Request $request) use($em){
    $titulo = $request->get('titulo');
    $conteudo = $request->get('conteudo');
    
    if(empty($titulo) || empty($conteudo)){
        return new Response('Preencha corretamente o formulário', 404);
    } else {
        $post = new \SON\Entity\Post;
        $post->setTitulo($titulo);
        $post->setConteudo($conteudo);
        
        // $em instanceof EntityManager
        $em->getConnection()->beginTransaction(); // suspend auto-commit
        try {
            $em->persist($post);
            $em->flush($post);
            $em->getConnection()->commit();
            return new Response(json_encode(['retorno' => true, 'mensagem' => 'Post salvo com sucesso']));
        } catch (Exception $e) {
            $em->getConnection()->rollBack();
            throw $e;
        }
    }
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
$posts->get('/{id}', function(App $app, $id){ 
       
});

//IMPORTANTE! Retornar controller
return $posts;

