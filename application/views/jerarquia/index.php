<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Sectores habilitados por Usuario</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('jerarquia/add'); ?>" class="btn btn-success btn-sm">Agregar</a>
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
                      <label for="id_user_padre" class="control-label">Usuario</label>
                      <select id="id_user_padre" name="id_user_padre" class="form-control">
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
                      <label for="id_sector_jerarquia" class="control-label">Sector</label>
          							<select id="id_sector_jerarquia" name="id_sector_jerarquia"  class="form-control">
                          <option value="">Seleccione un Sector</option>
          								<?php
          								foreach($all_sector_req as $sector_req)
          								{
          									$selected = ($sector_req['id_sector_req'] == $this->input->post('id_sector_jerarquia')) ? ' selected="selected"' : "";

          									echo '<option value="'.$sector_req['id_sector_req'].'" '.$selected.'>'.$sector_req['nombre_sector'].'</option>';
          								}
          								?>
          							</select>
                        <span class="text-danger"><?php echo form_error('id_sector_jerarquia');?></span>
          						</div>
                        <label for="id_sector_jerarquia" class="control-label">Buscar </label>
                        <button onClick="buscar()" class="btn btn-success">
                      		<i class="fa fa-check"></i> Buscar


                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.box -->
            <div class="box-body">
                <table class="table table-striped" >
                    <tread>
          						<th>Id Jerarquia</th>
          						<th>Nombre de Usuario</th>
          						<th>Nombre y Apellido</th>
                      <th>Perfil Usuario</th>
          						<th>Sector</th>
          						<th>Acciones</th>
                    <tread>
                      <tbody id="tabla">

                      </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
function buscar(){
  var id_user_padre = $('#id_user_padre').val();
  var id_sector_jerarquia = $('#id_sector_jerarquia').val();

  $('#tabla').empty();
  $('#alert').empty();

  if(!id_sector_jerarquia && !id_user_padre){
    console.log("no ingreso nada");
    $('#alert').append('<span class="text-danger">Debe Ingresar al menos un criterio para realizar la busqueda. </span>');
  }else{

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "jerarquia/get_jerarquia",
        data : {id_sector_jerarquia:id_sector_jerarquia, id_user_padre:id_user_padre},
          success: function(data) {
            if(data){
              $('#tabla').append(data).fadeIn(300);
            }else{
              $('#alert').append('<span class="text-danger">No se han encontrado resultados </span>');
            }
          },
          error: function(data){
            $('#alert').append(data);

          }
    });

  }
}
</script>
<script>
  function borrar_jerarquia(id_jerarquia){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "jerarquia/remove/"+id_jerarquia,
        data : {id_jerarquia:id_jerarquia},
          success: function(data) {
            if(data){
              $('#'+data).fadeOut(300, function(){ $(this).remove();});
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
