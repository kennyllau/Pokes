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
			<h3>Login</h3>
						
			<?=$this->session->flashdata('destroy'); ?>

			<form action="/logins/check" method="post">
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" class="form-control" name="password">
				</div>
							<?=$this->session->flashdata('loginfail'); ?>
				<button type="submit" class="button-primary">Login</button>
			</form>
		</div>

		<div class="two columns">
		<br><br><br><br><br><br><br>
		<h2 class="u-pull-left">OR</h2>
		</div>

		<div class="five columns">
			<form role="form" action="/registers/add" method="post" class="u-pull-right">
				<h3>Register</h3>
				<div class="form-group">
					<label for="first_name">First name: </label>
					<input type="text" class="form-control" name="first_name">
				</div>		
				<div class="form-group">
					<label for="last_name">Last name: </label>
					<input type="text" class="form-control" name="last_name">
				</div>		
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="text" class="form-control" name="email">
				</div>

				<div class="form-group">
					<label for="dob">Date of Birthday: </label>
					<select name="month">
						<?php for($i=1; $i<13; $i++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
						<?php }?>
					</select>
					<select name="date">
						<?php for($i=1; $i<32; $i++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
						<?php }?>
					</select>
					<select name="year">
						<?php for($i=1940; $i<2016; $i++){ ?>
						<option value="<?= $i?>"><?= $i?></option>
						<?php }?>
					</select>

					
				</div>

				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label for="conpassword">Confirm password: </label>
					<input type="password" class="form-control" name="conpassword">
				</div>
				<button type="submit" class="button-primary">Register</button>
						<?=$this->session->flashdata('bademail'); ?>
						<?=$this->session->flashdata('badpassword'); ?>
			</form>
		</div>
	</div> <!--end of row -->
</div> <!--end of container -->
</body>
</html>