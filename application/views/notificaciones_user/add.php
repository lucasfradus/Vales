<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Administrador de Notificaciones</h3>
            </div>
            <?php echo form_open('notificaciones_user/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
								<div class="col-md-6 ">
									<div class="<?= !empty(form_error('user_id')) ? "form-group has-error" : "form-group"; ?>">
										<label for="user_id" class="control-label">Usuario</label>
											<select name="user_id" class="form-control select2">
												<?php
												foreach($all_users as $user)
												{
													$selected = ($user['id'] == $this->input->post('user_id')) ? ' selected="selected"' : "";

													echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['first_name'].', '.$user['last_name'].'</option>';
												}
												?>
											</select>
										<span class="help-block"><?php echo form_error('user_id'); ?><span>
									</div>
								</div>
					<div class="col-md-6">
						<div class="form-group">
								<label for="user_id" class="control-label">Notificaciones</label>
								<p class="help-block">Seleccione las nofiticaciones que desea recibir via Mail.</p>

							<div class="form-group">
									<label>Nuevo Vale</label>
								<label class="radio-inline"><input type="radio" value="1" name="vale_nuevo" checked>Si</label>
								<label class="radio-inline"><input type="radio" value="0" name="vale_nuevo">No</label>
							</div>
							<div class="form-group">
									<label>Aprobaciones de Vales</label>
								<label class="radio-inline"><input type="radio" value="1" name="vale_aprobado" checked>Si</label>
								<label class="radio-inline"><input type="radio" value="0" name="vale_aprobado">No</label>
							</div>
							<div class="form-group">
									<label>Su vale esta listo para ser retirado</label>
								<label class="radio-inline"><input type="radio" value="1" name="vale_listo" checked>Si</label>
								<label class="radio-inline"><input type="radio" value="0" name="vale_listo">No</label>
							</div>
							<div class="form-group">
									<label>Su Vale ha sido retirado</label>
								<label class="radio-inline"><input type="radio" value="1" name="vale_retirado" checked>Si</label>
								<label class="radio-inline"><input type="radio" value="0" name="vale_retirado">No</label>
							</div>
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
<script>
$(document).ready(function() {
    $('.select2').select2({
			placeholder: 'Seleccione un usuario'
		});
});
</script>
