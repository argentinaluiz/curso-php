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
if($aut->session_check()){

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(empty($id) || !isset($id)){
        header('location: ' . ROOT);
    } else {
        
        $listar = new Database($conexao);
        $aluno = $listar->listar_pelo_id($id);

        include_once LAYOUT . 'code_head.php';
    ?>

    <body>
        <div class="container">
            <h1 class="text-center"><span class="glyphicon glyphicon-education"></span> Exibir registro de aluno</h1> 
            <p class="text-center">
                <a href="index.php" class="btn btn-primary" style="display: inline-block; margin-bottom: 20px">
                    <span class="glyphicon glyphicon-home"></span> Página inicial
                </a>
                <a href="<?php echo SRC ?>logout.php" class="btn btn-danger" style="display: inline-block; margin-bottom: 20px">
                    <span class="glyphicon glyphicon-off"></span> Logout
                </a>
            </p>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3"> 
                    <p>
                        <b>ID do aluno: </b><?php echo $aluno['aluno_id'] ?><br>
                        <b>Nome:</b> <?php echo $aluno['aluno_nome'] ?><br>
                        <b>Nota:</b> <?php echo $aluno['aluno_nota'] ?>                                
                    </p>                        
                </div>
            </div>         
            
        </div>
    
    <?php include_once LAYOUT . 'code_footer.php'; ?>
  </body>
</html>

<?php }

} else {
    header('location: ' . ROOT);    
}