<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Roles Group Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('role/'); ?>" class="btn btn-info btn-sm">Ver Roles</a>
                    <a href="<?php echo site_url('roles_group/add'); ?>" class="btn btn-success btn-sm">Add</a>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>User Id</th>
						<th>Rol Id</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($roles_group as $r){ ?>
                    <tr>
						<td><?php echo $r['first_name'].', '.$r['last_name']; ?></td>
						<td><?php echo $r['nombre_rol']; ?></td>
						<td>
                            <a href="<?php echo site_url('roles_group/edit/'.$r['id_rol_']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('roles_group/remove/'.$r['id_rol_']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
