<?php
$bd_host = 'localhost';
$bd_nome = 'notas';
$bd_login = 'root';
$bd_senha = '';

try {
    $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch(PDOException $e) {
    die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
}

$sql1 = 'SELECT * FROM alunos';
$query1 = $conexao->prepare($sql1);

if($query1->execute()){
    $todos = $query1->fetchAll(PDO::FETCH_ASSOC);
} else {
    die('<br>' . print_r($query1->errorInfo(), true) . '<br>');
}

$sql2 = 'SELECT * FROM alunos ORDER BY aluno_nota ASC LIMIT 3';
$query2 = $conexao->prepare($sql2);

if($query2->execute()){
    $tres = $query2->fetchAll(PDO::FETCH_ASSOC);
} else {
    die('<br>' . print_r($query2->errorInfo(), true) . '<br>');
}
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
            <h1 class="text-center">Notas dos alunos</h1>
            <hr>
            <h2 class="text-center">Menores Notas</h2>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nota</th>
                        </tr>
                        <?php
                        $loop_3 = count($tres);
                            if($loop_3 > 0){

                                for($i = 0; $i < $loop_3; $i++){?>
                                <tr>
                                    <td><?php echo $tres[$i]['aluno_id'] ?></td>
                                    <td><?php echo $tres[$i]['aluno_nome'] ?></td>
                                    <td><?php echo $tres[$i]['aluno_nota'] ?></td>
                                </tr>
                                <?php }

                            } else {
                                echo '<tr><td colspan="3">Nenhum registro encontrado</td></tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>
            
            <h2 class="text-center">Todas as Notas</h2>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nota</th>
                        </tr>
                        <?php 
                        $loop_todos = count($todos);
                            if($loop_todos > 0){

                                for($i = 0; $i < $loop_todos; $i++){?>
                                <tr>
                                    <td><?php echo $todos[$i]['aluno_id'] ?></td>
                                    <td><?php echo $todos[$i]['aluno_nome'] ?></td>
                                    <td><?php echo $todos[$i]['aluno_nota'] ?></td>
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

