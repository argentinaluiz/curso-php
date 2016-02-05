<?php
require_once '../src/config.php';
$config_file = '../' . APP . 'config.php';

if(array_search('', $_POST)){
    echo 'Não adianta desabilitar o Javascript ... tem que preencher todos os campos do formulário!';
    return false;
} else {
    file_put_contents("novo.txt", "Agora sim a segunda linha...", FILE_APPEND);
}
//echo '<p class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span>  Tudo Certinho ...</p>';


