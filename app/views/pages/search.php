<?php require_once APP_ROOT . '/views/inc/header.php'; ?>
	<section class="search-result">
		<div class="search-wrap">
			<div class="cat-container">
				<div class="side-filter-s">
					<h3>Categories</h3>
					<ul class="list-cat">
						<?php foreach($data['categories'] AS $categories) : ?>
						<li><?=$categories->category_name;?></li>
						<?php endforeach; ?>
					</ul>
				</div>
                <aside class="side-filter-s">
                    <h3>Price</h3>
                    <div style="display: flex;position: relative;padding-left: 10px;margin-right: 10px;">
                        <p>Your range:</p><input type="text" id="amount" readonly style="border:0; color:#f6931f;font-style:italic;position: absolute;right: 0;text-align: right;background: none;">
                    </div>
                    <!-- <input type="range" style="width:100%;" id="slider-range"> -->

                    <div id="slider-range" style="margin-right: 10px;margin-left: 10px;margin-top: 10px;"></div>
                </aside>
				<div class="side-filter-s">
					<h3>recent jobs</h3>
					<div id="new-j-post">
						<div class="j-items">
							<h3>Job Title</h3>
							<div class="j-d-item">
								<p><i class="far fa-money-bill-alt"></i> P<span>200</span>.00</p>
								<p><i class="fas fa-map-marker-alt"></i> Location</p>
							</div>
						</div>
					</div>
				</div>
				<div class="side-filter-s">
					<h3>Tags</h3>
					<ul class="job-skills" style="padding: 10px;">
						<!-- Get the tag, since it may have multiple rows, first we loop to each row and each time we loop to it, we explode the value and push it a new variable. Then the final step is, we get the tags using our new variable which store all the tags of every row. -->
						<?php 
						$c = [];						
						foreach($data['tag'] AS $tag){
							$k = explode(', ', $tag->tags);
							for( $i = 0; $i < count($k); $i++){
								if (!in_array(ucfirst($k[$i]), $c)) {
									array_push($c, ucfirst($k[$i]));
								}
							}
						} ?>
						<?php for ($i=0; $i < count($c); $i++) : ?>							
							<li style="padding: 4px 1px 4px 1px;">
								<a href="#" data-tag="<?=ucfirst($c[$i]);?>"><?=ucfirst($c[$i]);?></a>
							</li>
						<?php endfor; ?>
					</ul>
				</div>
				
			</div>
			<div class="jobs-result-con">
				<div class="sortby filter-category">
					<div id="sort-drop">
						<span>Sort by:</span>
						<select>
							<optgroup>
								<option selected>Most Recent</option>
								<option>Most Recent</option>
								<option>Most Recent</option>
								<option>Most Recent</option>
							</optgroup>
						</select>
					</div>
					<div id="search-sort">
						<input type="text" name="search" placeholder="Search Here">
						<i class="fal fa-search"></i>
					</div>
				</div><!-- End of Sorting -->
				<div id="job-listing" style="width: 100%;">
					<?php foreach ($data['jobs'] as $jobs) : ?>
						<div class="latest-job list_transition result-job" data-postID="<?=$jobs->jId;?>">
							<div>							
								<div class="job-title">
									<div>
										<p><?=$jobs->jTitle;?></p>
									</div>
									<!-- Temporart = #E80031 
										 Freelance = #597B8E	-->
									<a href="#">part time</a>
								</div>
								<div class="details-jobs">
									<div id="index-wrap-r">
										<div class="education">
											<p>Requirements: <span><?=$jobs->jReq;?></span></p>
										</div>
										<div class="deadline">
											<p>Deadline: <span><?=$jobs->jDeadline;?></span></p>
											<!-- <p>Deadline: <span>25th January 2018</span></p> -->
										</div>
										<div class="location">
											<i class="fas fa-map-marker-alt"></i><span><?=$jobs->comLoc;?></span>
										</div>										
									</div>
									<div style="float: right;margin-right: 15px;">
										<img src="<?=URL_ROOT;?>/img/companies/full.png">
									</div>
								</div>
							</div>
							<div style="width: 100%;height: 50px;">
								<ul class="job-skills">
									<?php 
									$tags = $jobs->jTags;
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
				
			</div>
		</div>
	</section>
<?php require_once APP_ROOT . '/views/inc/footer.php';?>