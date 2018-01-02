<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Articulo Edit</h3>
            </div>
			<?php echo form_open('articulo/edit/'.$articulo['id_articulo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_un_med1" class="control-label"><span class="text-danger">*</span>Unidad de Medida 1</label>
						<div class="form-group">
							<select name="id_un_med1" class="form-control">
								<?php 
								foreach($all_fk_un_med as $fk_un_med)
								{
									$selected = ($fk_un_med['id_un_medida'] == $articulo['id_un_med1']) ? ' selected="selected"' : "";

									echo '<option value="'.$fk_un_med['id_un_medida'].'" '.$selected.'>'.$fk_un_med['nombre_un_medida'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_un_med1');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_un_med2" class="control-label">Unidad de Medida 2</label>
						<div class="form-group">
							<select name="id_un_med2" class="form-control">
								<?php 
								foreach($all_fk_un_med as $fk_un_med)
								{
									$selected = ($fk_un_med['id_un_medida'] == $articulo['id_un_med2']) ? ' selected="selected"' : "";

									echo '<option value="'.$fk_un_med['id_un_medida'].'" '.$selected.'>'.$fk_un_med['nombre_un_medida'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_un_med2');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="num_articulo" class="control-label"><span class="text-danger">*</span>Num Articulo</label>
						<div class="form-group">
							<input type="text" name="num_articulo" value="<?php echo ($this->input->post('num_articulo') ? $this->input->post('num_articulo') : $articulo['num_articulo']); ?>" class="form-control" id="num_articulo" />
							<span class="text-danger"><?php echo form_error('num_articulo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion1" class="control-label"><span class="text-danger">*</span>Descripcion1</label>
						<div class="form-group">
							<input type="text" name="descripcion1" value="<?php echo ($this->input->post('descripcion1') ? $this->input->post('descripcion1') : $articulo['descripcion1']); ?>" class="form-control" id="descripcion1" />
							<span class="text-danger"><?php echo form_error('descripcion1');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion2" class="control-label"><span class="text-danger">*</span>Descripcion2</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?php echo ($this->input->post('descripcion2') ? $this->input->post('descripcion2') : $articulo['descripcion2']); ?>" class="form-control" id="descripcion2" />
							<span class="text-danger"><?php echo form_error('descripcion2');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion2" class="control-label"><span class="text-danger">*</span>Estado</label>
						<div class="form-group">
							<select name="status" class="form-control">
								<option value="1" <?= ($articulo['status'] == 1) ? "selected" : "";?> >Activo</option>
								<option value="0" <?= ($articulo['status'] == 0) ? "selected" : "";?> >Inactivo</option>
							</select>
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