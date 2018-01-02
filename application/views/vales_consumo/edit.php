<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Vales Consumo Edit</h3>
            </div>
			<?php echo form_open('vales_consumo/edit/'.$vales_consumo['id_vale']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_requeridor" class="control-label">User</label>
						<div class="form-group">
							<select name="id_requeridor" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $vales_consumo['id_requeridor']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['first_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_aprobador" class="control-label">User</label>
						<div class="form-group">
							<select name="id_aprobador" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $vales_consumo['id_aprobador']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['first_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sector" class="control-label">Sector Req</label>
						<div class="form-group">
							<select name="id_sector" class="form-control">
								<option value="">select sector_req</option>
								<?php 
								foreach($all_sector_req as $sector_req)
								{
									$selected = ($sector_req['id_sector_req'] == $vales_consumo['id_sector']) ? ' selected="selected"' : "";

									echo '<option value="'.$sector_req['id_sector_req'].'" '.$selected.'>'.$sector_req['nombre_sector'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_estado" class="control-label">Id Estado</label>
						<div class="form-group">
							<input type="text" name="id_estado" value="<?php echo ($this->input->post('id_estado') ? $this->input->post('id_estado') : $vales_consumo['id_estado']); ?>" class="form-control" id="id_estado" />
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