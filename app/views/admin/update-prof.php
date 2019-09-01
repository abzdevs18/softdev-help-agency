<?php require_once APP_ROOT . '/views/admin/inc/header.php'; ?>

	<section class="tg-dash">
		<h1>Profile Settings</h1>
	</section>
	<section class="offices-msgs">
		<div class="alerts-notif">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Profile Photo</h2>
				</div>
				<div class="prof-container">
					<div>
						<p>Drop files anywhere to upload</p>
						<p>Or</p>
						<button class="tg-btn" type="button">Select Files</button>
					</div>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Profile Details</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<strong>I’m a:</strong>
						<div class="tg-selectgroup">
							<span class="tg-radio">
								<input id="tg-mail" type="radio" name="gender" value="mail" checked="">
								<label for="tg-mail">mail</label>
							</span>
							<span class="tg-radio">
								<input id="tg-femail" type="radio" name="gender" value="femail">
								<label for="tg-femail">femail</label>
							</span>
							<span class="tg-radio">
								<input id="tg-company" type="radio" name="gender" value="company">
								<label for="tg-company">Company</label>
							</span>
						</div>
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
						<input type="email" name="password" placeholder="Email*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="Last Name*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="Phone Number*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="First Name*" class="form-control">
					</div>
					<button class="tg-btn" type="button">Update Now</button>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Change Password</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<input type="password" name="password" placeholder="Current Password" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Current Password" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Current Password" class="form-control">
					</div>
					<button class="tg-btn" type="button">Change Now</button>
				</div>
				
			</div>	
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>