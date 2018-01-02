<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Articulos Cargados</h2> <br><br>

<div class="pull-right">
                   <div class="box-tools ">
                        <div class="col-md-6">
                            <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="<?php echo site_url('articulo/add'); ?>" class="btn btn-success">Nuevo Articulo</a>
                                      <button type="submit" class="btn btn-default" disabled>Buscar</button>
                                    </span>
                                    <input type="text" id="search_data"  class="form-control" name="search_data"  placeholder="Buscar Producto por nombre o código" onkeyup="ajaxSearch();">
                                 </div>
                                    <div id="suggestions" class="list-group"><br></div>
                            </div>




                    </div>             
                </div>
            </div>
            <div class="box-body">
               <table id="example2" class="table table-bordered table-hover">
                    <thead>
                <tr>
                        <th>Id Articulo</th>
                        <th>Código Articulo</th>
                        <th>Descripción 1</th>
                        <th>Descripción 2</th>
                        <th>UN Medida 1</th>
                        <th>UN Medida 2</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                </tr>
                </thead>
                 <tbody>
                    <?php foreach($articulos as $a){ ?>
                    <tr>
						<td><?php echo $a['id_articulo']; ?></td>
						<td><?php echo $a['num_articulo']; ?></td>
						<td><?php echo $a['descripcion1']; ?></td>
						<td><?php echo $a['descripcion2']; ?></td>
						<td><?php echo $a['UN_Medida_1']; ?></td>
						<td><?php echo $a['UN_Medida_2']; ?></td>
                         <td class="text-center">
                               <?php if($a['status'] === '1'): ?>
                                <span class="label label-success"><?php echo "Activo"; ?></span>
                              <?php else: ?>
                                <span class="label label-danger"><?php echo "Desactivado"; ?></span>
                              <?php endif;?>
                         </td>
						<td>
                              <div class="btn-group">
                  <a href="<?php echo site_url('articulo/view/'.$a['id_articulo']); ?>" class="btn btn-xs btn-info" data-toggle="tooltip" title="Ver">
                  <i class="glyphicon glyphicon-search"></i>
               </a>               
                <a href="<?php echo site_url('articulo/edit/'.$a['id_articulo']); ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="<?php echo site_url('articulo/remove/'.$a['id_articulo']); ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>

                           
                        </td>
                    </tr>
                    <?php } ?>
                     </tbody>
                </table>

                <div class="pull-right">
                    <?= $this->pagination->create_links(); ?> 
                </div>    
                    <div class="pull-left"> 
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Registros Por Pagina
                            <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('Articulos/index/per_page/20') ?>">20</a></li>
                                    <li><a href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">Todos</a></li>
                                </ul>
                        </div>                  
                </div>   
                                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function ajaxSearch()
{
    var input_data = $('#search_data').val();

    if (input_data.length === 0)
    {
        $('#suggestions').hide();
    }
    else
    {

        var post_data = {
            'search_data': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>articulo/autocompete/",
            data: post_data,
            success: function (data) {
                // return success
                if (data.length > 0) {
                    $('#suggestions').show();
                    $('#suggestions').addClass('auto_list');
                    $('#suggestions').html(data);
                }
            }
         });

     }
 }
</script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>