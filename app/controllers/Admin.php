<?php

/**
 * Admin Account Controller
 */
class Admin extends Controller
{
	
	function __construct()
	{
		// $this->aModel = $this->model('admin');

		// if ($this->Model->isAdminFound()) {
		// 	$this->index();
		// }		
	}

	public function index(){
		$this->view('admin/index');
	}

	public function profile(){
		$this->view('admin/update-prof');
	}

	public function posted(){
		$this->view('admin/jobs');
	}

	public function biddings(){
		$this->view('admin/messages');
	}

	public function payments(){
		$this->view('admin/payment');
	}

	public function favorites(){
		$this->view('admin/favorites');
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
		$this->view("users/sf_admin");
	}
}