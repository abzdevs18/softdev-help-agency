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
		$jobTag = $this->ApiModel->getJob();
		sleep(1);
		echo json_encode($jobTag);
	}

	public function getJobSearch(){
		$jobTag = $this->jobModel->getJobSearchTerm(trim($_POST['term']));
		// sleep(1);
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

	public function getCurrentUserMessages(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$latest = $this->ApiModel->getLatestMessages(trim($_POST['reciever']),trim($_POST['sender']));

			echo json_encode($latest);
		}
    }

	public function setMessage()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		

			//timezone is set to manila
			date_default_timezone_set('Asia/Manila');
  			// echo date("h:i a");
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			// $time = date("D, M d, g:i A");
			$date = date("M. d, Y");
			$time = date("h:i a");

			$data = [
				"status" => "",
				"sender" => trim($_POST['sender']),
				"receiver" => trim($_POST['receiver']),
				"message" => trim($_POST['message']),
				"sendDate" => $date,
				"sendTime" => $time
			];
			if($this->ApiModel->sendMessage($data)){
				$data["status"] = 1;
				echo json_encode($data);
			}else{
				$data["status"] = 0;
				echo json_encode($data);
			}
		}
	}

	public function applyJob(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$query = [
				"status" => "",
				"jobId" => "",
				"uId" => "",
				"fname" => trim($_POST['fname']),
				"lname" => trim($_POST['lname']),
				"age" => trim($_POST['age']),
				"gender" => trim($_POST['gender']),
				"location" => trim($_POST['location']),
				"address" => trim($_POST['address']),
				"education" => trim($_POST['education'])
			];

			// if (!trim($_POST['uId'])) {
			// 	$query['status'] = 2;
			// 	echo json_encode($query);
			// }else{
				$query["jobId"] = trim($_POST['jobId']);
				$query["uId"] = trim($_POST['uId']);

				$jobTag = $this->jobModel->jobApplication($query);
				if ($jobTag) {
					$query['status'] = 1;
					echo json_encode($query);
				}else {
					$query['status'] = 0;
					echo json_encode($query);
				}
			// }
		}	
	}

	public function getCatNum(){
		$categories = $this->ApiModel->getCatNum();
		echo json_encode($categories);
	}

	public function messages(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$messages = $this->ApiModel->getMessagesForCurrentUser(trim($_POST['userId']));

			echo json_encode($messages);
		}
    }
}