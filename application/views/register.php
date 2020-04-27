<!DOCTYPE html>
<html>
<head>
	<title>Complete User Registration and Login System in Codeigniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="container">
	<br />
	<h3 align="center">Complete User Registration and Login System in Codeigniter</h3>
	<br />
	<div class="panel panel-default">
		<div class="panel-body">
			<?php
			if ($this->session->flashdata('message'))
			{
				echo '
				<div class="alert alert-success">
					'.$this->session->flashdata("message").';
				</div>
				';
			}
			?>
			<form method="post" action="<?php echo base_url(); ?>register/validation">
				<div class="form-group">
					<label>Enter Your Name</label>
					<input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>" />
					<span class="text-danger"><?php echo form_error('user_name'); ?></span>
				</div>
				<div class="form-group">
					<label>Enter Your Valid Email Address</label>
					<input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
					<span class="text-danger"><?php echo form_error('user_email'); ?></span>
				</div>
				<div class="form-group">
					<label>Enter Password</label>
					<input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
					<span class="text-danger"><?php echo form_error('user_password'); ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="register" value="Register" class="btn btn-info" />
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
