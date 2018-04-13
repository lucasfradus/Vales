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
            <?php echo form_open('vales_consumo/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_requeridor" class="control-label">Solicitante</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?=$sesion->first_name.', '.$sesion->last_name ?>" class="form-control" id="id_un_med1" disabled />

						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sector" class="control-label"><span class="text-danger">*</span>Sector Aprobador</label>
						<div class="form-group">
							<select name="id_sector" class="form-control" <?=  ISSET($disabled) ? $disabled : '' ?> >
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
						<label for="id_sector" ><span class="text-danger">*</span>Articulo</label>
						<div class="form-group">
						<select name="articulo" class="form-control select2" style="width: 100%" required onchange="get_un_med(this.value)">
						<?php
						foreach($all_productos as $articulo)
						{
						echo '<option value="'.$articulo['id_articulo'].'">'.$articulo['num_articulo'].' | '.$articulo['descripcion1'].' | '.$articulo['descripcion2'].'</option>';
						}
						?>
						</select>
						</div>
					</div>

                    <div class="col-md-6">
                    	<label for="cantidad" class="control-label"><span class="text-danger">*</span>Cantidad</label>
		                  <div class="input-group">
		                     <input type="number" class="form-control" name="cantidad" required min="1">
			                     <span class="input-group-addon"><div id="suggestions" ><br></div></span>
			                     <span class="text-danger"><?php echo form_error('cantidad');?></span>
		                  </div>
                 	</div>
           </div>
                    <div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-plus"></i> Agregar Articulo
            	</button>
							<?php if(isset($items)){
								?>
											<button class="btn btn-success" id="btn-confirm"><i class="fa fa-check"></i> Cargar Vale</button>
											<a href="<?php echo site_url('vales_consumo/delete_tmp/'.$vales_consumo_id);?>" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar </a>
											</button>


								<?php
							}
							?>
          	</div>
				</div>
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
    	<?php
    	if(isset($items)){
    		echo form_hidden('corrida', 2);
				echo form_hidden('vales_consumo_id', $vales_consumo_id);
					foreach($items as $item){

												?>
											<tr id=<?= 'fila'.$item->id_articulo?>>
												<th><?=$item->id_articulo?></th>
												<th><?=$item->num_articulo?></th>
												<th><?=$item->descripcion1?></th>
												<th><?=$item->cantidad?></th>
												<th>

													<button onclick="borrar(<?=$item->id_articulo?>, <?= $vales_consumo_id ?>)" class="btn btn-xs btn-danger">
                 										 <i class="glyphicon glyphicon-remove"></i>
               										 </button>

												</th>
											</tr>
										<?php
											}
                    	}else{
                    		echo form_hidden('corrida', 1);
                    	}
									?>
								</tbody>
								</table>

<?php echo form_close(); ?>
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





<script>

var modalConfirm = function(callback){

$("#btn-confirm").on("click", function(){
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
	//Acciones si el usuario confirma
	$(location).attr('href', '<?php echo site_url('vales_consumo/create/'.$vales_consumo_id);?>')
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

function get_un_med(element) {

    console.log("id de articulo seleccionado: ", element );


	var input_data = element;

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
                    $('#suggestions').html(data);
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

					 $('#tableArticles').DataTable({
						 'paging'      : true,
						 'lengthChange': true,
						 'searching'   : true,
						 'ordering'    : true,
						 'info'        : true,
						 'autoWidth'   : true,
						 "language": {
														 "lengthMenu": "Mostrar _MENU_ Resultados por página",
														 "zeroRecords": "No se han encontrado resultados",
														 "info": "Mostrando página _PAGE_ de _PAGES_ | Total de Resultados: _MAX_ ",
														 "search" : "Buscar",
														 "infoEmpty": "No se han encontrado resultados",
														 "paginate": {
																							"first":      "<<<",
																							"last":       ">>>",
																							"next":       ">>",
																							"previous":   "<<"
																					},
														 "infoFiltered": "(filtrado de  _MAX_ total de resultados)"
												 },
							"columnDefs": [{
															"targets": 'nosort',
															"orderable": false
													}]
					 })
});


</script>
