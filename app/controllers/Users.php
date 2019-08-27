<?php
/**
 * User registration
 */
class Users extends Controller
{
		
	function __construct()
	{
		$this->userModel = $this->model('User');

	}
	public function index(){
		if (isLoggedIn()) {
			redirect("dashboard");
		}
		$this->view("users/signin");
	}

	public function signup(){
		// $method = $_SERVER['REQUEST_METHOD'] = 'POST';
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				//user user type later to add certain data if a user is employeer
				"status" => "",
				"uType" => trim($_POST['userType']),
				"fName" => trim($_POST['fName']),
				"lName" => trim($_POST['lName']),
				"uEmail" => trim($_POST['uEmail']),
				"password" => trim($_POST['password']),
				"userName" => trim($_POST['username']),
				"uPhone" => trim($_POST['uPhone']),
				"uLocation" => trim($_POST['uLocation']),
			];

			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			if ($this->userModel->signup($data)) {
				// flash('registration-suc','You are now registered');
				redirect('/users/signin');
			}else{
				die("Something went wrong");
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
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
			// Lastname validation
			if (empty($data['uPassword'])) {
				$data['uPassword_err'] = 'Please enter your Password';
			}

			if (empty($data['uNameEmail_err']) && empty($data['uPassword_err'])) {

				$loggedIn = $this->userModel->login($data['uNameEmail'], $data['uPassword']);
				if ($loggedIn) {
					$data['status'] = 1;
					$this->createUserSession($loggedIn);
					// var_dump($loggedIn);
					$arr = [
						"data" => $data,
						"row" => $loggedIn
					];
					echo json_encode($arr);
				}

			} else {
				$data['status'] = 0;
				$arr = [
					"data" => $data,
					"row" => ""
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

	public function createUserSession($user) {
		
		$_SESSION['uId'] = $user->usr_id;
		$_SESSION['userName'] = $user->usrName;
		$_SESSION['email'] = $user->usrEmail;
	}

	public function signout() {
		unset($_SESSION['uId']);
		unset($_SESSION['userName']);
		unset($_SESSION['email']);
		session_destroy();

		redirect('users/signin');
	}
}