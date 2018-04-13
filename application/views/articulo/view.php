
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

		    <script src="<?php echo site_url('resources/js/mainaas.js');?>"></script>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?= $articulo['descripcion1']; ?> <button id="enable" class="btn btn-default">Editar</button>
              	</h3>
            </div>
			<div class="box-body">
				<div class="row clearfix">
          <div class="col-md-4">
						<label for="descripcion1" class="control-label">Descripcion Principal</label>
						<div class="form-group">
							<a href="#" id="descripcion1" class="form-control editable"  data-pk=<?=$articulo['id_articulo'];?> data-type="text" data-title="Ingrese la Descripcion Principal" data-type="text" data-name="descripcion1" disabled><?= $articulo['descripcion1']; ?></a>
							<!-- <input type="text" data-pk=<?=$articulo['id_articulo'];?> data-title="Ingrese la Descripcion 1" data-type="text" data-placement="right" data-name="descripcion1" value="<?= $articulo['descripcion1']; ?>" class="form-control" id="descripcion1" disabled > -->
						</div>
					</div>
					<div class="col-md-4">
						<label for="descripcion2" class="control-label">Descripcion Secundaria</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?= $articulo['descripcion2']; ?>" class="form-control editable" id="descripcion2"  disabled />
						</div>
					</div>
					<div class="col-md-4">
						<label for="descripcion2" class="control-label">Texto de Busqueda</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?= $articulo['texto_busqueda']; ?>" class="form-control editable" id="descripcion2"  disabled />
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
							<a id="num_articulo" type="text" name="num_articulo" value="<?=$articulo['num_articulo'] ?>" class="form-control editable"  data-pk=<?=$articulo['id_articulo'];?> data-title="Ingrese el Numero de Articulo" data-type="text" data-name="num_articulo" disabled><?= $articulo['num_articulo']; ?></a>
              <!-- <a href="#" id="num_articulo" class="form-control editable"  data-pk=<?=$articulo['id_articulo'];?> data-type="text" data-title="Ingrese el Numero de Articulo" data-type="text" data-name="num_articulo" ><?= $articulo['num_articulo']; ?></a> -->
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
