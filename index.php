<?php 
require 'src/url.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php require 'views/code_head.php' ?>
    <body>
        <!-- ##### Header ##### -->
        <?php include 'views/header.php' ?>
        
        <section class="container" id="content">
            <!-- ##### Conteudo do site ##### -->
            <?php trocarUrl($_SERVER['REQUEST_URI']) ?>
        </section>
        
        <!-- ##### Footer ##### -->
        <?php         
        include 'views/footer.php';
        include 'views/code_footer.php';        
        ?>   
    </body>
</html>