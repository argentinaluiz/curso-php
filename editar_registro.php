<?php 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id) || !isset($id)){
    header('location: index.php');
} else {
    include_once 'src/Database.php';
    include_once 'src/config.php';

    try {
        $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
    } catch(PDOException $e) {
        die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
    }
    $listar = new Database($conexao);
    $aluno = $listar->listar_pelo_id($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Notas</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
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
                            <a href="index.php" class="btn btn-danger" style="margin: 10px 0 0 10px">Cancelar</a>
                            <input type="hidden" name="id" value="<?php echo $aluno['aluno_id'] ?>">
                        </div>                        
                    </form>
                    <div class="col-sm-12" id="status" style="margin-top: 20px"></div>
                </div>
            </div>         
            
        </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

<?php } ?>