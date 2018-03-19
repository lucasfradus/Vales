<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Busquedas</h3>
            	<div class="box-tools">
                    <a href="<?=site_url('vales_consumo/add'); ?>" class="btn btn-success btn-sm">Crear Nuevo Vale</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="example1" >
                    <thead>
                        <tr>
                          <th>Id Vale</th>
                          <th>Requeridor</th>
                          <th>Sector Aprobador</th>
                          <th>Fecha Creación</th>
                          <th>Estado Aprobacion</th>
                          <th>Estado de Entrega</th>


                          <th class="nosort">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($vales_consumo as $v){
                    ?>

                        <tr>
    						<td><?php echo $v['id_vale']; ?></td>
    						<td><?php echo $v['username']; ?></td>
    						<td><?php echo $v['nombre_sector']; ?></td>
                            <td><?php echo date('m/d/Y H:i:s', $v['fecha_creado']); ?></td>
                            <td><?php echo $v['nombre_estado_aprobacion']; ?></td>
                            <td><?php echo $v['nombre_estado']; ?></td>
    						<td>
                                <div class="btn-group">
                                    <a href="<?php echo site_url('vales_consumo/view/'.$v['id_vale']); ?>" class="btn btn-xs btn-info" data-toggle="tooltip" title="Ver">
                                    <i class="glyphicon glyphicon-search"></i>
                                    </a>

                                </div>
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
             $('#example1').DataTable({
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
