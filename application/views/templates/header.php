<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="./assets/images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/litera/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/litera/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/litera/_variables.scss">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/litera/_bootswatch.scss">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway:800|Roboto:300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./assets/css/text.css">
	<title>BAD: Book A Doctor</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="<?php echo base_url(); ?>"><b>BAD</b> <i class="fa fa-user-md"></i></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor03">
	    <ul class="navbar-nav mr-auto">
	      <?php if(!$this->session->userdata('logged_in')): ?>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	    	<ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
	      </li>
	      <li class="nav-item">
	        <a class="btn btn-outline-success" href="<?php echo base_url(); ?>users/register">Register</a>
	      </li>
	  <?php endif; ?>
	  <?php if($this->session->userdata('logged_in')): ?>
	  	<li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>posts">Dashboard</a>
	      </li>
	     <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>users/doctors">Doctors</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	    	<ul class="navbar-nav mr-auto">
	  	<li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Appointment</a>
	      </li>
	      <li class="nav-item">
	      <div class="btn-group">
			  <button type="button" class="btn nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Hello, <?php echo $this->session->userdata('username'); ?>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
			    <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
			  </div>
			</div>
		</li>
	  <?php endif; ?>
		    </ul>
	    </form>
	  </div>
	</nav>

	<div class="container">

		<?php if($this->session->flashdata('user_registered')): ?>
		<?php echo "<div class='alert alert-success' role='alert'>" .$this->session->flashdata('user_registered'). "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('post_created')): ?>
		<?php echo "<div class='alert alert-success' role='alert'>" .$this->session->flashdata('post_created'). "</div>"; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('login_failed')): ?>
		<?php echo "<div class='alert alert-danger' role='alert'>" .$this->session->flashdata('login_failed'). "</div>"; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_loggedin')): ?>
		<?php echo "<div class='alert alert-success' role='alert'>" .$this->session->flashdata('user_loggedin'). "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_loggedout')): ?>
		<?php echo "<div class='alert alert-warning' role='alert'>" .$this->session->flashdata('user_loggedout'). "</div>"; ?>
		<?php endif; ?>