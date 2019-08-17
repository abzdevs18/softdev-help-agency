<?php
	include('../constants.php');
	?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <script src="https://kit.fontawesome.com/618fa0761b.js"></script> -->

	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/user_style.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
	<nav>
		<div class="user-navigation">
			<div class="logo-user">
				<div class="l-r-prof">
					<img src="<?php echo root_folder . '/assets/img/black-logo.png' ?>">
				</div>
				<div class="search-field-prof">
					<i class="fas fa-search"></i>
					<input type="text" name="search" placeholder="search" id="prof-query">
					<span id="clear-search"><i class="far fa-times"></i></span>
				</div>
			</div>
			<div class="user-right-nav">
				<div id="nav-links">
					<ul>
						<li>My Projects</li>
						<li>Dashboards</li>
						<li id="account-profile">
							<div id="account-thumbnail">
								<img src="<?php echo root_folder . '/assets/img/profiles/prof.png' ?>">
							</div>
							<div>								
								<span style="font-weight: 700;">Diomar</span>
							</div>
						</li>
					</ul>
				</div>
				<div style="width: auto;border: 0.1em solid #f4f4f4;border-radius: 15px;">
					
				</div>
				<div id="action-btn">
					<button><i class="fas fa-comment-dots"></i></button>
					<button><i class="fas fa-bell"></i></i></button>
					<button><i class="fas fa-sign-out-alt"></i></button>
				</div>
			</div>
		</div>
	</nav>
	<section id="menus-prof-dashboard">
		<ul>
			<li class="active-second-menu"><a href="index.php">My Projects</a></li>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="message.php">Inbox</a></li>
			<li><a href="feedback.php">Feedback</a></li>
		</ul>
	</section>

