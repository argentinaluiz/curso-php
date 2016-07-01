<?php
    require 'src/config.php';
    include_once LAYOUT . 'code_head.php'; 
?>
    <body>
        <!-- ####### Formulario de login ####### -->
        <div class="container">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                <div class="panel panel-default" style="margin-top: 30px">
                    <!-- Titulo -->
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2 class="text-center">Login</h2>
                        </div>
                    </div>

                    <div id="login-form" class="panel-body" >
                        <form id="login-admin" method="post" action="<?php echo SRC ?>autentica_usuario.php">
                            <div class="input-group" style="margin-bottom: 8px">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" name="login" class="form-control" placeholder="Usuário">
                            </div>
                            <div class="input-group" style="margin-bottom: 8px">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-option-horizontal"></span>
                                </span>
                                <input type="password" name="senha" class="form-control" placeholder="Senha">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Login" class="btn btn-primary">
                            </div>
                        </form>                        
                    </div>

                </div>

            </div>
        </div><!-- /Formulario de login -->
        
    <?php include_once LAYOUT . 'code_footer.php'; ?>    
  </body>
</html>
