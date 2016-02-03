<?php
/**
 *  INCLUSAO DAS PAGINAS DO SITE
 * @author	Marcia Silva
 * @version 1.0
 * @param string $url
 */
function trocarUrl($url){
    //Filtrando os dados
	$get = strip_tags(trim(htmlentities($url, ENT_QUOTES)));     
    
    $rotas = array('home', 'empresa', 'produtos', 'servicos', 'contato', 'respostaForm');
    
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

