<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Roles Por Usuario</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('role/'); ?>" class="btn btn-info btn-sm">Ver Roles</a>
                    <a href="<?php echo site_url('roles_group/add'); ?>" class="btn btn-success btn-sm">Add</a>
              </div>
            </div>
              <div class="box box-default box-solid" >
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
                      <label for="role_id" class="control-label">Rol</label>
                        <select id="role_id" name="role_id"  class="form-control">
                          <option value="">Seleccione un Rol </option>
                          <?php
                          foreach($get_all_roles_group as $rol)
                          {
                            $selected = ($rol['id_rol'] == $this->input->post('role_id')) ? ' selected="selected"' : "";

                            echo '<option value="'.$rol['id_rol'].'" '.$selected.'>'.$rol['nombre_rol'].'</option>';
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
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Acciones permitidas</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody id="tabla">
              </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function buscar_rol(){
  var id_user_padre = $('#id_user').val();
  var id_role = $('#role_id').val();
  $('#tabla').empty();
  $('#alert').empty();

  if(!id_role && !id_user_padre){
    console.log("no ingreso nada");
    $('#alert').append('<span class="text-danger">Debe Ingresar al menos un criterio para realizar la busqueda. </span>');
  }else{

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "roles_group/get_roles",
        data : {id_user:id_user_padre, id_role:id_role},
          success: function(data) {
            if(data){



              console.log(data);
              response = $.parseJSON(data);
                  $(function() {
                  $.each(response, function(i, item) {
                    $('#tabla').append('<tr id="id'+item.id_rol_+'"> <td>'+item.first_name+', '+item.last_name+'</td><td>'+item.nombre_rol+'</td><td><button onClick="borrar_rol('+item.id_rol_+')"class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</button>').fadeIn(300);
                  });
                  });

            }else{
              console.log(data);
              $('#alert').append('<span class="text-danger">No se han encontrado resultados </span>');
            }
          },
          error: function(data){
            $('#alert').append(data);

          }
    });

  }
}

  function borrar_rol(id_rol){
    console.log("recibo ára borrar: "+id_rol);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "roles_group/remove/",
        data : {rol_id:id_rol},
          success: function(data) {
            if(data){
              $('#id'+data).fadeOut(300, function(){ $(this).remove();
              });
            }else{
              console.log(data);
            }
          },
          error: function(data){
            console.log(" no todo ok 111");

          }
    });

  }

</script>
