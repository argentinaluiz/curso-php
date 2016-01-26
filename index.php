<?php 
require 'src/url.php';
$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php require 'views/code_head.php' ?>
    <body>
        <!-- ##### Header ##### -->
        <?php include 'views/header.php' ?>
        
        <section class="container" id="content">
            <!-- ##### Conteudo do site ##### -->
            <?php trocarUrl($pg) ?>
        </section>
        
        <!-- ##### Footer ##### -->
        <?php         
        include 'views/footer.php';
        include 'views/code_footer.php';        
        ?>   
    </body>
</html>