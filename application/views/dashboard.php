<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Panel de Control</h3>
            </div>
        </div>



  <?php if(ISSET($pendientes)){    ?>
   <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $pendientes ?></h3>
              <p>Vales Pendientes de Aprobacion</p>
              <h3><?= $aprobados ?></h3>
              <p>Vales Aprobados</p>
              <h3><?= $rechazados ?></h3>
              <p>Vales Rechazados</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $EnProcesoDeArmado ?></h3>
              <p>Vales En Proceso de Armado </p>

              <h3><?= $ListoParaRetirar ?></h3>
              <p>Vales Listos para Retirar</p>
              <h3><?= $Retirado ?></h3>
              <p>Vales Retirados</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
     </section>
<?php } ?>

  <section class="content">
     <div class="box box-info">
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
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID Vale</th>
                    <th>Requeridor</th>
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

                  		?>

                  <tr>
                    <td><a href="<?= site_url('vales_consumo/view/'.$v['id_vale']); ?>"><?php echo $v['id_vale']; ?></a></td>
                    <td><?= $v['username']; ?></td>
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
              <a href="<?= site_url('vales_consumo/add/'); ?>" class="btn btn-sm btn-info btn-flat pull-left">Nuevo Vale</a>
              <a href="<?= site_url('vales_consumo/'); ?>" class="btn btn-sm btn-default btn-flat pull-right">Ver Todo</a>
            </div>
            <!-- /.box-footer -->
          </div>
    </div>
  </section>
</div>
</div>
