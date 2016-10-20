<?php

use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application as App;

//Controller Posts
$posts = $app['controllers_factory'];

//GET /posts - para listar todos os posts
$posts->get('/', function(App $app) use($em){
    $lista_posts = $em->getRepository("\SON\Entity\Post")->findAll();
    return $app['twig']->render('posts.twig', array('lista_posts' => $lista_posts));
})->bind('lista-posts');

//GET /post/novo - para abrir o formulário de cadastro de post
$posts->get('/novo', function(App $app){
    return $app['twig']->render('criar_post.twig');
})->bind('form-criar-post');

//POST /post/new - para cadastrar o post
$posts->post('/new',function(App $app, Request $request) use($em){
    $titulo = $request->get('titulo');
    $conteudo = $request->get('conteudo');
    
    if(empty($titulo) || empty($conteudo)){
        return new Response('Preencha corretamente o formulário');
    } else {
        $post = new \SON\Entity\Post;
        $post->setTitulo($titulo);
        $post->setConteudo($conteudo);
        $em->persist($post);
        $em->flush();
        return new Response(json_encode(['retorno' => true, 'mensagem' => 'Post salvo com sucesso']));
    }
})->bind('grava-post');

//GET /post/editar/{id} - para abrir o formulário de edição de post
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

//POST /post/update/{id} - para atualizar o post
$posts->post('/update/{id}',function(App $app, $id, Request $request) use($em){ 
    $titulo = $request->get('titulo');
    $conteudo = $request->get('editorHTML');
    
    if(empty($titulo) || empty($conteudo)){
        return new Response('Preencha os campos corretamente');
    } else {
        $edit = $em->getRepository('\SON\Entity\Post')->find($id);
        $edit->setTitulo($titulo);
        $edit->setConteudo($conteudo);
        $em->flush();        
       return new Response('Post atualizado com sucesso!');
    }
    
})->bind('edita-post');

//GET /post/excluir/{id} - para excluir o post
$posts->post('/delete/{id}',function(App $app, $id) use($em){
    $delete = $em->getRepository('\SON\Entity\Post')->find($id);
    $em->remove($delete);
    $em->flush();
    return new Response('Post excluído com sucesso!');
})->bind('deleta-post');


//Posts único
$posts->get('/{id}', function(App $app, $id) use($em){
    $post = $em->getRepository('\SON\Entity\Post')->find($id);
    return $app['twig']->render('single.twig', array('single' => $post));
})->bind('post-unico');

//IMPORTANTE! Retornar controller
return $posts;

