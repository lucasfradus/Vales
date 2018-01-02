<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fk Un Med Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fk_un_med/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Un Medida</th>
						<th>Un Medida</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($fk_un_med as $f){ ?>
                    <tr>
						<td><?php echo $f['id_un_medida']; ?></td>
						<td><?php echo $f['un_medida']; ?></td>
						<td>
                            <a href="<?php echo site_url('fk_un_med/edit/'.$f['id_un_medida']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('fk_un_med/remove/'.$f['id_un_medida']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
