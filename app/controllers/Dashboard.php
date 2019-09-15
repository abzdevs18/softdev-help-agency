<?php

/**
 * Dashboard of login users
 */
class Dashboard extends Controller
{
	
	function __construct()
	{
		$this->jobPostModel = $this->model('Job');

		if (!isLoggedIn()) {
			redirect("users/signin");
		}
	}

	public function index(){

		$data = [];
		$this->view('dashboard/index', $data);
	}

	public function message(){
		$this->view("dashboard/message");
	}

	public function feedback(){
		$this->view("dashboard/feedback");
	}
	
	public function profile(){
		$this->view("dashboard/user-profile");
	}

	public function postJob(){
		$categories = $this->jobPostModel->getCategories();
		if (isClient()) {
			$data = [
				'categories' => $categories
			];

			$this->view("dashboard/job-post", $data);
		}else {
			$this->view("dashboard/index");	
		}
	}

	public function primaryValidation(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				/*check this first form*/
				"status" => "",
				"jFeat" => trim($_POST['feat']),
				"jTitle" => trim($_POST['jTitle']),
				"jCat" => trim($_POST['jCat']),
				"jDesc" => trim($_POST['jDesc'])
			];
			// comany validation
			if (empty($data['jTitle'])) {
				$data['jTitle_err'] = 'Please enter enter Job Title';
			}
			// comany validation
			if (empty($data['jDesc'])) {
				$data['jDesc_err'] = 'Please give your job a description.';
			}

			if (empty($data['jTitle_err']) && empty($data['jDesc_err'])) {
				$data = [
					"status" => 1,
					"jTitle_err" => "",
					"jDesc_err" => ""
				];
				echo json_encode($data);
			}else {
				$data['status'] = 0;
				echo json_encode($data);				
			}

		}else {
			$this->view("dashboard/job-post");
		}		
	}

	public function additionalValidation(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				/*check this first form*/
				"status" => "",
				"edReq" => trim($_POST['edReq']),
				"jType" => trim($_POST['jType']),
				"jSalary" => trim($_POST['jSalary']),
				"jDead" => trim($_POST['jDead']),
				"jLoc" => trim($_POST['jLoc']),
				"jTags" => trim($_POST['jTags']),
				"jType_err" => "",
				"jLoc_err" => "",
				"jDead_err" => ""
			];
			// comany validation
			if (empty($data['jType'])) {
				$data['jType_err'] = 'Kindly speify the type of job';
			}
			// comany validation
			if (empty($data['jLoc'])) {
				$data['jLoc_err'] = 'Please set the Location for this job.';
			}
			// comany validation
			if (empty($data['jDead'])) {
				$data['jDead_err'] = 'Kindly set your application Deadline.';
			}

			if (empty($data['jType_err']) && empty($data['jLoc_err']) && empty($data['jDead_err'])) {
				$data = [
					"status" => 1,
					"jType_err" => "",
					"jLoc_err" => "",
					"jDead_err" => ""
				];
				echo json_encode($data);
			}else {
				$data['status'] = 0;
				echo json_encode($data);				
			}

		}else {
			$this->view("dashboard/job-post");
		}
	}

	public function submitJob(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				/*check this first form*/
				"status" => "",
				"userID" => $_SESSION['uId'],
				"jFeat" => trim($_POST['feat']),
				"jTitle" => trim($_POST['jTitle']),
				"jCat" => trim($_POST['jCat']),
				"jDesc" => trim($_POST['jDesc']),

				"edReq" => trim($_POST['edReq']),
				"jType" => trim($_POST['jType']),
				"jSalary" => trim($_POST['jSalary']),
				"jDead" => trim($_POST['jDead']),
				"jLoc" => trim($_POST['jLoc']),
				"jTags" => trim($_POST['jTags'])
			];

			if ($this->jobPostModel->postJob($data)) {
				$data['status'] = 3;
				echo json_encode($data['status']);
			}else {
				$data['status'] = 5;
				echo json_encode($data['status']);
			}
		}
	}
}