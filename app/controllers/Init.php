<?php

/**
 * 
 */
class Init extends Controller
{
	
	function __construct()
	{
		$this->initModel = $this->model('inits');
	}

	public function adminSetup(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'DB_HOST'=>trim($_POST['hostName']),
				'DB_NAME'=>trim($_POST['databaseName']),
				'DB_USER'=>trim($_POST['userName']),
				'DB_PASS'=>trim($_POST['userPass'])
			];
			$data = "<?php
			// DB params

			define('DB_HOST', '" . $data['DB_HOST'] . "');
			define('DB_USER', '" . $data['DB_USER'] . "');
			define('DB_PASS', '" . $data['DB_PASS'] . "');
			define('DB_NAME', '" . $data['DB_NAME'] . "');

			//APP ROOT
			define('APP_ROOT', dirname(dirname(__FILE__)));

			//URL ROOT
			define('URL_ROOT', 'http://" . $_SERVER['HTTP_HOST'] . "/sumalian');

			//SITE NAME
			define('SITE_NAME', 'Help Agency');

			//SALT
			define('SECURE_SALT', 'k<UL?Gxr%6bTv[IX5h>s)vaEurK]4Sn');

			?>";
			file_put_contents(dirname(__FILE__) .'../../configs/config.php', $data);

		}

		echo $this->initModel->errorCon();
	}


}