<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Fk Un Med Edit</h3>
            </div>
			<?php echo form_open('fk_un_med/edit/'.$fk_un_med['id_un_medida']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="un_medida" class="control-label">Un Medida</label>
						<div class="form-group">
							<input type="text" name="un_medida" disabled value="<?php echo ($this->input->post('un_medida') ? $this->input->post('un_medida') : $fk_un_med['un_medida']); ?>" class="form-control" id="un_medida" />
						</div>
					</div>
          <div class="col-md-6">
            <label for="un_medida" class="control-label">Descripcion</label>
            <div class="form-group">
              <input type="text" name="nombre_un_medida" value="<?php echo ($this->input->post('nombre_un_medida') ? $this->input->post('nombre_un_medida') : $fk_un_med['nombre_un_medida']); ?>" class="form-control" id="nombre_un_medida" />
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
