<?php include 'head.php'; ?>
	<section class="signup-form">
		<div class="form-s" style="display: none;">
			<div class="Fields">
				<div class="header-menu">
					<h3>Personal Information</h3>
					<div class="type-account">
						<span>Employer</span>
						<span id="active-type-acc">Worker</span>
					</div>
				</div>
				<!-- Fields -->
				<div id="fname" style="width: calc( 100% - 10px );display: flex;justify-content: space-between;">
					<div class="f-form">
						<label for="fname">First name:</label>
						<input type="text" name="fname" placeholder="Richar">
					</div>
					<div class="f-form">
						<label for="lname">Last name:</label>
						<input type="text" name="lname" placeholder="Hendricks">
					</div>					
				</div>
				<div class="f-form">
					<label for="email">Email Address:</label>
					<input type="email" name="email" placeholder="support@gmail.com">
					<!-- Icon -->
					<i class="fal fa-envelope"></i>
				</div>
				<div class="f-form">
					<label for="phone">Phone Number:</label>
					<input type="text" name="phone" placeholder="+63935-098-3294">
					<!-- Icon -->
					<i class="fal fa-phone"></i>
				</div>
				<div class="f-form">
					<label for="location">Where are you now?:</label>
					<input type="txt" name="location" placeholder="Dumaguete City">
					<!-- Icon -->
					<i class="fal fa-compass"></i>
				</div>
				<div class="next-submit">
					<a href="#">Next <i class="fal fa-angle-right"></i></a>
				</div>
			</div>
			<div class="Sidebar-form">
				<!-- Sidebar form -->
				<div class="counter">
					<span class="c-active-state"></span>
					<span></span>
					<span></span>
				</div>
				<div class="r-data">
					<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
						<div class="s-icon">
							<img src="<?php echo root_folder . '/assets/img/signup_icon/person.png';?>">
						</div>
					</div>
					<div class="s-descrip">
						<h3>irure dolor in reprehend</h3>
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="f-sign-right">
					<p>+63935-024-63458</p>
					<p>support@help.com</p>
				</div>
			</div>
		</div><!-- First Form -->
		<div class="form-s">
			<div class="Fields">
				<div class="header-menu">
					<h3>Personal Information</h3>
					<div class="type-account">
						<span>Employer</span>
						<span id="active-type-acc">Worker</span>
					</div>
				</div>
				<!-- Fields -->
				<div class="f-form">
					<label for="comp">Company Name:</label>
					<input type="text" name="comp" placeholder="Company Name">
					<!-- Icon -->
					<i class="fal fa-building"></i>
				</div>
				<div class="f-form">
					<label for="comp-email">Company Email:</label>
					<input type="email" name="comp-email" placeholder="Company Name">
					<!-- Icon -->
					<i class="fal fa-envelope"></i>
				</div>

				<div class="f-form">
					<label for="comp-phone">Company Phone Number:</label>
					<input type="text" name="comp-phone" placeholder="+63935-098-3294">
					<!-- Icon -->
					<i class="fal fa-phone"></i>
				</div>
				<div class="f-form">
					<label for="position">Your position in Company:</label>
					<input type="text" name="position" placeholder="Dumaguete City">
					<!-- Icon -->
					<i class="fal fa-id-card"></i>
				</div>
				<div class="next-submit">
					<a href="#" style="background: #d3d3d3;color: #666;"><i class="fal fa-angle-left"></i>&nbsp; Back</a>
					<a href="#">Next <i class="fal fa-angle-right"></i></a>
				</div>
			</div>
			<div class="Sidebar-form">
				<!-- Sidebar form -->
				<div class="counter">
					<span class="c-active-state"></span>
					<span></span>
					<span></span>
				</div>
				<div class="r-data">
					<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
						<div class="s-icon">
							<img src="<?php echo root_folder . '/assets/img/signup_icon/connection.png';?>">
						</div>
					</div>
					<div class="s-descrip">
						<h3>irure dolor in reprehend</h3>
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="f-sign-right">
					<p>+63935-024-63458</p>
					<p>support@help.com</p>
				</div>
			</div>
		</div><!-- First Form if employer-->
		<div class="form-s" style="display: none;">
			<div class="Fields">
				<div class="header-menu">
					<h3>Personal Information</h3>
					<div class="type-account">
						<span>Employer</span>
						<span id="active-type-acc">Worker</span>
					</div>
				</div>
				<!-- Fields -->
				<div class="f-form">
					<label for="email">Username:</label>
					<input type="email" name="email" placeholder="support@gmail.com">
					<!-- Icon -->
					<i class="fal fa-user"></i>
				</div>
				<div class="f-form">
					<label for="password">Password:</label>
					<input type="password" name="password" placeholder="+63935-098-3294">
					<!-- Icon -->
					<i class="fal fa-key"></i>
				</div>
				<div class="f-form">
					<label for="cpassword">Confirm Password:</label>
					<input type="password" name="cpassword" placeholder="Dumaguete City">
					<!-- Icon -->
					<i class="fal fa-key"></i>
				</div>
				<div class="next-submit">
					<a href="#" style="background: #d3d3d3;color: #666;"><i class="fal fa-angle-left"></i> Back</a>
					<a href="#">Next <i class="fal fa-angle-right"></i></a>
				</div>
			</div>
			<div class="Sidebar-form">
				<!-- Sidebar form -->
				<div class="counter">
					<span class="c-active-state"></span>
					<span></span>
					<span></span>
				</div>
				<div class="r-data">
					<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
						<div class="s-icon">
							<!-- <img src="<?php echo root_folder . '/assets/img/signup_icon/person.png';?>"> -->
							<img src="<?php echo root_folder . '/assets/img/signup_icon/account.png';?>">
						</div>
					</div>
					<div class="s-descrip">
						<h3>irure dolor in reprehend</h3>
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="f-sign-right">
					<p>+63935-024-63458</p>
					<p>support@help.com</p>
				</div>
			</div>
		</div><!-- Second Form -->
		<div class="form-s" style="display: none;">
			<div class="Fields">
				<div class="header-menu">
					<h3>Personal Information</h3>
					<div class="type-account">
						<span>Employer</span>
						<span id="active-type-acc">Worker</span>
					</div>
				</div>
				<!-- Fields -->
				<div class="form-finish">
					<div style="position: relative;" class="wrap-notif">
						<div class="user-name-notif">
							<p>Username</p>
						</div>
						<i class="fas fa-check-circle"></i>
					</div>
					<div id="success-popup">
						<h3>Your Account is Ready</h3>
						<p>
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillu</p>
						<a href="#">Ok got it</a>
					</div>
				</div>
			</div>
			<div class="Sidebar-form">
				<!-- Sidebar form -->
				<div class="counter">
					<span class="c-active-state"></span>
					<span></span>
					<span></span>
				</div>
				<div class="r-data">
					<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
						<div class="s-icon">
							<!-- <img src="<?php echo root_folder . '/assets/img/signup_icon/person.png';?>"> -->
							<!-- <img src="<?php echo root_folder . '/assets/img/signup_icon/account.png';?>"> -->
							<img src="<?php echo root_folder . '/assets/img/signup_icon/login.png';?>">
						</div>
					</div>
					<div class="s-descrip">
						<h3>irure dolor in reprehend</h3>
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="f-sign-right">
					<p>+63935-024-63458</p>
					<p>support@help.com</p>
				</div>
			</div>
		</div><!-- Second Form -->
	</section>
	<script>
		$(document).ready(function(){
			$(window).bind('scroll',function(){
				var top = $(window).scrollTop();

				if (top > 0 ) {
					$('nav').addClass('fixedNav');
				}else{
					$('nav').removeClass('fixedNav');
				}			
			});
		});
	</script>
</body>
</html>