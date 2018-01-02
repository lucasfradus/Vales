<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Jerarquia Add</h3>
            </div>
            <div id=notif>
            </div>
            <?php echo form_open('jerarquia/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_user_padre" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="id_user_padre" class="form-control" onchange="get_select()" id="id_user_padre">
								<option value="">Seleccione un usuario</option>
								<?php
								foreach($all_users as $user)
								{
									$selected = ($user['id'] == $this->input->post('id_user_padre')) ? ' selected="selected"' : "";

									echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['first_name'].', '.$user['last_name'].'</option>';
								}
								?>
							</select>
              <span class="text-danger"><?php echo form_error('id_user_padre');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_sector_jerarquia" class="control-label">Sector</label>

						<div class="form-group">
							<select name="id_sector_jerarquia[]" multiple class="form-control" id="select">

							</select>
              <small>Utilice la tecla Ctrl para seleccionar varios sectores.</small>
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
  function get_select(){
      var id_user_padre = $('#id_user_padre').val();
      $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>" + "jerarquia/get_select",
          data : {id_user_padre:id_user_padre},
            success: function(data) {
              if(data){
                $('#select').append(data);
              }else{
                document.getElementById('notif').innerHTML = '<span class="text-danger">No se puede dar mas sectores a ese usuaroui</span>';
              }
            },
            error: function(data){
              $('#alert').append(data);

            }
      });

  }

</script>
