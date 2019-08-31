<?php

/**
 * 
 */
class Admin
{
	private $db;
	function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function isAdminFound(){
		$this->db->query("SELECT * FROM user WHERE is_admin = 1");
		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		}

		return false;
	}
}