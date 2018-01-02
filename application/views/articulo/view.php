<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?= $articulo['descripcion1']; ?>
              	</h3>
            </div>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_un_med1" class="control-label">Unidad de Medida 1</label>
						<div class="form-group">
							<input type="text" name="id_un_med1" value="<?=$articulo['UN_Medida_1'] ?>" class="form-control" id="id_un_med1" disabled />

						</div>
					</div>
					<div class="col-md-6">
						<label for="id_un_med2" class="control-label">Unidad de Medida 2</label>
						<div class="form-group">
							<input type="text" name="id_un_med2" value="<?=$articulo['UN_Medida_2'] ?>" class="form-control" id="id_un_med2" disabled />
						</div>
					</div>
					<div class="col-md-6">
						<label for="num_articulo" class="control-label">Número de Articulo</label>
						<div class="form-group">
							<input type="text" name="num_articulo" value="<?=$articulo['num_articulo'] ?>" class="form-control" id="num_articulo" disabled />
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion1" class="control-label">Descripcion 1</label>
						<div class="form-group">
							<input type="text" name="descripcion1" value="<?= $articulo['descripcion1']; ?>" class="form-control" id="descripcion1" disabled />
						
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion2" class="control-label">Descripcion 2</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?= $articulo['descripcion2']; ?>" class="form-control" id="descripcion2"  disabled />
						</div>
					</div>
					<div class="col-md-6">
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