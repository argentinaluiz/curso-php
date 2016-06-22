jQuery.noConflict();
(function($){
       
    //Campos
    var status = $('#status');
    var nome_aluno = $('#nome');
    var nota_aluno = $('#nota');
    
    //Inserir
    var form_inserir = $('#inserir_aluno');
    var script_inserir = 'src/inserir.php';
    //Editar
    var form_editar = $('#editar_aluno');
    var script_editar = 'src/editar.php';

    //Excluir
    var btn_excluir = $('#excluir_registro');
    var script_excluir = 'src/excluir.php';
    var link_excluir = $('.link-excluir');
    var form_excluir = $('#form_excluir');
    var status_exclusao = $('#status-exclusao');
    

          
    /**
     * Retorno de dados do Script PHP
     * @param {string} dados
     * @returns {undefined}
     */
    function retorno(dados){
       status.hide().html(dados).fadeIn();
    }
    
    /**
     * Valida os campos do formulario
     * @returns {Boolean}
     */
    function valida_campos(){
        if(!nome_aluno.val()){
            $(nome_aluno).css('border', '1px solid red');
            $(nome_aluno).focusin(function(){
                $(this).removeAttr('style');
            });
            return false;
        } else if(!nota_aluno.val()){
            $(nota_aluno).css('border', '1px solid red');
            $(nota_aluno).focusin(function(){
                $(this).removeAttr('style');
            });
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * Configuracao do Ajax
     */
    $.ajaxSetup({
        type:       'POST',
        beforeSend:  function(){
                    status.hide().html('<div class="well well-sm"><img src="images/ring-alt.svg" width="40" height="40" alt="Enviando"> Aguarde ...</div>').fadeIn();},                
        error:      retorno,            
        success:    retorno
    });
    
    //Inserir registro
    form_inserir.submit(function(event){
        event.preventDefault();
        
        if(valida_campos()){
            $.ajax({
                url: script_inserir,  
                data: $(this).serialize()                                
            });
        }
    });
    //Alterar registro
    form_editar.submit(function(event){
        event.preventDefault();
        
        if(valida_campos()){
            $.ajax({
                url: script_editar,  
                data: $(this).serialize()                                
            });
        }
    });

    link_excluir.click(function(){
        var valor_id = $(this).attr('data-id');
        $.ajax({
            dataType: "json",
            url: 'src/consulta_registro.php',  
            data: {id: valor_id},
            success: function (dados){
                $('#registro-para-excluir').html('<br><b>Nome: </b>' + dados.aluno_nome + '<br> <b>ID: </b>' + dados.aluno_id);
                $('#modal-confirmacao').modal('show');
                $('<input type="hidden" name="id" value="'+ dados.aluno_id +'">').insertAfter('#btn_excluir');
            }
        });
    });
    
    //excluir registro
    form_excluir.submit(function(event){
        event.preventDefault();
        
        $.ajax({
            url: script_excluir,  
            data: $(this).serialize(),
            beforeSend:  function(){
                status_exclusao.hide().html('<div class="well well-sm"><img src="images/ring-alt.svg" width="40" height="40" alt="Enviando"> Aguarde ...</div>').fadeIn();},
            success: function(dados){                
                $('.modal-footer').fadeOut('slow');
                status_exclusao.hide().html(dados).fadeIn();
                
                setTimeout(function(){
                    $('#modal-confirmacao').modal('hide');
                }, 1500);                
            },
            complete: function(){
                setTimeout(function(){
                    window.location="index.php";
                }, 2000);               
            }
        });
    });
    
    
})(jQuery);

