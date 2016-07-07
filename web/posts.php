<?php

include 'bd.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application as App;

//Lista de posts
include 'bd.php';

//Controller Posts
$posts = $app['controllers_factory'];

//Lista de posts - URL posts Nivel 1
$posts->get('/', function(App $app) use ($bd_posts){
    if(!empty($bd_posts)){
        
        $html = '';
        foreach ($bd_posts as $key => $post){
            $html .= '<p><b>ID:</b> <a href="/posts/' . $post['id'] . '">' . $post['id'] . '</a></p>';
            $html .= '<p>' . $post['conteudo'] . '</p>';
            $html .= '<hr>';
        }
        
        return new Response($html);
    } else {
        return new Response('Nenhum registro encontrado');
    }  
});

//Posts único - URL posts Nivel 2
$posts->get('/{id}', function(App $app, $id) use ($bd_posts){
    
    foreach ($bd_posts as $post){
        if($post['id'] == $id){
            $html = '<h1>ID: ' . $post['id'] . '</h1>';
            $html .= '<p>' . $post['conteudo'] . '</p>';
            $html .= '<p><a href="/posts">Voltar para a lista</a></p>';
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

