<!DOCTYPE html>
<html lang="en">

    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $title; ?></title>
	<!-- Bootstrap core CSS-->
	<link href="<?php echo base_url() ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ?>assets/admin/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="bg-dark">
	<div class="container">
	    <div class="mx-auto mt-5">
		<?php $this->load->view('admin/includes/success_error'); ?>
	    </div>
	    <div class="card card-login mx-auto mt-5">
		<div class="card-header">Login</div>
		<div class="card-body">
		    <?php echo form_open(base_url('admin/login')); ?>
		    <div class="form-group">
			<label for="email">Email address</label>
			<input class="form-control" id="email" type="text" placeholder="Enter email" name="email" value="<?php echo set_value('email'); ?>">
			<?php echo form_error('email'); ?>
		    </div>
		    <div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" id="password" type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
			<?php echo form_error('password'); ?>
		    </div>
		    <button class="btn btn-primary btn-block" type="submit">Login</button>
		    <?php form_close(); ?>
		    <div class="clearfix">&nbsp;</div>
		    <div class="text-center">
			<a class="d-block small" href="forgot-password.html">Forgot Password?</a>
		    </div>
		</div>
	    </div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>

</html>
