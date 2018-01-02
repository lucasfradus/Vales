


<div align=center><h1><?php echo lang('edit_user_heading');?></h1></div>
<hr>
<p><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

<fieldset>
<div class="col-xs-3"><p>
    <label for="ex1">Id:</label>
      <?php echo form_input($id);?>
       <small class="text-muted">Los ID los Genera Automaticamente el Sistema y no se pueden modificar.</small>
</p> </div>

<div class="col-xs-3"><p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
</p> </div>

<div class="col-xs-3"><p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
</p> </div>

<div class="col-xs-3"><p>
            <?php echo lang('edit_user_username_label', 'username');?> <br />
            <?php echo form_input($identity);?>
            <small class="text-muted">Los nombres de usuario no de pueden modificar.</small>
</p> </div>
</fieldset>
<br>
<fieldset>
<div class="col-xs-3"><p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
</p> </div>

<div class="col-xs-3"><p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
</p> </div>
</fieldset>
      <?php if ($this->ion_auth->is_admin()): ?>

        <div align="left">


          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
                <div class="radio"> <label>
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="radio" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
            </label> </div>
          <?php endforeach?>


      <h3>Roles Habilitados</h3>
      <table class="table table-striped" style="width:60%" align=center>
				  <thead>
    						<tr>
    	             <td><strong><strong/></td>
    							<td><strong>Rol<strong/></td>
    							<td><strong>Descripcion<strong/></td>
    						</tr>
					</thead>
                <?php foreach ($roles->result() as $rol){
                            $gID=$rol->id_rol;
                            $checked = null;
                          if($currentRoles){
                            foreach($currentRoles->result() as $grp) {
                                if ($gID == $grp->role_id) {
                                    $checked= ' checked="checked"';
                                break;
                                }
                            }
                          } ?>
                <tr> 
                        <th><input type="checkbox" name="roles[]" class="select-all checkbox"  value="<?= $rol->id_rol?>"<?= $checked;?>></th>
                        <th><?= $rol->nombre_rol ?></th>
                        <th><?=$rol->descripcion_rol?></th>
                      </label> 
                    <?php }?>
                <tr>
</table>

      <?php endif ?>
      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
<div class="col-xs-3"><p>
     <?php echo form_submit('submit', lang('edit_user_submit_btn'),"class='btn btn-success'");?>
</p> </div> 
<?php echo form_close();?>
