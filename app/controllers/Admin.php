<?php

/**
 * Admin Account Controller
 */
class Admin extends Controller
{
	
	function __construct()
	{
		
			if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
				$this->jobModel = $this->model('job');
				$this->adminModel = $this->model('admins');
				$this->userModel = $this->model('user');
				if (!isLoggedIn()) {
					if (!$this->adminModel->isAdminFound() || $this->adminModel->connError()) {
						$this->setup();
						die();
					}else{
						$this->login();
						die();
					}
				}
			}else {
				$this->setup();
				die();
			}
		
	}

	public function index(){
		if (isLoggedIn() && $_SESSION['is_admin'] == 1) {
			$data = [
				"jobLog"=>$this->adminModel->bidLog()
			];
			$this->view('admin/index',$data);
		}else if(isLoggedIn() && $_SESSION['user_type'] == 1){
			redirect("dashboard/index");
		}else {
			redirect('admin/login');
		}
	}

	public function login(){
		if (isLoggedIn() && $_SESSION['is_admin'] == 1) {
			$this->view('admin/index');
		}else if(isLoggedIn() && $_SESSION['user_type'] == 1){
			redirect("dashboard/index");
		}else{
			$logo = $this->jobModel->getLogo();

			$data = [
				'logo' => $logo
			];

			$this->view('admin/login' , $data);
		}
	}

	public function setup(){
		$this->view('admin/setup/sf_admin');
	}

	public function profile(){
		$this->view('admin/update-prof');
	}

	public function posted(){
		$jobs = $this->jobModel->getJob();

		$data = [
			"job" => $jobs
		];
		$this->view('admin/jobs', $data);
	}

	public function biddings(){
		$data = [
			"jobLog"=>$this->adminModel->bidLog()
		];
		$this->view('admin/messages', $data);
	}

	public function payments(){
		$jobs = $this->jobModel->getJob();

		$data = [
			"job" => $jobs
		];
		$this->view('admin/payment', $data);
	}

	public function favorites(){
		$jobs = $this->jobModel->getJob();

		$data = [
			"job" => $jobs
		];

		$this->view('admin/favorites', $data);
	}

	public function privacy(){
		$this->view('admin/index');
	}

	public function logout(){
		// $this->view('admin/index');
		$this->userModel->signout();
	}

	public function jobPost(){
		$this->view('admin/job-post');
	}

	public function getAllJob(){
		$jobs = $this->jobModel->getJob();

		$data = [
			"job" => $jobs
		];
		$this->view('admin/templates/allJobTemplate', $data);
	}

	public function getFeaturedJob(){
		$jobs = $this->jobModel->getFeaturedJob();

		$data = [
			"job" => $jobs
		];
		$this->view('admin/templates/featureJobTemplate', $data);
	}

	public function getOpenJob(){
		$jobs = $this->jobModel->getOpenJob();

		$data = [
			"job" => $jobs
		];
		$this->view('admin/templates/openJobTemplate', $data);
	}

	public function getJobTitle($jTitle){
		$jobTag = $this->jobModel->getJobByTitle($jTitle);
		if ($jobTag) {
			$data = [
				"job" => $jobTag
			];

			$this->view("admin/templates/allJobTemplate", $data);
		}
		return false;
		// echo json_encode($data['jobs']);
	}

	public function getJobDropDown($param){
		$job = $this->jobModel->getJobDropDown($param);
		if ($job) {
			$data = [
				"job" => $job
			];

			$this->view("admin/templates/allJobTemplate", $data);
		}
		return false;
		// echo json_encode($data['jobs']);
	}
	/*Fetching bidders*/

}