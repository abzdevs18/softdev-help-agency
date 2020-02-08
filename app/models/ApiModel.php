<?php

/**
 * 
 */
class ApiModel
{
	private $db;
	
	function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function getCatNum(){
		$this->db->query("SELECT job_categories.id AS catId, job_categories.category_name AS catName, job_categories.image AS catImage, COUNT(jobs.job_category) AS numJobCat FROM job_categories LEFT JOIN jobs ON jobs.job_category = job_categories.id GROUP BY job_categories.id");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJobCat($catId){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_category AS jCat, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.job_category = :catId");
		$this->db->bind(":catId", $catId);
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJob(){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_category AS jCat, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1");
		// $this->db->bind(":catId", $catId);
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	/*Inser Message*/
	public function getMessagesForCurrentUser($userSessionId){
		$this->db->query("SELECT DISTINCT user.username AS name, user.firstname AS fname, user.lastname AS lname, user_profile.img_path AS img_path, user.id AS id, 
(SELECT messages.msg_date FROM messages WHERE (messages.user_sender_id = user.id AND messages.user_receiver_id = :currentSessionUserId) OR (messages.user_sender_id = :currentSessionUserId AND messages.user_receiver_id = user.id) ORDER BY messages.timestamp DESC LIMIT 1) AS dateM,
(SELECT messages.msg_content FROM messages WHERE (messages.user_sender_id = user.id AND messages.user_receiver_id = :currentSessionUserId) OR (messages.user_sender_id = :currentSessionUserId AND messages.user_receiver_id = user.id) ORDER BY messages.timestamp DESC LIMIT 1) AS latestM
FROM user LEFT JOIN user_profile ON user.id = user_profile.user_id AND user_profile.profile_status = 1 LEFT JOIN messages on (messages.user_receiver_id = :currentSessionUserId AND messages.user_sender_id = user.id) OR (messages.user_receiver_id = user.id AND messages.user_sender_id = :currentSessionUserId) WHERE EXISTS(SELECT * FROM messages WHERE (messages.user_receiver_id = :currentSessionUserId AND messages.user_sender_id = user.id) OR (messages.user_receiver_id = user.id AND messages.user_sender_id = :currentSessionUserId)) ORDER BY latestM DESC");
		$this->db->bind(":currentSessionUserId", $userSessionId);
		$row = $this->db->resultSet();
		if($row){
			return $row;
		}else{
			return false;
		}
	}
	

	public function getLatestMessages($receiverId, $senderId){
		$this->db->query("SELECT messages.user_receiver_id AS userId, user.firstname AS firstN, user.lastname AS lastN, messages.user_receiver_id AS receiverId, messages.user_sender_id AS senderId, messages.msg_content as msgContent, messages.msg_date AS msgDate, user_profile.img_path AS sendIconImage FROM messages LEFT JOIN user ON user.id = messages.user_sender_id LEFT JOIN user_profile ON user_profile.user_id = messages.user_sender_id AND user_profile.profile_status = 1 WHERE (messages.user_receiver_id = :userReceiverId AND messages.user_sender_id = :userSenderId) OR (messages.user_receiver_id = :userSenderId AND messages.user_sender_id = :userReceiverId) ORDER BY messages.timestamp DESC");
		$this->db->bind(":userReceiverId", $receiverId);
		$this->db->bind(":userSenderId", $senderId);
		$row = $this->db->resultSet();
	   if ($row) {
		   return $row;
	   } else {
		   return false;
	   }
	}

	/*Inser Message*/
	public function sendMessage($data){
		$this->db->query("INSERT INTO `messages`(`user_receiver_id`, `user_sender_id`, `msg_content`,`msg_date`) VALUES (:receiver,:sender,:message, :sendDate)");
		$this->db->bind(":receiver", $data['receiver']);
		$this->db->bind(":sender", $data['sender']);
		$this->db->bind(":message", $data['message']);
		$this->db->bind(":sendDate", $data['sendDate']);

		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}
}