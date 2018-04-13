<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> -->


<script type="text/javascript" src="<?php echo site_url('resources\js\excel\FileSaver.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('resources\js\excel\tableexport.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources\js\excel\tableexport.css');?>" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.12.9/xlsx.full.min.js"></script>



<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                
                <h3 class="box-title">Generar Nuevo Reporte de Vales de Consumo</h3>
            </div>
            <div class"box-body">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h4 class="box-title">Criterios de Busqueda</h4>
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de Vale:</label>
                                <select class="form-control" id="tipo_de_vale">
                                    <option value="5">Todo</option>
                                    <option value="<?= $this->config->item('Tipo_Pañol') ?>">Pañol</option>
                                    <option value="<?= $this->config->item('Tipo_mprimas') ?>">M. Prima</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rango de Busqueda:</label>
                                <input type="text" class="form-control pull-right" id="reservation">
                            </div>
                        </div>
                    </div>
                </div>
                    <table class="table table-bordered table-hover" id="tablareporte">
                        <thead>
                            <tr>
                                <th># de Articlo</th>
                                <th>Descripcion 1</th>
                                <th>Cantidad</th>
                                <th># de Cuenta</th>
                                <th>Cat LM</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<script>

 </script>

 <script>
$('#reservation').daterangepicker({
    "showCustomRangeLabel": false,
}, function(start, end, label) {
    console.log($('#tipo_de_vale option:selected').val());
        $.ajax({
            url:"<?php echo base_url(); ?>reportes/test/",
            method: "POST", // or POST
            data: {
                from: start.format('YYYY-MM-DD'),
                to: end.format('YYYY-MM-DD'),
                sucursal:$('#tipo_de_vale option:selected').val(),
            },
            success:function(result) {
                console.log(result);
                $("#tablareporte tbody").empty();
                if(result){
                    response = $.parseJSON(result);
                                    $(function() {
                                    $.each(response, function(i, item) {
                                        var newRowContent = '<tr><td>'+item.num_art+'</td><td>'+item.descr+'</td><td>'+item.cant+'</td><td>'+item.cod_lm+'</td><td>'+item.fase.concat(item.cat_lm)+'</td></tr>';
                                      $("#tablareporte tbody").append(newRowContent);


                                    });
                                    });
                                    $("#tablareporte").tableExport({
                                        formats: ['xls','xlsx', 'csv', 'txt'],
                                        filename: 'Reporte-'+start.format('YYYY-MM-DD')+'-'+end.format('YYYY-MM-DD'),
                                        bootstrap: true,
                                        exportButtons: true,
                                    });
                }else{
                    console.log('vacio');
                     $("#tablareporte tbody").append('<span class="text-danger">No se han encontrado resultados </span>');

                      }

            }
        });
    });
</script>
<script>

</script>
