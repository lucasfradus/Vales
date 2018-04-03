<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Maestro de Categorias</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fk_categoria/add'); ?>" class="btn btn-success btn-sm">Nueva Categoria</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tableMotives">
                  <thead>
                    <tr>
                      <th>Id Categoria</th>
                      <th>Tipo de Categoria</th>
                      <th>Nombre Categoria</th>
                      <th>Descripcion Categoria</th>
                      <th>Status</th>
                      <th class="nosort">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($fk_categorias as $f){ ?>
                    <tr>
						<td><?php echo $f['id_fk_categoria']; ?></td>
						<td><?php echo $f['codigo_categoria']; ?></td>
						<td><?php echo $f['nombre_categoria']; ?></td>
						<td><?php echo $f['descripcion_categoria']; ?></td>
            <td class="text-center">
                  <?php if($f['status'] == $this->config->item('Activo')): ?>
                   <span class="label label-success"><?php echo "Activo"; ?></span>
                 <?php else: ?>
                   <span class="label label-danger"><?php echo "Desactivado"; ?></span>
                 <?php endif;?>
            </td>
            <td>
              <a href="<?php echo site_url('fk_categoria/edit/'.$f['id_fk_categoria']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil" data-toggle="tooltip" title="Editar"></span></a>
              <a href="<?php echo site_url('fk_categoria/remove/'.$f['id_fk_categoria']); ?>" class="<?= ($f['status'] == $this->config->item('Inactivo') ? 'btn btn-xs btn-success' : 'btn btn-xs btn-danger') ?>" data-toggle="tooltip" title="<?= ($f['status'] == $this->config->item('Inactivo') ? 'Habilitar' : 'Deshabilitar') ?>">
                <i class="<?= ($f['status'] == $this->config->item('Inactivo') ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove') ?>"></i>
              </a>
              </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script>
  $(function () {
    $('#tableMotives').DataTable({
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
