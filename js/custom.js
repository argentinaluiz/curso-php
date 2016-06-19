jQuery.noConflict();
(function($){
    //Insercao de dados
    var form_inserir = $('#inserir_aluno');
    var script_inserir = 'src/inserir.php';
    var status_inserir = $('#status_inserir');
    var nome_aluno = $('#nome');
    var nota_aluno = $('#nota');
          
    /**
     * Retorno de dados do Script PHP
     * @param {string} dados
     * @returns {undefined}
     */
    function retorno(dados){
       status_inserir.hide().html(dados).fadeIn();
    }
    
    /**
     * Configuracao do Ajax
     */
    $.ajaxSetup({
        type:       'POST',        
        error:      retorno,            
        success:    retorno,
        complete:   function(){form_inserir.get(0).reset();}
    });
    
    form_inserir.submit(function(event){
        event.preventDefault();
        
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
            $.ajax({
                url: script_inserir,  
                data: $(this).serialize(),
                beforeSend:  function(){
                    status_inserir.hide().html('<div class="well well-sm"><img src="images/ring-alt.svg" width="40" height="40" alt="Enviando"> Registrando ...</div>').fadeIn();}                
            });
        }
    });
    
    
})(jQuery);

