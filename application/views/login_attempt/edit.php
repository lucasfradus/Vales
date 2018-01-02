<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Login Attempt Edit</h3>
            </div>
			<?php echo form_open('login_attempt/edit/'.$login_attempt['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ip_address" class="control-label">Ip Address</label>
						<div class="form-group">
							<input type="text" name="ip_address" value="<?php echo ($this->input->post('ip_address') ? $this->input->post('ip_address') : $login_attempt['ip_address']); ?>" class="form-control" id="ip_address" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="login" class="control-label">Login</label>
						<div class="form-group">
							<input type="text" name="login" value="<?php echo ($this->input->post('login') ? $this->input->post('login') : $login_attempt['login']); ?>" class="form-control" id="login" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="time" class="control-label">Time</label>
						<div class="form-group">
							<input type="text" name="time" value="<?php echo ($this->input->post('time') ? $this->input->post('time') : $login_attempt['time']); ?>" class="form-control" id="time" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>