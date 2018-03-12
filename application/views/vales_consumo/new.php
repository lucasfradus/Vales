<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Crear Nuevo Vale de consumo</h3>
            </div>
            <div class="pull-right">
                   <div class="box-tools ">

                </div>
            </div>

          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_requeridor" class="control-label">Solicitante</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?=$sesion->first_name.', '.$sesion->last_name ?>" class="form-control" id="id_requeridor" disabled />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sector" class="control-label"><span class="text-danger">*</span>Sector Aprobador</label>
						<div class="form-group">
							<select name="id_sector" id="id_sector" class="form-control disabled">
								<?php
								foreach($all_sector_req as $sector_req)
								{
									$selected = ($sector_req->id_sector_req == $this->input->post('id_sector')) ? ' selected="selected"' : "";

									echo '<option value="'.$sector_req->id_sector_req.'" '.$selected.'>'.$sector_req->nombre_sector.'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="articulo" ><span class="text-danger">*</span>Articulo</label>
						<div class="form-group">
						<select name="articulo" class="form-control select2" onChange="get_un_med()" style="width: 100%" id="articulo" >
						<?php
						foreach($all_productos as $articulo)
						{
						echo '<option value="'.$articulo['id_articulo'].'">'.$articulo['num_articulo'].' | '.$articulo['descripcion1'].' | '.$articulo['descripcion2'].'</option>';
						}
						?>
						</select>
						</div>
					</div>
 <div class="col-md-4">
		 <div class="form-group" id="cantidad">
				<label for="cantidad" class="control-label"><span class="text-danger">*</span>Cantidad</label>
				<input type="number" id="cant" class="form-control" name="cantidad" min="1" >

	 </div>
 </div>
 <div class="col-md-2">
		<div class="form-group" id="cantidad">
			 <label for="cantidad" class="control-label">Unidad de Medida</label>
			 <input id="suggestions" type="text" class="form-control" disabled>
	</div>
 </div>




           </div>
            <div class="box-footer">
              <button class="btn btn-success" onclick="Add_item()">
  								<i class="fa fa-plus"></i> Agregar Articulo
              </button>
              <button class="btn btn-danger" id="btn-delete-all">
								<i class="fa fa-eraser"></i> Borrar Todo
							</button>
							<button class="btn btn-danger" id="test">
								<i class="fa fa-eraser"></i> Test
							</button>


            </div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped" id="tableArticles" >
											<thead>
												<th>Id Articulo</th>
												<th>Código Articulo</th>
												<th>Descripción 1</th>
												<th>Cantidad</th>
												<th>Acciones</th>
											</thead>
											<tbody>

											</tbody>
					</table>

							</div>

			</div>	<button class="btn btn-danger pull-right" id="btn-cancel">
					<i class="fa fa-times-circle"></i> Cancelar
				</button>
				<!--<button class="btn btn-success pull-right" id="btn-confirm">-->
					<button class="btn btn-success pull-right" id="CrearVale">
						<i id="CrearValeButton" class="fa fa-check"></i> Crear Vale
				</button>

</div>







      	</div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Desea Confirmar la carga del vale?</h4>

      </div>
			<p class="modal-body" id="myModalLabel">Una vez que el vale este cargado, este no podrá ser editado</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Si</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false"  aria-hidden="true" id="pleaseWaitDialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cargando Vale...</h4>

      </div>
			<div class="modal-body">
				<!-- <div class="modal fade" id="pleaseWaitDialog"> -->
				<div class="progress">
					<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" 		style="width: 100%">

					</div>
				</div>

			</div>
			<div class="modal-footer">
        <p>Será redirigido una vez que finalice la carga</p>
      </div>
    </div>
  </div>
</div>







<script>

$("#btn-delete-all").prop('disabled', true);
$("#btn-confirm").prop('disabled', true);
$("#btn-cancel").prop('disabled', true);
$("#CrearVale").prop('disabled', true);


var total = [];
var user = {
	id_requeridor: <?=$sesion->id?>,
	id_sector:$("#id_sector").val(),
	};
//var array = JSON.stringify(user);




function Add_item(){
	console.log(base_url());
	$("#cantidad").removeClass('has-error');
	$(".help-block").remove();
	//primero valido el imput
	if($("input[name=cantidad]").val() === '' || $("input[name=cantidad]").val() <= 0){
			$("#cantidad").addClass('has-error').append('<span class="help-block">Debe ingresar una cantidad válida</span>');
	}else{
		var id_item = $( "#articulo option:selected" ).val();
		var cantidad = $("input[name=cantidad]").val();
		var nombre = $( "#articulo option:selected" ).text().split('|');
		var sector = $( "#id_sector option:selected" ).text();
		Valida_y_agrega(id_item, cantidad, nombre);

		//reseteo los campos y habilito algunos botones
		$("#id_sector").prop('disabled', true);
		$("input[name=cantidad]").val('');
		$("#btn-delete-all").prop('disabled', false);
		$("#CrearVale").prop('disabled', false);
		$("#btn-cancel").prop('disabled', false);
	}
}

function add_row(id_item, cantidad, nombre){
	var tBody = $("#tableArticles > TBODY")[0];
	row = tBody.insertRow(-1);
	row.setAttribute("id", "fila"+id_item, 0);

//aca creo la row que voy a agregar
	var cell = $(row.insertCell(-1));
          	cell.html(id_item);
			cell = $(row.insertCell(-1));
					 	cell.html(nombre[0]);
			cell = $(row.insertCell(-1));
						cell.html(nombre[1]);
			cell = $(row.insertCell(-1));
						cell.html(cantidad);
			cell = $(row.insertCell(-1));
            var btnRemove = $("<input />");
            btnRemove.attr("type", "button");
            btnRemove.attr("onclick", "Remove(this);");
						btnRemove.addClass("btn btn-xs btn-danger");
						btnRemove.val("Eliminar");
            cell.append(btnRemove);
}



function Remove(button) {
		 //Determine the reference of the Row using the Button.
		 var row = $(button).closest("TR");
		 var name = $("TD", row).eq(0).html();

				 //Get the reference of the Table.
				 var table = $("#tableArticles")[0];

				 //Delete the Table row using it's Index.
				 table.deleteRow(row[0].rowIndex);

				 if(delete_array($("TD", row).eq(0).html())){
					if(total.length<=0){
					 $("#id_sector").prop('disabled', false);
				 }
				}




 };

 function delete_array(id_item){
     for (var i=0; i < total.length; i++) {
         if (total[i].id_item == id_item) {
 							total.splice(i, 1);
 					return true;
 					break;
         }
     }
 		return false;
 }



function Valida_y_agrega(id_item, cantidad, nombre){
    for (var i=0; i < total.length; i++) {
        if (total[i].id_item === id_item) {
					console.log("entro al segundo if del search");
							total[i].cantidad = parseInt(total[i].cantidad) + parseInt(cantidad);
							$('#fila'+id_item).remove();
							add_row(id_item, total[i].cantidad, nombre);
					return true;
					break;
        }
    }
		add_row(id_item, cantidad, nombre);
		total.push(
			{
			id_item : id_item,
      descripcion: nombre[1],
			cantidad : cantidad
			}
		);
		return false;

}


//esta funcion borra el temporal de lo que se esta cargando, bloquea algunos botones y habilita el campo para cambiar el sector
$("#btn-delete-all").on("click", function(){
	if(confirm("Seguro que desea borrar todos los elementos?")){

		total = [];
		$("#tableArticles > tbody").empty();

		 $("#id_sector").prop('disabled', false);
		$("#btn-delete-all").prop('disabled', true);
		$("#btn-confirm").prop('disabled', true);
		$("#btn-cancel").prop('disabled', true);
	}
});

$("#btn-cancel").on("click", function(){
	if(confirm("Seguro que desea salir de esta pantalla? Todos los cambios se perderan.")){
		total = [];
		$("#tableArticles > tbody").html("");
		$(location).attr('href', '<?php echo site_url('vales_consumo/')?>');
	}
});

$("#test").on("click", function(){
	console.log(JSON.stringify(total));
});

var modalConfirm = function(callback){
$("#CrearVale").on("click", function(){
	$("#mi-modal").modal('show');
});

$("#modal-btn-si").on("click", function(){
	callback(true);
	$("#mi-modal").modal('hide');
});

$("#modal-btn-no").on("click", function(){
	callback(false);
	$("#mi-modal").modal('hide');
});
};

modalConfirm(function(confirm){
if(confirm){
		$("#CrearVale").prop('disabled', true);
		$("#CrearValeButton").removeClass('fa fa-check').addClass("fa fa-spin fa-refresh");
		$("#pleaseWaitDialog").modal('show');
		$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "vales_consumo/new_create",
				//le paso el array para cargar el vale nuevo x ajax, si vuelve con error es mas facil capturar.

				 data: {total_items: total,datos_user:user,sector:$( "#id_sector option:selected" ).text()},

				success: function(data) {
					if(data){
						console.log(data);
						//window.location.href = base_url()+"vales_consumo/view/"+data;
						 $(location).attr('href', base_url() + "vales_consumo/view/"+data);
					}else{
						console.log(data);
						//location.reload();
					}

				},
				error: function(data){
					console.log(data);
						//location.reload();
				}

		});
// $("#pleaseWaitDialog").modal('hide');
}else{
	//Acciones si el usuario no confirma
	//$("#result").html("NO CONFIRMADO");
}
});








   function borrar(elemento,id_vale) {
   	var id_item = elemento;
   	var id_vale = id_vale;

   					console.log("item a borrar: ", id_item);
		    		console.log("vale de consumo: ", id_vale);



		    	if (confirm('Seguro que desea eliniar este item?')) {


					    $.ajax({
						    type: "POST",
						    url: "<?php echo base_url(); ?>" + "vales_consumo/delete_item",
						     data : {id_vale:id_vale, id_articulo:id_item},


						    success: function(data) {
						    console.log("item borrado: ", data);
						    	//si esta todo ok, finalmente remuevo el item de la tabla
						    	$('#fila'+id_item).fadeOut(300, function(){ $(this).remove();});
						   		//$('#fila'+id_item).remove();
						    },
						    error: function(data){
						    	 console.log("item no borrado");
						    }
						});

		    	}else{
		    		alert('No pasa nada');
		    	}


}
</script>

<script>


function get_un_med() {
	var input_data = $( "#articulo option:selected" ).val();
	console.log("id de articulo seleccionado: ", input_data );

    if (input_data.length === 0)
    {
        $('#suggestions').hide();
    }
    else
    {

	$.ajax({
	    type: "POST",
	    url: "<?php echo base_url(); ?>" + "vales_consumo/get_un_med",
	     data: {search_data: input_data},

	    success: function(data) {
	    //	console.log("Unidad de medida correspondiente : ", data );
	    	 $('#suggestions').show();
                    $('#suggestions').val(data);
	        //alert(data.d);
	    },
	    error: function(data){
	    	//console.log("error ");
	       // alert("fail");
	    }
	});
     }
}

</script>


<script type="text/javascript">
     $(document).ready(function() {

			     $('.select2').select2();

				 });


</script>



<script>
var myApp;
myApp = myApp || (function () {
    var pleaseWaitDiv = $('<div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="modal-header"><h1>Processing...</h1></div><div class="modal-body"><div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div></div></div>');
    return {
        showPleaseWait: function() {
            pleaseWaitDiv.modal();
        },
        hidePleaseWait: function () {
            pleaseWaitDiv.modal('hide');
        },

    };
})();
</script>
