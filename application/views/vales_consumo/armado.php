<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Vales en Tránsito</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                      <th>Id Vale</th>
                      <th>Requeridor</th>
                      <th>Sector Aprobador</th>
                      <th>Fecha Creación</th>
                      <th>Estado de Entrega </th>
                      <th>Estado Armado</th>
                      <th>%</th>
                      <th>Acciones</th>
                    </tr>
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
						<td><?php echo $v['nombre_sector']; ?></td>
                        <td><?php echo date('m/d/Y H:i:s', $v['fecha_creado']); ?></td>
                        <td><?php echo $v['nombre_estado']; ?></td>
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
                                <a href="<?php echo site_url('vales_consumo/preparar/'.$v['id_vale']); ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Modificar Estado">
                                <i class="fa fa-edit"></i>
                                </a>
                              </div>


                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
