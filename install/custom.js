$(function(){
    var formConfig = $('form[name=instala-config]');
    var content = $('#content');
    var status = $('#validacao');
    var carrega = function(){                                
        status.hide().html('<div class="well well-sm"><img src="loading.svg" width="20" height="20" alt="Enviando"> Escrevendo dados ...</div>').fadeIn();};

    $('.jumbotron').hide().fadeIn(2000);

    /**
    * Retorno de dados do Script PHP
    * @param {string} dados
    * @returns {undefined}
    */
    function retorno(dados){
        if(dados === 'erro'){
            status.hide().html('<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span> Não foi possível gravar suas configurações. Verifique se o arquivo \"config.php\" tem permissão de escrita.</p>').fadeIn();
        } else if(dados === 'ok'){
            status.hide().html('<p class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> Configurações criadas com sucesso!</p>').fadeIn();            
        } else if(dados === 'fim'){
            status.hide().html('<p class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> Prontinho, site instalado!</p>').fadeIn();            
        } else {
           status.hide().html(dados).fadeIn(); 
        }      
    }

    formConfig.submit(function(e){
        e.preventDefault();

        //Validando o formulario
        var campoVazio = [];  
        //Aplicando uma função em cada valor da array
        $.map(formConfig.serializeArray(), function(valor){
            if(valor.value === ''){
                campoVazio++;
            };
        });//Map 

        //Se tiver campos vazios
        if(campoVazio > 0){
            //Mostrar mensagem de erro
            campoVazio = 0;
            status.hide().html('<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span>  Por favor, preencha todos os campos </p>').fadeIn();
            //Quando o campo ganhar o foco, dar fadeOut na mensagem de erro
            $('input').focusin(function(){
                status.fadeOut();
            });
        } else {
            //Se estiver preenchido
            $.ajax({
                url:        'instalacao.php', //Tratamento PHP
                type:       'POST', //Método de envio
                data:       formConfig.serialize(), //Pegando os valores do campo
                beforeSend: carrega,  //Processamento e/ou carregamento
                error:      retorno,  //Exibir mensagem caso de erro          
                success:    retorno, //Mensagem de sucesso
                complete:   function(){formConfig.get(0).reset();}                       
            });     
        }
    });//Submit   
});