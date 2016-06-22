<?php

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);

if(empty($id) || !isset($id)){
    header('location: index.php');
} elseif(empty($nome) || empty($nota)){
    echo '<p class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Por favor, preencha os campos corretamente.</p>';
} else {
    include_once 'Database.php';
    include_once 'config.php';

    try {
        $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
    } catch(PDOException $e) {
        die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
    }
    $edita = new Database($conexao);
    $edita->setNome($nome)->setNota($nota);
    
    if($edita->alterar($id)){
        echo '<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Registro alterado com sucesso!</p>';
    } else {
        echo '<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Erro ao alterar registro</p>';
    }
    
}



