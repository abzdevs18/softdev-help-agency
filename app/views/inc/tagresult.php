<?php foreach ($data['jobs'] as $jobs) : ?>
	<div class="latest-job list_transition" data-postID="<?=$jobs->jId;?>">
		<div>							
			<div class="job-title">
				<div>
					<p><?=$jobs->jTitle;?></p>
				</div>
				<!-- Temporart = #E80031 
					 Freelance = #597B8E	-->
				<a href="#">part time</a>
			</div>
			<div class="details-jobs" style="align-content: space-between;">
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