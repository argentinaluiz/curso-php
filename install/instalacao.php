<?php
require_once '../src/config.php';
$config_file = APP . 'config.php';

if(array_search('', $_POST)){
    echo 'Não adianta desabilitar o Javascript ... tem que preencher todos os campos do formulário!';
    return false;
} else {
    $conteudo = "\n\n" . 
        '//Banco de dados' . "\n" .
        '$bd[\'host\'] = \''.  $_POST['host'] . '\';' . "\n" .
        '$bd[\'nome_bd\'] = \''.  $_POST['nome-bd'] . '\';' . "\n" .
        '$bd[\'tabela\'] = \'pages\';' . "\n" .
        '$bd[\'login\'] = \''.  $_POST['login'] . '\';' . "\n" .
        '$bd[\'senha\'] = \''.  $_POST['senha'] . '\';' . "\n";
    
    echo @file_put_contents($config_file, $conteudo, FILE_APPEND) ? 'ok' : 'erro';    
}