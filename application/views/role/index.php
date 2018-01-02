<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Roles Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('role/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Rol</th>
						<th>Nombre Rol</th>
						<th>Descripcion Rol</th>
						<th>Actions</th>
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
