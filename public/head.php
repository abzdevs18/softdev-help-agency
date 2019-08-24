<?php
	include('../includes/constants.php');
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Help</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <script src="https://kit.fontawesome.com/618fa0761b.js"></script> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css"> 
	<link rel="stylesheet" type="text/css" href="assets/css/mainStyle.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/signup.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/companyProfile.css">
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>
	<nav>
		<div id="nav_container">
			<div id="logo">
				<a href="index.php"><img src="assets/img/black-logo.png"></a>
			</div>
			<ul>
				<li class="nav" data-page="home"><a href="#">HOME</a></li>
				<li class="nav" data-page="employee"><a href="#">EMPLOYEERS</a></li>
				<li class="nav" data-page="job"><a href="#">JOB OPPORTUNITIES</a></li>
				<li class="nav" data-page="contact"><a href="#">HOW IT WORKS</a></li>
				<li class="nav" data-page="about"><a href="#">ABOUT US</a></li>
			</ul>
			<div id="post_job_btn">
				<!-- <a href="#">Login</a> -->
				<a href="signup.php">create account &nbsp;<i class="fas fa-plus-circle"></i></a>
			</div>			
		</div>
	</nav>	