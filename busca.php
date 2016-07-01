<?php 
session_start();

include_once '/src/config.php';
include_once SRC . 'Database.php';
include_once SRC . 'Login.php';

$buscar_por = filter_input(INPUT_GET, 'busca-aluno', FILTER_SANITIZE_STRING);

//Tenta conectar
try {
    $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch(PDOException $e) {
    die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
}

$aut = new Login($conexao);

//Se o usuario esta logado
if($aut->session_check()){    

    if(empty($buscar_por) || !isset($buscar_por)){
        header('location: ' . ROOT);
    } else {
        
        $listar = new Database($conexao);
        
        include_once LAYOUT . 'code_head.php';
    ?>
    <style>
        input{margin-bottom: 10px;}
    </style>
    <body>
        <div class="container">
            <h1 class="text-center"><span class="glyphicon glyphicon-search"></span> Resultado da busca</h1> 
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

                        <table class="table table-striped">                            
                            <tr>
                                <th class="col-sm-1">ID</th>
                                <th class="col-sm-4">Nome</th>
                                <th class="col-sm-2">Nota</th>
                                <th colspan="2" class="col-sm-5"></th>
                            </tr>
                            <?php

                                if($listar->listar_busca($buscar_por) > 0){
                                    foreach($listar->listar_busca($buscar_por) as $todos){?>
                                    <tr>
                                        <td><?php echo $todos['aluno_id'] ?></td>
                                        <td><a href="mostrar_registro.php?id=<?php echo $todos['aluno_id'] ?>"><?php echo $todos['aluno_nome'] ?></a></td>
                                        <td><?php echo $todos['aluno_nota'] ?></td>

                                        <td>
                                            <a href="editar_registro.php?id=<?php echo $todos['aluno_id'] ?>" class="label label-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                        </td>
                                        <td>
                                            <a href="#" data-id="<?php echo $todos['aluno_id'] ?>" class="label label-danger link-excluir" style="border: none">
                                                <span class="glyphicon glyphicon-remove"></span> Excluir
                                            </a>
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
    
    <?php include_once LAYOUT . 'code_footer.php'; ?>
  </body>
</html>

<?php 
    }
} else {
    header('location: ' . ROOT);    
}