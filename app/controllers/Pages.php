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
		$categories = $this->jobModel->getCategories();
		$data = [
			'title' => 'Welcome',
			'jobs' => $jobs,
			'categories' => $categories
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

	public function workerDetails(){
		// if (isLoggedIn()) {
		// 	// redirect("pages/worker");
		// }
		// $this->view("users/signin");
			$this->view("pages/worker");
	}

	public function how_it_works(){
		$data = [
			'title' => 'Welcome to about'
		];
		$this->view("pages/about", $data);
	}

	public function search(){
		$jobs = $this->jobModel->getJob();
		$cat = $this->jobModel->getCategories();
		$tag = $this->jobModel->getTags();
		$data = [
			'title' => 'Welcome to about',
			"jobs" => $jobs,
			"categories" => $cat,
			"tag" => $tag
		];
		$this->view("pages/search", $data);
	}

	public function searchq(){
		// $method = $_SERVER['REQUEST_METHOD'] = 'POST';
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"skills" => trim($_POST['skills']),
				"location" => trim($_POST['location']),
				"jCat" => trim($_POST['j-cat'])
			];

			$responseData = $this->jobModel->getJobQuery($data);
			if ($responseData) {
				$this->view("pages/search", $responseData);
			} else {
				return false;
			}
		} 
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

	public function getJobs(){
		$jobTag = $this->jobModel->getJob();
		$data = [
			"jobs" => $jobTag
		];

		$this->view("templates/tagresult", $data);
	}

	public function getJobTag($jTag){
		$jobTag = $this->jobModel->getJobByTag($jTag);
		$data = [
			"jobs" => $jobTag
		];

		$this->view("templates/tagresult", $data);
		// echo json_encode($data['jobs']);
	}

	public function getJobTitle($jTitle){
		$jobTag = $this->jobModel->getJobByTitle($jTitle);
		if ($jobTag) {
			$data = [
				"jobs" => $jobTag
			];

			$this->view("templates/tagresult", $data);
		}
		return false;
		// echo json_encode($data['jobs']);
	}

	public function getJobTitleDash($jTitle){
		$jobTag = $this->jobModel->getJobByTitle($jTitle);
		if ($jobTag) {
			$data = [
				"jobs" => $jobTag
			];

			$this->view("templates/dashSearch", $data);
			// echo "string";
		}
		return false;
		// echo json_encode($data['jobs']);
	}
}