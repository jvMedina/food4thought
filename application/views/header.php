<!DOCTYPE html>
<html>
  <head>
    <title>Food For Thought</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url();?>public/css/header.css" rel="stylesheet">
	<link href="<?php echo base_url();?>public/css/bootstrap.css" rel="stylesheet">
	<script src="<?php echo base_url();?>public/js/jquery-1.11.1.js"></script>
	<script src="<?php echo base_url();?>public/js/jquerybootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation" style="margin-bottom:30px;">
			  <div class="container">
					<div class="navbar-header">
						<img src="<?php echo base_url();?>public/images/logo.png" width="10%" class="pull-left">
						<a class="navbar-brand" id="nameLog" href="<?php echo base_url();?>index.php/admin/index">food4thought</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse pull-right">
						  <ul class="nav navbar-nav">
						  <?php echo $this->globals->menuAdmin($this->uri->segment(2));?>
						  <li><a href="<?php echo base_url();?>index.php/admin/logout">Logout</a></li>
								<!-- <li class="active"><a href="<?php echo base_url();?>index.php/admin/index">Home</a></li>
							<li><a href="<?php echo base_url();?>index.php/admin/category">Category</a></li>
							<li><a href="<?php echo base_url();?>index.php/admin/client">Client</a></li>
							<li><a href="<?php echo base_url();?>index.php/admin/users">Users</a></li>
							<li><a href="<?php echo base_url();?>index.php/admin/logout">Logout</a></li> -->
						  </ul>
					</div>
			  </div>
		</nav>
	<div class="container" style="margin-top:100px;">
			<?php if($this->session->flashdata('message')){?>
			<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message');?></div>
			<?php } ?>