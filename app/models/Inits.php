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

	public function errorCon(){
		if (!$this->db) {
			return "no con";
		}
	}
}