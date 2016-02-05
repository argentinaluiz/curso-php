$(function(){
    var formConfig = $('form[name=instala-config]');
    var content = $('#content');
    var escreveConfig = 'registra_config.php';
    var status = $('#validacao');

    content.hide().slideDown(1000);

    function apagaConteudo(container){
        container.slideUp(1000, function(){
            $(this).empty;
        });
    }

    /**
    * Retorno de dados do Script PHP
    * @param {string} dados
    * @returns {undefined}
    */
    function retorno(dados){
        status.hide().html(dados).fadeIn();
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
                url:        escreveConfig, //Tratamento PHP
                type:       'POST', //Método de envio
                data:       jQuery(this).serialize(), //Pegando os valores do campo
                beforeSend:  function(){//Processamento e/ou carregamento                                
                    status.hide().html('<div class="well well-sm"><img src="loading.svg" width="20" height="20" alt="Enviando"> Escrevendo dados ...</div>').fadeIn();
                },
                error:      retorno,  //Exibir mensagem caso de erro          
                success:    function(){ //O que fazer depois que tudo finalizou com sucesso
                    //Apagar formulário
                    formConfig.get(0).reset(); 
                    //Esperar 0,5 seg e apagar mensagem de sucesso
                    setTimeout(function(){
                        status.fadeOut(500);                                    
                    }, 1000);
                    //Esperar 2 seg e trocar o botão para seguir para o passo final
                    setTimeout(function(){
                        $('#submit').hide().empty();
                        $('<a id="passo2" class="btn btn-success" title="2º passo">Ir para o 2º passo</a>').appendTo('#submit');
                        $('#submit').fadeIn();
                        
                        $('#passo2').click(function(){
                            content.slideUp(1000, function(){
                                content.load('instala_bd.html', function(){
                                    $(this).slideDown(1000);
                                });
                            });
                        });
                        
                    }, 2000);                    
                }   
            });            
            
        }
    });//Submit
});