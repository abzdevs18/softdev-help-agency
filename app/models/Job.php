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

		$this->db->query("INSERT INTO `jobs`(`company_id`, `job_category`, `job_title`, `job_description`, `job_requirement`, `deadline`, `tag_id`, `job_type`, `featured`, `salary`) VALUES (:company_id, :job_category, :job_title, :job_description, :job_requirement, :deadline, :tag_id, :job_type, :featured, :salary)");

		$this->db->bind(":company_id", $comInfo->comId);
		$this->db->bind(":job_category", $data['jCat']);
		$this->db->bind(":job_title", $data['jTitle']);
		$this->db->bind(":job_description", $data['jDesc']);
		$this->db->bind(":job_requirement", $data['edReq']);
		$this->db->bind(":deadline", $data['jDead']);
		$this->db->bind(":tag_id", $data['jTags']);
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
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

	public function getJobById($jId){
		$this->db->query("SELECT jobs.id AS jId, jobs.job_title AS jTitle, jobs.job_type AS jType, jobs.job_requirement AS jReq, jobs.deadline AS jDeadline, jobs.salary AS jSalary, jobs.job_description AS jDesc, company_ratings.rate AS comRate, company_location.address AS comLoc, company_profile.img_path AS comProf FROM jobs LEFT JOIN company_location ON company_location.com_id = jobs.company_id LEFT JOIN company_ratings ON company_ratings.company_id = jobs.company_id LEFT JOIN company_profile ON company_profile.comp_id = jobs.company_id AND company_profile.profile_status = 1 WHERE jobs.id = :jId ");
		$this->db->bind(":jId", $jId);
		$row = $this->db->single();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	}

}

