<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Motivos de Carga de Vales</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fk_motivo/add'); ?>" class="btn btn-success btn-sm">Agregar Nuevo</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>Id Motivo</th>
                        <th>Código JDE</th>
                        <th>Nombre Motivo</th>
                        <th>Descripción</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($fk_motivo as $f){ ?>
                    <tr>
						<td><?php echo $f['id_motivo']; ?></td>
                        <td><?php echo $f['cod_jde']; ?></td>
						<td><?php echo $f['nombre_motivo']; ?></td>
                        <td><?php echo $f['descripcion']; ?></td>
                        <td class="text-center">
                              <?php if($f['status'] == $this->config->item('Activo')): ?>
                               <span class="label label-success"><?php echo "Activo"; ?></span>
                             <?php else: ?>
                               <span class="label label-danger"><?php echo "Desactivado"; ?></span>
                             <?php endif;?>
                        </td>
                        <td>
                          <a href="<?php echo site_url('fk_motivo/edit/'.$f['id_motivo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil" data-toggle="tooltip" title="Editar"></span></a>
                          <a href="<?php echo site_url('fk_motivo/remove/'.$f['id_motivo']); ?>" class="<?= ($f['status'] == $this->config->item('Inactivo') ? 'btn btn-xs btn-success' : 'btn btn-xs btn-danger') ?>" data-toggle="tooltip" title="<?= ($f['status'] == $this->config->item('Inactivo') ? 'Habilitar' : 'Deshabilitar') ?>">
                            <i class="<?= ($f['status'] == $this->config->item('Inactivo') ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove') ?>"></i>
                          </a>
                          </td>
                    </tr>
                    <?php } ?>
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
