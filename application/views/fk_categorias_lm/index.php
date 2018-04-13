<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fk Categorias Lm Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fk_categorias_lm/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="tableCat">
                  <thead>
                    <tr>
						<th>Id</th>
						<th>Categoria LM</th>
						<th>Codigo Categoria</th>
						<th>Referencia</th>
						<th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($fk_categorias_lm as $f){ ?>
                    <tr>
						<td><?php echo $f['id_cat_lm']; ?></td>
						<td><?php echo $f['nom_cat_lm']; ?></td>
						<td><?php echo $f['cod_cat_lm']; ?></td>
						<td><?php echo $f['obs_cat_lm']; ?></td>
						<td>
                                <a href="<?php echo site_url('fk_categorias_lm/edit/'.$f['id_cat_lm']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil" data-toggle="tooltip" title="Editar"></span></a>
                                <a href="<?php echo site_url('fk_categorias_lm/remove/'.$f['id_cat_lm']); ?>" class="<?= ($f['status_cat_lm'] == $this->config->item('Inactivo') ? 'btn btn-xs btn-success' : 'btn btn-xs btn-danger') ?>" data-toggle="tooltip" title="<?= ($f['status_cat_lm'] == $this->config->item('Inactivo') ? 'Habilitar' : 'Deshabilitar') ?>">
                                <i class="<?= ($f['status_cat_lm'] == $this->config->item('Inactivo') ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove') ?>"></i>
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
    $('#tableCat').DataTable({
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
