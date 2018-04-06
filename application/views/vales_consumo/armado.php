
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Vales en Tránsito</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped" id="tableArmado">
                    <thead>
                        <tr>
                          <th>Id Vale</th>
                          <th>Requeridor</th>
                          <th>Tipo</th>
                          <th>Sector Aprobador</th>
                          <th>Fecha Creación</th>
                          <th>Estado de Entrega </th>
                          <th class="nosort">Estado Armado</th>
                          <th>%</th>
                          <th class="nosort">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach($vales_consumo as $v){
                        $result = round(($v['Pendiente']*100)/$v['total_items'],2);
                        if($result==100){
                                $class = 'progress-bar progress-bar-success';
                        }elseif($result>=50){
                            $class = 'progress-bar progress-bar-warning';
                        }elseif($result<50){
                            $class = 'progress-bar progress-bar-danger';
                        }else{
                            $class = 'progress-bar progress-bar-warning';
                        }
                     ?>
                    <tr>
						<td><?php echo $v['id_vale']; ?></td>
						<td><?php echo $v['username']; ?></td>
                        <td><?php echo ($v['id_tipo']==$this->config->item('Tipo_Pañol') ? 'Pañol' : 'M. Prima'); ?></td>
						<td><?php echo $v['nombre_sector']; ?></td>
                        <td><?php echo date('d/m/Y H:i:s', $v['fecha_creado']); ?></td>
                        <td id="cell<?= $v['id_vale']; ?>"><?php echo $v['nombre_estado']; ?></td>
                        <td>
                            <div class="progress progress-xl progress-striped active">
                                 <div class="<?=$class?>" style="width: <?=$result.'%'?>"></div>
                             </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?=$result?>%</span></td>
						<td>
                              <div class="btn-group">
                                <a href="<?php echo site_url('vales_consumo/preparar/'.$v['id_vale']); ?>" class="btn btn-xs btn-info" data-toggle="tooltip" title="Preparar">
                                <i class="fa fa-play"></i>
                                </a>
                                <button type="button" onclick="Modal(<?php echo $v['id_vale'].','.$v['id_estado']; ?>)" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Modificar Estado"> <i class="fa fa-edit"></i> </button>
                              </div>
                              <!-- Modal -->



                        </td>
                    </tr>


                    <?php } ?>
                  </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="modal-title" ></h4>

        </div>
        <div class="modal-body">
            <p>Una vez que el Vale pase a estar listo para retirar se notificará al requiridor para que pase a retirarlo. Y una vez que lo haya retirado, se debe actualizar el estado a "Retirado".
            </p>
            <label for="id_sector" class="control-label"><span class="text-danger">*</span>Estado</label>
              <div class="form-group">
                          <select name="estado" class="form-control" id=EstadoVale>
                          </select>
              </div>
              <div class="form-group">
                  <label for="id_sector" class="control-label"><span class="text-danger">*</span>Comentarios</label>
                  <textarea class="form-control" rows="5" name="comment" id=ComentsVale></textarea>
              </div>
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>

<script>
function Modal(data,data2){
  console.log("recibo: "+data);
  console.log("tambien: "+data2);
  $('#myModal').modal('toggle');
  document.getElementById('modal-title').innerHTML = ('Cambiar estado de Vale #'+ data);
  $('.modal-footer').append('<button onclick="update_status('+data+')" class="btn btn-success" >Guardar</button>')
  $('#EstadoVale').empty();
    $.ajax({
      type: "POST",
      url: base_url() + "vales_consumo/get_all_estado_entrega_by_status",
      data : {status:data2},
    success: function(data) {
        if(data){
        $('#EstadoVale').append(data);
        }
      },
    error: function(data){
      console.log(data);

    }
    });
}
</script>
<script>
function populate(status)
  {

    }

</script>
<script>
  $(function () {
    $('#tableArmado').DataTable({
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
