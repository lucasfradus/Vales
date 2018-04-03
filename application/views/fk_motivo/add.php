<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Motivos Carga de Vale Pañol</h3>
            </div>
            <?php echo form_open('fk_motivo/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre_motivo" class="control-label"><span class="text-danger">*</span>Nombre Motivo</label>
						<div class="form-group">
							<input type="text" name="nombre_motivo" value="<?php echo $this->input->post('nombre_motivo'); ?>" class="form-control" id="nombre_motivo" />
							<span class="text-danger"><?php echo form_error('nombre_motivo');?></span>
						</div>
					</div>
          <div class="col-md-6">
						<label for="nombre_motivo" class="control-label">Descripción</label>
						<div class="form-group">
							<input type="text" name="descripcion" value="<?php echo $this->input->post('descripcion'); ?>" class="form-control" id="descripcion" />
							<span class="text-danger"><?php echo form_error('descripcion');?></span>
						</div>
					</div>
                    <div class="col-md-6">
						<label for="nombre_motivo" class="control-label"><span class="text-danger">*</span>Código JDE</label>
						<div class="form-group">
							<input type="text" name="cod_jde" value="<?php echo $this->input->post('cod_jde'); ?>" class="form-control" id="cod_jde" />
							<span class="text-danger"><?php echo form_error('cod_jde');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar!
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
