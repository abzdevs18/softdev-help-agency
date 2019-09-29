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
				<button class="setup-btn">Setup</button>
			</div><!-- Admin Credential End -->
		</section>
	</main>
</body>
</html>