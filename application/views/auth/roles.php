
<?= $titulo ?>
<?= $title ?>


<?php echo form_open(uri_string());

 foreach ($roles->result() as $rol){?>
    <div class="checkbox"> <label>
    <?php
        $gID=$rol->id_rol;
        $checked = null;
        $item = null;
        foreach($currentRoles->result() as $grp) {
            if ($gID == $grp->role_id) {
                $checked= ' checked="checked"';
            break;
            }
        }
    ?>
    <input type="checkbox" name="roles[]" value="<?= $rol->id_rol?>"<?= $checked;?>>
    <?= $rol->nombre_rol?>
  </label> </div>
<?php }?>


<div class="col-xs-3"><p>
      <?php echo form_submit('submit', 'Guardar',"class='btn btn-success'");?>
</p> </div>
<?php echo form_close();?>
