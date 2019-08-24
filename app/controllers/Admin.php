<?php

/**
 * Admin Account Controller
 */
class Admin extends Controller
{
	
	function __construct()
	{
			
	}

	public function index(){
		$this->view('admin/index');
	}
}