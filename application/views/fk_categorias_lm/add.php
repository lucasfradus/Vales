<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Fk Categorias Lm Add</h3>
            </div>
            <?php echo form_open('fk_categorias_lm/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nom_cat_lm" class="control-label">Nom Cat Lm</label>
						<div class="form-group">
							<input type="text" name="nom_cat_lm" value="<?php echo $this->input->post('nom_cat_lm'); ?>" class="form-control" id="nom_cat_lm" />
							<span class="text-danger"><?php echo form_error('nom_cat_lm');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cod_cat_lm" class="control-label">Cod Cat Lm</label>
						<div class="form-group">
							<input type="text" name="cod_cat_lm" value="<?php echo $this->input->post('cod_cat_lm'); ?>" class="form-control" id="cod_cat_lm" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="obs_cat_lm" class="control-label">Obs Cat Lm</label>
						<div class="form-group">
							<input type="text" name="obs_cat_lm" value="<?php echo $this->input->post('obs_cat_lm'); ?>" class="form-control" id="obs_cat_lm" />
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
