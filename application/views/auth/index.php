


<div id="infoMessage"><?php echo $message;?></div>
      <div class="panel-heading clearfix">
        <strong><h3>
          <span class="glyphicon glyphicon-th"></span>
          <span><?php echo lang('index_heading');?></span></h3>
       </strong>
       <span class="input-group-btn">
         <a href="add_user.php" class="btn btn-info pull-right">Agregar Nuevo Usuario</a>
         <a href="add_user.php" class="btn btn-info pull-right">Agregar Nuevo Grupo</a>
         <a href="add_user.php" class="btn btn-info pull-right">Agregar Nuevo Rol</a>
        </span> 
      </div>



<div class="row well">
<div class="container" align="left">

<table class="table table-striped table-hover" >
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
				<th>Ultimo Login</th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $usuario):?>
		<tr>
            <td><?php echo htmlspecialchars($usuario->first_name.', '.$usuario->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($usuario->email,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars(date('m/d/Y H:i:s', $usuario->last_login),ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($usuario->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->description,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td> <?php if($usuario->active === '1'): ?>
                                <a href=<?= base_url('auth/deactivate/'.$usuario->id) ?> class="label label-success"><?php echo "Activo"; ?></a>
                              <?php else: ?>
                                <a href=<?= base_url('auth/activate/'.$usuario->id) ?> class="label label-warning"><?php echo "Suspendido"; ?></a>
                              <?php endif;?>
            </td>
			<td><a href="<?php echo site_url('auth/edit_user/'.$usuario->id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a> </td>
		</tr>
	<?php endforeach;?>
</table>
</div>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
