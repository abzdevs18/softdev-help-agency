<?php

/**
 * Dashboard of login users
 */
class Dashboard extends Controller
{
	
	function __construct()
	{
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
}