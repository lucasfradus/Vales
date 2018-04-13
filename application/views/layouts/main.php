<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Vales de Cosumo</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

        <link rel="icon" href="<?=base_url('resources/img/ilva-ico.ico')?>" type="image/gif">

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">


         <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo site_url('resources/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?= base_url('/'); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">Vales</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Vales de Consumo</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a href="#" class="sidebar-toggle" onClick="window.print()">
                      <i class="fa fa-print"></i>
                      </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/img/ilva.jpg');?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= $sesion->username?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/img/ilva.jpg');?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $sesion->first_name.' '.$sesion->last_name?>
                                        <small>Mail: <?= $sesion->email?></small>
                                        <small>Perfil: <?= $perfil->description?></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= base_url('Auth/edit_user/'.$sesion->id); ?>" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url('Auth/logout'); ?>" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i>Panel de Vista</a>
                                      </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/img/ilva.jpg');?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= $sesion->first_name.' '.$sesion->last_name?></p>
                            <div id="time"></div>
                            <?php
                              if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                              echo "IP: ".$_SERVER['HTTP_CLIENT_IP'];
                              } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                              echo "IP: ".$_SERVER['HTTP_X_FORWARDED_FOR'];
                              } else {
                              echo "IP: ".$_SERVER['REMOTE_ADDR'];
                              }
                            ?>
                        </div>
                    </div>
                    <!-- search form -->
                <?php if (!$this->ion_auth->in_group($this->config->item('Requeridor'))): ?>
                    <?php echo form_open('vales_consumo/search',array('class'=>'sidebar-form','method'=>'POST')); ?>
                        <div class="input-group">
                          <input type="text" name="search" class="form-control" placeholder="Buscar Vale">
                          <span class="input-group-btn">
                                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                              </span>
                        </div>
                    <?php echo form_close(); ?>
                <?php endif ?>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Puntos de Menú</li>
                        <li>
                            <a href="<?php echo site_url();?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Vales Consumo</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('vales_consumo/add/'.$this->config->item('Tipo_Pañol'));?>"><i class="fa fa-plus"></i> Nuevo Vale de Pañol</a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo site_url('vales_consumo/add/'.$this->config->item('Tipo_mprimas'));?>"><i class="fa fa-plus-circle"></i> Nuevo Vale de Materia Prima</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('vales_consumo/index');?>"><i class="fa fa-list-ol"></i> Mis Vales de Consumo

                                    </a>
                                </li>
                                <?php if ($this->ion_auth->in_group(array($this->config->item('Aprobador'),$this->config->item('Administrator')))): ?>
                                <li>
                                    <a href="<?php echo site_url('vales_consumo/aprobaciones');?>"><i class="fa fa-check"></i> Vales Para Aprobar

                                      </a>
                                </li>
                                <?php endif ?>
                                <?php if ($this->ion_auth->in_group(array($this->config->item('Pañolero'),$this->config->item('Administrator')))): ?>
                                <li>
                                    <a href="<?php echo site_url('vales_consumo/armado');?>"><i class="fa fa-industry"></i> Armado de Vale
                                        <!-- <i class="label label-primary pull-righ"><?= $estado_barra ?></i> -->
                                    </a>
                                </li>
                                <?php endif ?>

                            </ul>
                        </li>
                        <?php if ($this->ion_auth->in_group($this->config->item('Administrator'))): ?>
                        <li>
                          <a href="#">
                            <i class="fa fa-flag-checkered"></i> <span>Reportes</span>
                          </a>
                            <ul class="treeview-menu">
                              <li>
                                <a href="<?php echo site_url('reportes/ReporteVales');?>"><i class="fa fa-flag"></i>Vales de Consumo</a>
                              </li>
                              <li>
                                <a href="<?php echo site_url('reportes/ReporteTransferencias');?>"><i class="fa fa-flag"></i>Transferencias</a>
                              </li>
                            </ul>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fa fa-cogs"></i> <span>Configuración General</span>
                          </a>
                            <ul class="treeview-menu">
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-group"></i> <span>Usuarios</span>
                                    </a>
                                  <ul class="treeview-menu">
                                    <li>
                                      <a href="<?php echo site_url('auth/index');?>"><i class="fa fa-list-ul"></i> Listado</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo site_url('jerarquia/index');?>"><i class="fa fa-sitemap"></i>Sectores Por Usuario</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo site_url('roles_group/index');?>"><i class="fa fa-briefcase"></i> Roles Por Usuario</a>
                                    </li>
                                    <li>
                                      <a href="<?php echo site_url('notificaciones_user/index');?>">
                                        <i class="fa fa-bell"></i> Notificaciones x Usuario
                                      </a>
                                    </li>
                                  </ul>
                                  </li>
                                  <li>
                                    <a href="#">
                                      <i class="fa fa-desktop"></i> <span>Vales</span>
                                    </a>
                                  <ul class="treeview-menu">
                                     <li>
                                        <a href="<?php echo site_url('articulo/index');?>">
                                            <i class="fa fa-barcode"></i> <span>Maestro de Articulos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Fk_motivo/index');?>">
                                          <i class="fa fa-archive"></i> <span>Maestro de Motivos de Carga</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Fk_categoria/index');?>">
                                          <i class="fa fa-tag"></i> <span>Maestro de Categorias</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Fk_categorias_lm/index');?>">
                                          <i class="fa fa-tags"></i> <span>Maestro de Categorias LM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Sector_req/index');?>">
                                          <i class="fa fa-building"></i> <span>Maestro de Sectores </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url('Fk_un_med/index');?>">
                                          <i class="fa fa-globe"></i> <span>Maestro Unidades de Med</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('backup/index');?>">
                                          <i class="fa fa-window-restore"></i> <span>Backup</span>
                                        </a>
                                    </li>
                                  </ul>
                                  </li>

                            </ul>

                        </li>
                        <?php endif ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <!-- Alertas! -->
                    <div align="center">
                    <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Exito!</strong> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php }else if($this->session->flashdata('error')){  ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php }else if($this->session->flashdata('warning')){  ?>
                            <div class="alert alert-warning">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Advertencia!</strong> <?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php }else if($this->session->flashdata('info')){  ?>
                            <div class="alert alert-info">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- FIN Alertas! -->



                    <?php
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Desarrollado por Sistemas. Version: 0.5</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->

                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->


        <!-- jQuery 2.2.3 -->
        <!-- <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script> -->

        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
        <!-- funciones Custom en js -->
        <script src="<?php echo site_url('resources/js/funciones.js');?>"></script>

        <script type="text/javascript" src="<?php echo site_url('resources/js/jquery.tablesorter.js');?>"></script>

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo site_url('resources/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
        <script src="<?php echo site_url('resources/datatables.net/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo site_url('resources/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
        <!-- Pace Loader -->
        <script src="<?php echo site_url('resources/js/pace/pace.js');?>"></script>
        <link rel="stylesheet" href="<?php echo site_url('resources/js/pace/themes/red/pace-theme-flash.css');?>">






    </body>

</html>
<script>
function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML = "Hora: " + h + ":" + m + ":" + s;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();
</script>
<!-- Custom styles to disable animation temporarily (inlined for show) -->
<style>
/* Probably doesn't need all these prefixes but oh well */
.disable-animations, .disable-animations * {
  /* CSS transitions */
  -o-transition-property: none !important;
  -moz-transition-property: none !important;
  -webkit-transition-property: none !important;
  transition-property: none !important;
  /* CSS transforms */
  -o-transform: none !important;
  -moz-transform: none !important;
  -webkit-transform: none !important;
  transform: none !important;
  /* CSS animations */
  -webkit-animation: none !important;
  -moz-animation: none !important;
  -o-animation: none !important;
  animation: none !important;
}
</style>

<!-- AdminLTE JavaScript -->


<!-- Custom scripts loaded AFTER AdminLTE JavaScript (inlined for show) -->
<script>
$(function ($) {
  var $body = $('body');
  // On click, capture state and save it in localStorage
  $($.AdminLTE.options.sidebarToggleSelector).click(function () {
    localStorage.setItem('sidebar', $body.hasClass('sidebar-collapse') ? 1 : 0);
  });

  // On ready, read the set state and collapse if needed
  if (localStorage.getItem('sidebar') === '0') {
    $body.addClass('disable-animations sidebar-collapse');
    requestAnimationFrame(function () {
      $body.removeClass('disable-animations');
    });
  }
});
</script>
