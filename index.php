<?php 

include_once 'src/Cliente.php';

$bd_host = 'localhost';
$bd_nome = 'cliente';
$bd_login = 'root';
$bd_senha = '';

try {
    $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch(PDOException $e) {
    die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
}

$cliente = new Cliente($conexao);
$cliente->setId(4)->deletar();

if($cliente){
    echo 'Excluído com sucesso!';
} else {
    echo 'Erro ao inserir';
}