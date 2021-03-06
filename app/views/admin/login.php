<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/admin_setup.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/fa/css/all.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/offline/jquery.js"></script>
	<script src="<?=URL_ROOT;?>/js/jquery-ui.js"></script>
</head>
<body>	
	<main>
		<div id="flash-msgs">
			<p>Wrong username/password</p>
		</div>
		<section class="form">	

			<div class="awesome"><!-- Admin Credential start -->
				<div class="icon">
					<!-- <i class="fal fa-user-shield"></i> -->
					<img style="width: 25%;" src="<?=URL_ROOT;?>/img/default/<?=$data['logo']->path?>">
				</div>
				<div class="add">
					<h3>Admin</h3>
					<form id="loginCredentials">
						<div class="group-control adminUVal">
							<div class="form-group">
								<input type="text" name="adminUserName" class="form-control">
								<label for="adminUserName">Username</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
						<div class="group-control adminPVal">
							<div class="form-group">
								<input type="password" name="adminUserPass" class="form-control">
								<label for="adminUserPass">Password</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
					</form>
				</div>
				<button class="setup-btn login-admin">Login</button>
			</div><!-- Admin Credential End -->
		</section>
	</main>
	<script src="<?=URL_ROOT;?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="module" src="<?=URL_ROOT;?>/js/main.js"></script>
</body>
</html>