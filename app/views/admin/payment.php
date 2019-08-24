<?php
	require_once 'head.php';

	?>
	<section class="tg-dash">
		<h1>Payments</h1>
	</section>
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Payments</h2>
			</div>
			<div class="filter-category">
				<ul id="job-filters">
					<li class="active-filter">All Payment <span>(10)</span></li>
					<li>Payment Cat_1 <span>(10)</span></li>
					<li>Payment Cat_2 <span>(10)</span></li>
					<li>Payment Cat_3 <span>(10)</span></li>
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
			<div class="job-list-tables">
				<table>
					<thead>
						<tr>
							<th><input type="checkbox" name=""></th>
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
								<span class="trash"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php
	require_once 'footer.php';

	?>