<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/sumalian";?>/css/admin_setup.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>

	<main>
		<section class="steps-container">
			<ul class="progress">
				<li class="active"></li>
				<li></li>
				<li></li>
			</ul>			
		</section>
		<section class="form">
			<div class="awesome">
				<div class="icon">
					<i class="fal fa-thumbs-up"></i>
				</div>
				<div class="add">
					<h3>Awesome</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<button class="setup-btn" data-form="1">Setup</button>
			</div>
			<div class="awesome"><!-- Database connection start -->
				<div class="icon">
					<i class="fal fa-database"></i>
				</div>
				<div class="add">
					<h3>Database credentials</h3>
					<form id="c-n" data-type="crd">
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="databaseName" class="form-control">
								<label for="databaseName">Database Name</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="hostName" class="form-control">
								<label for="hostName">Host Name</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="userName" class="form-control">
								<label for="userName">Username</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="userPass" class="form-control">
								<label for="userPass">Password</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
					</form>
				</div>
				<button class="setup-btn" data-form="2">Setup</button>
			</div><!-- Database connection End -->

			<div class="awesome"><!-- Admin Credential start -->
				<div class="icon">
					<i class="fal fa-user-shield"></i>
				</div>
				<div class="add">
					<h3>Site/Admin setup</h3>
					<form>
						<div class="site-photo">
							<div class="photo-container" style="width: 130px;height: 100px;background-color: red;border-radius: 3px;">
								
							</div>
							<div class="group-control" style="width: calc( 100% - 150px );position: relative;bottom: -40px;">
								<div class="form-group">
									<input type="text" name="siteName" class="form-control">
									<label for="siteName">Site Name</label>
								</div>
								<label class="invalid-feedback">Error reporting</label>
							</div>
						</div><!-- End Site Name Input -->
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="adminEmail" class="form-control">
								<label for="adminEmail">Host Name</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Admin Email Input -->
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="adminUserName" class="form-control">
								<label for="adminUserName">Username</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="adminUserPass" class="form-control">
								<label for="adminUserPass">Password</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
						<div class="group-control">
							<div class="form-group">
								<input type="text" name="adminUserCPass" class="form-control">
								<label for="adminUserCPass">Confirm Password</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div><!-- End Database Name Input -->
					</form>
				</div>
				<button class="setup-btn" data-form="3">Setup</button>
			</div><!-- Admin Credential End -->
		</section>
	</main>
	<div class="modal" style="display: none;">
		<div class="modal-container">
			<section class="form">
				<div class="awesome" style="width: 80%;">
					<div class="icon">
						<i class="fal fa-check"></i>
					</div>
					<div class="add">
						<h3>You're all setup</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<button class="setup-btn" style="display: block;font-weight: 200;">continue login</button>
					<a href="#" class="login-link"><i class="fal fa-long-arrow-left"></i> back to website</a>
				</div>
			</section>			
		</div>
	</div>
	<script src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/sumalian";?>/js/main.js"></script>
</body>
</html>