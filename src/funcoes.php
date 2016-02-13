<?php

/**
 * CONEXÃO COM O BANCO DE DADOS
 * @author	Marcia Silva
 * @version 1.0
 * @param string $host
 * @param string $nome_bd
 * @param string $login
 * @param string $senha
 */
function conectaBd($host, $nome_bd, $login, $senha){
    try {
        return $conn = new PDO("mysql:host={$host};dbname={$nome_bd}", $login, $senha);      
    } catch(PDOException $e) {
        echo 'Erro: ' . $e->getCode() . ' - ' . $e->getMessage();
    }
}
/**
 * INCLUSAO DAS PAGINAS DO SITE
 * @author	Marcia Silva
 * @version 1.1
 * @param string $url
 */
function trocarUrl($url, $rotas){
    //Filtrando os dados
<<<<<<< HEAD
	$get = strip_tags(trim(htmlentities($url, ENT_QUOTES)));    
=======
	$get = strip_tags(trim(htmlentities($url, ENT_QUOTES)));
    
    $rotas = array('home', 'empresa', 'produtos', 'servicos', 'contato', 'respostaForm');
>>>>>>> 8369f5ccd3c254297b3732c94901a16d37d7cce1
    
    //Se a URL estiver em branco ou não existir, incluir home
	if( empty($get) || !isset($get) ){
		$get = VIEWS . 'home.php';
    }
	//Caso nao esteja em branco e nao seja index, verificar se o arquivo existe e se e valido
	elseif (in_array($get, $rotas) && file_exists( VIEWS . $get . '.php' )){
		$get = VIEWS . $get . '.php';
	} else {
	//Se nao existir ou se nao for um arquivo, incluir pagina de erro
        http_response_code(404);
		$get = VIEWS . '404.php';
	}
	include_once $get;
}

/**
 * FUNCAO PARA ITERAR ARRAYS MULTIDIMENSIONAIS TORNANDO AS ARRAY
 * @param type $array
 * @return \RecursiveIteratorIterator
 */
function criaArray($array){
    $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($array)); 
    foreach($iterator as $endereco){
       $lista[] = $endereco;
    }    
    return $lista;
}
