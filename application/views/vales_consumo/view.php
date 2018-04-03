<div class="row">
    <div class="col-md-12">
      	<div class="box box-success">

            <div class="box-header with-border">
              	<h3 class="box-title">Vale de Consumo #<?= $vale['id_vale']; ?></h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
            </div>


    <div class="box-body">

      <div class="row clearfix">
					<div class="col-xs-3">
						<label for="id_requeridor" class="control-label">Solicitante</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['first_name'].', '.$vale['last_name'] ?>" class="form-control" disabled />
						</div>
					</div>
					<div class="col-xs-3">
						<label for="id_requeridor" class="control-label">Sector Aprobador</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_sector']?>" class="form-control"  disabled />

						</div>
					</div>
					<div class="col-xs-3">
						<label for="id_requeridor" class="control-label">Tipo de Vale</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['id_tipo']==$this->config->item('Tipo_Pañol') ? 'Pañol' : 'M. Prima'?>" class="form-control"  disabled />
						</div>
					</div>
					<div class="col-xs-3">
						<label for="id_requeridor" class="control-label">Aprobacion</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_estado_aprobacion']?>" class="form-control"  disabled />
						</div>
					</div>
					<div class="col-xs-3">
						<label for="id_requeridor" class="control-label">Preparacion</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_estado']?>" class="form-control"  disabled />
						</div>
					</div>
					<div class="col-xs-3">
						<label for="id_requeridor" class="control-label">Motivo</label>
						<div class="form-group">
							<input type="text" name="id_requeridor" value="<?= $vale['nombre_motivo'] ?>" class="form-control"  disabled />
						</div>
					</div>
          <div class="col-xs-3">
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

						<div class="box box-default collapsed-box">
								<div class="box-header with-border">
										<h3 class="box-title">Estado de Preparacion</h3>
											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
												<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
											</div>
								</div>
								<div class="box-body">
                <table class="table table-striped">
                    <tread>
						<th>Estado</th>
						<th>Fecha </th>
						<th>Responsable</th>
						<th>Observaciones</th>
                    </tread>
                    <tbody>
                    	<?php
                    		foreach($evolucion as $e){
												?>
											<tr>
												<th><?=$e->nombre_estado?></th>
												<th><?=date('m/d/Y H:i:s', $e->fecha)?></th>
												<th><?=$e->first_name.', '.$e->last_name?></th>
												<th><?=$e->observacion?></th>


										<?php
											} ?>

      				</tbody>
                </table>
            </div>
					</div>

			<div class="box box-default collapsed-box">
					<div class="box-header with-border">
							<h3 class="box-title">Estado de Aprobación</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
					</div>
					<div class="box-body">
                <table class="table table-striped">
                    <tread>
											<th>Estado</th>
											<th>Fecha </th>
											<th>Responsable</th>
											<th>Comentarios</th>
                    </tread>
                    <tbody>
                    	<?php
                    		foreach($aprobacion as $a){
												?>
											<tr>
												<th><?=$a->nombre_estado_aprobacion?></th>
												<th><?=date('m/d/Y H:i:s', $a->fecha_aprobacion)?></th>
												<th><?=$a->first_name.', '.$a->last_name?></th>
												<th><?=$a->comentarios_aprobacion?></th>
										<?php
											} ?>
      						</tbody>
                </table>
								</div>
						</div>
					</div>
				</div>
