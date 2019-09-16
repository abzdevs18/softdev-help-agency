<!DOCTYPE html>
<html>
<head>
	<title><?=SITE_NAME;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="<?=URL_ROOT?>/img/cap.ico">
	<!-- <script src="https://kit.fontawesome.com/618fa0761b.js"></script> -->

	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/mainStyle.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/user_style.css">
	<style type="text/css">
		@import url("<?=URL_ROOT;?>/css/static_style.css");
		@import url("<?=URL_ROOT;?>/css/footer.css");
	</style>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>
<body>
	<nav style="position: sticky;top: 0px;background: #fff;z-index: 99;width: calc( 100% - 120px );">
		<div class="user-navigation">
			<div class="logo-user">
				<div class="l-r-prof">
					<img src="<?php echo URL_ROOT . '/img/black-logo.png' ?>">
				</div>
				<div style="width: 100%;position: relative;">
					<div class="search-field-prof">
						<i class="fas fa-search"></i>
						<input type="text" name="search" placeholder="search" id="prof-query" autocomplete>
						<span id="clear-search"><i class="far fa-times"></i></span>
					</div>
					<div class="s-wrapper">
						<!-- Jobs to show here -->
					</div>
				</div>
			</div>
			<div class="user-right-nav">
				<div id="nav-links">
					<ul>
						<li>My Projects</li>
						<a href="<?=URL_ROOT . '/dashboard';?>">
						<li>Dashboards</li>
						</a>
							<a href="<?=URL_ROOT . '/pages/workerDetails';?>" style="text-decoration: none;">
						<li id="account-profile">
								<div id="account-thumbnail">
									<img src="<?php echo URL_ROOT . '/img/profiles/prof.png' ?>">
								</div>
								<div style="width: 85px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">								
									<span style="font-weight: 500;"><?=$_SESSION['userName'];?></span>
								</div>
						</li>
							</a>
					</ul>
				</div>
				<div style="width: auto;border: 0.1em solid #f4f4f4;border-radius: 15px;">
					
				</div>
				<div id="action-btn">
					<a href="<?=URL_ROOT . '/dashboard/message';?>"><button><i class="fas fa-comment-dots"></i></button></a>
					<button><i class="fas fa-bell"></i></i></button>
					<a href="<?=URL_ROOT;?>/users/signout"><button><i class="fas fa-sign-out-alt"></i></button></a>
				</div>
			</div>
		</div>
	</nav>
	<section id="menus-prof-dashboard">
		<ul>
			<li class="active-second-menu"><a href="<?=URL_ROOT . '/dashboard';?>">My Projects</a></li>
			<li><a href="<?=URL_ROOT . '/dashboard';?>">Dashboard</a></li>
			<li><a href="<?=URL_ROOT . '/dashboard/message';?>">Inbox</a></li>
			<li><a href="<?=URL_ROOT . '/dashboard/feedback';?>">Feedback</a></li>			
		</ul>

		<?php if($_SESSION['user_type'] == 1) :?>
			<div style="line-height: 56px;">
				<a href="<?=URL_ROOT . '/dashboard/postJob';?>" class="user_type-post">Post Job</a>
			</div>
		<?php endif; ?>
	</section>

