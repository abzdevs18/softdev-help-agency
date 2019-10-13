<?php

/**
 * 
 */
class Admins
{
	private $db;
	private $error;
	
	function __construct()
	{
		
		$this->db = Database::getInstance();
		$this->error = Database::conError();

	}

	public function connError(){
		return $this->error;
	}

	public function isAdminFound(){
		$this->db->query("SELECT * FROM user WHERE is_admin = 1");
		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		}

		return false;
		// echo $this->db;
	}

	public function bidLog(){
		$this->db->query("SELECT * FROM jobs WHERE EXISTS( SELECT job_id FROM job_biddings WHERE job_biddings.job_id = jobs.id)");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else{
			return false;
		}
	}
}