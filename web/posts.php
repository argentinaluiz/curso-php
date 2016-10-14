<?php

use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application as App;

//Controller Posts
$posts = $app['controllers_factory'];

//Lista de posts
$posts->get('/', function(App $app) use($em){
    $lista_posts = $em->getRepository("\SON\Entity\Post")->findAll();
    return $app['twig']->render('posts.twig', array('lista_posts' => $lista_posts));
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
        return new Response('Preencha corretamente o formulário');
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
            return new Response(json_encode(['retorno' => false, 'mensagem' => 'Erro ao gravar Post']));
            throw $e;
        }
    }
})->bind('grava-post');

//Formulario para editar post
$posts->get('/editar/{id}', function(App $app, $id) use($em){    
    $post = $em->getRepository('\SON\Entity\Post')->find($id);
    if($post){
       return $app['twig']->render('editar_post.twig', array('post_edit' => $post)); 
    }else{
       return $app['twig']->render('error.twig', array('id' => $id)); 
    }
})->bind('form-editar-post');

//Redireciona se acessar sem ID
$posts->get('/editar/', function(App $app){    
    return $app->redirect($app['url_generator']->generate('lista-posts'));
});

//Editar post
$posts->post('/update/{id}',function(App $app, $id, Request $request) use($em){ 
    $titulo = $request->get('titulo');
    $conteudo = $request->get('editorHTML');
    
    if(empty($titulo) || empty($conteudo)){
        return new Response('Preencha os campos corretamente');
    } else {
        $edit = $em->getReference('\SON\Entity\Post', $id);
        $edit->setTitulo($titulo);
        $edit->setConteudo($conteudo);
        $em->flush($edit);
        
       return new Response('Post atualizado com sucesso!');
       //return new Response(json_encode(['retorno' => true, 'mensagem' => 'Post atualizado com sucesso!']));
    }
    
})->bind('edita-post');

//Deletar post
$posts->post('/delete/{id}',function(App $app, $id){
})->bind('deleta-post');


//Posts único
$posts->get('/{id}', function(App $app, $id) use($em){
    // $em instanceof EntityManager
    $em->getConnection()->beginTransaction(); // suspend auto-commit
    try {
        $post = $em->getRepository('\SON\Entity\Post')->find($id);        
        $em->getConnection()->commit();
        return $app['twig']->render('single.twig', array('single' => $post));
        //return new Response(var_dump($post));
    } catch (Exception $e) {
        $em->getConnection()->rollBack();
        throw $e;
    }
})->bind('post-unico');

//IMPORTANTE! Retornar controller
return $posts;

