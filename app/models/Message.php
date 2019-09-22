<?php

/**
 * Message Class
 */
class Message
{
	private $db;

	function __construct(argument)
	{
		$this->db = Database::getInstance();
	}

	public function message($data){
	}
}