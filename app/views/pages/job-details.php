<?php require_once APP_ROOT . '/views/inc/header.php'; ?>

	<main style="height: 65vh;position: relative;" id="specific-job">
	</main>
	<section style="width: 100%;margin: 0 auto;position: relative;">
		<div style="width: 85%;margin: 0 auto;margin-top: -250px;">
			<div style="width: 60%;padding-bottom: 120px;display: flex;flex-direction: row;">
				<div class="image-job company-logo" id="company-link" data-comname="mac" style="width: 100px;height: 100px;margin-right: 15px;">
					<img src="<?=URL_ROOT;?>/img/companies/full.png" style="margin: 10px;">
				</div>
				<div style="width: calc( 100% - 100px );">							
					<div class="job-title job-d">
						<div>
							<p>P <?=$data['jobs']->jSalary; ?>.00 <span style="color: #333;font-size: 14px;">/hr</span></p>
							<p><?=$data['jobs']->jTitle; ?></p>
						</div>
						<!-- Temporart = #E80031 
							 Freelance = #597B8E	-->
						<a href="#">part time</a>
					</div>
					<div class="details-jobs" style="justify-content: flex-start;">
						<div class="education">
							<p>Requirement: <span><?=$data['jobs']->jReq; ?></span></p>
						</div>
						<div class="deadline">
							<p>Deadline: <span><?=$data['jobs']->jDeadline; ?></span></p>
							<!-- <p>Deadline: <span>25th January 2018</span></p> -->
						</div>
						<div class="location">
							<i class="fas fa-map-marker-alt"></i><span><?=$data['jobs']->comLoc; ?></span>
						</div>
					</div>
					<div style="width: 100%;height: 50px;">
						<ul class="job-skills">							
							<?php 
							$tags = $data['jobs']->jTags;
							$tag = explode(', ', $tags);
							foreach($tag as $val) : ?>
							<li>
								<a href="#" data-tag="<?=strtolower($val);?>"><?=ucfirst($val);?></a>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>		
					<div class="call-to-action">
						<div class="appy-btn">
							<p class="apply-btn-action" data-jobId="<?=$data['jobs']->jId; ?>">Apply</p>
						</div>
						<div class="fav-icon">
							<i class="far fa-heart"></i>
						</div>
					</div>			
				</div>
			</div>
			<div style="width: 100%;display: flex;flex-direction: row;">
				<div style="width: calc( 100% - 250px );margin-right: 10px;">
					<div style="width: calc( 100% - 30px );padding: 15px;background-color: #fff;" class="small-box-shadow">
						<div>
							<div style="padding-bottom: 10px;">
								<h3><i class="far fa-clipboard" style="margin-right: 10px;"></i>JOB OVERVIEW</h3>
							</div>
							<div style="padding-left: 25px;">
								<p><?=$data['jobs']->jDesc; ?></p>
							</div>							
						</div>
						<div class="employee-review">
							<p>Employeer reviews</p>
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
						<div class="employee-review">
							<p>Project ID:</p>
							<div id="emp-rate">
								<div id="s5" style="display: flex;flex-direction: row;">							
									<span>#<?=$data['jobs']->jId; ?></span>
								</div>
							</div>
						</div><hr style="margin-left: 20px;margin-top: 20px;margin-bottom: 20px;" />
						<div id="application-field">
							<div id="app-form">
								<h3>Offer to work on this job now! Bidding closes in 6 days</h3>
								<p>open - <span>6</span> days left</p>
							</div>
							<div class="bid-form">
								<form>
									<div class="bid-form-container">
										<p>Your bid for this job</p>
										<div id="amount" class="small-box-shadow">
											<input type="number" name="amount" placeholder="Your Bid">
											<label for="amount">USD</label>
										</div>
									</div>
									<div class="bid-form-container">
										<p>Your bid for this job</p>
										<div id="amount" class="small-box-shadow">
											<input type="email" name="amount" placeholder="Email Address">
											<label for="amount">EMAIL</label>
										</div>
									</div>
									<div class="bid-form-container">
										<p style="visibility: hidden;">Your bid for this job</p>
										<div id="amount" class="small-box-shadow submit-bid">
											<input type="submit" name="amount" value="Bid on this job">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div> <!-- End of job detainls -->
					<div class="bidders-list small-box-shadow">
						<div>
							<div id="job-left-header" style="margin-top: 30px;">
								<div id="bidd">
									<p>20+ Bidders for this Jobs</p>
									<p>Candidates</p>
								</div>				
							</div>
							
						</div>
						<div class="freelancer-list">
							<!-- Job Bidder's start here -->
							<div class="candidate list_transition" data-workerID="1">
								<div class="candidate-details">
									<div class="candidate_photo">
										<img src="<?=URL_ROOT;?>/img/profiles/prof.png">
									</div>
									<div class="candidate_text-content">
										<span class="candidate_designation">UI/UX DESIGNER</span>
										<h4 class="candidate_name">Will Smith</h4>
										<div class="candidate_meta">
											<span class="pdr15">Education: <strong>Graduate</strong></span>
											<span>
												<strong><i class="fas fa-map-marker-alt"></i></strong>
												Western City Uk
											</span>
										</div>
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
								<div class="candidate-skills">
									<a href="#"> Graphics</a>
									<a href="#"> Carpenter</a>
									<a href="#"> Architect</a>
									<a href="#"> Baby Setter</a>
								</div>
							</div>
							<!-- Job bidder's ends here -->
						</div>
					</div>
					
				</div>
				<div style="width: 250px;">					
					<div class="categories-feeds">
						<h2 style="font-size: 18px;font-weight: 700;color: #222;">Similar Jobs</h2>
						<div id="listing-cat" style="margin-top: 20px;">
							<ul>
								<li>
									<i class="fas fa-caret-right" style="margin: 3px;color: #0089FF;font-size: 16px;"></i>
									<a href="#">Backyard cleaning</a>
								</li>
								<li>
									<i class="fas fa-caret-right" style="margin: 3px;color: #0089FF;font-size: 16px;"></i>
									<a href="#">Hotel Managing</a>
								</li>
								<li>
									<i class="fas fa-caret-right" style="margin: 3px;color: #0089FF;font-size: 16px;"></i>
									<a href="#">Cleaner</a>
								</li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>		
	</section>

<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>