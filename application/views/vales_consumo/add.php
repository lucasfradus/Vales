



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
					 	<label for="id_sector" class="control-label"><span class="text-danger">*</span>Articulo</label>
                            <div class="form-group">
										<select name="articulo" class="form-control select2" onchange="get_un_med(this.value)">
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
          	</div>
				</div>
			</div>




</div>





			<div class="box-body">
                <table class="table table-striped">
                    <tread>
						<th>Id Articulo</th>
						<th>Código Articulo</th>
						<th>Descripción 1</th>
						<th>Cantidad</th>
						<th>Acciones</th>
                    </tread>
                    <tbody>
                    	<?php
                    	if(isset($items)){
                    		echo form_hidden('corrida', FALSE);
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

										<?php
											}
											?> <tr>

													<div class="box-footer">
														<a href="<?php echo site_url('vales_consumo/create/'.$vales_consumo_id);?>" class="btn btn-success"><i class="fa fa-check"></i> Cargar Vale</a>
										            	<a href="<?php echo site_url('vales_consumo/delete_tmp/'.$vales_consumo_id);?>" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar </a>
										            	</button>
										          	</div>
												<?php

                    	}else{
                    		echo form_hidden('corrida', TRUE);
                    	}
									?>


                    </tbody>
                </table>
            </div>

          	 <?php echo form_close(); ?>
      	</div>
    </div>
</div>


<script>
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


<script>
  $('.select2').select2();

</script>
