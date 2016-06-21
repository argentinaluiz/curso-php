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
    var script_editar = 'src/excluir.php';

    //Exclusão
    var link_exclusao = $('#link-excluir');
    var form_excluir = $('#exclui_registro');
    

          
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
        success:    retorno,
        complete:   function(){form_inserir.get(0).reset();}
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
    

    btn_excluir.click(function(){
        $('#modal-excluir').modal('show');
    });

    link_exclusao.submit(function(event){
        event.preventDefault();
        
        $.ajax({
            url: script_editar,  
            data: $(this).serialize()                                
        });
    });
    
    
})(jQuery);

