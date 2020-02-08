<?php require_once APP_ROOT . '/views/admin/inc/header.php'; ?>

	<section class="tg-dash">
		<h1>Job Posts</h1>
	</section>
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Job Posts</h2>
			</div>
			<div class="filter-category">
				<ul id="job-filters">
					<li class="active-filter" id="filter-all">All <span>(<?=($data['job']['rowCount']) ? $data['job']['rowCount'] : '0';?>)</span></li>
					<li id="filter-featured">Hidden <span>(<?=($data['hiddenRow']['rowHiddenCount']) ? $data['hiddenRow']['rowHiddenCount'] : '0';?>)</span></li>
					<!-- <li id="filter-open">Active <span>(10)</span></li>
					<li>Expired <span>(10)</span></li>
					<li>Deleted <span>(10)</span></li> -->
				</ul>
			</div><!-- End of filter tabs -->
			<div class="sortby filter-category">
				<div id="sort-drop">
					<span>Sort by:</span>
					<select id="sort-filter">
						<optgroup>
							<option selected value="jobs.timestamp">Most Recent</option>
							<option value="jobs.salary">Job Salary</option>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
					<input type="text" name="search" placeholder="Search Here">
					<i class="fal fa-search"></i>
				</div>
			</div><!-- End of Sorting -->
			<div class="job-list-tables">
				<table>
					<thead>
						<tr>
							<!-- <th><input type="checkbox" name=""></th> -->
							<!-- <th>Emp Photo</th> -->
							<th>Job Tittle</th>
							<th>Category</th>
							<!-- <th>Featured</th> -->
							<th>Job Status</th>
							<th>Price & Location</th>
							<th>Due Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="filter-job-container">
						<!-- if job is close add row with class name "sold" -->
						<?php foreach($data['job']['row'] AS $job) : ?>
						<tr>
							<!-- <td style="text-align: center;">
								<input type="checkbox" name="">
							</td> -->
							<!-- <td>
								<img src="assets/img/icons/img-06.jpg">
							</td> -->
							<td class="tittle-id">
								<h3 id="dj" data-j="<?=$job->jId;?>"><?=$job->jTitle;?></h3>
								<span>Ad ID: <?=$job->jId;?></span>
							</td>
							<td class="item-cat">
								<span><?=$job->jCat;?></span>	
							</td>
							<!-- <td>
								<span>Yes</span>
							</td> -->
							<td class="status-job">
								<span>Active</span>
							</td>
							<td class="price-loc">								
								<h3>P <?=$job->jSalary;?></h3>
								<span><?=$job->comLoc;?></span>
							</td>
							<td class="date-pub">								
								<h4 style="margin-bottom: 10px;"><?=$job->jDeadline;?></h4>
								<span>Published</span>
							</td>
							<td class="action-btn">
								<span class="eye hideJob" data-jId="<?=$job->jId;?>"><i class="fal fa-eye"></i></span>
								<!-- <span class="pencil" data-jId="<?=$job->jId;?>"><i class="fal fa-pencil-alt"></i></span> -->
								<span class="trash trashJob" data-jId="<?=$job->jId;?>"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>