<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?= $articulo['descripcion1']; ?>
              	</h3>
            </div>
			<div class="box-body">
				<div class="row clearfix">
          <div class="col-md-4">
						<label for="descripcion1" class="control-label">Descripcion Principal</label>
						<div class="form-group">
							<input type="text" name="descripcion1" value="<?= $articulo['descripcion1']; ?>" class="form-control" id="descripcion1" disabled />

						</div>
					</div>
					<div class="col-md-4">
						<label for="descripcion2" class="control-label">Descripcion Secundaria</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?= $articulo['descripcion2']; ?>" class="form-control" id="descripcion2"  disabled />
						</div>
					</div>
					<div class="col-md-4">
						<label for="descripcion2" class="control-label">Texto de Busqueda</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?= $articulo['texto_busqueda']; ?>" class="form-control" id="descripcion2"  disabled />
						</div>
					</div>
					<div class="col-md-2">
						<label for="id_un_med1" class="control-label">Unidad de Medida 1</label>
						<div class="form-group">
							<input type="text" name="id_un_med1" value="<?=$articulo['UN_Medida_1'] ?>" class="form-control" id="id_un_med1" disabled />
						</div>
					</div>
					<div class="col-md-2">
						<label for="id_un_med2" class="control-label">Unidad de Medida 2</label>
						<div class="form-group">
							<input type="text" name="id_un_med2" value="<?=$articulo['UN_Medida_2'] ?>" class="form-control" id="id_un_med2" disabled />
						</div>
					</div>

					<div class="col-md-2">
						<label for="num_articulo" class="control-label">Número de Articulo</label>
						<div class="form-group">
							<input type="text" name="num_articulo" value="<?=$articulo['num_articulo'] ?>" class="form-control" id="num_articulo" disabled />
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-3">
							<label for="num_articulo" class="control-label">Familia</label>
							<div class="form-group">
								<input type="text" name="num_articulo" value="<?=$articulo['FK_Familia'] ?>" class="form-control" id="num_articulo" disabled />
							</div>
					</div>
					<div class="col-md-3">
						<label for="num_articulo" class="control-label">Codigo 1</label>
						<div class="form-group">
							<input type="text" name="num_articulo" value="<?=$articulo['FK_Cod1'] ?>" class="form-control" id="num_articulo" disabled />
						</div>
				</div>
				<div class="col-md-3">
					<label for="num_articulo" class="control-label">Codigo 2</label>
					<div class="form-group">
						<input type="text" name="num_articulo" value="<?=$articulo['FK_Cod2'] ?>" class="form-control" id="num_articulo" disabled />
					</div>
			</div>
			<div class="col-md-3">
				<label for="num_articulo" class="control-label">Codigo 3</label>
				<div class="form-group">
					<input type="text" name="num_articulo" value="<?=$articulo['FK_Cod3'] ?>" class="form-control" id="num_articulo" disabled />
				</div>
		</div>
					</div>

					<div class="col-md-6">
						<div class="col-md-3">
							<label for="descripcion2" class="control-label">Pto de Venta</label>
							<div class="form-group">
								<input type="text" name="descripcion2" value="<?= $articulo['pto_venta']; ?>" class="form-control" id="descripcion2"  disabled />
							</div>
						</div>
						<div class="col-md-3">
							<label for="descripcion2" class="control-label">Tipo Almacenamiento</label>
							<div class="form-group">
								<input type="text" name="descripcion2" value="<?= $articulo['tipo_almacenamiento']; ?>" class="form-control" id="descripcion2"  disabled />
							</div>
						</div>
						<div class="col-md-3">
							<label for="descripcion2" class="control-label">Tipo de Linea</label>
							<div class="form-group">
								<input type="text" name="descripcion2" value="<?= $articulo['tipo_linea']; ?>" class="form-control" id="descripcion2"  disabled />
							</div>
						</div>
						<div class="col-md-3">
							<label for="descripcion2" class="control-label">Status</label>
							<div class="form-group">

										<?php if($articulo['status'] === '1'): ?>
			                                <h4><span class="label label-success"><?php echo "Activo"; ?></span> </h4>
			                              <?php else: ?>
			                                <h4><span class="label label-danger"><?php echo "Desactivado"; ?></span></h4>
			                              <?php endif;?>

							</div>
							</div>
					</div>

				</div>
			</div>
		</div>
    </div>
</div>
