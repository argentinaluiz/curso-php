<?php 
require_once 'src/config.php';
include_once APP . 'funcoes.php';
$conexao = conectaBd($bd['host'], $bd['nome_bd'], $bd['login'], $bd['senha']);

//$bd existe?
if(!isset($bd)){
    //Se não existir, redirecionar para instalação
    header('location: ../install');  
} 
//Foi preenchido corretamente?
elseif(array_search('', $bd)){
    echo '<p>Preencha corretamente todos os dados de conexão com o Banco de Dados</p>';
} 
//Consegue conectar? Existe a tabela page?
elseif(!$conexao or !tabelaPageExiste($conexao, $bd['nome_bd'])) {
    echo '<p>Houve um erro ao ler banco de dados. Reinstale o site inserindo as informações corretas para conexão ao banco de dados. <br> <small>Abra o arquivo "config.php", apague o array "$bd" (todas as chaves), salve e recarregue essa página.</small></p>';
} else {
?>
    
<!DOCTYPE html>
<html lang="pt-br">
    <?php include_once VIEWS . 'code_head.php' ?>
    <body>
        <!-- ##### Header ##### -->
        <?php include_once VIEWS . 'header.php' ?>
        
        <section class="container" id="content">
            <!-- ##### Conteudo do site ##### -->
            <?php                
            ?>
        </section>
        
        <!-- ##### Footer ##### -->
        <?php         
        include_once VIEWS . 'footer.php';
        include_once VIEWS . 'code_footer.php';        
        ?>   
    </body>
</html>

<?php } ?>