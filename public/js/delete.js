$(document).ready(function(){
    $('#alert').hide();
    $(".btn-danger").click(function(e){
        e.preventDefault(); //no cargar la pagina y capturar el evento click
        if(!confirm("¿Esta seguro que desea eliminar?")){
            return false;
        }
        //se ejecuta cy busca el tr padre 
        var row = $(this).parents('tr');
        var form = $(this).parents('form');
        var url = form.attr('action');
        //muestra  el mensaje
        $('#alert').show();
        //envia datos al mensaje y elimina el dato
        $.post(url, form.serialize(), function(result){
            row.fadeOut();
            $('#users_total').html(result.total);
            $('#alert').html(result.message);
        }).fail(function(){
            $('#alert').html('Algo Salio Mal');
        });
    });
});