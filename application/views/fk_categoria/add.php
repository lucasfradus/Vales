<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Fk Categoria Add</h3>
            </div>
            <?php echo form_open('fk_categoria/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="codigo_categoria" class="control-label"><span class="text-danger">*</span>Codigo Categoria</label>
						<div class="form-group">
							<select name="codigo_categoria" class="form-control">
									<option value="Cod1">COD1</option>
									<option value="Cod2">COD2</option>
									<option value="Cod3">COD3</option>
									<option value="Familia">Familia</option>
							</select>
							<span class="text-danger"><?php echo form_error('codigo_categoria');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombre_categoria" class="control-label"><span class="text-danger">*</span>Nombre Categoria</label>
						<div class="form-group">
							<input type="text" name="nombre_categoria" value="<?php echo $this->input->post('nombre_categoria'); ?>" class="form-control" id="nombre_categoria" />
							<span class="text-danger"><?php echo form_error('nombre_categoria');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion_categoria" class="control-label">Descripcion Categoria</label>
						<div class="form-group">
							<input type="text" name="descripcion_categoria" value="<?php echo $this->input->post('descripcion_categoria'); ?>" class="form-control" id="descripcion_categoria" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
