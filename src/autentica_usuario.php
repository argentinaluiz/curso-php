<?php
include_once 'config.php';

$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if(empty($login) || empty($senha)){
   header('location: ' . ROOT);   
} else {

    try {
            $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
    } catch(PDOException $e) {
        die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
    }

    include_once 'Login.php';
    $aut = new Login($conexao);
    $aut->setLogin($login)->setSenha($senha);
    
    if($aut->autentica()){
        header('location: ' . ROOT . 'main.php');
    } else {
        echo 'ERRO: Login ou Senha incorretos';
    }
    
}

