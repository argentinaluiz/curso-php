<div class="col-sm-5">
    <h2>Fale Conosco</h2>
    <form action="/resposta-form" method="post" id="contato">
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="email">e-Mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="assunto">Assunto</label>
            <input type="text" name="assunto" id="assunto" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
        <div id="status-form"></div>
        
    </form>
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
<script>
    $(function(){
        var form = $('form#contato');
        var status = $('div#status-form');
        var vazio = 0;
        
        form.submit(function(){            
            $.map(form.serializeArray(), function(valor){
                if(valor.value === ''){
                    vazio++;
                };
            });//Map
            
            if(vazio > 0){
                vazio = 0;
                status.hide().html('<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span>  Por favor, preencha todos os campos </p>').fadeIn();
                $('input, textarea').focusin(function(){
                    status.fadeOut();
                });
                return false;
            }
        });//Submit
        
    });
</script>