<div id="notif"></div>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Vale de Consumo #<?= $vale['id_vale']; ?></h3>
            </div>

          	<div class="box-body">
      <div class="row clearfix">
					<div class="col-md-6">
						<label for="id_requeridor" class="control-label">Solicitante</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['first_name'].', '.$vale['last_name'] ?>" class="form-control" disabled />

						</div>
					</div>
					<div class="col-md-6">
						<label for="id_requeridor" class="control-label">Sector Aprobador</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_sector']?>" class="form-control"  disabled />

						</div>
					</div>
					<div class="col-md-6">
						<label for="id_requeridor" class="control-label">Estado</label>
						<div class="form-group">
              <input type="text" name="nombre_estado" value="<?= $vale['nombre_estado']?>" class="form-control"  disabled />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_requeridor" class="control-label">Fecha de creación</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= date('m/d/Y H:i:s', $vale['fecha_creado']) ?>" class="form-control"  disabled />
						</div>
					</div>
          <div class="col-md-6">
            <label for="id_requeridor" class="control-label">Modificar Estado</label>
              <div class="form-group">
                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Modificar Estado </button>
              </div>
          </div>
    </div>
			</div>
		</div>

	<div class="box box-info">
				<div class="box-header with-border">
              	<h3 class="box-title">Items Por Cargar</h3>
            </div>
                <table class="table table-striped" id=tabla_1>
                    <tread>
						<th>Código Articulo</th>
						<th>Descripción 1</th>
						<th>Cantidad Solicitada</th>
						<th id="cant">Cantidad Disponible</th>
						<th>Accion</th>
                    </tread>
                    <tbody>
                    	<?php
                    	if(isset($items)){
									foreach($items as $item){

												?>





											<tr id=<?= 'fila'.$item->id_articulo?>>

												<th><?=$item->num_articulo?></th>
												<th><?=$item->descripcion1?></th>
												<th><?=$item->cantidad?></th>
												<th>
												<div class="col-xs-5 ">
                          <input type="numeber" id="<?='item'.$item->id_articulo?>" min=0 max=<?= $item->cantidad?> class="form-control">
												</div>
												</th>
													<th>
														<button onclick="agregar(<?=$item->id_articulo?>, <?= $vale['id_vale']?>,<?= $item->cantidad?>,<?=$item->num_articulo?>)" class="btn btn-xs btn-success">
                 										 <i class="fa fa-check"></i>
               										 </button>
													</th>

										<?php
											}
										}
											?> <tr>


                    </tbody>
                </table>
            </div>

            <?php

            echo form_hidden('id_vale', $vale['id_vale']);
           ?>
            	<div class="box box-info">
				<div class="box-header with-border">
              	<h3 class="box-title">Items Cargados</h3>
            </div>
                <table class="table table-striped" id=fila2>
                    <tread>
						<th>Código Articulo</th>
						<th>Descripción 1</th>
						<th>Cantidad Solicitada</th>
						<th>Cantidad A Entregar</th>
						<th>Accion</th>
                    </tread>
                    <tbody>
               <?php
                    	if(isset($items_cargados)){
									foreach($items_cargados as $item_cargados){

												?>
										<tr id=<?= 'fila'.$item_cargados->id_articulo?> >
												<th><?=$item_cargados->num_articulo?></th>
												<th><?=$item_cargados->descripcion1?></th>
												<th><?=$item_cargados->cantidad?></th>
												<th><?=$item_cargados->cantidad_entregada?></th>

													<th>
													<button onclick="borrar_item_preparacion(<?=$item_cargados->id_vale_articulos?>,<?=$item_cargados->id_articulo?>,<?=$item_cargados->cantidad?>)" class="btn btn-xs btn-danger">
                 										 <i class="glyphicon glyphicon-remove"></i>
               										 </button>
													</th>

										<?php
											}
										}
											?> </tr>
                    </tbody>
                </table>
            </div>
	</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cambiar estado de Vale #<?=$vale['id_estado']?></h4>
        </div>
        <div class="modal-body">
            <p>Una vez que el Vale pase a estar listo para retirar se notificará al requiridor para que pase a retirarlo. Y una vez que lo haya retirado, se debe actualizar el estado a "Retirado".
            </p>
            <label for="id_sector" class="control-label"><span class="text-danger">*</span>Estado</label>
              <div class="form-group">
                          <select name="estado" class="form-control" id=EstadoVale>
                            <option value=<?= $this->config->item('EnProcesoDeArmado')?> disabled >En Proceso De Armado</option>
                            <option value=<?= $this->config->item('ListoParaRetirar')?> <?= ( $vale['id_estado'] == $this->config->item('ListoParaRetirar') ? 'disabled' : '')?>>Listo Para Retirar</option>
                            <option value=<?= $this->config->item('Retirado')?>>Retirado</option>
                          </select>
              </div>
              <div class="form-group">
                  <label for="id_sector" class="control-label"><span class="text-danger">*</span>Comentarios</label>
                  <textarea class="form-control" rows="5" name="comment" id=ComentsVale></textarea>
              </div>
        </div>
        <div class="modal-footer">
            <button onclick="update_status(<?= $vale['id_vale']?>)" class="btn btn-success" >Guardar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>

<script>
   function agregar(id_item,id_vale,cantidad_max,num_articulo) {

   	var cantidad = $('#item'+id_item).val();
    var numbers = /^[0-9]+$/;

		    		if (cantidad > cantidad_max) {
              $('#cant').css('color', 'red');
              $('#fila'+id_item).addClass( 'form-group has-error' );
              $("<small>La Cantidad a entregar no puede ser a la Cantidad Solicitada</small>").insertAfter('#item'+id_item).css('color', 'red');
						}else if(cantidad == 0){
              $('#cant').css('color', 'red');
              $('#fila'+id_item).addClass( 'form-group has-error' );
              $("<small>La Cantidad no puede ser 0</small>").insertAfter('#item'+id_item).css('color', 'red');
						}else if(!cantidad.match(numbers)){
              $('#cant').css('color', 'red');
              $('#fila'+id_item).addClass( 'form-group has-error' );
              $("<small>Solo se puede introducir numeros en este campo</small>").insertAfter('#item'+id_item).css('color', 'red');
            }else{

							    $.ajax({
						    type: "POST",
						    url: "<?php echo base_url(); ?>" + "vales_consumo/update_item_vale",
						     data : {id_vale:id_vale, id_articulo:id_item, cantidad:cantidad,status:1,num_articulo:num_articulo,cant_max:cantidad_max},


						    success: function(data) {
						   // console.log("item borrado: ", data);
						    	//si esta todo ok, finalmente remuevo el item de la tabla
                  $('#cant').css('color', 'black');
						    	$('#fila'+id_item).fadeOut(1500, function(){ $(this).remove();});
						    	$('#fila2 > tbody:last-child').append(data).fadeIn(1500);


						    	//$('#fila2 > tbody:last-child').fadeIn(300, function(){$(this).append(data);});;

						   		//$('#fila'+id_item).remove();
						    },
						    error: function(data){
                  alert('Error al querer actualizar.')
						    	// console.log("item no Agregado");
						    }
						});
						}





			}

</script>
