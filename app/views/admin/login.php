<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/admin_setup.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
</head>
<body>

	<main>
		<section class="form">	

			<div class="awesome"><!-- Admin Credential start -->
				<div class="icon">
					<i class="fal fa-user-shield"></i>
				</div>
				<div class="add">
					<h3>Site/Admin Login</h3>
					<form>
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
					</form>
				</div>
				<button class="setup-btn">Login</button>
			</div><!-- Admin Credential End -->
		</section>
	</main>
</body>
</html>