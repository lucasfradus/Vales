
/*
*
* Hoja de funciones js
*
*/


/*
* function base_url() devuelve la ruta base del proyecto, asi hay transparencia referencial
*
*/
function base_url() {
    return 'http://10.10.0.242/Vales/';
}




//actualiza el estado de preparacion de los vales.
function update_status(id_vale){
  var status = $('#EstadoVale').val();
  var comments = $('#ComentsVale').val();


  console.log('estado recibido: '+ status);
  console.log('comentarios recibidos: '+ comments);
  console.log('id del vale: ' + id_vale);

    $.ajax({
        type: "POST",
        url: base_url() + "vales_consumo/update_status",
        data : {id_vale:id_vale, status:status, comments:comments},
          success: function(data) {
            if(data){

            $(location).attr('href', base_url() + "vales_consumo/armado");

            }else{
              $('#myModal').modal('toggle');
              $('#notif').addClass("alert alert-error").append('<a href="#" class="close" data-dismiss="alert>×</a>"');
              document.getElementById('notif').innerHTML = '<strong>Error!</strong> Error al actualizar. Intente nuevamente';
            }




          },
          error: function(data){
            console.log(data);

          }
    });
}
