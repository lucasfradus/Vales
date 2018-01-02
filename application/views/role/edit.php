<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Role Edit</h3>
            </div>
			<?php echo form_open('role/edit/'.$role['id_rol']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre_rol" class="control-label">Nombre Rol</label>
						<div class="form-group">
							<textarea name="nombre_rol" class="form-control" id="nombre_rol"><?php echo ($this->input->post('nombre_rol') ? $this->input->post('nombre_rol') : $role['nombre_rol']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion_rol" class="control-label">Descripcion Rol</label>
						<div class="form-group">
							<textarea name="descripcion_rol" class="form-control" id="descripcion_rol"><?php echo ($this->input->post('descripcion_rol') ? $this->input->post('descripcion_rol') : $role['descripcion_rol']); ?></textarea>
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