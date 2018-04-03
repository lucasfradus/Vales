<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Maestro Unidades de medida</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fk_un_med/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tableUN">
                  <thead>
                    <tr>
                      <th>Id Un Medida</th>
                      <th>Un Medida</th>
                      <th>Descripción</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($fk_un_med as $f){ ?>
                    <tr>
						<td><?php echo $f['id_un_medida']; ?></td>
						<td><?php echo $f['un_medida']; ?></td>
                        <td><?php echo $f['nombre_un_medida']; ?></td>
						<td>
                            <a href="<?php echo site_url('fk_un_med/edit/'.$f['id_un_medida']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Editar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
              </tbody>
            </div>
        </div>
    </div>
</div>
<script>
  $(function () {
    $('#tableUN').DataTable({
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
