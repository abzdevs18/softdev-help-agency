<?php
/**
 * User registration
 */
class Users extends Controller
{
	
	function __construct()
	{
		# code...
	}



	public function signup(){
		$data = [];
		$this->view("users/signup", $data);
	}

	public function login(){
		$data = [];
		$this->view("users/signin", $data);
	}
}