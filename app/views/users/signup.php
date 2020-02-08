<?php require_once APP_ROOT . '/views/inc/header.php'; ?>
	<section class="signup-form">
		<!-- This first form is for user basic information -->
		<form class="form-s active-f animsition fade-in-right f-frm" data-animsition-in-class="fade-in-left" data-animsition-in-duration="400" data-animsition-out-class="fade-out-left" data-animsition-out-duration="500" style="display: block;">
			<div class="child" style="display: flex;">
				<div class="Fields">
					<div class="header-menu">
						<h3>Personal Information</h3>
						<div class="type-account">
							<span class="acc-type" data-userType="1">Employer</span>
							<span class="active-type-acc acc-type" data-userType="0">Worker</span>
						</div>
					</div>
					<!-- Fields -->
					<div id="fname" style="width: calc( 100% - 10px );display: flex;justify-content: space-between;">
						<div class="f-form nameVal">
							<label for="fname">First name:</label>
							<div class="ins-wrapper">
								<input type="text" name="fname" placeholder="Richar">
								<i class="fal fa-id-card"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>
						<div class="f-form lastVal">
							<label for="lname">Last name:</label>
							<div class="ins-wrapper">
								<input type="text" name="lname" placeholder="Hendricks">
								<i class="fal fa-address-card"></i>	
							</div>
							<span class="invalid-feedback"></span>

						</div>					
					</div>
					<div class="f-form emailVal">
						<label for="email">Email Address:</label>
						<div class="ins-wrapper">
							<input type="email" name="email" placeholder="support@gmail.com">
							<!-- Icon -->
							<i class="fal fa-envelope"></i>							
						</div>
							<span class="invalid-feedback"></span>
					</div>
					<div class="f-form phoneVal">
						<label for="phone">Phone Number:</label>
						<div class="ins-wrapper">
							<input type="tel" name="phone" placeholder="+63935-098-3294">
							<!-- Icon -->
							<i class="fal fa-phone"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>
					<div class="f-form locVal">
						<label for="location">Where are you now?:</label>
						<div class="ins-wrapper">
							<input type="text" name="location" placeholder="Dumaguete City">
							<!-- Icon -->
							<i class="fal fa-compass"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>
					<div class="next-submit">
						<!-- <a href="#" data-action="next" class="next_fs">Next <i class="fal fa-angle-right"></i></a> -->
					</div>
				</div>
				<div class="Sidebar-form">
					<!-- Sidebar form -->
					<div class="counter" style="opacity:0;">
						<span class="c-active-state"></span>
						<span></span>
						<span></span>
					</div>
					<div class="r-data">
						<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
							<div class="s-icon">
								<img src="<?php echo URL_ROOT . '/img/signup_icon/person.png';?>">
							</div>
						</div>
						<div class="s-descrip">
							<h3>Personal Information</h3>
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
			</div>
			<a href="#" data-form="1" data-animsition-out-class="fade-out-right" data-animsition-out-duration="2000" class="next_fs" style="margin-left: 20px;">Next <i class="fal fa-angle-right"></i></a>
		</form>
		<!-- Form for basic information End's Here. -->
		<!-- Companay information Starts here -->
		<form class="form-s animsition comp-form fade-in-right" data-animsition-in-class="fade-in-left" data-animsition-in-duration="400" data-animsition-out-class="fade-out-left" data-animsition-out-duration="500">
			<div class="child" style="display: flex;">
				<div class="Fields">
					<div class="header-menu">
						<h3>Company Information</h3>					
					</div>
					<!-- Fields -->
					<div id="fname" style="width: calc( 100% - 10px );display: flex;justify-content: space-between;">
						<div class="f-form comNameVal">
							<label for="comp">Company Name:</label>
							<div class="ins-wrapper">

								<input type="text" name="comp" placeholder="Company Name">
								<!-- Icon -->
								<i class="fal fa-building"></i>
							</div>
							<span class="invalid-feedback"></span>
						</div>
						<div class="f-form lastVal">
							<label for="compCat">Company Categorization:</label>
							<div class="ins-wrapper" style="width: 100%;">
								<select style="width: 100%;">
									<option value="1">Private</option>
									<option value="">Government</option>
								</select>
								<!-- <input type="text" name="compCat" placeholder="Hendricks"> -->
								<i class="fal fa-address-card" style="margin-right: 25px;"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>					
					</div>
					<div class="f-form comEmailVal">
						<label for="comp-email">Company Email:</label>
						<div class="ins-wrapper">
							<input type="email" name="comp-email" placeholder="Company Email">
							<!-- Icon -->
							<i class="fal fa-envelope"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>

					<div class="f-form comNumVal">
						<label for="comp-phone">Company Phone Number:</label>
						<div class="ins-wrapper">
							<input type="text" name="comp-phone" placeholder="+63935-098-3294">
							<!-- Icon -->
							<i class="fal fa-phone"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>
					<div class="f-form comPosVal">
						<label for="position">Your position in Company:</label>
						<div class="ins-wrapper">
							<input type="text" name="position" placeholder="Dumaguete City">
							<!-- Icon -->
							<i class="fal fa-id-card"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>
					<!-- <div class="next-submit">
						<a href="#" style="background: #d3d3d3;color: #666;" class="animsition-link back_fs"><i class="fal fa-angle-left"></i>&nbsp; Back</a>
						<a href="#" class="animsition-link next_fs">Next <i class="fal fa-angle-right"></i></a>
					</div> -->
				</div>
				<div class="Sidebar-form">
					<!-- Sidebar form -->
					<div class="counter" style="opacity:0;">
						<span></span>
						<span class="c-active-state"></span>
						<span></span>
					</div>
					<div class="r-data">
						<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
							<div class="s-icon">
								<img src="<?php echo URL_ROOT . '/img/signup_icon/connection.png';?>">
							</div>
						</div>
						<div class="s-descrip">
							<h3>Company Information</h3>
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
			</div>
			<a href="#" data-animsition-out-class="fade-out-right" data-animsition-out-duration="2000" class="prev_fs d" style="margin-left: 20px !important;margin-right: 10px;background: #d3d3d3;color: #666;"><i class="fal fa-angle-left"></i>&nbsp; Back</a>
			<a href="#" data-form="2" data-action="next" class="next_fs">Next <i class="fal fa-angle-right"></i></a>
		</form><!-- First Form if employer-->
		<!-- Form for Companay information End's Here. -->
		<form class="form-s animsition fade-in-right" data-animsition-in-class="fade-in-left" data-animsition-in-duration="400" data-animsition-out-class="fade-out-left" data-animsition-out-duration="500">
			<div class="child" style="display: flex;">
				<div class="Fields">
					<div class="header-menu">
						<h3>Account Credentials</h3>
					</div>
					<!-- Fields -->
					<div class="f-form userNameVal">
						<label for="userName">Username:</label>
						<div class="ins-wrapper">
							<input type="text" name="userName" placeholder="johnDoe">
							<!-- Icon -->
							<i class="fal fa-user"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>
					<div class="f-form passVal">
						<label for="password">Password:</label>
						<div class="ins-wrapper">
							<input type="password" name="password">
							<!-- Icon -->
							<i class="fal fa-key"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>
					<div class="f-form cPassVal">
						<label for="cpassword">Confirm Password:</label>
						<div class="ins-wrapper">
							<input type="password" name="cpassword">
							<!-- Icon -->
							<i class="fal fa-key"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>
				<!-- 	<div class="next-submit">
						<a href="#" style="background: #d3d3d3;color: #666;" class="animsition-link back_fs"><i class="fal fa-angle-left"></i> Back</a>
						<a href="#" class="animsition-link next_fs">Next <i class="fal fa-angle-right"></i></a>
					</div> -->
				</div>
				<div class="Sidebar-form">
					<!-- Sidebar form -->
					<div class="counter" style="opacity:0;">
						<span></span>
						<span></span>
						<span class="c-active-state"></span>
					</div>
					<div class="r-data">
						<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
							<div class="s-icon">
								<!-- <img src="<?php echo URL_ROOT . '/img/signup_icon/person.png';?>"> -->
								<img src="<?php echo URL_ROOT . '/img/signup_icon/account.png';?>">
							</div>
						</div>
						<div class="s-descrip">
							<h3>Account Credentials</h3>
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
			</div>
			<a href="#" data-animsition-out-class="fade-out-right" data-animsition-out-duration="2000" class="prev_fs" style="margin-left: 20px !important;margin-right: 10px;background: #d3d3d3;color: #666;"><i class="fal fa-angle-left"></i>&nbsp; Back</a>
			<a href="#" data-form="3" class="next_fs">Next <i class="fal fa-angle-right"></i></a>
		</form><!-- Second Form -->
		<!-- Form for Credentials information Start's Here. -->
		<form class="form-s animsition fade-in-right" data-animsition-in-class="fade-in-left" data-animsition-in-duration="400" data-animsition-out-class="fade-out-left" data-animsition-out-duration="500">
			<div class="child" style="display: flex;">
				<div class="Fields">
					<div class="header-menu">
						<h3>Successful Registration</h3>
					</div>
					<!-- Fields -->
					<div class="form-finish">
						<div style="position: relative;" class="wrap-notif">
							<div class="user-name-notif">
								<p id="reg-username"></p>
							</div>
							<i class="fas fa-check-circle"></i>
						</div>
						<div id="success-popup">
							<h3>Your Account is Ready</h3>
							<p>
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillu</p>
							<a href="#" class="animsition-link successful-reg">Ok got it</a>
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
								<!-- <img src="<?php echo URL_ROOT . '/img/signup_icon/person.png';?>"> -->
								<!-- <img src="<?php echo URL_ROOT . '/img/signup_icon/account.png';?>"> -->
								<img src="<?php echo URL_ROOT . '/img/signup_icon/login.png';?>">
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
			</div>
		</form><!-- Second Form -->
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
	<script type="module" src="<?=URL_ROOT;?>/js/mainActions.js"></script>
	<script type="module" src="<?=URL_ROOT;?>/js/script.js"></script>
	<script src="<?=URL_ROOT;?>/js/animsition.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/animation.js"></script>
</body>
</html>