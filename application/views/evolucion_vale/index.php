<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Evolucion Vale Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('evolucion_vale/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Vale</th>
						<th>Id Estado</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Id Responsable</th>
						<th>Observacion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($evolucion_vale as $e){ ?>
                    <tr>
						<td><?php echo $e['id_vale']; ?></td>
						<td><?php echo $e['id_estado']; ?></td>
						<td><?php echo $e['fecha']; ?></td>
						<td><?php echo $e['hora']; ?></td>
						<td><?php echo $e['id_responsable']; ?></td>
						<td><?php echo $e['observacion']; ?></td>
						<td>
                            <a href="<?php echo site_url('evolucion_vale/edit/'.$e['']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('evolucion_vale/remove/'.$e['']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
