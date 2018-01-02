<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Roles Group Edit</h3>
            </div>
			<?php echo form_open('roles_group/edit/'.$roles_group['']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="user_id" class="control-label">User</label>
						<div class="form-group">
							<select name="user_id" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $roles_group['user_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['first_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="rol_id" class="control-label">Role</label>
						<div class="form-group">
							<select name="rol_id" class="form-control">
								<option value="">select role</option>
								<?php 
								foreach($all_roles as $role)
								{
									$selected = ($role['id_rol'] == $roles_group['rol_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$role['id_rol'].'" '.$selected.'>'.$role['nombre_rol'].'</option>';
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