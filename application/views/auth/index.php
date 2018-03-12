


<div id="infoMessage"><?php echo $message;?></div>
      <div class="panel-heading clearfix">
        <strong><h3>
          <span class="glyphicon glyphicon-th"></span>
          <span><?php echo lang('index_heading');?></span></h3>
       </strong>
      </div>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?></p>

<div class="row well">
<div class="container" >

            <table class="table table-striped" id="tableUsers">
    <thead>
      <tr>
          <th><?php echo lang('index_fname_th');?></th>
          <th>Nombre de Usuario</th>
          <th><?php echo lang('index_email_th');?></th>
          <th>Ultimo Login</th>
          <th><?php echo lang('index_groups_th');?></th>
          <th><?php echo lang('index_status_th');?></th>
          <th class="nosort"><?php echo lang('index_action_th');?></th>
      </tr>
    </thead>
    <tbody>

	<?php foreach ($users as $usuario):?>
		<tr>
            <td><?php echo htmlspecialchars($usuario->first_name.', '.$usuario->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($usuario->username,ENT_QUOTES,'UTF-8');?></td>
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
    </tbody>
</table>
</div>
<script>

  $(function () {
    $('#tableUsers').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      "language": {
                      "lengthMenu": "Mostrar _MENU_ Resultados por página",
                      "zeroRecords": "No se han encontrado resultados",
                      "info": "Mostrando página _PAGE_ de _PAGES_ | Total de Resultados: _MAX_ ",
                      "search" : "Buscar",
                      "infoEmpty": "No se han encontrado resultados",
                      "paginate": {
                                       "first":      "<<<",
                                       "last":       ">>>",
                                       "next":       ">>",
                                       "previous":   "<<"
                                   },
                      "infoFiltered": "(filtrado de  _MAX_ total de resultados)"
                  },
       "columnDefs": [{
                       "targets": 'nosort',
                       "orderable": false
                   }]
    })
  })
</script>
