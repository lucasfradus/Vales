<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Estado Entrega Edit</h3>
            </div>
			<?php echo form_open('estado_entrega/edit/'.$estado_entrega['id_estado_entrega']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre_estado" class="control-label">Nombre Estado</label>
						<div class="form-group">
							<textarea name="nombre_estado" class="form-control" id="nombre_estado"><?php echo ($this->input->post('nombre_estado') ? $this->input->post('nombre_estado') : $estado_entrega['nombre_estado']); ?></textarea>
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