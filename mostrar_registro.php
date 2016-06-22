<?php 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id) || !isset($id)){
    header('location: index.php');
} else {
    include_once 'src/Database.php';

    $bd_host = 'localhost';
    $bd_nome = 'notas';
    $bd_login = 'root';
    $bd_senha = '';

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
    <body>
        <div class="container">
            <h1 class="text-center"><span class="glyphicon glyphicon-education"></span> Exibir registro de aluno</h1> 
            <p class="text-center">
                <a href="index.php" class="btn btn-primary" style="display: inline-block; margin-bottom: 20px">
                    <span class="glyphicon glyphicon-home"></span> Página inicial
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

<?php } ?>