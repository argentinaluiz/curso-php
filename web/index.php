<?php

require_once __DIR__ . '/../vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;

$posts = array(
    0 => array('id' => 54, 'conteudo' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ut volutpat. Nulla pellentesque. In sed neque.'),
    1 => array('id' => 5, 'conteudo' => 'Maecenas quis ante a dolor hendrerit congue. Vestibulum risus enim, mollis ultricies, venenatis non, euismod ac, tellus.'),
    2 => array('id' => 123, 'conteudo' => 'Sed metus elit, blandit nec, ultrices id, scelerisque ultrices, augue. Phasellus accumsan. Cras porta. Sed turpis urna, aliquet in, ornare et, congue bibendum, justo.'),
    3 => array('id' => 985, 'conteudo' => 'Nam vitae magna eu lectus mattis egestas. Nunc at nunc non tortor convallis scelerisque. Duis sed ante. Donec hendrerit pede non elit. Maecenas nec velit.'),
    4 => array('id' => 1456, 'conteudo' => 'Phasellus et erat. Aliquam sollicitudin sapien condimentum mauris. Pellentesque at purus et orci scelerisque vestibulum. Nullam rutrum tortor a justo bibendum feugiat.'),
    5 => array('id' => 3478, 'conteudo' => 'Fusce faucibus eros vel eros. Mauris enim. Morbi ac augue. Mauris purus orci, tempor id, pellentesque non, dignissim a, odio.'),
    6 => array('id' => 54, 'conteudo' => 'Nunc adipiscing sollicitudin dolor. Nullam tincidunt venenatis magna. Pellentesque orci. Sed ut odio ac diam luctus vehicula.'),
    7 => array('id' => 511, 'conteudo' => 'Donec auctor justo in neque. Fusce pharetra lobortis eros. In sagittis. Ut pretium mattis massa. Duis aliquam est id nisi.'),
    8 => array('id' => 874, 'conteudo' => 'Etiam condimentum tortor bibendum nisl. Donec bibendum diam id leo viverra bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.'),
    9 => array('id' => 9542, 'conteudo' => 'Nulla facilisi. Integer lacus. Cras sed arcu at erat condimentum venenatis. Sed lacus tortor, rutrum eu, venenatis ac.')
);


$app->get('/posts/{id}', function(Silex\Application $app, $id) use($posts){
   
    foreach ($posts as $post){
        if($post['id'] == $id){
            $html = '<h1>ID: ' . $post['id'] . '</h1>';
            $html .= '<p>' . $post['conteudo'] . '</p>';            
        }
    }
    
    if(!empty($html)){
        return $html;
    } else {
        $app->abort(404, 'O post com o ID ' . $id . ' não existe');
    }
});

$app->run();


