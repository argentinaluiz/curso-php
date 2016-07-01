<?php
session_start();

include_once '/src/config.php';
include_once SRC . 'Database.php';
include_once SRC . 'Login.php';

//Tenta conectar
try {
    $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch(PDOException $e) {
    die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
}

$aut = new Login($conexao);

//Se o usuario esta logado
if(!$aut->session_check()){
    include_once LAYOUT . 'code_head.php'; 
?>
    <body>
        <!-- ####### Formulario de login ####### -->
        <div class="container">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                <div class="panel panel-default" style="margin-top: 30px">
                    <!-- Titulo -->
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2 class="text-center">Login</h2>
                        </div>
                    </div>

                    <div id="login-form" class="panel-body" >
                        <form id="login-admin" method="post" action="<?php echo SRC ?>autentica_usuario.php">
                            <div class="input-group" style="margin-bottom: 8px">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" name="login" class="form-control" placeholder="Usuário">
                            </div>
                            <div class="input-group" style="margin-bottom: 8px">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-option-horizontal"></span>
                                </span>
                                <input type="password" name="senha" class="form-control" placeholder="Senha">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Login" class="btn btn-primary">
                            </div>
                        </form>                        
                    </div>

                </div>

            </div>
        </div><!-- /Formulario de login -->
        
    <?php include_once LAYOUT . 'code_footer.php'; ?>    
  </body>
</html>
<?php } else {
    header('location: /main.php');    
}