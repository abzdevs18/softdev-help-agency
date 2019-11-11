<?php

/**
 * @desc: Class for Posting jobs and other related to Job execution
 */
class Job
{
	private $db;
	
	function __construct()
	{
		$this->db = Database::getInstance();
	}
	/**
	 * @desc: We first check where the user is belong to what company and get the company ID 
	 * 		  of the user from the result of our query, we joined the tables to create a
	 *		  single query to get the details of the company, and finally insert those 
	 *		  information into the job that the user is currently posting.
	 */
	public function postJob($data){

		/* @desc: Check what company is the  current user is registered or a member */
		$userCom = $this->userCompanyInfo($data['userID']);

		/* @desc: Getting all the information of the company */
		$comInfo = $this->companyInfo( $userCom->company_id);

		$this->db->query("INSERT INTO `jobs`(`company_id`, user_id, `job_category`, `job_title`, `job_description`, `job_requirement`, `deadline`, `tags`, `job_type`, `featured`, `salary`) VALUES (:company_id, :user_id, :job_category, :job_title, :job_description, :job_requirement, :deadline, :tags, :job_type, :featured, :salary)");

		$this->db->bind(":company_id", $comInfo->comId);
		$this->db->bind(":user_id", $data['userID']);
		$this->db->bind(":job_category", $data['jCat']);
		$this->db->bind(":job_title", $data['jTitle']);
		$this->db->bind(":job_description", $data['jDesc']);
		$this->db->bind(":job_requirement", $data['edReq']);
		$this->db->bind(":deadline", $data['jDead']);
		$this->db->bind(":tags", $data['jTags']);
		$this->db->bind(":job_type", $data['jType']);
		$this->db->bind(":featured", $data['jFeat']);
		$this->db->bind(":salary", $data['jSalary']);

		if ($this->db->execute()) {
			return true;
		}else {
			return false;
		}
	}

	public function userCompanyInfo($uId) {
		$this->db->query("SELECT * FROM `user_company_members` WHERE `user_id` = :uId");
		$this->db->bind(":uId", $uId);
		$row = $this->db->single();

		return $row;
	}

	public function companyInfo($comId){
		$this->db->query("SELECT company.id AS comId, company.company_name AS comName, company.company_pushline AS comPushLine, company.comapany_overview AS comOverview, company_emails.email_add AS comEmail, company_location.address AS comAddress, company_phone.phone_number AS comPhone, company_profile.img_path AS comImage, company_ratings.rate AS comRate, com_wall.img_path AS comWall FROM company LEFT JOIN company_emails ON company.id = company_emails.company_id LEFT JOIN company_location ON company_location.com_id = company.id LEFT JOIN company_phone ON company_phone.comp_id = company.id LEFT JOIN company_profile ON company_profile.comp_id = company.id AND company_profile.profile_status = 1 LEFT JOIN com_wall ON com_wall.comp_id = company.id AND com_wall.wall_status = 1 LEFT JOIN company_ratings ON company_ratings.company_id = company.id WHERE company.id = :comId");

		$this->db->bind(":comId", $comId);

		$row = $this->db->single();

		return $row;
	}

	public function hiddenRow()	{
		# code...
		$this->db->query("SELECT jobs.id AS jId, job_categories.category_name AS jCat, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN job_categories ON job_categories.id = jobs.job_category LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.job_visibility = 0");
		
		$row = $this->db->resultSet();
		if ($row) {
			$data = [
				"row" => $row,
				"rowHiddenCount" => $this->db->rowCount()
			];
			return $data;
		} else {
			return false;
		}
	}

	public function getJob(){
		$this->db->query("SELECT jobs.id AS jId, job_categories.category_name AS jCat, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN job_categories ON job_categories.id = jobs.job_category  LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.job_visibility = 1");
		
		$row = $this->db->resultSet();
		if ($row) {
			$data = [
				"row" => $row,
				"rowCount" => $this->db->rowCount()
			];
			return $data;
		} else {
			return false;
		}
	}

