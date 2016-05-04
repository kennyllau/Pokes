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
	<div class="seven columns">
		<h2>Welcome, <?php echo ucfirst($this->session->userdata['alias'])  ;?>!!</h2>
		<h4><?= $total_poke_count['COUNT(*)']?>  people poked you!</h4>
	</div>
	<div class="two columns u-pull-right">	
		<a href="/logins/destroy">Log Out</a>
	</div>	
</div>

<div class="row">
	<div class="six columns">
		
<?php
	foreach($people_count as $key){  ?>

		<h6><?=$key['user_name']?> poked you <?=$key['count']?> times</h6>

<?php } ?>

	</div>
</div>


<?php
// var_dump($total_pokes);
// var_dump($total_poke_count);
// var_dump($people_count);
// die();
?>


<div class="row">		
	<div class="twelve columns u-full-width">

		<h4>People you may want to poke:</h4>
		<table class="u-full-width">
		  <thead>

		    <tr>
		      <th>Name</th>
		      <th>Alias</th>
		      <th>Email Address</th>
		      <th>Poke History</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		 
<?php
foreach($other_user as $value){ ?>		  	
		    <tr>
		      <td><?= $value['name']?> </td>
		      <td><?= $value['alias']?> </td>
		      <td><?= $value['email']?> </td>
		      <td><?= $value['poke_count']?> </td>
		      <td>
		      	<form action="/main/addpoke/<?=$value['id']?>" method="post"><button type="submit" class="button-primary">Poke!</button></form>
		      </td>
		    </tr>
<?php }?>		    
		  </tbody>
		</table>
	</div>
</div>
</div> <!-- end container -->
</body>
</html>