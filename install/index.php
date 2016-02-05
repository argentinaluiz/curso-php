<?php 
require_once '../src/config.php';

if(isset($bd)){
    header('location: ../index.php');  
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include_once '../' . VIEWS . 'code_head.php' ?>
    <body>
        <section class="container">
            <div class="jumbotron" style="margin-top: 2em">
                <h1>Vamos installar o site?</h1>
                
                <div id="content">
                    <!-- ##### Formulario ##### -->
                    <h2 style="margin-bottom: 2em">1º Passo: Configuração dos dados de conexão</h2>
                    <form name="instala-config" method="post">
                    <div class="form-group">
                        <label for="host">Host</label>
                        <input type="text" class="form-control" name="host" id="host" placeholder="Ex.: Localhost">
                    </div>
                    <div class="form-group">
                        <label for="nome-bd">Nome do Banco de Dados</label>
                        <input type="text" class="form-control" name="nome-bd" id="nome-bd" placeholder="Nome do seu Banco de Dados">
                    </div>
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Usuário do Banco de Dados">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="text" class="form-control" name="senha" id="senha" placeholder="Senha do Banco de Dados">
                    </div>

                        <p id="submit" style="margin-top: 30px"><input type="submit" id="btn-submit" class="btn btn-primary" value="Instalar"></p>
                    </form>
                    <div id="validacao"></div>
                </div>
                
            </div>
        </section>
        
        <!-- ##### Footer ##### -->
        <?php include_once '../' . VIEWS . 'code_footer.php' ?>        
    </body>
</html>


