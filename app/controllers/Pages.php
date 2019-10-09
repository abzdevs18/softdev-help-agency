<?php
/**
 * Pages
 */
class Pages extends Controller
{
	
	function __construct()
	{
		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->Model = $this->model('admins');
			$this->jobModel = $this->model('job');
			if (!isLoggedIn()) {
				if (!$this->Model->isAdminFound() || $this->Model->connError()) {
					redirect('admin/setup');
				}
			}
		}else {
			setupRedirect('admin');
			die();
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
			"jobs" => $jobs,
			"userId" => $_SESSION['uId']
		];

		$this->view("pages/job-details", $data);
	}

	public function companyProfile(){
		$this->view("pages/company-profile");
	}

	public function workerDetails(){
		// if (isLoggedIn()) {
		// }
			// redirect("pages/worker");
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
		$tag = $jTag;
		if (str_word_count($jTag) < 1) {
			$tag = str_replace(' ','', $jTag);
		}
		$jobTag = $this->jobModel->getJobByTag($tag);
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

	public function getJobTitleDash(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$query = [
				"title" => trim($_POST['query']),
				"user" => $_SESSION['uId']
			];

			$jobTag = $this->jobModel->getJobByTitle($query);
			if ($jobTag) {
				$data = [
					"jobs" => $jobTag
				];

				$this->view("templates/dashSearch", $data);
			}
			return false;
			// echo json_encode($data['jobs']);

		}

	}

	public function applyJob(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$query = [
				"status" => "",
				"jobId" => "",
				"uId" => ""
			];

			if (!isset($_SESSION['uId'])) {
				$query['status'] = 2;
				echo json_encode($query);
			}else{
				$query["jobId"] = trim($_POST['jobId']);
				$query["uId"] = $_SESSION['uId'];

				$jobTag = $this->jobModel->jobApplication($query);
				if ($jobTag) {
					$query['status'] = 1;
					echo json_encode($query);
				}else {
					$query['status'] = 0;
					echo json_encode($query);
				}
			}
		}	
	}
}