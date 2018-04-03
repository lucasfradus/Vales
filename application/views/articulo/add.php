<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Crear Nuevo Articulo</h3>
            </div>
            <?php echo form_open('articulo/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
						<label for="id_un_med1" class="control-label"><span class="text-danger">*</span>Unidad de Medida 1</label>
						<div class="form-group">
							<select name="id_un_med1" class="form-control select2">
								<?php
								foreach($all_fk_un_med as $fk_un_med)
								{
									$selected = ($fk_un_med['id_un_medida'] == $this->input->post('id_un_med1')) ? ' selected="selected"' : "";

									echo '<option value="'.$fk_un_med['id_un_medida'].'" '.$selected.'>'.$fk_un_med['un_medida'].' | '.$fk_un_med['nombre_un_medida'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_un_med1');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="id_un_med2" class="control-label">Unidad de Medida 2</label>
						<div class="form-group">
							<select name="id_un_med2" class="form-control select2">
								<?php
								foreach($all_fk_un_med as $fk_un_med)
								{
									$selected = ($fk_un_med['id_un_medida'] == $this->input->post('id_un_med2')) ? ' selected="selected"' : "";

									echo '<option value="'.$fk_un_med['id_un_medida'].'" '.$selected.'>'.$fk_un_med['un_medida'].' | '.$fk_un_med['nombre_un_medida'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_un_med2');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="num_articulo" class="control-label"><span class="text-danger">*</span>Número de Articulo</label>
						<div class="form-group">
							<input type="text" name="num_articulo" value="<?php echo $this->input->post('num_articulo'); ?>" class="form-control" id="num_articulo" />
							<span class="text-danger"><?php echo form_error('num_articulo');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="descripcion1" class="control-label"><span class="text-danger">*</span>Descripcion1</label>
						<div class="form-group">
							<input type="text" name="descripcion1" value="<?php echo $this->input->post('descripcion1'); ?>" class="form-control" id="descripcion1" />
							<span class="text-danger"><?php echo form_error('descripcion1');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="descripcion2" class="control-label"><span class="text-danger">*</span>Descripcion2</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?php echo $this->input->post('descripcion2'); ?>" class="form-control" id="descripcion2" />
							<span class="text-danger"><?php echo form_error('descripcion2');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="descripcion2" class="control-label">Texto de Busqueda</label>
						<div class="form-group">
							<input type="text" name="descripcion2" value="<?php echo $this->input->post('descripcion2'); ?>" class="form-control" id="descripcion2" />
							<span class="text-danger"><?php echo form_error('descripcion2');?></span>
						</div>
					</div>

					<div class="col-md-12">
					<div align="center"><h4>Tipos de Categorias</h4></div>
						<div class="col-md-3">
							<label for="category_type" class="control-label"><span class="text-danger">*</span>Tipo de Categoria Familia</label>
							<div class="form-group">
								<select name="category_type"  class="form-control" id="category_type">
									<?php
									foreach($categoy_family as $cat_fam)
									{
										$selected = ($cat_fam['id_fk_categoria'] == $this->input->post('cat_fam')) ? ' selected="selected"' : "";

										echo '<option value="'.$cat_fam['id_fk_categoria'].'" '.$selected.'>'.$cat_fam['nombre_categoria'].' | '.$cat_fam['descripcion_categoria'].'</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('category_type');?></span>
							</div>
						</div>
						<div class="col-md-3">
							<label for="category_type" class="control-label"><span class="text-danger">*</span>Tipo de Categoria Codigo 1</label>
							<div class="form-group">
								<select name="category_type" class="form-control" id="category_type">
									<option>Sin Categoria</option>
									<?php
									foreach($categoy_cod1 as $cat_cod1)
									{
										$selected = ($cat_cod1['id_fk_categoria'] == $this->input->post('cat_cod1')) ? ' selected="selected"' : "";

										echo '<option value="'.$cat_cod1['id_fk_categoria'].'" '.$selected.'>'.$cat_cod1['nombre_categoria'].' | '.$cat_cod1['descripcion_categoria'].'</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('category_type');?></span>
							</div>
						</div>
						<div class="col-md-3">
							<label for="category_type" class="control-label"><span class="text-danger">*</span>Tipo de Categoria Codigo 2</label>
							<div class="form-group">
								<select name="category_type" class="form-control" id="category_type">
									<option>Sin Categoria</option>
									<?php
									foreach($categoy_cod2 as $cat_cod2)
									{
										$selected = ($cat_cod2['id_fk_categoria'] == $this->input->post('cat_cod2')) ? ' selected="selected"' : "";

										echo '<option value="'.$cat_cod2['id_fk_categoria'].'" '.$selected.'>'.$cat_cod2['nombre_categoria'].' | '.$cat_cod2['descripcion_categoria'].'</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('category_type');?></span>
							</div>
						</div>
						<div class="col-md-3">
							<label for="category_type" class="control-label"><span class="text-danger">*</span>Tipo de Categoria Codigo 3</label>
							<div class="form-group">
								<select name="category_type" class="form-control" id="category_type">
									<option>Sin Categoria</option>
									<?php
									foreach($categoy_cod3 as $cat_cod3)
									{
										$selected = ($cat_cod3['id_fk_categoria'] == $this->input->post('cat_cod3')) ? ' selected="selected"' : "";

										echo '<option value="'.$cat_cod3['id_fk_categoria'].'" '.$selected.'>'.$cat_cod3['nombre_categoria'].' | '.$cat_cod3['descripcion_categoria'].'</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('category_type');?></span>
							</div>
						</div>
						<div align="center"><h4>Información Adicional</h4></div>
						<div class="col-md-4">
							<label for="category_type" class="control-label"><span class="text-danger">*</span>Tipo de Linea</label>
								<div class="form-group">
									<select name="category_type" class="form-control" id="category_type">
										<option> S </option>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<label for="category_type" class="control-label"><span class="text-danger">*</span>Tipo de Almacenamiento</label>
									<div class="form-group">
										<select name="category_type" class="form-control" id="category_type">
											<option> P </option>
											<option> F </option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<label for="category_type" class="control-label"><span class="text-danger">*</span>Codigo de Venta</label>
										<div class="form-group">
											<select name="category_type" class="form-control" id="category_type">
												<option> 99 </option>
												<option> 98 </option>
											</select>
										</div>
									</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
          	</div>
            <?php echo form_close(); ?>

<script>

$(document).ready(function() {
    $('.select2').select2();
});
function get_child_cat() {
	$("#category").empty();
	var input_data = $( "#category_type option:selected" ).val();
	console.log("id de categoria seleccionado: ", input_data );
	$.ajax({
	    type: "POST",
	    url: "<?php echo base_url(); ?>" + "fk_categoria/get_all_fk_categorias_codigo",
	     data: {search: input_data},
			 dataType:'JSON',
	    success: function(data) {
				$("#category").empty();
				var len = data.length;

							$("#category").empty();
							for( var i = 0; i<len; i++){
								console.log(data[i]);
									$("#category").append("<option value='"+data[i].id_fk_categoria+"'>"+data[i].nombre_categoria+" | "+data[i].descripcion_categoria+"</option>");
								}
	    },
	    error: function(data){
	    console.log("error ");
	       // alert("fail");
	    }
	});

}

</script>
