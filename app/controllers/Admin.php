<?php

/**
 * Admin Account Controller
 */
class Admin extends Controller
{
	
	function __construct()
	{
		$this->jobModel = $this->model('job');

		// if ($this->Model->isAdminFound()) {
		// 	$this->index();
		// }		
	}

	public function index(){
		if (isLoggedIn() && $_SESSION['user_type'] == 1) {
			# code...
			$this->view('admin/index');
		}else {
			redirect('users/index');
		}
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
		$this->view('admin/messages');
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
		$this->view('admin/index');
	}

	public function jobPost(){
		$this->view('admin/job-post');
	}

	public function sf_admin(){
		$this->view("admin/setup/sf_admin");
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
}