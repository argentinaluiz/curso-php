<?php
session_start();
include_once 'config.php';
include_once 'Login.php';

try {
    $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch(PDOException $e) {
    die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
}

$aut = new Login($conexao);

if($aut->logout()){
    header('location: ' . ROOT);
} else {
    echo 'Erro ao deslogar usuário.';
}

