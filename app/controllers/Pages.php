<?php
/**
 * Pages
 */
class Pages extends Controller
{
	
	function __construct()
	{

		$this->Model = $this->model('admin');
		$this->jobModel = $this->model('job');

		if (!$this->Model->isAdminFound()) {
			redirect('admin/sf_admin');
		}
	}

	public function index(){
		// $posts = $this->Model->getPosts();
		//if the user is loggedIn this will prevent them to back into index page
		if (isLoggedIn()) {
			redirect('users');
		}

		$jobs = $this->jobModel->getJob();
		$data = [
			'title' => 'Welcome',
			'jobs' => $jobs
		];
		$this->view("pages/index", $data);
	}

	public function employee(){
		$data = [
			'title' => 'Welcome to about'
		];
		$this->view("pages/about", $data);
	}

	public function job_oppotunities(){
		$data = [
			'title' => 'Welcome to about'
		];
		$this->view("pages/about", $data);
	}

	public function jobDetails($jId){
		$jobs = $this->jobModel->getJobById($jId);

		$data = [
			"jobs" => $jobs
		];

		$this->view("pages/job-details", $data);
	}

	public function companyProfile(){
		$this->view("pages/company-profile");
	}

	public function worker_details(){
		if (isLoggedIn()) {
			$this->view("pages/worker");
			redirect("pages/worker");
		}
		$this->view("users/signin");
	}

	public function how_it_works(){
		$data = [
			'title' => 'Welcome to about'
		];
		$this->view("pages/about", $data);
	}

	public function about(){
		$data = [
			'title' => 'Welcome to about'
		];
		$this->view("pages/about", $data);
	}

	public function profile(){
		$this->view("pages/worker");
	}
}