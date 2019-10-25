<?php

/**
 * For the mobile application
 * Reason doing this instead of using existing methods, is the responses are different from
 * what we really wanted ti fetch.
 */
class Api extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function user(){
		$response = array();
		$arr = array("status" => 1);
		array_push($response, $arr);
		// echo json_encode($response);
		print_r($response);
	}

	public function hub(){
		$data = [
					"status" => 1,
					"userName_err" => "",
					"password_err" => "",
					"cpassword_err" => ""
				];
		$dasta = [
					"status" => 2,
					"userName_err" => "",
					"password_err" => "",
					"cpassword_err" => ""
				];
		$d = [
			"data" => $data,
			"row" => $dasta
		];

		echo json_encode($d);
	}
}