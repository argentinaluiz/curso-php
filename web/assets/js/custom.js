jQuery.noConflict();
(function($){
    var status = $('#status');
    var icon_loading = '<img src="/assets/images/loading.svg">';
    var icon_sucesso = '<span class="glyphicon glyphicon-ok"></span> ';
    var icon_erro = '<span class="glyphicon glyphicon-remove"></span> ';
    
    /**
     * Retorno de dados doscript PHP
     * @param {type} data
     * @returns {undefined}
     */
    function retorno(data){
        status.hide().html(data).fadeIn();
    }
    
    $('form#cria-post').submit(function(event){
        event.preventDefault();
        
        var campos = $(this).serializeArray();
        $.ajax({
            type: "POST",            
            url: '/posts/new',
            dataType: 'json',
            data: campos,
            beforeSend: function(){
                status.hide().html('<p class="well" style="color: #337AB7">' + icon_loading + ' Enviando ...</p>').fadeIn();
            },
            error: retorno,
            success: function(data){                
                if(data.retorno){
                    status.hide().html('<p class="alert alert-success">'+ icon_sucesso + data.mensagem +'</p>').fadeIn();
                    $(this).get(0).reset();
                } else {
                    status.hide().html('<p class="alert alert-danger">' + icon_erro + data.mensagem +'</p>').fadeIn();
                }               
            }
        });
        
    });
    
    /*
    $('form#edita-post').submit(function(event){
        event.preventDefault();        
        var campos = $(this).serializeArray();
        var ID = $('#postID').val();   
        
        $.ajax({
            type: "POST",            
            url: '/posts/update/' + ID,
            dataType: 'json',
            data: campos,
            beforeSend: function(){
                status.hide().html('<p class="well" style="color: #337AB7">' + icon_loading + ' Alterando ...</p>').fadeIn();
            },
            error: retorno,
            success: function(data){                
                if(data.retorno){
                    status.hide().html('<p class="alert alert-success">'+ icon_sucesso + data.mensagem +'</p>').fadeIn();
                } else {
                    status.hide().html('<p class="alert alert-danger">' + icon_erro + data.mensagem +'</p>').fadeIn();
                }               
            }
        });
        
    });*/
    
})(jQuery);