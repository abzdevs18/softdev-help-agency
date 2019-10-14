
	<section class="my-project-container">
		<div id="section-project-header">
			<div class="section-tittle">
				<span>Biddings and Job Applications</span>
			</div>
			<div id="project-action-btns">
				<ul>					
					<li class="filter-btn active-second-menu" data-filter="openJobs">Open</li>
					<li class="filter-btn" data-filter="activeBids">Active Bids</li>
					<li class="filter-btn" data-filter="currentWork">Work on Progress</li>
					<!-- <li class="filter-btn" data-filter="inviteToWork">Invites</li> -->
					<li class="filter-btn" data-filter="pastWork">Past Work</li>
				</ul>
			</div><!-- End of filter tabs -->
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
		</div>
		<div id="projects-tables">
			<div class="content-tbl openJobs blue">
				<div class="tbl-wrap">
					<div class="job-list-tables">
						<table>
							<thead>
								<tr>
									<th style="text-align: center;"><input type="checkbox" name=""></th>
									<th>Emp Photo</th>
									<th>Job Tittle</th>
									<th>Category</th>
									<th># of Bids</th>
									<th>Job Status</th>
									<th>Salary & Location</th>
									<th>Due Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<!-- Condition: If user has open jobs, show them in table -->
								<?php if($data['jobs']) : ?>
									<?php foreach ($data['jobs'] as $jobs) : ?>
									<tr class="row-job" data-id="<?=$jobs->jId;?>">
										<td style="text-align: center;">
											<input type="checkbox" name="">
										</td>
										<td>
											<img src="<?=URL_ROOT . '/img/news-update/img-06.jpg'?>">
										</td>
										<td class="tittle-id">
											<h3><?=$jobs->jTitle;?></h3>
											<span>Ad ID: <?=$jobs->jId;?></span>
										</td>
										<td class="item-cat">
											<span>Laptops & PCs</span>	
										</td>
										<td>
											<span>Yes</span>
										</td>
										<td class="status-job">
											<span>Active</span>
										</td>
										<td class="price-loc">								
											<h3>P <?=$jobs->jSalary; ?>.00</h3>
											<span>Location: <?=$jobs->comLoc;?></span>
										</td>
										<td class="date-pub">								
											<h4 style="margin-bottom: 10px;"><?=$jobs->jDeadline;?></h4>
											<span>Published</span>
										</td>
										<td class="action-btn">
											<span class="eye"><i class="fal fa-eye"></i></span>
											<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
											<span class="trash"><i class="fal fa-trash"></i></span>
										</td>
									</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr>
										<td colspan="9" style="text-align: center;">
											<?php if($_SESSION['user_type'] == 1) :?>
												<div style="line-height: 46px;margin-right: 15px;">
													<a style="background: none;" title="You have no open jobs" href="<?=URL_ROOT . '/dashboard/postJob';?>" class="user_type-post"><i class="fal fa-plus-circle" style="font-size: 70px;color: #999;"></i></a>
												</div>
											<?php endif; ?>										
											<!-- <b class='n-res'>You have no open jobs!!!</b>	 -->
										</td>
									</tr>
								<?php endif;?>
							</tbody>
						</table>
					</div><!-- End of Table Design -->
				</div>
			</div>
			<div class="content-tbl tbl-active">
				<div class="tbl-wrap">
					<div class="job-list-tables">
						<table>
							<thead>
								<tr>
									<th style="text-align: center;"><input type="checkbox" name=""></th>
									<th>Emp Photo</th>
									<th>Job Tittle</th>
									<th>Category</th>
									<th>Employer Name</th>
									<!-- <th>Job Status</th> -->
									<th>Price & Location</th>
									<th>Due Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php if($data['biddings']) : ?>
									<?php foreach ($data['biddings'] as $bidds) : ?>
									<tr class="biddRow" data-workerID="<?=$bidds->workerId;?>" data-workId="<?=$bidds->jId;?>">
										<td style="text-align: center;">
											<input type="checkbox" name="">
										</td>
										<td>
											<img src="<?=URL_ROOT . '/img/news-update/img-06.jpg'?>" style="border-radius: 50%;">
										</td>
										<td class="tittle-id">
											<h3><?=$bidds->jTitle;?></h3>
											<span>Ad ID: <?=$bidds->jId;?></span>
										</td>
										<td class="item-cat">
											<span>Laptops & PCs</span>	
										</td>
										<td class="status-job">
											<!-- <span>Active</span> -->
											<p class="bidderName"><?php echo $bidds->uFname . ' ' . $bidds->uLname;?></p>
										</td>
										<td class="price-loc">								
											<h3>P <?=$bidds->jSalary; ?>.00</h3>
											<span>Location: <?=$bidds->comLoc;?></span>
										</td>
										<td class="date-pub">								
											<h4 style="margin-bottom: 10px;"><?=$bidds->jDeadline;?></h4>
											<span>Published</span>
										</td>
										<td class="action-btn">
											<span class="eye"><i class="fal fa-eye"></i></span>
											<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
											<span class="trash"><i class="fal fa-trash"></i></span>
										</td>
									</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr>
										<td colspan="9" style="text-align: center;">
											<?php if($_SESSION['user_type'] == 1) :?>
												<div style="line-height: 46px;margin-right: 15px;">
													<a style="background: none;" title="You have no open jobs" href="<?=URL_ROOT . '/dashboard/postJob';?>" class="user_type-post"><i class="fal fa-plus-circle" style="font-size: 70px;color: #999;"></i></a>
												</div>
											<?php endif; ?>
										</td>
									</tr>
								<?php endif;?>
							</tbody>
						</table>
					</div><!-- End of Table Design -->
				</div>
			</div>
			<div class="content-tbl currentWork blue">
				<div class="tbl-wrap">
					<div class="job-list-tables">
						<table>
							<thead>
								<tr>
									<th><input type="checkbox" name=""></th>
									<th>Emp Photo</th>
									<th>Job Tittle</th>
									<th>Category</th>
									<th>Employer Name</th>
									<!-- <th>Job Status</th> -->
									<th>Price & Location</th>
									<th>Due Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="text-align: center;">
										<input type="checkbox" name="">
									</td>
									<td>
										<img src="<?=URL_ROOT . '/img/news-update/img-06.jpg'?>">
									</td>
									<td class="tittle-id">
										<h3>A+ HP probook 6560b core i3 2nd generation</h3>
										<span>Ad ID: ng3D5hAMHPajQrM</span>
									</td>
									<td class="item-cat">
										<span>Laptops & PCs</span>	
									</td>
									<td class="status-job">
										<!-- <span>Active</span> -->
										<p>Clint Anthony Abueva</p>
									</td>
									<td class="price-loc">								
										<h3>$200</h3>
										<span>ocation 44-46 Morningside North Road Edinburgh, Scotland, EH10 4BF</span>
									</td>
									<td class="date-pub">								
										<h4 style="margin-bottom: 10px;">Jun 27, 2017</h4>
										<span>Published</span>
									</td>
									<td class="action-btn">
										<span class="eye"><i class="fal fa-eye"></i></span>
										<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
										<span class="trash"><i class="fal fa-trash"></i></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!-- End of Table Design -->
				</div>
			</div>
