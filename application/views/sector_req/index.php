<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sector Req Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('sector_req/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Sector Req</th>
						<th>Nombre Sector</th>
                        <th>FASE</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($sector_req as $s){ ?>
                    <tr>
						<td><?php echo $s['id_sector_req']; ?></td>
						<td><?php echo $s['nombre_sector']; ?></td>
                        <td><?php echo $s['FASE']; ?></td>
						<td>
                            <a href="<?php echo site_url('sector_req/edit/'.$s['id_sector_req']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('sector_req/remove/'.$s['id_sector_req']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
