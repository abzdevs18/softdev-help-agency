<?php

/**
 * This is the connection to our database
 */
class dbCon
{
	
	private $serverName;
	private $userName;
	private $password;
	private $dbName;

	protected function connect(){
		$this->serverName = "localhost";
		$this->userName = "root";
		$this->password = "";
		$this->dbName = "sf_help";
	}
	$conn = new mysqli($this->serverName,$this->userName,$this->password,$this->dbName,);
	if ($conn->connect_error) {
		die("Connection failed:" . $conn->connect_error)
	}
	return $conn;
}