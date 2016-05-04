<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login and Registration</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/normalize.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/skeleton.css">
</head>
<body>

<div class="container">
	<div class="row">
	
		<div class="five columns">
			<form role="form" action="/registers/add" method="post" class="u-pull-left">
				<h3>Register</h3>
				<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" class="form-control" name="name">
				</div>		
				<div class="form-group">
					<label for="alias">Alias: </label>
					<input type="text" class="form-control" name="alias">
				</div>		
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label for="conpassword">Confirm password: </label>
					<input type="password" class="form-control" name="conpassword">
				</div>


				<div class="form-group">
					<label for="dob">Date of Birthday: </label>
					<select name="month">
						<?php for($i=1; $i<13; $i++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
						<?php }?>
					</select>
					<select name="day">
						<?php for($i=1; $i<32; $i++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
						<?php }?>
					</select>
					<select name="year">
						<?php for($i=1940; $i<2016; $i++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
						<?php }?>
					</select>

					<?=$this->session->flashdata('dob');?>
				</div>


				<button type="submit" class="button-primary">Register</button>
						<?=$this->session->flashdata('name'); ?>
						<?=$this->session->flashdata('alias'); ?>
						<?=$this->session->flashdata('email'); ?>
						
						<?=$this->session->flashdata('bademail'); ?>
						<?=$this->session->flashdata('badpassword'); ?>
			</form>
		</div>

		<div class="two columns">
		<br><br><br><br><br><br><br>
		<h2 class="u-pull-left">OR</h2>
		</div>

			<?=$this->session->flashdata('destroy'); ?>

		<div class="five columns u-pull-right">
			<h3>Login</h3>
						

			<form action="/logins/check" method="post">
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="text" class="form-control" name="email1">
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" class="form-control" name="password1">
				</div>
				<button type="submit" class="button-primary">Login</button>
			</form>
							<?=$this->session->flashdata('loginfail'); ?>
							<?=$this->session->flashdata('email1'); ?>
							<?=$this->session->flashdata('password1'); ?>
		</div>
	</div> <!--end of row -->
</div> <!--end of container -->
</body>
</html>