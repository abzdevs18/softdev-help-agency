<!DOCTYPE html>
<html>
<head>
	<title><?=SITE_NAME;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="<?=URL_ROOT?>/img/cap.ico">
	<!-- <script src="https://kit.fontawesome.com/618fa0761b.js"></script> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://cdndevelopment.blob.core.windows.net/cdn/fa/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/mainStyle.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/user_style.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/profile.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/jquery.mCustomScrollbar.css">
	<style type="text/css">
		@import url("<?=URL_ROOT;?>/css/static_style.css");
		@import url("<?=URL_ROOT;?>/css/footer.css");
	</style>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- 		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"></script> -->
	  <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
</head>
<body style="position:relative;">
	<!-- Modal for confirmation in deleting Blog -->
	<div class="confirmationModal" style="display:none;">
		<div class="confirmationMessage">
			<h2></h2>
			<div class="actionButtonModal">
				<button>Continue</button>
				<button id="cancelDeletion">Ok</button>
			</div>
		</div>
	</div>
	<!-- End of modal blog Deletion -->
	<nav style="position: sticky;top: 0px;background: #fff;z-index: 99;width: calc( 100% - 120px );">
		<div class="user-navigation">
			<div class="logo-user">
				<div class="l-r-prof">
					<img src="<?=SITE_LOGO;?>">
				</div>
				<div style="width: 100%;position: relative;">
					<div class="search-field-prof">
						<i class="fas fa-search"></i>
						<input type="hidden" id="userID" value="<?=$_SESSION['uId'];?>">
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
						<?php if($_SESSION['user_type'] == 1) :?>
							<div style="line-height: 46px;margin-right: 15px;">
								<a href="<?=URL_ROOT . '/dashboard/postJob';?>" class="user_type-post"><i class="fas fa-plus-circle"></i> Post Job</a>
							</div>
						<?php endif; ?>
						<li><a href="<?=URL_ROOT . '/dashboard';?>">Dashboard</a></li>
							<a href="<?=URL_ROOT . '/dashboard/profile';?>" style="text-decoration: none;">
						<li id="account-profile">
								<div id="account-thumbnail" style="background-image: url('<?php echo URL_ROOT . '/img/profiles/' . $data['userData']->userImage; ?>');">
								</div>
								<div style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">								
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