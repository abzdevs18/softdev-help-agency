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
}