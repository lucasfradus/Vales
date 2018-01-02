<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Fk Un Med Add</h3>
            </div>
            <?php echo form_open('fk_un_med/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="un_medida" class="control-label">Un Medida</label>
						<div class="form-group">
							<input type="text" name="un_medida" value="<?php echo $this->input->post('un_medida'); ?>" class="form-control" id="un_medida" />
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