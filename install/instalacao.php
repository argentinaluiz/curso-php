<?php
session_start();
$config_file = '../src/config.php';
require_once $config_file;
require_once APP . 'funcoes.php'; 
$sql = file_get_contents(INSTALL . 'pages.sql');

$host = trim($_POST['host']);
$nomeBD = trim($_POST['nome-bd']);
$login = trim($_POST['login']);
$senha = trim($_POST['senha']);

if(array_search('', $_POST)){
    echo 'Não adianta desabilitar o Javascript ... tem que preencher todos os campos do formulário!';
    return false;
} else {
    
    $_SESSION['host'] = $host;
    $_SESSION['nomeBD'] = $nomeBD;
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    
    $conteudo = "\n\n" . 
        '//Banco de dados' . "\n" .
        '$bd[\'host\'] = \''.  $host . '\';' . "\n" .
        '$bd[\'nome_bd\'] = \''.  $nomeBD . '\';' . "\n" .
        '$bd[\'tabela\'] = \'pages\';' . "\n" .
        '$bd[\'login\'] = \''.  $login . '\';' . "\n" .
        '$bd[\'senha\'] = \''.  $senha . '\';' . "\n"; 
    
    $cnx = conectaBd($_SESSION['host'], $_SESSION['nomeBD'], $_SESSION['login'], $_SESSION['senha']);
    
    // ========== Fixture
    if($cnx && file_put_contents($config_file, $conteudo, FILE_APPEND)){
        $cnx->query("DROP TABLE IF EXISTS pages;");
        $cnx->query(
            'CREATE TABLE `pages` (
                        `id_pages` int(10) unsigned NOT NULL,
                        `title_pages` text NOT NULL,
                        `slug_page` text NOT NULL,
                        `excerpt_pages` text,
                        `date_pages` datetime NOT NULL,
                        `author_pages` varchar(100) NOT NULL,
                        `content_pages` longtext
                   ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;'
        );
        $cnx->query($sql);
        echo 'fim';
    } else {
        echo 'erro';
        session_destroy();      
    } //else
}

