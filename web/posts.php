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
    if(!empty($posts_lista)){
        
        $html = '';
        $html .= '<h1>Hello World!</h1>';
        foreach ($posts_lista as $key => $post){            
            $html .= '<h2><b>ID:</b> <a href="' . $app['url_generator']->generate('lista-posts') . $post['id'] . '">' . $post['id'] . '</a></h2>';
            $html .= '<p>' . $post['conteudo'] . '</p>';
            $html .= '<hr>';
        }
        
        return new Response($html);
    } else {
        return new Response('Nenhum registro encontrado');
    }  
})->bind('lista-posts');

//Posts único - URL posts Nivel 2
$posts->get('/{id}', function(App $app, $id) use ($posts_lista){
    
    foreach ($posts_lista as $post){
        if($post['id'] == $id){
            $html = '<h2>ID: ' . $post['id'] . '</h2>';
            $html .= '<p>' . $post['conteudo'] . '</p>';
            $html .= '<p><a href="' . $app['url_generator']->generate('lista-posts') . '" class="btn btn-default">Voltar para a lista</a></p>';
        }
    }
    
    if(!empty($html)){
        return new Response($html);
    } else {
        $app->abort(404, 'O post com o ID ' . $id . ' não existe');
    }
});

//IMPORTANTE! Retornar controller
return $posts;

