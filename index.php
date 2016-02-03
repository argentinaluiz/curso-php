<?php 
require_once 'src/config.php';

include_once APP . 'url.php';

$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include_once VIEWS . 'code_head.php' ?>
    <body>
        <!-- ##### Header ##### -->
        <?php include_once VIEWS . 'header.php' ?>
        
        <section class="container" id="content">
            <!-- ##### Conteudo do site ##### -->
            <?php trocarUrl($pg) ?>
        </section>
        
        <!-- ##### Footer ##### -->
        <?php         
        include_once VIEWS . 'footer.php';
        include_once VIEWS . 'code_footer.php';        
        ?>   
    </body>
</html>