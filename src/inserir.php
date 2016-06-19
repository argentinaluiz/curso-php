<?php

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);

//echo '<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Funcionouuuu!!</p>';

if(empty($nome) || empty($nota)){
    echo '<p class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Por favor, preencha os campos corretamente.</p>';
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
    $registra = new Database($conexao);
    $registra->setNome($nome)->setNota($nota);
    
    if($registra->inserir()){
        echo '<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Alunos registrado com sucesso!</p>';
    } else {
        echo '<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Erro ao inserir registro;</p>';
    }
    
}



