<?php

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id) || !isset($id)){
    header('location: index.php');
} else {
    include_once 'Database.php';
    $bd_host = 'localhost';
    $bd_nome = 'notas';
    $bd_login = 'root';
    $bd_senha = '';

    try {
        $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
    } catch(PDOException $e) {
        die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
    }
    $excluir = new Database($conexao);;
    
    if($excluir->deletar($id)){
        echo '<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Registro deletado com sucesso!</p>';
    } else {
        echo '<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Erro ao excluir registro</p>';
    }
    
}


