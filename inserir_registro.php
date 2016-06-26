<?php 
    require 'src/config.php';
    include_once LAYOUT . 'code_head.php';
?>
    <style>
        input{margin-bottom: 10px;}
    </style>
    <body>
        <div class="container">
            <h1 class="text-center"><span class="glyphicon glyphicon-plus-sign"></span> Registro de novo aluno</h1> 
            <p class="text-center">
                <a href="index.php" class="btn btn-primary" style="display: inline-block; margin-bottom: 20px">
                    <span class="glyphicon glyphicon-home"></span> Página inicial
                </a>
            </p>
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
                            <input type="submit" value="Registrar" class="btn btn-success" style="margin-top: 10px">
                            <a href="index.php" class="btn btn-danger" style="margin: 10px 0 0 10px">Cancelar</a>
                        </div>                        
                    </form>
                    <div class="col-sm-12" id="status" style="margin-top: 20px"></div>
                </div>
            </div>         
            
        </div>
    
    <?php include_once LAYOUT . 'code_footer.php'; ?>
  </body>
</html>