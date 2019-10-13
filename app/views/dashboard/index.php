<?php require_once APP_ROOT . '/views/dashboard/inc/header.php'; 

	if ($_SESSION['user_type'] == 1) {
		require_once APP_ROOT . '/views/templates/employeer.php';
	}else{
		require_once APP_ROOT . '/views/templates/worker.php';
	}

		require_once APP_ROOT . '/views/dashboard/inc/footer.php'; ?>