<?php require_once APP_ROOT . '/views/inc/header.php'; ?>

	<main>
<!-- 		<div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15748.483187932226!2d123.29262845000001!3d9.32256345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1564186984611!5m2!1sen!2sph" width="1200" height="1000" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div> -->	
		<div class="hero_txt">				
			<p>We have great job offers you deserve!</p>
			<h2>Largest Local Job Site<br/> In The City</h2>
		</div>
		<div id="tabs" style="display:none;">
			<ul>
			    <li><a href="#tabs-1" data-action="search-job" class="active">FIND A JOB</a></li>
			    <li><a href="#tabs-2" data-action="search-can">FIND A CANDIDATE</a></li>
			</ul>
			<div id="tabs-container" class="j-input">
				<form id="search-form" method="POST" action="<?=URL_ROOT . '/pages/search';?>">
					<div id="form-group">
						<div>
							<input type="text" name="skills" placeholder="e.g.graphic design" onchange="$(function(){var selectedFile=event.target.<?=URL_ROOT . '/pages/search';?>;var reader=new FileReader();reader.onload=function(event){console.log(event.target.result)};reader.readAsText(selectedFile);">
						</div>
						<div>
							<select name="j-cat" style="width: 100%;">
								<?php foreach($data['categories'] AS $categories) : ?>
									<option><?=$categories->category_name;?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div>
							<input type="text" name="location" placeholder="Location">
						</div>						
					</div>
					<div id="submit-btn-container">
						<input type="submit" name="submit" value="Search" id="submit-btn">
					</div>
				</form>
			</div>
			<div id="tabs-container" class="c-input" style="display: none;">
				<form id="search-form" action="<?=URL_ROOT . '/pages/search';?>">
					<div id="form-group">
						<div>
							<input type="text" name="skills" placeholder="e.g.graphic design">
						</div>
						<div>
							<select style="width: 100%;">
								<option>Category</option>
								<option>Finance/Accounting</option>
								<option>Graphic Design</option>
							</select>
						</div>
						<div>
							<input type="text" name="skills" placeholder="Locsation">
						</div>						
					</div>
					<div id="submit-btn-container">
						<input type="submit" name="submit" value="Search" id="submit-btn">
					</div>
				</form>
			</div>
		</div>
	</main>
	<section id="hot-job">
		<div id="job-container">
			<div id="job-left">
				<div id="job-left-header">
					<div>
						<p>Recently Added Jobs</p>
						<p>Hot Jobs</p>
					</div>
					<div style="opacity:0;">
						<ul>
							<li><a href="#" style="color: #fff;">private</a></li>
							<li><a href="#">govt.</a></li>
						</ul>
					</div>					
				</div>
				<div id="job-listing">
					<!-- <?php print_r($data['jobs']);?> -->
					<?php foreach ($data['jobs'] as $jobs) : ?>
						<div class="latest-job list_transition" data-postID="<?=$jobs[0]->jId;?>">
							<div>							
								<div class="job-title">
									<div>
										<p><?=$jobs[0]->jTitle;?></p>
									</div>
									<!-- Temporart = #E80031 
										 Freelance = #597B8E	-->
									<?php if($jobs[0]->jType == 'Freelance'):?>
										<a href="#" style="background:#456B80;">Freelance</a>
									<?php elseif($jobs[0]->jType == 'Part Time'):?>
										<a href="#" style="background:#0054FF;">Part Time</a>
									<?php else:?>
										<a href="#" style="background:#FF9000;">Full Time</a>
									<?php endif;?>
								</div>
								<div class="details-jobs" style="align-content: space-between;">
									<div id="index-wrap-r">
										<div class="education">
											<p>Requirements: <span><?=$jobs[0]->jReq;?></span></p>
										</div>
										<div class="deadline">
											<p>Deadline: <span><?=$jobs[0]->jDeadline;?></span></p>
											<!-- <p>Deadline: <span>25th January 2018</span></p> -->
										</div>
										<div class="location">
											<i class="fas fa-map-marker-alt"></i><span><?=$jobs[0]->address;?></span>
										</div>										
									</div>
									<div style="float: right;margin-right: 15px;display:none;">
										<img src="<?=URL_ROOT;?>/img/companies/full.png">
									</div>
								</div>
							</div>
							<div style="width: 100%;height: 50px;">
								<ul class="job-skills">
									<?php 
									$tags = $jobs[0]->jTags;
									$tag = explode(', ', $tags);
									foreach($tag as $val) : ?>
									<li>
										<a href="#" data-tag="<?=strtolower($val);?>"><?=ucfirst($val);?></a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<!-- end -->
					<?php endforeach; ?>
				</div>
				<!-- <div id="showmore-btn">
					<a href="#">view more jobs</a>
				</div> -->
			</div>
			<div id="job-right" style="opacity:0;">
				<div class="filter-cat">
					<h2 style="font-size: 18px;font-weight: 700;color: #222;">Filter Category</h2>
					<div style="margin: 20px auto 10px;">
						<div class="item-cat">
							<input type="checkbox" name="partTime" style="display: none;">
							<label class="checkbox-label" for="partTime">Part Time Job</label>
						</div>
						<div class="item-cat">
							<input type="checkbox" checked="" name="partTime" style="display: none;">
							<label class="checkbox-label" for="partTime">Full Time Job</label>
						</div>
					</div>
				</div>
				<div class="feature-works">
					<h2 style="font-size: 18px;font-weight: 700;color: #222;">Featured Works</h2>
					<div id="feaured-work-wrap" style="margin-top: 20px;">
						<div class="featured-works-container">
							<img src="<?=URL_ROOT;?>/img/jobs-images/featured-work.jpg" style="width: 100%;margin: 10px auto;border-radius: 3px;box-shadow: 0px 0px 5px #bababa;">
							<p>Business Developer</p>
							<div class="location feature-job-location">
								<i class="fas fa-map-marker-alt"></i><span>Western City, UK</span>
							</div>
							<a href="#" style="margin-top: 10px;">part time</a>							
						</div>
					</div>
					
				</div>
				<div class="categories-feeds">
					<h2 style="font-size: 18px;font-weight: 700;color: #222;">Category Feeds</h2>
					<div id="listing-cat" style="margin-top: 20px;">
						<ul>
							<li>
								<i class="fas fa-caret-right" style="margin: 3px;color: #0089FF;font-size: 16px;"></i>
								<a href="#">Accounting/Finance(<span>255</span>)</a>
							</li>
							<li>
								<i class="fas fa-caret-right" style="margin: 3px;color: #0089FF;font-size: 16px;"></i>
								<a href="#">Accounting/Finance(<span>255</span>)</a>
							</li>
							<li>
								<i class="fas fa-caret-right" style="margin: 3px;color: #0089FF;font-size: 16px;"></i>
								<a href="#">Accounting/Finance(<span>255</span>)</a>
							</li>
						</ul>
					</div>					
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonial Section -->
	<section style="width: 100%;height: 100vh;background-color: #fff;display:none;">
		<div id="testimonial-header-wrapper" style="width: 100%;margin-top: 150px;">
			<div id="testimonial-header" style="width: 85%;margin: 0 auto;">
				<div style="text-align: center;">
					<p>Few words from candidates</p>
					<p>Testimonials</p>
				</div>
			</div>	
			<div id="wrap-test">
				<div style="position: relative;">					
					<div class="test-data">
						<div style="margin: 35px;">
							<div style="display: flex;flex-direction: row;" class="quote-t">
								<i class="fas fa-quote-right"></i>
								<p><span>9</span> Hours ago</p>
							</div>
							<div class="test-content">
								<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
					</div>
					<div class="can-profile">
						<img src="<?=URL_ROOT;?>/img/profiles/prof.png">
						<div>
							<p>Hilliam waltom</p>
							<span>founder, jocky ltd.</span>
						</div>
					</div>
				</div>
				<div style="position: relative;">					
					<div class="test-data">
						<div style="margin: 35px;">
							<div style="display: flex;flex-direction: row;" class="quote-t">
								<i class="fas fa-quote-right"></i>
								<p><span>9</span> Hours ago</p>
							</div>
							<div class="test-content">
								<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
					</div>
					<div class="can-profile">
						<img src="<?=URL_ROOT;?>/img/profiles/prof.png">
						<div>
							<p>Hilliam waltom</p>
							<span>founder, jocky ltd.</span>
						</div>
					</div>
				</div>
				<div style="position: relative;">					
					<div class="test-data">
						<div style="margin: 35px;">
							<div style="display: flex;flex-direction: row;" class="quote-t">
								<i class="fas fa-quote-right"></i>
								<p><span>9</span> Hours ago</p>
							</div>
							<div class="test-content">
								<p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
					</div>
					<div class="can-profile">
						<img src="<?=URL_ROOT;?>/img/profiles/prof.png">
						<div>
							<p>Hilliam waltom</p>
							<span>founder, jocky ltd.</span>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</section>
	<!-- App Design -->
	<section style="background-color: #f4f4f4;">
		<div style="width: 85%;margin: 0 auto;display: flex;flex-direction: row;margin-top: 200px;">
			<div id="phone-holder" style="margin-top: -130px;">
				<img src="<?=URL_ROOT;?>/img/app.png" style="width: 500px;margin-top: -160px;border-radius: 40px;box-shadow: 0px 0px 8px #999;">
			</div>
			<div id="download-app" style="margin-top: -130px;">
				<div class="browse-category" style="text-align: right;opacity:0;">
					<a href="#">browse categories</a>
				</div>
				<div style="padding: 198px 20px 30px;">
					<h3 style="font-weight: 600;font-size: 42px;color: #222;margin-bottom: 20px;">Get HelpRUs Mobile App</h3>
					<p style="font-size: 18px;font-weight: 400;color: #666;line-height: 32px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</p>
				</div>
				<div id="playstore-icon" style="margin-left: 20px;">
					<img src="<?=URL_ROOT;?>/img/android.png">
				</div>
			</div>
		</div>
	</section>
	<!-- News Update -->
	<section class="news-upadte" style="width: 100%;margin-bottom: 50px;">
		<div style="margin-top: 100px;width: 85%;margin: 0 auto;">
			<div id="testimonial-header" style="width: 100%;padding: 100px 0px 50px;">
				<div style="text-align: center;">
					<p>Get Update</p>
					<p>News Feeds</p>
				</div>
			</div>	
			<div style="width: 100%;display: flex;flex-direction: row;justify-content: space-between;">
				<!-- if job is close add row with class name "sold" -->
				<?php foreach($data['blog'] AS $blog) : ?>
					<div class="article blogPreviewId" data-i="<?=$blog->blogId;?>">
						<div>
							<img src="<?=URL_ROOT . '/img/blog/' . $blog->blogImage;?>">
						</div>
						<div>
							<span><?=$blog->blogDate;?></span>
							<a href="#"><?=$blog->blogTitle;?></a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>