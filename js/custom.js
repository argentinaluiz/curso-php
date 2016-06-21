jQuery.noConflict();
(function($){
       
    //Campos
    var status = $('#status');
    var nome_aluno = $('#nome');
    var nota_aluno = $('#nota');
    
    //Insercao de dados
    var form_inserir = $('#inserir_aluno');
    var script_inserir = 'src/inserir.php';
    //Edicao de dados
    var form_editar = $('#editar_aluno');
    var script_editar = 'src/editar.php';
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
    
    form_inserir.submit(function(event){
        event.preventDefault();
        
        if(valida_campos()){
            $.ajax({
                url: script_inserir,  
                data: $(this).serialize()                                
            });
        }
    });
    
    form_editar.submit(function(event){
        event.preventDefault();
        
        if(valida_campos()){
            $.ajax({
                url: script_editar,  
                data: $(this).serialize()                                
            });
        }
    });
    
    link_exclusao.submit(function(event){
        event.preventDefault();
        
        $.ajax({
            url: script_editar,  
            data: $(this).serialize()                                
        });
    });
    
    
})(jQuery);

