<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listado de Sectores</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('sector_req/add'); ?>" class="btn btn-success btn-sm">Nuevo Sector</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tableSectores">
                  <thead>
                    <tr>
                      <th>Id Sector</th>
                      <th>Nombre Sector</th>
                      <th>FASE</th>
                      <th>Estado</th>
                      <th class="nosort">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($sector_req as $s){ ?>
                    <tr>
                      <td><?php echo $s['id_sector_req']; ?></td>
                      <td><?php echo $s['nombre_sector']; ?></td>
                      <td><?php echo $s['FASE']; ?></td>
                      <td class="text-center">
                            <?php if($s['status_sector'] === '1'): ?>
                             <span class="label label-success"><?php echo "Activo"; ?></span>
                           <?php else: ?>
                             <span class="label label-danger"><?php echo "Desactivado"; ?></span>
                           <?php endif;?>
                      </td>
                      <td>
                      <a href="<?php echo site_url('sector_req/edit/'.$s['id_sector_req']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil" data-toggle="tooltip" title="Editar"></span></a>
                      <a href="<?php echo site_url('sector_req/remove/'.$s['id_sector_req']); ?>" class="<?= ($s['status_sector'] == $this->config->item('Inactivo') ? 'btn btn-xs btn-success' : 'btn btn-xs btn-danger') ?>" data-toggle="tooltip" title="<?= ($s['status_sector'] == $this->config->item('Inactivo') ? 'Habilitar' : 'Deshabilitar') ?>">
                        <i class="<?= ($s['status_sector'] == $this->config->item('Inactivo') ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove') ?>"></i>
                      </a>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tr>
                    <th>Id Sector</th>
                    <th>Nombre Sector</th>
                    <th>FASE</th>
                    <th>Estado</th>
                    <th class="nosort">Acciones</th>
                  </tr>
                </table>

            </div>
        </div>
    </div>
</div>
<script>

  $(function () {
    $('#tableSectores').DataTable({
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
