<?php

define("ROOT", "/sumalian");
/**
 * User registration
 */
class Users extends Controller
{
	private $salt = SECURE_SALT;
		
	function __construct()
	{

		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->userModel = $this->model('User');
			$this->adminModel = $this->model('Admins');
			$this->jobModel = $this->model('job');
			if (!$this->adminModel->isAdminFound()) {
				redirect('admin/sf_admin');
			}
		}else {
			setupRedirect('admin');
			die();
		}

	}

	public function index(){
		$logo = $this->jobModel->getLogo();
		if (isLoggedIn()) {
			redirect("dashboard");
		}
		$data = [
			"logo" => $logo
		];
		$this->view("users/signin", $data);
	}

	public function signup(){
		$logo = $this->jobModel->getLogo();
		// $method = $_SERVER['REQUEST_METHOD'] = 'POST';
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$salted_pass = $this->salt . trim($_POST['password']);
			$data = [
				//user user type later to add certain data if a user is employeer
				"status" => "",
				"uType" => trim($_POST['userType']),
				"fName" => trim($_POST['fName']),
				"lName" => trim($_POST['lName']),
				"uEmail" => trim($_POST['uEmail']),
				"password" => $salted_pass,
				"userName" => trim($_POST['username']),
				"uPhone" => trim($_POST['uPhone']),
				"uLocation" => trim($_POST['uLocation']),
				//company
				"company" => trim($_POST['company']),
				"compEmail" => trim($_POST['compEmail']),
				"compPhone" => trim($_POST['compPhone']),
				"compPosition" => trim($_POST['compPosition'])

			];

			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			if ($this->userModel->signup($data)) {
				// flash('registration-suc','You are now registered');
				redirect('/users/signin');
			}else{
				die("Something went wrong");
			}
		} else {
			$data = [
				"logo" => $logo
			];
			$this->view("users/signup", $data);
		}
	}

	public function companyValidation(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {	
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"company" => trim($_POST['company']),
				"compEmail" => trim($_POST['compEmail']),
				"compPhone" => trim($_POST['compPhone']),
				"compPosition" => trim($_POST['compPosition']),
				"company_err" => "",
				"compEmail_err" => "",
				"compPhone_err" => "",
				"compPosition_err" => "",
			];
			// comany validation
			if (empty($data['company'])) {
				$data['company_err'] = 'Please enter your Company\'s Name';
			}
			// compPosition validation
			if (empty($data['compPosition'])) {
				$data['compPosition_err'] = 'Please enter your current position';
			}
			// compEmail validation
			if (empty($data['compEmail'])) {
				$data['compEmail_err'] = 'Please enter your Company\'s email';
			}else {
				if (filter_var($data['compEmail'], FILTER_VALIDATE_EMAIL)) {
					if ($this->userModel->findCompanyEmail($data['compEmail'])) {
						$data['compEmail_err'] = 'Company email already taken exist!';
					}
				} else{
					$data['compEmail_err'] = 'Make sure Company email is Valid!';					
				}
			}
			// compPhone validation
			if (empty($data['compPhone'])) {
				$data['compPhone_err'] = 'Please enter your Company\'s phone number!';
			}else {
				if ($this->userModel->findUserEmail($data['compEmail'])) {
					$data['compPhone_err'] = 'Company phone number is already taken';
				}
			}
			if (empty($data['comany_err']) && empty($data['compEmail_err']) && empty($data['compPhone_err']) && empty($data['compPosition_err'])) {
				$data = [
					"status" => 1,
					"comany_err" => "",
					"compEmail_err" => "",
					"compPhone_err" => "",
					"compPosition_err" => ""
				];
				echo json_encode($data);
			} else {
				$data['status'] = 0;
				echo json_encode($data);
			}
		} else {
			$this->view("users/signup");
		}
	}

	public function validationFormPersonal(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => "",
				"uType" => trim($_POST['userType']),
				"fName" => trim($_POST['fName']),
				"lName" => trim($_POST['lName']),
				"uEmail" => trim($_POST['uEmail']),
				"uPhone" => trim($_POST['uPhone']),
				"uLocation" => trim($_POST['uLocation']),
				"fName_err" => "",
				"lName_err" => "",
				"uEmail_err" => "",
				"uPhone_err" => "",
				"uLocation_err" => ""
			];
			// email validation
			if (empty($data['uEmail'])) {
				$data['uEmail_err'] = 'Please enter your email';
			}else {
				if ($this->userModel->findUserEmail($data['uEmail'])) {
					$data['uEmail_err'] = 'Email is already taken';
				}
			}
			// phone validation
			if (empty($data['uPhone'])) {
				$data['uPhone_err'] = 'Please enter your phone number';
			}else {
				if ($this->userModel->findUserPhone($data['uPhone'])) {
					$data['uPhone_err'] = 'Phone number is already exist!';
				}
			}
			// Firstname validation
			if (empty($data['fName'])) {
				$data['fName_err'] = 'Please enter your First Name';
			}
			// Lastname validation
			if (empty($data['lName'])) {
				$data['lName_err'] = 'Please enter your Last Name';
			}
			// Location validation
			if (empty($data['uLocation'])) {
				$data['uLocation_err'] = 'Please enter your current Location';
			}

			if (empty($data['fName_err']) && empty($data['lName_err']) && empty($data['uPhone_err']) && empty($data['uLocation_err']) && empty($data['uEmail_err'])) {
				$data = [
					"status" => 1,
					"fName_err" => "",
					"lName_err" => "",
					"uEmail_err" => "",
					"uPhone_err" => "",
					"uLocation_err" => ""
				];
				echo json_encode($data);
			} else {
				$data['status'] = 0;
				echo json_encode($data);
			}
		} else {
			$this->view("users/signup");
		}
	}

	public function credentialsValidation(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => "",
				"userName" => trim($_POST['username']),
				"password" => trim($_POST['password']),
				"cpassword" => trim($_POST['cpassword']),
				"userName_err" => "",
				"password_err" => "",
				"cpassword_err" => ""
			];

			// User name validation
			if (empty($data['userName'])) {
				$data['userName_err'] = 'Please enter your email';
			}else {
				if ($this->userModel->findUserName($data['userName'])) {
					$data['userName_err'] = 'Email is already taken';
				}
			}

			// Password validation
			if (empty($data['password'])) {
				$data['password_err'] = 'Please enter your Password';
			}elseif ( strlen($data['password']) < 8 ) {
				$data['password_err'] = 'Password must be atleast 8 characters';
			}

			if (empty($data['cpassword'])) {
				$data['cpassword_err'] = 'Please confirm your password';
			}else {
				if ($data['password'] != $data['cpassword']) {
					$data['cpassword_err'] = 'Passwords do not match';
				}
			}

			if (empty($data['userName_err']) && empty($data['password_err']) && empty($data['cpassword_err'])) {
				$data = [
					"status" => 1,
					"userName_err" => "",
					"password_err" => "",
					"cpassword_err" => ""
				];
				echo json_encode($data);
			} else {
				$data['status'] = 0;
				echo json_encode($data);
			}

		}else {
			$this->view("users/signup");
		}
	}

	public function signin(){
		$emptyObject = (object) array();

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$pas = SECURE_SALT . trim($_POST['uPassword']);
			$data = [
				//user user type later to add certain data if a user is employeer
				"status" => "",
				"uNameEmail" => trim($_POST['uNameEmail']),
				"uPassword" => trim($_POST['uPassword']),
				"uNameEmail_err" => "",
				"uPassword_err" => ""
			];

			// email validation
			if (empty($data['uNameEmail'])) {
				$data['uNameEmail_err'] = 'Please enter your email';
			}else {
				//First check if email is use to sign in
				if (filter_var($data['uNameEmail'], FILTER_VALIDATE_EMAIL)) {
					if ($this->userModel->findUserEmail($data['uNameEmail']) == false) {
						// $data['status'] = 0;
						$data['uNameEmail_err'] = "Email/username doesn't exist!";
					}
				}else {
					if (!$this->userModel->findUserName($data['uNameEmail'])) {
						$data['uNameEmail_err'] = "Email/username doesn't exist!";
					}
				}			
			}
			// Password validation
			if (empty($data['uPassword'])) {
				$data['uPassword_err'] = 'Please enter your Password';
			}

			if (empty($data['uNameEmail_err']) && empty($data['uPassword_err'])) {
				$data['uPassword'] = $pas;

				$loggedIn = $this->userModel->login($data['uNameEmail'], $data['uPassword']);
				if ($loggedIn) {
					$data['status'] = 1;
					$this->createUserSession($loggedIn);
					// var_dump($loggedIn);
					$arr = [
						"data" => $data,
						"row" => $loggedIn
					];
					// $arr = array('status' => 1);
					echo json_encode($arr);
				}else{
					$data['status'] = 2;

					$arr = [
						"data" => $data,
						"row" => $emptyObject
					];
					
					echo json_encode($arr);
				}

			} else {
				$data['status'] = 0;
				$arr = [
					"data" => $data,
					"row" => $emptyObject
				];
				echo json_encode($arr);
			}

		} else {
			$data = [
				"status" => "",
				"userName_err" => "",
				"password_err" => "",
				"cpassword_err" => ""
			];
			$this->view("users/signin", $data);
		}
	}

	public function profileUpdate(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => 0
			];

			$target = $_SERVER['DOCUMENT_ROOT'] . ROOT ."public/img/profiles/" . basename($_FILES['profilPic']['name']);
			$uploaded_name = $_FILES["profilPic"]["tmp_name"];

			$uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1); 
			$uploaded_size = $_FILES["profilPic"]["size"];

			// if ($uploaded_ext == "jpg" || $uploaded_ext == "JPG" || $uploaded_ext == "jpeg" || $uploaded_ext == "JPEG"){
				if(move_uploaded_file($_FILES["profilPic"]["tmp_name"], $target)){
					if ($this->userModel->profileUpdate($_SESSION['uId'], $_FILES['profilPic']['name'])) {
						$data['status'] = 1;
						echo json_encode($data);
					}
				}else{
					echo json_encode($data);
				}
			// }else{
			// 	echo json_encode($data);
			// }

		}
	}

	public function wallUpdate(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => 0
			];

			$target = $_SERVER['DOCUMENT_ROOT'] . ROOT ."public/img/profiles/cover/" . basename($_FILES['wallPic']['name']);

			if(move_uploaded_file($_FILES["wallPic"]["tmp_name"], $target)){
				if ($this->userModel->coverUpdate($_SESSION['uId'], $_FILES['wallPic']['name'])) {
					$data['status'] = 1;
					echo json_encode($data);
				}
			}else{
				echo json_encode($data);
			}
		}
	}
	// Email Subscribing
	public function subscribe(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => "",
				"email" => trim($_POST['email']),
				"date" => date("M. d, Y")
			];

			if($this->adminModel->emailSub($data)){				
				$data['status'] = 1;
				echo json_encode($data);
			}else{			
				$data['status'] = 0;
				echo json_encode($data);
			}
		}
	}

	public function createUserSession($user) {
		
		$_SESSION['uId'] = $user->usr_id;
		$_SESSION['userName'] = $user->usrName;
		$_SESSION['email'] = $user->usrEmail;
		$_SESSION['user_type'] = $user->uType;
		$_SESSION['is_admin'] = $user->is_admin;
	}

	public function signout() {
		unset($_SESSION['uId']);
		unset($_SESSION['userName']);
		unset($_SESSION['email']);
		unset($_SESSION['user_type']);
		unset($_SESSION['is_admin']);
		session_destroy();

		redirect('pages/index');
	}

}