<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/normalize.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/skeleton.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="six columns">
		<h2 class="right">Welcome <?=$userinfo['first_name']?></h2>
		</div>
		<div class="six columns u-pull-right">
		<h4 class="right"><a href="/logins/destroy">Log off</a></h4>
		</div>
	</div>
	
<hr>

	<div class="row">
		<div class="six columns">
			<table class="u-full-width">
				<thead><tr><h2>User information</h2></tr></thead>
				<tbody><tr><h5>First name: <?=$userinfo['first_name']?> </h5></tr></tbody>
				<tbody><tr><h5>Last name: <?=$userinfo['last_name']?></h5></tr></tbody>
				<tbody><tr><h5>Email address: <?=$userinfo['email']?></h5></tr></tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>