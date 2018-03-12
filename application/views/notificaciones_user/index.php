<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Configuración general de notifiacaciones</h3>

            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
						<!-- <th>Id Notificaciones Users</th> -->
                        <th >Usuario</th>
						<th class="nosort">Vale Nuevo</th>
						<th class="nosort">Vale Aprobado</th>
						<th class="nosort">Vale Listo</th>
						<th class="nosort">Vale Retirado</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notificaciones_users as $n){ ?>

                    <tr>
						<!-- <td><?php echo $n['id_notificaciones_users']; ?></td> -->
                        <td><?php echo $n['first_name'].', '.$n['last_name']; ?></td>

                        <td>
                <a href="<?= site_url('notificaciones_user/update_by_user/'.$n['id_notificaciones_users'].'/'.$this->config->item('Nuevo_Vale').'/'.$this->config->item('Ruta_notificaciones'))?>" class="<?= $n['vale_nuevo'] == 1 ? "fa fa-check" : "fa fa-times" ; ?>"></a>
            </td>
            <td>
                <a href="<?= site_url('notificaciones_user/update_by_user/'.$n['id_notificaciones_users'].'/'.$this->config->item('Aprobacion_Vale').'/'.$this->config->item('Ruta_notificaciones'))?>" class="<?= $n['vale_aprobado'] == 1 ? "fa fa-check" : "fa fa-times" ; ?>"></a>
            </td>
            <td>
                <a href="<?= site_url('notificaciones_user/update_by_user/'.$n['id_notificaciones_users'].'/'.$this->config->item('Listo_Para_Retirar_Vale').'/'.$this->config->item('Ruta_notificaciones'))?>" class="<?= $n['vale_listo'] == 1 ? "fa fa-check" : "fa fa-times" ; ?>"></a>
            </td>
            <td>
                <a href="<?= site_url('notificaciones_user/update_by_user/'.$n['id_notificaciones_users'].'/'.$this->config->item('Retirado_Vale').'/'.$this->config->item('Ruta_notificaciones'))?>" class="<?= $n['vale_retirado'] == 1 ? "fa fa-check" : "fa fa-times" ; ?>"></a>
            </td>
                    <?php } ?>
                </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
           $('#example2').DataTable({
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
