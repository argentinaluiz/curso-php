<?php 

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
$alunos = new Database($conexao);
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
            <h1 class="text-center"><span class="glyphicon glyphicon-plus-sign"></span> Registro de novo aluno</h1>            
            <hr>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <form id="inserir_aluno" class="form-group" method="post">
                        <div class="col-sm-12">
                            <label for="nome">Nome do aluno</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                        <div class="col-sm-5">
                            <label for="nota">Nota<small> (Insira nota de 0 a 10)</small></label>
                            <input type="number" name="nota" id="nota" class="form-control" min="0" max="10">                            
                        </div>                        
                        <div class="col-sm-12">
                            <input type="submit" value="Registrar" class="btn btn-primary" style="margin-top: 10px">
                        </div>                        
                    </form>
                    <div class="col-sm-12" id="status_inserir" style="margin-top: 20px"></div>
                </div>
            </div>         
            
        </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>