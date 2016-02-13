<?php 
if(empty($_POST)){
    header('location: index.php'); 
} else{
?>

<div class="col-sm-5">
    <h2>Fale Conosco</h2>
    
    <p class="alert alert-success" role="alert">
        <span class="glyphicon glyphicon-ok"></span> Dados enviados com sucesso! abaixo seguem os dados que você enviou.      
    </p>
    
    <p>
        <b>Nome:</b> <?php echo $_POST['nome'] ?> <br>
        <b>e-Mail:</b> <?php echo $_POST['email'] ?> <br>
        <b>Assunto:</b> <?php echo $_POST['assunto'] ?> <br>
        <b>Mensagem:</b> <?php echo $_POST['mensagem'] ?> <br>
    </p>
</div>
<div class="col-sm-7">
    
    <div class="row">
        <h2 class="col-sm-12">Omnis obcaecati dignissimos corporis animi.</h2>
        <div class="col-sm-3">
            <img src="http://lorempixel.com/200/300/sports/" alt="Business" class="img-responsive">
        </div>
        <div class="col-sm-9">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, veritatis, tenetur, mollitia officiis qui quidem necessitatibus facere cum ducimus sequi perspiciatis quisquam vitae eos recusandae consequatur neque aspernatur minus sit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, ullam, nobis, necessitatibus, natus nisi quod velit accusantium asperiores rerum debitis tempora vel minima iure voluptates aspernatur fugit perspiciatis facere odio!</p>
            <p><a href="#" class="btn btn-default">Adipisicing elit!</a></p>
        </div>
    </div>         
    <div class="row">
        <h2 class="col-sm-12">Natus nisi quod velit accusantium asperiores.</h2>
        <div class="col-sm-3">
            <img src="http://lorempixel.com/200/300/transport/" alt="Business" class="img-responsive">
        </div>
        <div class="col-sm-9">
            <p>Ullam, nobis, necessitatibus, natus nisi quod velit accusantium asperiores rerum debitis tempora vel minima iure voluptates aspernatur fugit perspiciatis facere odio!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, veritatis, tenetur, mollitia officiis qui quidem necessitatibus facere cum ducimus sequi perspiciatis quisquam vitae eos recusandae consequatur neque aspernatur minus sit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis.</p>
            <p><a href="#" class="btn btn-default">Recusandae consequatur</a></p>
        </div>
    </div> 
        
</div>
<?php } ?>


