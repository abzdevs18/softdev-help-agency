<?php require_once APP_ROOT . '/views/inc/header.php'; ?>

	<section class="comProf">
		<div id="profWall" style="background: url('assets/img/company-wall/logo.jpg'), linear-gradient(rgba(0,0,0,-0.5),rgba(0,0,0,0.5));
  background-blend-mode: overlay;">
			
		</div>
		<div class="com-overview">
			<div class="overview-content">
				<div class="profile-icon" style="background-color: #fff;background-image: url('assets/img/companies/logo1.png');">
					<!-- <img src="assets/img/companies/logo1.png"> -->
				</div>
				<div class="profile-info">
					<div class="c-data">
						<div class="c-data-left">							
							<h2>Your Agency Name <i class="far fa-heart"></i></h2>
							<h3>Software ddevelopment oartber for guaranteed innovation delivery</h3>			
							<div class="employee-review" style="margin-top: 5px;padding-left: 0px;">
								<div id="emp-rate">
									<span>
										0.0
									</span>
									<div id="s5" style="display: flex;flex-direction: row;">
										<div class="rating-star">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>							
										</div>
										<span>( 0 reviews )</span>
									</div>
								</div>
							</div>				
						</div>
					</div>					
					<div style="width: 300px;padding-right: 30px;">
						<div class="action-button c-action-btn">
							<a href="#">Invite to Job</a>
							<a href="#"><i class="far fa-heart"></i> Save</a>
							<a href="#">Hire Now</a>
						</div>
					</div>
				</div>
				<div class="work-history-feedback c-overview-data">					
					<div id="Overview-title">
						<p>Overview</p>
					</div>
					<div class="company-description">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div class="work-history-feedback">
					<div class="work-tittle">
						<h2>Client history and feedback</h2>
					</div>
					<div id="works">
						<div class="feed-item">
							<div class="feed-wrapper">
								<div class="employer-image">
									<img src="<?php echo root_folder . '/admin/assets/img/icons/img-06.jpg';?>">
								</div>
								<div id="feed-details">
									<div class="list-of-feedback">
										<h2>VBA Project</h2>
										<div class="rate-date">
											<div id="emp-rate">
												<span>
													0.0
												</span>
												<div id="s5" style="display: flex;flex-direction: row;">
													<div class="rating-star">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star-half-alt"></i>						
													</div>
													<span>( 0 reviews )</span>
												</div>
											</div>
											<div>
												<p>Nov 2019</p>
											</div>
										</div><!-- End rating -->
										<div class="feedback-description">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div><!-- End of List-of-Feedback -->
								</div>					
							</div>
						</div>
					</div>
				</div><!-- End of Work history and Feedback --> 
			</div>
		</div>
	</section>

<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>