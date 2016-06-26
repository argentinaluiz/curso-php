<?php 

include_once 'src/Database.php';
include_once 'src/config.php';

try {
    $conexao = new PDO("mysql:host=$bd_host;dbname=$bd_nome; charset=utf8", $bd_login, $bd_senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch(PDOException $e) {
    die('Erro: ' . $e->getCode() . ' - ' . $e->getMessage());
}
$alunos = new Database($conexao);

include_once LAYOUT . 'code_head.php';
?>
    <body>
        <!-- Confirmacao -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-confirmacao">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Confirmação</h4>
                    </div>                 
                    
                        <div class="modal-body">
                           <p>Tem certeza que deseja excluir esse registro?</p> 
                           <p id="registro-para-excluir"></p>
                           <div id="status-exclusao"></div>
                        </div>
                        
                        <form method="post" id="form_excluir">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger" id="btn_excluir">Deletar</button>                                
                            </div>
                        </form>
                    
                </div>
            </div>
        </div><!-- /Confirmacao -->
        
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