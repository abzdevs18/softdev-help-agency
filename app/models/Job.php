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

	public function getJob(){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.featured AS isJFeatured, jobs.job_description AS jDesc, jobs.tags AS jTags, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
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
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, jobs.tags AS jTags,  company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.user_id != :uId AND jobs.job_title LIKE  :jTitle");
		$this->db->bind(":uId", $data['user']);
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
		$this->db->query("SELECT * FROM `job_categories` ");
		$row = $this->db->resultSet();
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

}

