<?php require_once APP_ROOT . '/views/inc/header.php'; ?>
	<section class="signup-form">
		<div class="form-s animsition" style="min-height: 80vh;" data-animsition-in-class="fade-in-left" data-animsition-in-duration="400" data-animsition-out-class="fade-out-left" data-animsition-out-duration="500">
			<form class="Fields" style="width: 65%;display: flex;flex-direction: row;justify-content: space-between;">
			<div style="width: 100%;justify-content: space-around;display: flex;flex-direction: column;">
				<div class="header-menu">
					<h3>Enter Personal Information</h3>
					
				</div>
				<div style="display: flex;flex-direction: column;">
					<!-- Fields -->
					<div class="f-form uNameVal">
						<label for="uemail">Email Address/Username:</label>
						<div class="ins-wrapper">
							<input type="text" name="uemail" placeholder="support@gmail.com">
							<!-- Icon -->
							<i class="fal fa-envelope"></i>
						</div>
						<span class="invalid-feedback">Hello</span>
					</div>
					<div class="f-form uPassVal">
						<label for="password">Password:</label>
						<div class="ins-wrapper">
							<input type="password" name="password" placeholder="*********">
							<!-- Icon -->
							<i class="fal fa-key"></i>
						</div>
						<span class="invalid-feedback"></span>
					</div>					
				</div>
				<div class="next-submit">
					<a href="#" class="dignin">login <i class="fal fa-angle-right"></i></a>
				</div>
			</div>
			</form>
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
	<script src="<?=URL_ROOT;?>/js/mainActions.js"></script>
	<script src="<?=URL_ROOT;?>/js/animsition.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/animation.js"></script>
</body>
</html>