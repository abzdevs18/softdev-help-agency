<?php

/**
 * 
 */
class Inits
{
	private $db;
	
	function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function db()
	{
		if ($this->db) {
			return true;
		}else {
			return false;
		}
	}
}