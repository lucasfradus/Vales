$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';
    $.fn.poshytip={defaults:null};
/*
Esta funcion revisa si apretaron el boton para editar el articulo que se esta viendo, y en base a eso le carga la clase correspondiente para hacer ediciones con ajax.
*/
    $("#enable").on("click", function(){
    	if($(".editable").is(":disabled")){
            $(".editable").attr('disabled', false);
            $('.editable').editable({
                     url: base_url()+'articulo/dynamic_update',
                         success: function(response, newValue) {
                         var response = jQuery.parseJSON(response);
                         //console.log(response.status);
                             if(!response.success) return response.msg;
                 }
                 });
        }else{
            //vuevlo a deshabilitar los campos.
            $(".editable").attr('disabled', true);
        }
    });







    //make status editable
    $('#status').editable({
        type: 'select',
        title: 'Select status',
        placement: 'right',
        value: 2,
        source: [
            {value: 1, text: 'status 1'},
            {value: 2, text: 'status 2'},
            {value: 3, text: 'status 3'}
        ]
        /*
        //uncomment these lines to send data on server
        ,pk: 1
        ,url: '/post'
        */
    });


});
