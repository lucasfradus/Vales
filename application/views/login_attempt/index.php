<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Login Attempts Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('login_attempt/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Ip Address</th>
						<th>Login</th>
						<th>Time</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($login_attempts as $l){ ?>
                    <tr>
						<td><?php echo $l['id']; ?></td>
						<td><?php echo $l['ip_address']; ?></td>
						<td><?php echo $l['login']; ?></td>
						<td><?php echo $l['time']; ?></td>
						<td>
                            <a href="<?php echo site_url('login_attempt/edit/'.$l['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('login_attempt/remove/'.$l['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
