jQuery.noConflict();
(function($){
    var form = $('form#cria-post');
    var status = $('#status');
    var script_php = '/posts/new';
    
    /**
     * Retorno de dados doscript PHP
     * @param {type} data
     * @returns {undefined}
     */
    function retorno(data){
        status.hide().html(data).fadeIn();
    }
    
    form.submit(function(event){
        event.preventDefault();
        
        var campos = form.serializeArray();
        $.ajax({
            type: "POST",            
            url: script_php,
            dataType: 'json',
            data: campos,
            beforeSend: function(){
                status.hide().html('<p class="well" style="color: #337AB7"><img src="/assets/images/loading.svg"> Enviando ...</p>').fadeIn();
            },
            error: retorno,
            success: function(data){                
                if(data.retorno){
                    status.hide().html('<p class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> '+ data.mensagem +'</p>').fadeIn();
                    form.get(0).reset();
                } else {
                    status.hide().html('<p class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> '+ data.mensagem +'</p>').fadeIn();
                }               
            }
        });
        
    });
    
})(jQuery);