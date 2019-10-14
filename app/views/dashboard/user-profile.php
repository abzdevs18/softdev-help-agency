<?php require_once APP_ROOT . '/views/dashboard/inc/header_nosub.php'; ?>
	<section class="profile-dash" style="position: relative;">
		<div class="prof-con">
			<div id="prof-pic" style="background-image: url('<?php echo URL_ROOT . '/img/profiles/prof2.jpg'; ?>');">
				
				<div class="update-bio-prof">
					
				</div>
			</div>
			<div class="bio">
				<p class="bio-head">Work</p>
				<div class="work">
					<h3 class="w-head">Metro-Politan</h3>
					<p>173 William Street</p>
					<p>Negros Oriental Philippines</p>
				</div>
				<div class="work">
					<h3 class="w-head">Metro-Politan</h3>
					<p>173 William Street</p>
					<p>Negros Oriental Philippines</p>
				</div>
			</div>
			<div class="bio skills-bio">
				<p class="bio-head">Skills</p>

				<ul class="j-search-tag">
					<li class="bio-skills">
						<a href="#">Branding</a>
					</li>
					<li class="bio-skills">
						<a href="#">Packages</a>
					</li>
					<li class="bio-skills">
						<a href="#">Managerial</a>
					</li>
					<li class="bio-skills">
						<a href="#">Web-Development</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="prof-info">
			<div class="prof-name">
				<div class="name-con">
					<h4><?=$data['userData']->firstN . ' ' . $data['userData']->lastN ?></h4>
					<span id="prof-loc"><i class="fas fa-map-marker-alt"></i> <?=$data['userData']->userLocation?></span>
				</div>
				<h3 class="prof-position">Product Designer</h3>
			</div>
			<div class="employee-review prof-rank" style="margin-top: 5px;padding-left: 0px;">
				<h4>Rankings</h4>
				<div id="emp-rate">
					<span style="background-color: #191623;">
						0.0
					</span>
					<div id="s5" style="display: flex;flex-direction: row;">
						<div class="rating-star rate-s">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>								
						</div>
						<span style="color: #191623;">( 0 reviews )</span>
					</div>
				</div>
			</div>
			<div id="profile-timeline">
				<div class="prof-data">
					<ul>
						<li data-tab="about" class="active-prof-tab"><i class="fal fa-address-card"></i> About</li>
						<li data-tab="feedback"><i class="fal fa-comments-alt"></i> Feedback</li>
					</ul>
				</div>
				<div class="bio-info">
					<div class="bio">
						<p class="bio-head">Contact information</p>	
						<div class="bio-d-list">
							<div class="bio-d">
								<p>Phone:</p>
								<span><?=$data['userData']->userPhone?></span>
							</div>
							<div class="bio-d">
								<p>Address:</p>
								<span><?=$data['userData']->userLocation?></span>
							</div>
							<div class="bio-d">
								<p>Email:</p>
								<span><?=$data['userData']->userEmail?></span>
							</div>
							<div class="bio-d">
								<p>Site:</p>
								<span>https://www.temp.com</span>
							</div>
						</div>					
					</div>
					<div class="bio">
						<p class="bio-head">Basic information</p>
						<div class="bio-d-list">
							<div class="bio-d">
								<p>Gender:</p>
								<span>Male</span>
							</div>
							<div class="bio-d">
								<p>Birthday:</p>
								<span>June 5, 1992</span>
							</div>
						</div>							
					</div>					
				</div>
				<div class="prof-fed feed-container mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 385px;display: none;">
					<div class="feed-item" style="width: 100%;">
						<div class="feed-wrapper">
							<div class="employer-image">
								<img src="<?php echo URL_ROOT . '/img/icons/img-06.jpg';?>">
							</div>
							<div id="feed-details">
								<div class="list-of-feedback">
									<h2 style="font-size: 23px;">VBA Project</h2>
									<div class="rate-date">
										<div id="emp-rate">
											<span>
												0.0
											</span>
											<div id="s5" style="display: flex;flex-direction: row;align-items: center;">
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
											<p style="font:var(--font-quick-500-14);">Nov 2019</p>
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
					<div class="feed-item" style="width: 100%;">
						<div class="feed-wrapper">
							<div class="employer-image">
								<img src="<?php echo URL_ROOT . '/img/icons/img-06.jpg';?>">
							</div>
							<div id="feed-details">
								<div class="list-of-feedback">
									<h2 style="font-size: 23px;">VBA Project</h2>
									<div class="rate-date">
										<div id="emp-rate">
											<span>
												0.0
											</span>
											<div id="s5" style="display: flex;flex-direction: row;align-items: center;">
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
											<p style="font:var(--font-quick-500-14);">Nov 2019</p>
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
			</div>
		</div>
		<div style="position: absolute;margin: 5px;right: 0;display: flex;">
		<button>Company</button>
		<button>Personal</button>
			
		</div>
	</section>
<?php require_once APP_ROOT . '/views/dashboard/inc/footer.php'; ?>