<?php
/**
 * Pages
 */
class Pages extends Controller
{
	
	function __construct()
	{

		$this->Model = $this->model('admin');

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

		$data = [
			'title' => 'Welcome'
			// 'posts' => $posts
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