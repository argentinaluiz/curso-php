<?php

//Endereco da pasta com as partes do layout
define('VIEWS', 'views/');

/**
 *  INCLUSAO DAS PAGINAS DO SITE
 * @author	Marcia Silva
 * @version 1.0
 * @param string $url
 */
function trocarUrl($url){
	$end = strip_tags(trim(htmlentities($url, ENT_QUOTES)));
	//Se a URL estiver em branco, incluir home
	if( empty($end) || !isset($end) ){
		$end = VIEWS . 'home.php';
	}
	//Caso nao esteja em branco e nao seja index, verificar se o arquivo existe e se e valido
	elseif (file_exists( VIEWS . $end . '.php' ) && is_file( VIEWS . $end . '.php' ) ){
		$end = VIEWS . $end . '.php';
	} else {
	//Se nao existir ou se nao for um arquivo, incluir pagina de erro
        http_response_code(404);
		$end = VIEWS . '404.php';
	}
	require_once $end;
}

