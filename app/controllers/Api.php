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
		$this->jobModel = $this->model('Job');	
		$this->ApiModel = $this->model('ApiModel');	
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

	public function getJobs(){
		$jobTag = $this->jobModel->getJob();
		sleep(1);
		echo json_encode($jobTag);
	}

	public function getJobCat($catId){
		$jobTag = $this->ApiModel->getJobCat($catId);
		sleep(1);
		echo json_encode($jobTag);
	}

	public function getBidders($id){
		$bidders = $this->jobModel->allBidders($id);
		echo json_encode($bidders);
	}

	public function getCatNum(){
		$categories = $this->ApiModel->getCatNum();
		echo json_encode($categories);
	}
}