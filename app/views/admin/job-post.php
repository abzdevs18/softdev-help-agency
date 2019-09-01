<?php require_once APP_ROOT . '/views/admin/inc/header.php'; ?>
	<section class="tg-dash">
		<h1>Post Job</h1>
	</section>
	<form>
	<section class="offices-msgs">
		<div class="alerts-notif" style="width: 66.66%;">
			<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
				<div class="content-head">
					<h2>Job Details</h2>
				</div>
				<div class="changepass-holder" style="text-align: center;">
					<button class="tg-btn" type="button">Select Category</button>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<input type="text" name="title" placeholder="Job Title" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="description" placeholder="Description*" class="form-control">
					</div>
				</div>
				<div class="prof-container">
					<div>
						<p>Drop files anywhere to upload</p>
						<p>Or</p>
						<button class="tg-btn" type="button">Select Files</button>
					</div>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Enable Offers/Messages</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group tg-checkbox">
						<input id="enb-msgs" type="checkbox" name="msg/offers">
						<label for="enb-msgs" style="font: var(--font-quick-400-13);">Enable offers/messages option in this Post</label>
					</div>
				</div>				
			</div>	
			<div class="alert-content no-fixed-height" style="margin-top: 30px;">
				<div class="content-head">
					<h2>Contact Details</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<input type="text" name="emFirst" placeholder="First Name*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="emLast" placeholder="Last Name*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="emPhone" placeholder="Phone Number*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="emCity" placeholder="City" class="form-control">
					</div>
					<div class="form-group">
						<input type="email" name="emEmail" placeholder="Email*" class="form-control">
					</div>
					<button class="tg-btn" type="button">Post Job</button>
				</div>
			</div>
		</div>
	</section>
</form>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>