<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Jerarquia Edit</h3>
            </div>
			<?php echo form_open('jerarquia/edit/'.$jerarquia['id_jerarquia']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_user_padre" class="control-label">User</label>
						<div class="form-group">
							<select name="id_user_padre" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $jerarquia['id_user_padre']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['first_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_user_hijo" class="control-label">User</label>
						<div class="form-group">
							<select name="id_user_hijo" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $jerarquia['id_user_hijo']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['first_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sector_jerarquia" class="control-label">Sector Req</label>
						<div class="form-group">
							<select name="id_sector_jerarquia" class="form-control">
								<option value="">select sector_req</option>
								<?php 
								foreach($all_sector_req as $sector_req)
								{
									$selected = ($sector_req['id_sector_req'] == $jerarquia['id_sector_jerarquia']) ? ' selected="selected"' : "";

									echo '<option value="'.$sector_req['id_sector_req'].'" '.$selected.'>'.$sector_req['nombre_sector'].'</option>';
								} 
								?>
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