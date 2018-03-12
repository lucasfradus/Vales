<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Roles</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('role/add'); ?>" class="btn btn-success btn-sm">Agregar</a>

                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tableRoles">
                  <thead>
                    <tr>
            						<th>#ID del Rol</th>
            						<th>Nombre del Rol</th>
            						<th>Descripcion del Rol</th>
            						<th class="nosort">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($roles as $r){ ?>
                    <tr>
                        <td><?php echo $r['id_rol']; ?></td>
                        <td><?php echo $r['nombre_rol']; ?></td>
                        <td><?php echo $r['descripcion_rol']; ?></td>
                        <td>
                        <a href="<?php echo site_url('role/edit/'.$r['id_rol']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                        <a href="<?php echo site_url('role/remove/'.$r['id_rol']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
    $('#tableRoles').DataTable({
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
