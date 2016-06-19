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
    <body>
        <div class="container">
            <h1 class="text-center"><span class="glyphicon glyphicon-user"></span> Todos os alunos</h1>
            <p class="text-center">
                <a href="inserir_registro.php" class="btn btn-success" style="display: inline-block; margin-bottom: 20px">
                    <span class="glyphicon glyphicon-plus-sign"></span> Inserir Novo Aluno
                </a>
            </p>
            <hr>
            <p class="text-center"><span class="glyphicon glyphicon-info-sign"></span> Para ver os dados de um aluno, clique no nome dele.</p>      
            
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">                    
                    
                    <table class="table table-striped">
                        <tr>
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-4">Nome</th>
                            <th class="col-sm-2">Nota</th>
                            <th colspan="2" class="col-sm-5"></th>
                        </tr>
                        <?php
                        
                            if($alunos->listar() > 0){
                                foreach($alunos->listar() as $todos){?>
                                <tr>
                                    <td><?php echo $todos['aluno_id'] ?></td>
                                    <td><a href="editar_registro.php?id=<?php echo $todos['aluno_id'] ?>"><?php echo $todos['aluno_nome'] ?></a></td>
                                    <td><?php echo $todos['aluno_nota'] ?></td>
                                    
                                    <td>
                                        <a href="editar_registro.php?id=<?php echo $todos['aluno_id'] ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    </td>
                                    <td>
                                        <a href="#" class="label label-danger"><span class="glyphicon glyphicon-remove"></span> Excluir</a>
                                    </td>
                                </tr>
                                <?php }
                            } else {
                                echo '<tr><td colspan="3">Nenhum registro encontrado</td></tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>         
            
        </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>