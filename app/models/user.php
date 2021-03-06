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

	/* Profile Photo Update */

	public function profileUpdate($uId, $path){
		try {
			$this->db->beginTransaction();
			$this->db->query("SELECT * FROM user_profile WHERE user_id = :uId AND profile_status = 1");
			$this->db->bind(":uId", $uId);
			$row = $this->db->single();
			
			if($this->db->rowCount() > 0 ){
				$this->db->query("UPDATE user_profile SET profile_status = 0 WHERE user_id = :uId");
				$this->db->bind(":uId", $uId);
				$this->db->execute();
			}

			$this->db->query("INSERT INTO user_profile ( user_id, img_path, profile_status) VALUES ( :uId, :imgPath, 1)");
			$this->db->bind(":uId", $uId);
			$this->db->bind(":imgPath", $path);
			$this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
	}

	/* Wall Cover Update */
	public function coverUpdate($uId, $path){
		try {
			$this->db->beginTransaction();
			$this->db->query("SELECT * FROM user_wall WHERE user_id = :uId AND wall_status = 1");
			$this->db->bind(":uId", $uId);
			$row = $this->db->single();
			
			if($this->db->rowCount() > 0 ){
				$this->db->query("UPDATE user_wall SET wall_status = 0 WHERE user_id = :uId");
				$this->db->bind(":uId", $uId);
				$this->db->execute();
			}

			$this->db->query("INSERT INTO user_wall ( user_id, img_path, wall_status ) VALUES ( :uId, :imgPath, 1 )");
			$this->db->bind(":uId", $uId);
			$this->db->bind(":imgPath", $path);
			$this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
	}

	public function login($email, $password) {
		$this->db->query("SELECT user_email.user_id AS fId, user_email.email_add AS usrEmail, user.id AS usr_id, user.user_pass AS usrPass, user.is_admin AS is_admin, user.username AS usrName, user.user_type AS uType FROM user_email LEFT JOIN user ON user.id = user_email.user_id WHERE user.username = :email OR user_email.email_add = :email");

			$this->db->bind(':email', $email);
			$row = $this->db->single();


		// if ($row->id == $user_id->user_id) {
			$hashed_pass = $row->usrPass;
			if (password_verify($password,$row->usrPass)) {
				return $row;
				// return array('row' => $row);
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

	public function getUserInformation($uId){
		$this->db->query("SELECT user.user_type AS userType, user.firstname AS firstN, user.lastname AS lastN, user_profile.img_path AS userImage, user_wall.img_path AS wallImage, user_email.email_add AS userEmail, user_location.address AS userLocation, user_phone.phone_number AS userPhone, (SELECT AVG(user_rating.rate) FROM user_rating WHERE user_rating.user_id = user.id) AS userRating, (SELECT COUNT(user_rating.rate) AS reviews FROM user_rating WHERE user_rating.user_id = user.id) AS reviews FROM user LEFT JOIN user_profile ON user_profile.user_id = user.id AND user_profile.profile_status = 1 LEFT JOIN user_wall ON user_wall.user_id = user.id AND user_wall.wall_status = 1 LEFT JOIN user_email ON user_email.user_id = user.id AND user_email.email_status = 1 LEFT JOIN user_location ON user_location.user_id = user.id LEFT JOIN user_phone ON user_phone.user_id = user.id WHERE user.id = :userID");
		$this->db->bind("userID", $uId);
		$row = $this->db->single();
		if($row){
			return $row;
		}else{
			return false;
		}

	}

	public function numReviews($uId){
		$this->db->query("SELECT COUNT(user_rating.rate) AS reviews FROM user_rating WHERE user_rating.user_id = :uID");
		$this->db->bind(":uID", $uId);
		$row = $this->db->resultSet();

		if ($row) {
			return $row;
		}else{
	    	return 0;
		}
	}
}