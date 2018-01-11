<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Roles</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('role/add'); ?>" class="btn btn-success btn-sm">Agregar</a>

                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>#ID del Rol</th>
						<th>Nombre del Rol</th>
						<th>Descripcion del Rol</th>
						<th>Acciones</th>
                    </tr>
                    <?php foreach($roles as $r){ ?>
                    <tr>
						<td><?php echo $r['id_rol']; ?></td>
						<td><?php echo $r['nombre_rol']; ?></td>
						<td><?php echo $r['descripcion_rol']; ?></td>
						<td>
                            <a href="<?php echo site_url('role/edit/'.$r['id_rol']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('role/remove/'.$r['id_rol']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
