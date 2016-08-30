<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

require_once 'bootstrap.php';

//ROTAS =====================================
$app->mount('/posts', include 'posts.php');
$app->run();
