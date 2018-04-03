<div class="row">
    <div class="col-md-12">
      	<div class="box box-success">
            <div class="box-header with-border">
              	<h3 class="box-title">Vale de Consumo #<?= $vale['id_vale']; ?></h3>
            </div>

    <div class="box-body">
      <div class="row clearfix">
					<div class="col-xs-2">
						<label for="id_requeridor" class="control-label">Solicitante</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['first_name'].', '.$vale['last_name'] ?>" class="form-control" disabled />
						</div>
						<button type="button" class="btn btn btn-default btn-bg" data-toggle="modal" data-target="#message<?php echo $vale['id_vale'];?>">Modificar Estado</button>
					</div>
					<div class="col-xs-2">
						<label for="id_requeridor" class="control-label">Sector Aprobador</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_sector']?>" class="form-control"  disabled />

						</div>
					</div>
					<div class="col-xs-2">
						<label for="id_requeridor" class="control-label">Tipo de Vale</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['id_tipo']==$this->config->item('Tipo_Pañol') ? 'Pañol' : 'M. Prima'?>" class="form-control"  disabled />
						</div>
					</div>
					<div class="col-xs-2">
						<label for="id_requeridor" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_estado']?>" class="form-control"  disabled />
						</div>
					</div>
					<div class="col-xs-2">
						<label for="id_requeridor" class="control-label">Motivo</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_motivo'] ?>" class="form-control"  disabled />
						</div>
					</div>
          <div class="col-xs-2">
            <label for="id_requeridor" class="control-label">Fecha de creación</label>
            <div class="form-group">
              <input type="text" name="id_requeridor" value="<?= date('m/d/Y H:i:s', $vale['fecha_creado']) ?>" class="form-control"  disabled />
            </div>
          </div>

        </div>
			</div>
		</div>

		<div class="box box-info">
				<div class="box-header with-border">
						<h3 class="box-title">Items Cargados</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
				</div>
					<div class="box-body">
                <table class="table table-striped">
                    <tread>
						<th>Código Articulo</th>
						<th>Descripción 1</th>
						<th>Descripción 2</th>
						<th>Cantidad Solicitada</th>
            <th>Cantidad Entregada</th>
                    </tread>
                    <tbody>
                    	<?php
                    	if(isset($items)){
									foreach($items as $item){
												?>
											<tr>

												<th><?=$item->num_articulo?></th>
												<th><?=$item->descripcion1?></th>
												<th><?=$item->descripcion2?></th>
												<th><?=$item->cantidad?></th>
                        <th><?=$item->cantidad_entregada?></th>
										<?php
											}
										}
											?>
											<tr>
                    </tbody>
                </table>
            </div>
					</div>
					</div>
				</div>

        <div id="message<?= $vale['id_vale'];?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <!-- Modal content-->
                        <?php echo form_open('vales_consumo/UpdateStatusAprobacion'); ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Cambiar estado de Vale #<?= $vale['id_vale']?></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-6">
                                    <label for="id_requeridor" class="control-label">Solicitante</label>
                                        <div class="form-group">
                                            <input type="text" name="id_requeridor" value="<?= $vale['username'] ?>" class="form-control" id="id_un_med1" disabled />
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                    <label for="id_requeridor" class="control-label">Fecha de Creacion</label>
                                        <div class="form-group">
                                            <input type="text" name="id_requeridor" value="<?= date('m/d/Y H:i:s', $vale['fecha_creado']); ?>" class="form-control" disabled />
                                        </div>
                                    </div>
                                    <p>Una vez que el vale se encuentre aprobado, este pasará a preparacion.</p>
                                <label for="id_sector" class="control-label"><span class="text-danger">*</span>Estado</label>
                                    <div class="form-group">
                                                <select name="estado" class="form-control">

                                                    <?php
                                                    foreach($estado as $e)
                                                    {
                                                        if($vale['id_aprobacion']==$e['id_estado_aprobacion_fk']){
                                                            $disabled='disabled';
                                                        }
                                                        else{
                                                            $disabled='';
                                                        }
                                                        echo '<option value="'.$e['id_estado_aprobacion_fk'].'"'.$disabled.'>'.$e['nombre_estado_aprobacion'].'</option>';
                                                    }
                                                    ?>
                                                </select>

                                        <label for="id_sector" class="control-label"><span class="text-danger">*</span>Comentarios</label>
                                        <textarea class="form-control" rows="5" name="comment"></textarea>
                                        <?= form_hidden('id_vale', $vale['id_vale']);   ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?= form_close(); ?>
