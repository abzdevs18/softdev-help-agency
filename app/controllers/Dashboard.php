<?php

/**
 * Dashboard of login users
 */
class Dashboard extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function index(){

		$data = [];
		$this->view('dashboard/index', $data);
	}
}