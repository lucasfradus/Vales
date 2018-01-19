
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
    return 'http://localhost/Vales/';
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
              $('#myModal').modal('toggle');
              $('#notif').addClass("alert alert-success").append('<a href="#" class="close" data-dismiss="alert>×</a>"');
              document.getElementById('notif').innerHTML = '<strong>Exito!</strong> Vale Actualizado correctamente';
              $("#cell"+id_vale).html(data).fadeIn(600);
              $('input[name=nombre_estado]').val(data);

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

function borrar_item_preparacion(id_vale,id_item,cantidad){

 var id_item = id_item;
 var id_vale = id_vale;
 var cantidad = cantidad;

         console.log("vale de consumo: ", id_vale);
         console.log("item a borrar: ", id_item);


               $.ajax({
             type: "POST",
             url: base_url() + "vales_consumo/remove_item_vale",
              data : {id_vale:id_vale, id_articulo:id_item, cantidad:cantidad},

             success: function(data) {
             console.log("item borrado: ", data);
               //si esta todo ok, finalmente remuevo el item de la tabla
               //$('#fila'+id_item).fadeOut(600, function(){ $(this).remove();});
               $('#fila'+id_item).fadeOut(1500, function(){ $(this).remove();});
               $('#tabla_1 > tbody:last-child').append(data).fadeIn(600);
             },
             error: function(data){
                console.log("item no borrado");
             }
         });
   }

   function buscar_rol(){
      console.log("llegue");
   }
     /*
     var id_user_padre = $('#id_user').val();
     var id_sector_jerarquia = $('#role_id').val();

     console.log(id_user_padre);
      console.log(id_sector_jerarquia);

     $('#tabla').empty();
     $('#alert').empty();

     if(!id_sector_jerarquia && !id_user_padre){
       console.log("no ingreso nada");
       $('#alert').append('<span class="text-danger">Debe Ingresar al menos un criterio para realizar la busqueda. </span>');
     }else{

       $.ajax({
           type: "POST",
           url: "<?php echo base_url(); ?>" + "jerarquia/get_jerarquia",
           data : {id_sector_jerarquia:id_sector_jerarquia, id_user_padre:id_user_padre},
             success: function(data) {
               if(data){
                 $('#tabla').append(data).fadeIn(300);
               }else{
                 $('#alert').append('<span class="text-danger">No se han encontrado resultados </span>');
               }
             },
             error: function(data){
               $('#alert').append(data);

             }
       });

     }
   }*/
