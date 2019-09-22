<?php

/**
 * User registration model
 */
class User
{
	private $db;

	function __construct()
	{
		$this->db = Database::getInstance();
	}

	public function signup($data){
		$this->db->query("INSERT INTO `user` (`username`, `firstname`, `lastname`, `user_pass`, `user_type`) VALUES (:username, :firstname, :lastname, :user_pass, :user_type)");

		$this->db->bind(':username', $data['userName']);
		$this->db->bind(':firstname', $data['fName']);
		$this->db->bind(':lastname', $data['lName']);
		$this->db->bind(':user_pass', $data['password']);
		$this->db->bind(':user_type', $data['uType']);

		/*LAter add condition here is a user is an employeer*/
		if ($this->db->execute()) {
			$lastInsertId = $this->db->lastInsert();
			$this->db->query("INSERT INTO `user_email`(`user_id`, `email_add`, `email_status`) VALUES ($lastInsertId, :email_add, 1)");
			$this->db->bind(':email_add', $data['uEmail']);
			$this->db->execute();

			$this->db->query("INSERT INTO `user_phone`(`user_id`, `phone_number`) VALUES ($lastInsertId, :phone_number)");
			$this->db->bind(':phone_number', $data['uPhone']);
			$this->db->execute();

			$this->db->query("INSERT INTO `user_location`(`user_id`, `address`) VALUES ($lastInsertId, :address)");
			$this->db->bind(':address', $data['uLocation']);
			if ($this->db->execute()) {
				if ($data['uType'] == 1) {
					if ($this->createCompany($data['company'])){

						$compID = $this->db->lastInsert();

						$this->db->query("INSERT INTO `user_company_members`(`company_id`, `user_id`, `user_position`) VALUES (:companyID, :userID, :userPos)");

						$this->db->bind(':companyID', $compID);
						$this->db->bind(':userID', $lastInsertId);
						$this->db->bind(':userPos', $data['compPosition']);
						if ($this->db->execute()) {
							$this->db->query("INSERT INTO `company_emails`(`company_id`, `email_add`, `email_status`) VALUES (:comp_ID, :email_add, 1)");
							$this->db->bind(":comp_ID", $compID);
							$this->db->bind(":email_add", $data['compEmail']);
							$this->db->execute();
							$this->db->query("INSERT INTO `company_phone`(`comp_id`, `phone_number`) VALUES (:comp_ID, :phone)");
							$this->db->bind(":comp_ID", $compID);
							$this->db->bind(":phone", $data['compPhone']);
							if($this->db->execute()){
								return true;
							}
						}

					}
				}
				return true;
				// echo "Yeahhhhhh";
			}else{
				// echo "Noooo";
				return false;
			}
		}else{
			return false;
		}

	}

	public function createCompany($name){
		$this->db->query("INSERT INTO `company`(`company_name`) VALUES (:compName)");
		$this->db->bind(':compName', $name);

		if ($this->db->execute()) {
			return true;
		}
	}

	public function login($email, $password) {
		$this->db->query("SELECT user_email.user_id AS fId, user_email.email_add AS usrEmail, user.id AS usr_id, user.user_pass AS usrPass, user.username AS usrName, user.user_type AS uType FROM user_email LEFT JOIN user ON user.id = user_email.user_id WHERE user.username = :email OR user_email.email_add = :email");

			$this->db->bind(':email', $email);
			$row = $this->db->single();


		// if ($row->id == $user_id->user_id) {
			$hashed_pass = $row->usrPass;
			if (password_verify($password,$row->usrPass)) {
				return $row;
				// return true;

			}else{
				return false;
			}
		// }

	}

	public function findUserEmail($email){
		$this->db->query("SELECT * FROM user_email WHERE email_add = :email_add");
		$this->db->bind(':email_add', $email);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function findCompanyEmail($email){
		$this->db->query("SELECT * FROM company_emails WHERE email_add = :email_add");
		$this->db->bind(':email_add', $email);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function findUserPhone($phone){
		$this->db->query("SELECT * FROM user_phone WHERE phone_number = :phone");
		$this->db->bind(':phone', $phone);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function findCompanyPhone($phone){
		$this->db->query("SELECT * FROM company_phone WHERE phone_number = :phone");
		$this->db->bind(':phone', $phone);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function findUserName($userName){
		$this->db->query("SELECT * FROM user WHERE username = :userName");
		$this->db->bind(':userName', $userName);

		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
}