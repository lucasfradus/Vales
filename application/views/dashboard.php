<div class="row">
    <div class="col-md-12">
      <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimos Vales Cargados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="example2">
                  <thead>
                  <tr>
                    <th>ID Vale</th>
                    <th>Requeridor</th>
                    <th>Tipo</th>
                    <th>Sector</th>
                    <th>Estado de Aprobacion</th>
                    <th>Estado de Preparacion</th>
                    <th></th>
                    <th>Fecha de Creación</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php foreach ($vales as $v) {
                  			if($v['id_aprobacion'] == $this->config->item('Pendiente')){
                  					$estado_aprobacion = "label label-warning";
                  			}elseif($v['id_aprobacion'] == $this->config->item('Aprobado')){
                  					$estado_aprobacion = "label label-success";
                  			}else{
                  					$estado_aprobacion = "label label-danger";
                  			}

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

                        if($v['id_tipo']==$this->config->item('Tipo_Pañol')){
                            $tipo_vale='badge bg-aqua';
                        }else {
                            $tipo_vale='badge bg-navy';
                        }

                  		?>

                  <tr>
                    <td><a href="<?= site_url('vales_consumo/view/'.$v['id_vale']); ?>"><?php echo $v['id_vale']; ?></a></td>
                    <td><?= $v['username']; ?></td>
                    <td><span class="<?= $tipo_vale ?>"><?php echo ($v['id_tipo']==$this->config->item('Tipo_Pañol') ? 'Pañol' : 'M. Prima'); ?></span></td>
                    <td><?= $v['nombre_sector']; ?></td>
                    <td><span class="<?= $estado_aprobacion ?>"><?= $v['nombre_estado_aprobacion']; ?></span></td>
          			   <td>
                    <div class="progress progress-xl progress-striped active">
                      <div class="<?=$class?>" style="width: <?=$result.'%'?>"></div>
                    </div>
                  </td>
                  <td>
                    <span class="badge bg-light-blue"><?=$result?>%</span></td>
                     <td><?php echo date('m/d/Y H:i:s', $v['fecha_creado']); ?></td>

                  </tr>
             <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?=site_url('vales_consumo/add/'.$this->config->item('Tipo_Pañol')); ?>" class="btn btn-success btn-sm btn-flat pull-left"><i class="fa fa-plus"></i> Nuevo Vale Pañol</a> 
              <a href="<?=site_url('vales_consumo/add/'.$this->config->item('Tipo_mprimas')); ?>" class="btn btn-success btn-sm btn-flat pull-left"><i class="fa fa-plus-circle"></i> Nuevo Vale M.Prima</a>
              <a href="<?= site_url('vales_consumo/'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver Todo</a>
            </div>
            <!-- /.box-footer -->
          </div>
    </div>
  </section>
</div>
<script>

  $(function () {
    $('#example2').DataTable({
      'aaSorting' : [2, 'asc'],
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
