<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Sector Req Edit</h3>
            </div>
			<?php echo form_open('sector_req/edit/'.$sector_req['id_sector_req']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre_sector" class="control-label">Nombre Sector</label>
						<div class="form-group">
							<input type="text" name="nombre_sector" value="<?php echo ($this->input->post('nombre_sector') ? $this->input->post('nombre_sector') : $sector_req['nombre_sector']); ?>" class="form-control" id="nombre_sector" />
						</div>
					</div>
          <div class="col-md-6">
                      <label for="fase" class="control-label">FASE</label>
                      <div class="form-group">
                          <input type="text" name="fase" value="<?php echo ($this->input->post('fase') ? $this->input->post('fase') : $sector_req['FASE']); ?>" class="form-control" id="fase" />
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