	public function getJobUserId($uId){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.user_id = :uId");

		$this->db->bind(":uId",$uId);
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getFeaturedJob(){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.featured = 1");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJobDropDown($param){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 ORDER BY :param");

		$this->db->bind(":param", $param);
		
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getOpenJob(){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.job_status = 1");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJobById($jId){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, jobs.tags AS jTags,  company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.id = :jId ");
		$this->db->bind(":jId", $jId);
		$row = $this->db->single();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJobByTag($jTag){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, jobs.tags AS jTags,  company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.tags LIKE  :jTag");
		$this->db->bind(":jTag", '%'. $jTag .'%');
		// $this->db->bind_params('s', "%" . $jTag . "%");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJobQuery($data){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, jobs.tags AS jTags,  company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.tags LIKE  :jTag");
		$this->db->bind(":jTag", '%'. $jTag .'%');
		// $this->db->bind_params('s', "%" . $jTag . "%");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJobByTitle($data){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, job_categories.category_name AS jCat, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, jobs.tags AS jTags,  company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN job_categories ON job_categories.id = jobs.job_category LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.user_id != :uId AND jobs.job_title LIKE  :jTitle");
		$this->db->bind(":uId", $_SESSION['uId']);
		$this->db->bind(":jTitle", '%'. $data .'%');
		// $this->db->bind_params('s', "%" . $jTag . "%");
		$row = $this->db->resultSet();
		if ($row) {
			$data = [
				"row" => $row
			];
			return $data;
		} else {
			return false;
		}
	}

	public function getJobByTitleDash($data){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, job_categories.category_name AS jCat, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, jobs.tags AS jTags,  company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN job_categories ON job_categories.id = jobs.job_category LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.user_id != :uId AND jobs.job_title LIKE  :jTitle");
		$this->db->bind(":uId", $_SESSION['uId']);
		$this->db->bind(":jTitle", '%'. $data['title'] .'%');
		// $this->db->bind_params('s', "%" . $jTag . "%");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getCategories(){
		$this->db->query("SELECT * FROM `job_categories`");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getLogo(){
		$this->db->query("SELECT * FROM `sf_logo`");
		$row = $this->db->single();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getTags(){
		$this->db->query("SELECT tags FROM `jobs` ");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	/* Job APplicaiton*/
	public function jobApplication($data){

		if ($this->getBidders($data)) {
			$this->db->query("INSERT INTO `job_biddings`(`job_id`, `user_id`) VALUES(:jobId,:uId)");

			// $this->db->bind(":currentUId", $data['uId']);
			$this->db->bind(":jobId", $data['jobId']);
			$this->db->bind(":uId", $data['uId']);

			if ($this->db->execute()) {
				return true;
			}else {
				return false;
			}
		}
		return false;
		
	}

	/* Checking bidders */
	public function getBidders($data){
		$this->db->query("SELECT * FROM `job_biddings` WHERE `job_id` = :jobID AND `user_id` = :uID");
		$this->db->bind(":jobID", $data['jobId']);
		$this->db->bind(":uID", $data['uId']);
		$this->db->execute();
		$row = $this->db->rowCount();
		if ($row) {
			return false;
		}
		return true;
	}

	/*Listing all the bidders*/
	public function listBidders($employeeId){
		$this->db->query("SELECT job_biddings.user_id AS workerId, jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf, user.firstname AS uFname, user.lastname AS uLname, user_profile.img_path AS userProf FROM job_biddings LEFT JOIN user ON user.id = job_biddings.user_id LEFT JOIN user_profile ON user_profile.user_id = job_biddings.user_id AND user_profile.profile_status = 1 LEFT JOIN jobs ON jobs.id = job_biddings.job_id LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.user_id = :empId ORDER BY job_biddings.timestamp");
		$this->db->bind(":empId", $employeeId);
		$row = $this->db->resultSet();

		if ($row) {
			return $row;
		}else{
			return false;
		}
	}

	/*List all WORKER job biddings*/
	public function listWorkerBids($workerId){
		$this->db->query("SELECT job_biddings.user_id AS workerId, jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf, user.firstname AS uFname, user.lastname AS uLname, user_profile.img_path AS userProf FROM job_biddings LEFT JOIN user ON user.id = job_biddings.user_id LEFT JOIN user_profile ON user_profile.user_id = job_biddings.user_id AND user_profile.profile_status = 1 LEFT JOIN jobs ON jobs.id = job_biddings.job_id LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE job_biddings.user_id = :workerId ORDER BY job_biddings.timestamp");
		$this->db->bind(":workerId", $workerId);
		$row = $this->db->resultSet();

		if ($row) {
			return $row;
		}else{
			return false;
		}
	}
	/*Listing all the bidders*/
	public function allBidders($jobId){
		$this->db->query("SELECT job_biddings.user_id AS workerId, jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf, user.firstname AS uFname, user.lastname AS uLname, user_profile.img_path AS userProf FROM job_biddings LEFT JOIN user ON user.id = job_biddings.user_id LEFT JOIN user_profile ON user_profile.user_id = job_biddings.user_id AND user_profile.profile_status = 1 LEFT JOIN jobs ON jobs.id = job_biddings.job_id LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.id = :jId ORDER BY job_biddings.timestamp");
		$this->db->bind(":jId", $jobId);

		$row = $this->db->resultSet();

		if ($row) {
			return $row;
		}else{
			return false;
		}
	}

	/*User listing on messages*/
	public function msgBid(){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf, user.id AS userId, user.username AS username,user_profile.img_path FROM job_biddings LEFT JOIN jobs ON jobs.id = :jobID LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 LEFT JOIN user ON user.id = :userID LEFT JOIN user_profile ON user_profile.user_id = :userID");
		$this->db->bind(":jobID", $_SESSION['workID']);
		$this->db->bind(":userID", $_SESSION['workerID']);
		$row = $this->db->resultSet();

		if ($row) {
			return $row;
		}else{
			return false;
		}	
	}

	/*Listing users bid for the JOB*/
	public function bidders(){
		// $this->db->query("SELECT user.id AS userId, user.username AS username, user.firstname AS firstname, user.lastname AS lastname, user_profile.img_path AS img_path FROM user LEFT JOIN user_profile ON user_profile.user_id = user.id WHERE EXISTS (SELECT * FROM job_biddings LEFT JOIN jobs ON jobs.id = job_biddings.job_id WHERE job_biddings.user_id = user.id AND jobs.user_id = :employeerID)");
		$this->db->query("SELECT messages.user_receiver_id AS msgR, messages.user_sender_id AS msgS, messages.msg_content AS msg_content, messages.msg_time AS msg_time, user.id AS userId, user.username AS username, user.firstname AS firstname, user.lastname AS lastname, user_profile.img_path AS img_path FROM messages LEFT JOIN user_profile ON user_profile.user_id = messages.user_sender_id AND user_profile.profile_status = 1 LEFT JOIN user ON user.id = messages.user_sender_id WHERE user.id != 1 AND messages.user_receiver_id = :sessionId ORDER BY messages.timestamp DESC LIMIT 1");
		$this->db->bind(":sessionId", $_SESSION['uId']);
		$row = $this->db->resultSet();
		
		if ($row) {
			return $row;
		}else{
			return false;
		}
	}


	/*Inser Message*/
	public function sendMessage($data){
		$this->db->query("INSERT INTO `messages`(`user_receiver_id`, `user_sender_id`, `msg_content`, `msg_time`, `msg_date`) VALUES (:receiver,:sender,:message,:sendTime, :sendDate)");
		$this->db->bind(":receiver", $data['receiver']);
		$this->db->bind(":sender", $data['sender']);
		$this->db->bind(":message", $data['message']);
		$this->db->bind(":sendTime", $data['sendTime']);
		$this->db->bind(":sendDate", $data['sendDate']);

		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}

	public function getJobDetailsOnMessenger($employeeId, $biddersId){
		$this->db->query("SELECT job_biddings.job_id AS jobId, jobs.job_description AS jDescription, user_profile.img_path AS imageBidder, user.firstname AS bidderF, user.lastname AS bidderL, user_location.address AS bidderLocation FROM job_biddings 
		LEFT JOIN user_profile ON user_profile.user_id = job_biddings.user_id AND user_profile.profile_status = 1 
		LEFT JOIN user_location ON user_location.user_id = job_biddings.user_id
		LEFT JOIN user ON user.id = job_biddings.user_id
		LEFT JOIN jobs ON jobs.user_id = :employeerId WHERE job_biddings.user_id = :biddersId");
		$this->db->bind(":employeerId",$employeerId);
		$this->db->bind(":biddersId",$biddersId);

		$row = $this->db->single();
		if($row){
			return $row;
		}else{
			return false;
		}
	}

	public function getBiddersListEmp($employeerId){
		$this->db->query("SELECT job_biddings.id AS jobId,messages.id AS msgId, messages.msg_time AS msgTime, messages.msg_content AS msgContent, messages.user_receiver_id AS receiver, messages.user_sender_id AS sender, jobs.user_id AS jobEmpId, job_biddings.user_id AS bidderId, user_profile.img_path AS imageBidder, user.username AS username,  user.firstname AS bidderF, user.lastname AS bidderL FROM jobs
		LEFT JOIN job_biddings on job_biddings.job_id = jobs.id
		LEFT JOIN user ON user.id = job_biddings.user_id
		LEFT JOIN user_profile ON user_profile.user_id = job_biddings.user_id
		LEFT JOIN messages ON messages.user_receiver_id = job_biddings.user_id AND messages.user_sender_id = jobs.user_id
		WHERE (EXISTS (SELECT job_biddings.job_id AS jobId FROM job_biddings WHERE job_biddings.job_id = jobs.id) AND jobs.user_id = :employeerId) AND
		messages.id IN (SELECT MAX(messages.id) FROM messages GROUP BY messages.user_receiver_id) ORDER BY messages.timestamp DESC");
		$this->db->bind(":employeerId",$employeerId);
		// $this->db->bind(":biddersId",$biddersId);

		$row = $this->db->resultSet();;

		if($row){
			return $row;
		}else{
			return false;
		}
	}

	public function getBiddersList($biddersId){
		$this->db->query("SELECT job_biddings.id AS jobId,messages.id AS msgId, messages.msg_time AS msgTime, messages.msg_content AS msgContent,  messages.user_receiver_id AS receiver, messages.user_sender_id AS sender, jobs.user_id AS jobEmpId, job_biddings.user_id AS bidderId, user_profile.img_path AS imageBidder, user.username AS username, user.firstname AS bidderF, user.lastname AS bidderL FROM jobs
		LEFT JOIN job_biddings on job_biddings.job_id = jobs.id
		LEFT JOIN messages ON (messages.user_receiver_id = job_biddings.user_id AND messages.user_sender_id = jobs.user_id) OR (messages.user_receiver_id = jobs.user_id AND messages.user_sender_id = job_biddings.user_id)
		LEFT JOIN user_profile ON user_profile.user_id =  messages.user_sender_id
		LEFT JOIN user ON user.id =  messages.user_sender_id
		WHERE (EXISTS (SELECT job_biddings.job_id AS jobId FROM job_biddings WHERE job_biddings.job_id = jobs.id) AND messages.user_receiver_id = :bidderId) AND messages.id IN (SELECT MAX(messages.id) FROM messages GROUP BY messages.user_receiver_id)");
		$this->db->bind(":bidderId",$biddersId);

		$row = $this->db->resultSet();;

		if($row){
			return $row;
		}else{
			return false;
		}
	}

}
