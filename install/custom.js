$(function(){
    var formConfig = $('form[name=instala-config]');
    var content = $('#content');
    var status = $('#validacao');
    var msgSucesso = '<p class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span>  Configuração criada com sucesso!</p>';
    var msgErro = '<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span>  Não foi possível gravar suas configurações. Verifique se o arquivo \"config.php\" tem permissão de escrita.</p>';
    var carrega = function(){                                
        status.hide().html('<div class="well well-sm"><img src="loading.svg" width="20" height="20" alt="Enviando"> Escrevendo dados ...</div>').fadeIn();};

    $('.jumbotron').hide().fadeIn(2000);

    /**
    * Retorno de dados do Script PHP
    * @param {string} dados
    * @returns {undefined}
    */
    function retorno(dados){
        status.hide().html(dados).fadeIn();
    }
    
    function retornoSucesso(dados){ 
        if(dados === 'erro'){
            status.hide().html(msgErro).fadeIn();
        } else if(dados === 'ok'){
            status.hide().html(msgSucesso).fadeIn();
            //Esperar 1,5 seg e apagar mensagem de sucesso
            setTimeout(function(){
                status.fadeOut(1000);                                    
            }, 2000);
            //Esperar 2,5 seg e trocar o botão para seguir para o passo final
            setTimeout(function(){
                $('#submit').hide().empty();
                $('<a id="passo2" class="btn btn-success" title="2º passo">Ir para o 2º passo</a>').appendTo('#submit');
                $('#submit').fadeIn();

                $('#passo2').click(function(){
                    content.slideUp(1000, function(){
                        content.load('instala_bd.html', function(){
                            $(this).slideDown(1000);
                            $('#instala-bd').click(function(){
                                alert('func!');
                                /*$.ajax({
                                    url:        'fixture.php', //Tratamento PHP
                                    type:       'POST', //Método de envio
                                    beforeSend: carrega,  //Processamento e/ou carregamento
                                    error:      retorno,  //Exibir mensagem caso de erro          
                                    success:    retorno //Mensagem de sucesso                      
                                });*/
                            });
                        });
                    });
                });
            }, 2800);
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
                url:        'registra_config.php', //Tratamento PHP
                type:       'POST', //Método de envio
                data:       formConfig.serialize(), //Pegando os valores do campo
                beforeSend: carrega,  //Processamento e/ou carregamento
                error:      retorno,  //Exibir mensagem caso de erro          
                success:    retornoSucesso, //Mensagem de sucesso
                complete:   function(){formConfig.get(0).reset();}                       
            });     
        }
    });//Submit   
});