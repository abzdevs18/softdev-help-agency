<?php

define("ROOT", "/sumalian");
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

	public function blog(){
		$jobs = $this->jobModel->getJob();
		$blogs = $this->adminModel->getBlogs();

		$data = [
			"job" => $jobs,
			"blog" => $blogs
		];
		$this->view('admin/blog', $data);
	}

	public function add_blog(){
		$this->view('admin/add_blog');
	}

	public function update_blog($id){
		$data = [
			'blogDetails' => $this->adminModel->getBlogDetails($id)
		];
		$this->view('admin/update_blog', $data);
	}

	public function updateBlogRecord(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			$data = [
				//user user type later to add certain data if a user is employeer
				"status" => "",
				"blog_title" => trim($_POST['blog_title']),
				"blog_content" => trim($_POST['blog_content']),
				"blog_date" => date("M. d, Y"),
				"blog_id" => trim($_POST['blog_id']),
				"photo" => $_FILES["update_blog_photo"]["name"]
			];
			if($data['photo']){
				$target = $_SERVER['DOCUMENT_ROOT'] . ROOT . "public/img/blog/" . basename($_FILES['update_blog_photo']['name']);
				$uploaded_name = $_FILES["update_blog_photo"]["tmp_name"];
				if(move_uploaded_file($_FILES["update_blog_photo"]["tmp_name"], $target)){
					if ($this->adminModel->blogUpdate($data,$_FILES['update_blog_photo']['name'])) {
						$data['status'] = 1;
						echo json_encode($data);
					}				
				}else{
					if ($this->adminModel->blogUpdate($data)) {
						$data['status'] = 1;
						echo json_encode($data);
					}
				}
			}else{
				if ($this->adminModel->blogUpdate($data)) {
					$data['status'] = 1;
					echo json_encode($data);
				}
			}

		}
	}

	public function post_blog(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			$data = [
				//user user type later to add certain data if a user is employeer
				"status" => "",
				"blog_title" => trim($_POST['blog_title']),
				"blog_content" => trim($_POST['blog_content']),
				"blog_date" => date("M. d, Y")
			];

			$target = $_SERVER['DOCUMENT_ROOT'] . ROOT . "public/img/blog/" . basename($_FILES['blog_photo']['name']);
			$uploaded_name = $_FILES["blog_photo"]["tmp_name"];

			if(move_uploaded_file($_FILES["blog_photo"]["tmp_name"], $target)){
				if ($this->adminModel->blogPost($data,$_FILES['blog_photo']['name'])) {
					$data['status'] = 1;
					echo json_encode($data);
				}				
			}
			// else{
			// 	echo json_encode($data);
			// }

		}
	}

	public function deleteBLog(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => ""
			];
			if($this->adminModel->blogDeletion(trim($_POST['id']))){
				$data["status"] = 1;
				echo json_encode($data);
			}else{
				$data["status"] = 0;
				echo json_encode($data);
			}
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
		$hiddenRow = $this->jobModel->hiddenRow();

		$data = [
			"job" => $jobs,
			"hiddenRow" => $hiddenRow
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

	public function subscribers(){
		$emails = $this->adminModel->getSubscribers();

		$data = [
			"emails" => $emails
		];

		$this->view('admin/subscribers', $data);
	}

	public function deleteSubscriber(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => ""
			];
			if($this->adminModel->emailDeletion(trim($_POST['id']))){
				$data["status"] = 1;
				echo json_encode($data);
			}else{
				$data["status"] = 0;
				echo json_encode($data);
			}
		}
	}

	public function deleteJob(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => ""
			];
			if($this->adminModel->jobDeletion(trim($_POST['id']))){
				$data["status"] = 1;
				echo json_encode($data);
			}else{
				$data["status"] = 0;
				echo json_encode($data);
			}
		}
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

	public function hiddenRow(){
		$jobs = $this->jobModel->hiddenRow();

		$data = [
			"job" => $jobs
		];
		$this->view('admin/templates/hiddenJobTemplate', $data);
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

	public function jobHideId() {
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => "",
				"id" => trim($_POST['jobId'])
			];
			if($this->adminModel->hideJob($data)){
				$data['status'] = 1;
				echo json_encode($data);
			}else{
				$data['status'] = 0;
				echo json_encode($data);
			}
		}		
	}

	public function jobShowId() {
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"status" => "",
				"id" => trim($_POST['jobId'])
			];
			if($this->adminModel->showJob($data)){
				$data['status'] = 1;
				echo json_encode($data);
			}else{
				$data['status'] = 0;
				echo json_encode($data);
			}
		}		
	}
}