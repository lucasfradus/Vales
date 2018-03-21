<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Articulos Cargados</h2> <br><br>
                <div class="box-tools">

                    <a href="<?=site_url('articulo/add'); ?>" class="btn btn-success btn-sm">Crear Nuevo Articulo</a>
                    <a href="<?=site_url('articulo/bulk_add'); ?>" class="btn btn-info btn-sm">Carga Masiva de Articulos</a>
                </div>
            <div class="col-md-6">
            <select name="articulo" class="select2" onChange="get_un_med()" style="width: 100%" id="articulo" ></select>
            </div>
            <div class="box-body">
               <table class="table table-bordered table-hover">
                    <thead>
                <tr>
                        <th>Id Articulo</th>
                        <th>Código Articulo</th>
                        <th>Descripción 1</th>
                        <th>Descripción 2</th>
                        <th>UN Medida 1</th>
                        <th>UN Medida 2</th>
                        <th>Estado</th>
                        <th class="nosort" >Acciones</th>
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
                <a href="<?php echo site_url('articulo/remove/'.$a['id_articulo']); ?>" class="<?= ($a['status'] == $this->config->item('Inactivo') ? 'btn btn-xs btn-success' : 'btn btn-xs btn-danger') ?>" data-toggle="tooltip" title="<?= ($a['status'] == $this->config->item('Inactivo') ? 'Habilitar' : 'Deshabilitar') ?>">
                  <i class="<?= ($a['status'] == $this->config->item('Inactivo') ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove') ?>"></i>
                </a>
                </div>


                        </td>
                    </tr>
                    <?php } ?>
                     </tbody>
                </table>
                <p><?php echo $links; ?></p>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
					 $('.select2').select2({
						placeholder: 'Buscar Articulo por Descripción o Código',
						allowClear: true,
						language:{
							inputTooShort: function () {
						    return "Al menos se deben ingresar 3 caracteres";
						  }
						},
						 minimumInputLength: 3,
							 ajax:{
									 url: "<?php echo base_url('articulo/autocompete'); ?>",
									 dataType: "json",
									 delay: 250,
									 data: function(params){
											 return{
													 search: params.term
											 };
									 },
									 processResults: function(data){
											 var results = [];

											 $.each(data, function(index, item){
													 results.push({
															 id: item.id_articulo,
															 text: item.descripcion1,
                                                             value:'<a href=#>'+item.id_articulo+'</a>'

													 });
											 });
											 return{
													 results: results
											 };
									 }
							 }
					 });
	 </script>



<script type="text/javascript">

$('#search_data').on('click', function(){
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
 });
</script>


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
