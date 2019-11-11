<!DOCTYPE html>
<html>
<head>
	<title><?=SITE_NAME;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="<?=URL_ROOT?>/img/cap.ico">
	<!-- <script src="https://kit.fontawesome.com/618fa0761b.js"></script> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdndevelopment.blob.core.windows.net/cdn/fa/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/mainStyle.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/offlline/fa.css"> -->
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/signup.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/jquery-ui-them.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/static_style.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/footer.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/admin_style.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/companyProfile.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/offline/jquery.js"></script>
	<script src="<?=URL_ROOT;?>/js/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
	<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>

</head>
<body>
	<!-- Modal for confirmation in deleting Blog -->
	<div class="confirmationModal" style="display:none;bottom:0;">
		<div class="confirmationMessage">
			<h2></h2>
			<div class="actionButtonModal">
				<!-- <button>Continue</button> -->
				<button id="close">Close</button>
			</div>
		</div>
	</div>
	<!-- End of modal blog Deletion -->
	<?php require_once APP_ROOT . '/views/inc/navigation.php'; ?>	