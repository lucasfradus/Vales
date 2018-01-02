<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Evolucion Vale Add</h3>
            </div>
            <?php echo form_open('evolucion_vale/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_vale" class="control-label">Id Vale</label>
						<div class="form-group">
							<input type="text" name="id_vale" value="<?php echo $this->input->post('id_vale'); ?>" class="form-control" id="id_vale" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_estado" class="control-label">Id Estado</label>
						<div class="form-group">
							<input type="text" name="id_estado" value="<?php echo $this->input->post('id_estado'); ?>" class="form-control" id="id_estado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha" class="control-label">Fecha</label>
						<div class="form-group">
							<input type="text" name="fecha" value="<?php echo $this->input->post('fecha'); ?>" class="has-datepicker form-control" id="fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="hora" class="control-label">Hora</label>
						<div class="form-group">
							<input type="text" name="hora" value="<?php echo $this->input->post('hora'); ?>" class="form-control" id="hora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_responsable" class="control-label">Id Responsable</label>
						<div class="form-group">
							<input type="text" name="id_responsable" value="<?php echo $this->input->post('id_responsable'); ?>" class="form-control" id="id_responsable" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="observacion" class="control-label">Observacion</label>
						<div class="form-group">
							<input type="text" name="observacion" value="<?php echo $this->input->post('observacion'); ?>" class="form-control" id="observacion" />
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