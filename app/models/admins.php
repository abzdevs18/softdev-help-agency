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

	public function emailSub($data){
		$this->db->query("INSERT INTO `subscribe_emails`(`email_add`, `date_subscribe`) VALUES (:email, :dateSub)");
		$this->db->bind(":email",$data['email']);
		$this->db->bind(":dateSub",$data['date']);

		if($this->db->execute()){
			return true;
		}else{
			return false;
		}

	}

	public function getSubscribers(){
		$this->db->query("SELECT * FROM `subscribe_emails` ORDER BY `sub_timestamp` DESC");
		$row = $this->db->resultSet();
		if ($row) {
			return $row;
		}else{
			return false;
		}
	}

	/* Add a Blog Post */

	public function blogPost($data, $photo){
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `blog`(`blog_title`, `content`, `date_posted`) VALUES (:blogT,:blogC,:blogDate)");
			$this->db->bind(":blogT",$data["blog_title"]);
			$this->db->bind(":blogC",$data["blog_content"]);
			$this->db->bind(":blogDate",$data["blog_date"]);
			$this->db->execute();

			$lastId = $this->db->lastInsert();
			$this->db->query("INSERT INTO `blog_images`(`blog_id`, `img_path`) VALUES ($lastId,:blogImage)");
			$this->db->bind(":blogImage",$photo);
			$this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
	}

	/* Update a Blog Post */

	public function blogUpdate($data, $photo = ""){
		try {
			$this->db->beginTransaction();
			$this->db->query("UPDATE `blog` SET `blog_title`=:blogT, `content`=:blogC, `date_posted`=:blogDate WHERE blog.id = :blogId");
			$this->db->bind(":blogT",$data["blog_title"]);
			$this->db->bind(":blogC",$data["blog_content"]);
			$this->db->bind(":blogDate",$data["blog_date"]);
			$this->db->bind(":blogId",$data["blog_id"]);
			$this->db->execute();
			if($photo){
				// $lastId = $this->db->lastInsert();
				$this->db->query("UPDATE `blog_images` SET `img_path` = :blogImage WHERE `blog_id` = :blogId");
				$this->db->bind(":blogImage",$photo);
				$this->db->bind(":blogId",$data["blog_id"]);
				$this->db->execute();
			}

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
	}

	public function emailDeletion($id){
		try {
			//code...
			$this->db->beginTransaction();
			$this->db->query("DELETE FROM `subscribe_emails` WHERE id = :emailId");
			$this->db->bind(":emailId",$id);
			$this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			//throw $th;
			$this->db->rollBack();
			return false;
		}
	}

	public function blogDeletion($id){
		try {
			//code...
			$this->db->beginTransaction();
			$this->db->query("DELETE FROM `blog` WHERE id = :blogId");
			$this->db->bind(":blogId",$id);
			$this->db->execute();
			$this->db->query("DELETE FROM `blog_images` WHERE blog_id = :blogId");
			$this->db->bind(":blogId",$id);
			$this->db->execute();

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			//throw $th;
			$this->db->rollBack();
			return false;
		}
	}

	// Get the blogs

	public function getBlogs(){
		$this->db->query("SELECT blog.id AS blogId, blog.blog_title AS blogTitle, blog.content AS blogContent, blog.date_posted AS blogDate, blog_images.img_path AS blogImage FROM blog LEFT JOIN blog_images ON blog_images.blog_id = blog.id ORDER BY blog.date_timestamp DESC");
		$row = $this->db->resultSet();
		if($row){
			return $row;
		}else{
			return false;
		}
	}

	public function getBlogsLimit(){
		$this->db->query("SELECT blog.id AS blogId, blog.blog_title AS blogTitle, blog.content AS blogContent, blog.date_posted AS blogDate, blog_images.img_path AS blogImage FROM blog LEFT JOIN blog_images ON blog_images.blog_id = blog.id ORDER BY blog.date_timestamp DESC LIMIT 3");
		$row = $this->db->resultSet();
		if($row){
			return $row;
		}else{
			return false;
		}
	}

	public function getBlogDetails($id){
		$this->db->query("SELECT blog.id AS blogId, blog.blog_title AS blogTitle, blog.content AS blogContent, blog.date_posted AS blogDate, blog_images.img_path AS blogImage FROM blog LEFT JOIN blog_images ON blog_images.blog_id = blog.id WHERE blog.id = :blogId");
		$this->db->bind(":blogId",$id);
		$row = $this->db->single();
		if($row){
			return $row;
		}else{
			return false;
		}
	}
}