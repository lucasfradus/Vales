<h1><?php echo lang('forgot_password_heading');?></h1>
<p>Por Favor complete con sus datos y siga las instrucciones que recibirá vía mail.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity">Nombre de Usuario:</label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?>
