<?php require_once APP_ROOT . '/views/dashboard/inc/header_nosub.php'; ?>
	<section class="jobPost">
		<form action="#" class="job-d">
			<ul class="jobPost-progress">	
				<div class="active a-border">
					<li>Job Details</li>
				</div>
				<div>
					<li>Additional Information</li>
				</div>
				<div>							
					<li>Completing</li>					
				</div>
			</ul>

			<fieldset>
				<div>
					<div style="display: flex;justify-content: space-between;">
						<div class="form-header">
							<p>Primary Details</p>
						</div>
						<div>
							<div style="display: flex;flex-direction: column;">
								<p class="f-word">Do you want to feature this job?</p>
								<div class="f-job">
									<span data-feature="1">Yes</span>
									<span class="f-active" data-feature="0">No</span>
								</div>
							</div>
						</div>
					</div>
					<div id="fname" style="width: calc( 100% - 10px );display: flex;justify-content: space-between;">
						<div class="f-form jTitle">
							<label for="jTitle">Title:</label>
							<div class="ins-wrapper">
								<input type="text" name="jTitle" placeholder="Richar">
								<i class="fal fa-id-card"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>
						<div class="f-form jCat">
							<label for="jCat">Job Category:</label>
							<div class="ins-wrapper" style="width: 100%;">
								<select style="width: 100%;" name="jCat">
								<?php foreach($data['categories'] AS $categories) : ?>
									<option value="<?=$categories->id;?>"><?=$categories->category_name;?></option>
								<?php endforeach; ?>
								</select>
								<!-- <input type="text" name="compCat" placeholder="Hendricks"> -->
								<i class="fal fa-address-card" style="margin-right: 25px;"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>				
					</div>
					<div class="f-form jDesc">
						<label for="jDesc">Job Description:</label>
						<div class="ins-wrapper">
							<input type="text" name="jDesc" placeholder="Hendricks">
							<i class="fal fa-address-card"></i>	
						</div>
						<span class="invalid-feedback"></span>
					</div>					
				</div>
					<input type="button" name="next" value="Next" id="nxt_postJob">
			</fieldset>

			<fieldset>
				<div>
					<div style="display: flex;justify-content: space-between;">
						<div class="form-header">
							<p>Additional Info</p>
						</div>
					</div>
					<div id="fname" style="width: calc( 100% - 10px );display: flex;justify-content: space-between;">
						<div class="f-form edReq">
							<label for="edReq">Requirements:</label>
							<div class="ins-wrapper">
								<input type="text" name="edReq" placeholder="Richar">
								<i class="fal fa-id-card"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>
						<div class="f-form jType">
							<label for="jType">Job type:</label>
							<div class="ins-wrapper" style="width: 100%;">
								<select style="width: 100%;" name="jType">
									<option value="Internship">Internship</option>
									<option value="Freelance">Freelance</option>
									<option value="Part Time">Part Time</option>
									<option value="Full Time">Full Time</option>
								</select>
								<!-- <input type="text" name="compCat" placeholder="Hendricks"> -->
								<i class="fal fa-address-card" style="margin-right: 25px;"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>				
					</div>
					<div id="fname" style="width: calc( 100% - 10px );display: flex;justify-content: space-between;">
						<div class="f-form jSalary">
							<label for="jSalary">Salary:</label>
							<div class="ins-wrapper">
								<input type="text" name="jSalary" placeholder="Richar">
								<i class="fal fa-id-card"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>
						<div class="f-form jDead">
							<label for="jDead">Deadline:</label>
							<div class="ins-wrapper" style="width: 100%;">
								<!-- <select style="width: 100%;">
									<option value="1">Private</option>
									<option value="">Government</option>
								</select> -->
								<input type="date" name="jDead" placeholder="Hendricks">
								<i class="fal fa-address-card" style="margin-right: 25px;"></i>	
							</div>
							<span class="invalid-feedback"></span>
						</div>				
					</div>
					<div class="f-form jLoc">
						<label for="jLoc">Location:</label>
						<div class="ins-wrapper">
							<input type="text" name="jLoc" placeholder="Hendricks">
							<i class="fal fa-address-card"></i>	
						</div>
						<span class="invalid-feedback"></span>
					</div>	
					<div class="f-form jTags">
						<label for="jTags">Job Tags:</label>
						<div class="ins-wrapper" style="border: 1px solid #999;border-radius: 3px;">
							<input type="text" name="jTags" placeholder="Hendricks" id="jTags" style="border: none; border-color: none;">
							<i class="fal fa-address-card"></i>	
						</div>
						<span class="invalid-feedback"></span>
					</div>					
				</div>
					<input type="button" name="back" value="Back" id="back_postJob">
					<input type="submit" name="next" value="Submit" id="submit-job">	
			</fieldset>

			<fieldset>
					<h2>DOne</h2>					
			</fieldset>
		</form>
	</section>
<?php require_once APP_ROOT . '/views/dashboard/inc/footer.php'; ?>