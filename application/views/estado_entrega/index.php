<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Estado Entrega Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('estado_entrega/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Estado Entrega</th>
						<th>Nombre Estado</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($estado_entrega as $e){ ?>
                    <tr>
						<td><?php echo $e['id_estado_entrega']; ?></td>
						<td><?php echo $e['nombre_estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('estado_entrega/edit/'.$e['id_estado_entrega']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('estado_entrega/remove/'.$e['id_estado_entrega']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
