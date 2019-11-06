<?php require_once APP_ROOT . '/views/admin/inc/header.php'; ?>

	<section class="tg-dash">
		<h1>Subscribers</h1>
	</section>
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Email list</h2>
			</div>
	
			<div class="job-list-tables" style="margin-top: 30px;">
				<table>
					<thead>
						<tr>
							<th><input type="checkbox" name=""></th>
							<th>Email Address</th>
							<th>Subscription Date</th>
							<!-- <th>Category</th>
							<th>Price & Location</th> -->
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<!-- if job is close add row with class name "sold" -->
						<?php foreach($data['emails'] AS $emails) : ?>
						<tr>
							<td style="text-align: center;">
								<input type="checkbox" name="">
							</td>
							<td>
								<h3><?=$emails->email_add;?></h3>
							</td>
							<td class="tittle-id">
								<h3><?=$emails->date_subscribe;?></h3>
							</td>							
							<td class="action-btn">
								<!-- <span class="eye" data-jId="<?=$emails->id;?>"><i class="fal fa-eye"></i></span> -->
								<span class="trash emailSub" data-eId="<?=$emails->id;?>"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>