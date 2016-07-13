<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

//PROVIDERS =================================
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

//SERVICOS =================================
//BD
$app['lista_de_posts'] = $app->share(function(){
    include 'bd.php';
    return $bd_lista;
});

//ROTAS =====================================
$app->mount('/posts', include 'posts.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Projeto Silex</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container">            
            <?php $app->run() ?>
        </div>
      
    <!-- ################# JS ################# -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </body>
</html>

