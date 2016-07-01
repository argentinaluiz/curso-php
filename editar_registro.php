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
        header('location: index.php');
    } else {
        
        $listar = new Database($conexao);
        $aluno = $listar->listar_pelo_id($id);

        include_once LAYOUT . 'code_head.php';
    ?>
    <style>
        input{margin-bottom: 10px;}
    </style>
    <body>
        <div class="container">
            <h1 class="text-center"><span class="glyphicon glyphicon-pencil"></span> Editar registro de aluno</h1> 
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
                    <form id="editar_aluno" class="form-group" method="post">
                        <div class="col-sm-3">
                            <label for="id">ID do aluno</label>
                            <input type="text" name="id" id="id" class="form-control" value="<?php echo $aluno['aluno_id'] ?>" readonly="true">
                        </div>
                        <div class="col-sm-12">
                            <label for="nome">Nome do aluno</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $aluno['aluno_nome'] ?>">
                        </div>
                        <div class="col-sm-5">
                            <label for="nota">Nota<small> (Insira nota de 0 a 10)</small></label>
                            <input type="number" name="nota" id="nota" class="form-control" min="0" max="10" value="<?php echo $aluno['aluno_nota'] ?>">                            
                        </div>                        
                        <div class="col-sm-12">
                            <input type="submit" value="Alterar" class="btn btn-success" style="margin-top: 10px">
                            <a href="<?php echo ROOT ?>" class="btn btn-danger" style="margin: 10px 0 0 10px">Cancelar</a>
                            <input type="hidden" name="id" value="<?php echo $aluno['aluno_id'] ?>">
                        </div>                        
                    </form>
                    <div class="col-sm-12" id="status" style="margin-top: 20px"></div>
                </div>
            </div>         
            
        </div>
    
    <?php include_once LAYOUT . 'code_footer.php'; ?>
  </body>
</html>

<?php 
    }
} else {
    header('location: ' . ROOT);    
}