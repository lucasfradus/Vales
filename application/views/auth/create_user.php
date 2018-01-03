<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo lang('create_user_heading');?></h3>
                <p><?php echo lang('create_user_subheading');?></p>
            </div>

<?php echo form_open("auth/create_user");?>
    <div class="box-body">
      <div class="row clearfix">
          <div class="col-md-6">
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
          <span class="text-danger">  <?= form_error('first_name') ?></span>
        </div>

        <div class="col-md-6">
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
          <span class="text-danger">  <?= form_error('last_name') ?></span>
      </div>

      <div class="col-md-6">

      <?php
      if($identity_column!=='email') {
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_input($identity);
          ?>
          <small>El Nombre de Usuario es unico, y se utiliza para iniciar sesión</small>
          <span class="text-danger"><?= form_error('identity');?></span><?php
      }
      ?>
      </div>

      <div class="col-md-6">
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
            <small>El Email se utiliza para enviar notificaciones.</small>
            <span class="text-danger"><?= form_error('email') ?></span>
      </div>

      <div class="col-md-6">
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
            <span class="text-danger"><?= form_error('password') ?></span>
      </div>

      <div class="col-md-6">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
          <span class="text-danger">  <?= form_error('password_confirm') ?></span>
      </div>
      <div class="col-md-6">
        <label class="control-label">Sectores Habilitados</label>
        <div class="form-group">
          <select name="id_sectores[]" multiple class="form-control" >
            <?php
            foreach($all_sector_req as $sector)
            {

              echo '<option value="'.$sector['id_sector_req'].'">'.$sector['nombre_sector'].'</option>';
            }
            ?>
          </select>
          <small>Utilice la tecla Ctrl para seleccionar varios sectores.</small>
          <span class="text-danger"><?php echo form_error('id_sectores[]');?></span>
        </div>
      </div>
          <div class="col-md-6">
            <label class="control-label">Perfil</label>
            <div class="form-group">
              <select name="groups[]"  class="form-control" >
                <?php
                foreach($groupos as $group){

                  if ($group['id'] == $this->config->item('Administrator')){
                    $disabled = 'disabled=disabled';
                    }else{
                    $disabled = '';
                    }
                    echo '<option value="'.$group['id'].'" '.$disabled.' >'. htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8').'</option>';
                  }
                ?>
                </select>
                <small>El Perfil por default es de Requeridor.</small>
                <span class="text-danger"><?php echo form_error('groups[]');?></span>
              </div>
            </div>
      </div>
    </div>
  </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-check"></i> <?php echo lang('create_user_submit_btn');?>
        </button>
      </div>

<?php echo form_close();?>
          </div>
    </div>
</div>
