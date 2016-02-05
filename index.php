<?php 
require_once 'src/config.php';
include_once APP . 'funcoes.php';

if(!isset($bd)){
    header('location: ../install');  
} elseif(array_search('', $bd)){
    echo '<p>Preencha corretamente todos os dados de conexão com o Banco de Dados</p>';
} else { ?>
    
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