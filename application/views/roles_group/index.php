<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Roles Group Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('role/'); ?>" class="btn btn-info btn-sm">Ver Roles</a>
                    <a href="<?php echo site_url('roles_group/add'); ?>" class="btn btn-success btn-sm">Add</a>
              </div>
            </div>
            <div align="center">
            <div class="col-md-8" >
              <div class="box box-default box-solid">
                <div class="box-header with-border ">
                  <h3 class="box-title">Buscar</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>

                </div>

                <div class="box-body">
                  <p>Puede Buscar por uno o dos criterios</p><div id="alert"></div>
                  <div class="row">
                    <div class="col-xs-5">
                      <label for="id_user" class="control-label">Usuario</label>
                      <select id="id_user" name="id_user_padre" class="form-control">
                        <option value="">Seleccione un Usuario</option>
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
                    <div class="col-xs-5">
                      <label for="role_id" class="control-label">Sector</label>
                        <select id="role_id" name="role_id"  class="form-control">
                          <option value="">Seleccione un Rol </option>
                          <?php
                          foreach($get_all_roles_group as $rol)
                          {
                            $selected = ($rol['role_id'] == $this->input->post('role_id')) ? ' selected="selected"' : "";

                            echo '<option value="'.$rol['role_id'].'" '.$selected.'>'.$rol['nombre_rol'].'</option>';
                          }
                          ?>
                        </select>
                        <span class="text-danger"><?php echo form_error('id_sector_jerarquia');?></span>
                      </div>

                        <button onClick="buscar_rol()" class="btn btn-success">
                          <i class="fa fa-check"></i> Buscar </button>

                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>User Id</th>
						<th>Rol Id</th>
						<th>Actions</th>
                    </tr>
                    <?php
                    if(!empty($roles_group)):
                    foreach($roles_group as $r){ ?>
                    <tr>
						<td><?php echo $r['first_name'].', '.$r['last_name']; ?></td>
						<td><?php echo $r['nombre_rol']; ?></td>
						<td>
                            <a href="<?php echo site_url('roles_group/edit/'.$r['id_rol_']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('roles_group/remove/'.$r['id_rol_']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php }
                  endif;
                    ?>
                </table>

            </div>
        </div>
    </div>
</div>
<script>
function buscar_rol(){
   console.log("llegue");
}
</script>