<!-- 			<div class="content-tbl inviteToWork blue">
				<div class="tbl-wrap">
					<div class="job-list-tables">
						<table>
							<thead>
								<tr>
									<th><input type="checkbox" name=""></th>
									<th>Emp Photo</th>
									<th>Job Tittle</th>
									<th>Category</th>
									<th>Employer Name</th>
									<th>Price & Location</th>
									<th>Due Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="text-align: center;">
										<input type="checkbox" name="">
									</td>
									<td>
										<img src="<?=URL_ROOT . '/img/news-update/img-06.jpg'?>">
									</td>
									<td class="tittle-id">
										<h3>A+ HP probook 6560b core i3 2nd generation</h3>
										<span>Ad ID: ng3D5hAMHPajQrM</span>
									</td>
									<td class="item-cat">
										<span>Laptops & PCs</span>	
									</td>
									<td class="status-job">
										<p>Clint Anthony Abueva</p>
									</td>
									<td class="price-loc">								
										<h3>$200</h3>
										<span>ocation 44-46 Morningside North Road Edinburgh, Scotland, EH10 4BF</span>
									</td>
									<td class="date-pub">								
										<h4 style="margin-bottom: 10px;">Jun 27, 2017</h4>
										<span>Published</span>
									</td>
									<td class="action-btn">
										<span class="eye"><i class="fal fa-eye"></i></span>
										<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
										<span class="trash"><i class="fal fa-trash"></i></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div> -->
			<div class="content-tbl pastWork gray">
				<div class="tbl-wrap">
					<div class="job-list-tables">
						<table>
							<thead>
								<tr>
									<th><input type="checkbox" name=""></th>
									<th>Emp Photo</th>
									<th>Job Tittle</th>
									<th>Category</th>
									<th>Featured</th>
									<th>Job Status</th>
									<th>Price & Location</th>
									<th>Due Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="text-align: center;">
										<input type="checkbox" name="">
									</td>
									<td>
										<img src="assets/img/icons/img-06.jpg">
									</td>
									<td class="tittle-id">
										<h3>A+ HP probook 6560b core i3 2nd generation</h3>
										<span>Ad ID: ng3D5hAMHPajQrM</span>
									</td>
									<td class="item-cat">
										<span>Laptops & PCs</span>	
									</td>
									<td>
										<span>Yes</span>
									</td>
									<td class="status-job">
										<span>Active</span>
									</td>
									<td class="price-loc">								
										<h3>$200</h3>
										<span>ocation 44-46 Morningside North Road Edinburgh, Scotland, EH10 4BF</span>
									</td>
									<td class="date-pub">								
										<h4 style="margin-bottom: 10px;">Jun 27, 2017</h4>
										<span>Published</span>
									</td>
									<td class="action-btn">
										<span class="eye"><i class="fal fa-eye"></i></span>
										<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
										<span class="trash"><i class="fal fa-trash"></i></span>
									</td>
								</tr>
								<tr class="sold">
									<td style="text-align: center;">
										<input type="checkbox" name="">
									</td>
									<td>
										<img src="assets/img/icons/img-06.jpg">
									</td>
									<td class="tittle-id">
										<h3>A+ HP probook 6560b core i3 2nd generation</h3>
										<span>Ad ID: ng3D5hAMHPajQrM</span>
									</td>
									<td class="item-cat">
										<span>Laptops & PCs</span>	
									</td>
									<td>
										<span>Yes</span>
									</td>
									<td class="status-job">
										<span>close</span>
									</td>
									<td class="price-loc">								
										<h3>$200</h3>
										<span>ocation 44-46 Morningside North Road Edinburgh, Scotland, EH10 4BF</span>
									</td>
									<td class="date-pub">								
										<h4 style="margin-bottom: 10px;">Jun 27, 2017</h4>
										<span>Published</span>
									</td>
									<td class="action-btn">
										<span class="eye"><i class="fal fa-eye"></i></span>
										<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
										<span class="trash"><i class="fal fa-trash"></i></span>
									</td>
								</tr>
								<tr>
									<td style="text-align: center;">
										<input type="checkbox" name="">
									</td>
									<td>
										<img src="assets/img/icons/img-06.jpg">
									</td>
									<td class="tittle-id">
										<h3>A+ HP probook 6560b core i3 2nd generation</h3>
										<span>Ad ID: ng3D5hAMHPajQrM</span>
									</td>
									<td class="item-cat">
										<span>Laptops & PCs</span>	
									</td>
									<td>
										<span>Yes</span>
									</td>
									<td class="status-job">
										<span>Active</span>
									</td>
									<td class="price-loc">								
										<h3>$200</h3>
										<span>ocation 44-46 Morningside North Road Edinburgh, Scotland, EH10 4BF</span>
									</td>
									<td class="date-pub">								
										<h4 style="margin-bottom: 10px;">Jun 27, 2017</h4>
										<span>Published</span>
									</td>
									<td class="action-btn">
										<span class="eye"><i class="fal fa-eye"></i></span>
										<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
										<span class="trash"><i class="fal fa-trash"></i></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!-- End of Table Design -->
				</div>
			</div>
		</div>
	</section>

