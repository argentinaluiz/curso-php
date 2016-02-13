<?php 
require_once 'src/config.php';
include_once APP . 'funcoes.php';
$conexao = conectaBd($bd['host'], $bd['nome_bd'], $bd['login'], $bd['senha']);

$pg = isset($_GET['pg']) ? $_GET['pg'] : '';

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
elseif(!$conexao or !$conexao->query("SHOW TABLES FROM {$bd['nome_bd']} LIKE 'pages';")) {
    echo '<p>Houve um erro ao ler banco de dados. Reinstale o site inserindo as informações corretas para conexão ao banco de dados. <br> <small>Abra o arquivo "config.php", apague o array "$bd" (todas as chaves), salve e recarregue essa página.</small></p>';
} else {
<<<<<<< HEAD
    //Consulta Slugs para construir lista de rotas
    $query = $conexao->query("SELECT slug_page FROM {$bd['tabela']}");
    $slugs = $query->fetchAll(PDO::FETCH_ASSOC);
=======
    $query = $conexao->prepare("SELECT slug_page FROM {$bd['tabela']}");
    $valor = $query->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> 8369f5ccd3c254297b3732c94901a16d37d7cce1
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include_once VIEWS . 'code_head.php' ?>
    <body>
        <!-- ##### Header ##### -->
        <?php include_once VIEWS . 'header.php' ?>
        
        <section class="container" id="content">
            <!-- ##### Conteudo do site ##### -->
<<<<<<< HEAD
            <?php trocarUrl($pg, criaArray($slugs)) ?>
=======
            <?php ?>
>>>>>>> 8369f5ccd3c254297b3732c94901a16d37d7cce1
        </section>
        
        <!-- ##### Footer ##### -->
        <?php         
        include_once VIEWS . 'footer.php';
        include_once VIEWS . 'code_footer.php';        
        ?>   
    </body>
</html>

<?php } ?>