<?php include 'head.php'; ?>
	<section class="signup-form">
		<div class="form-s" style="min-height: 80vh;">
			<div class="Fields" style="justify-content: space-around;display: flex;flex-direction: column;">
				<div class="header-menu">
					<h3>Personal Information</h3>
					<div class="type-account">
						<span>Employer</span>
						<span id="active-type-acc">Worker</span>
					</div>
				</div>
				<div style="display: flex;flex-direction: column;">
				<!-- Fields -->
				<div class="f-form">
					<label for="email">Email Address/Username:</label>
					<input type="email" name="email" placeholder="support@gmail.com">
					<!-- Icon -->
					<i class="fal fa-envelope"></i>
				</div>
				<div class="f-form">
					<label for="password">Password:</label>
					<input type="password" name="password" placeholder="+63935-098-3294">
					<!-- Icon -->
					<i class="fal fa-key"></i>
				</div>
					
				</div>
				<div class="next-submit">
					<a href="#">login <i class="fal fa-angle-right"></i></a>
				</div>
			</div>
			<div class="Sidebar-form">
				<!-- Sidebar form -->
				<div class="counter" style="display: none;">
					<span class="c-active-state"></span>
					<span></span>
					<span></span>
				</div>
				<div class="r-data" style="margin-top: 70px;">
					<div style="width: 100%;margin: 0 auto;display: flex;justify-content: center;">
						<div class="s-icon">
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
		</div><!-- First Form -->
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