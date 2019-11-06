<?php

class Message
{
	private $db;
	function __construct(){
		$this->db = Database::getInstance();
	}

	/**
	 * This for retrieving message/conversation between client and the bidder/worker
	 */

	 public function getMessage($receiverId,$senderId){
		 $this->db->query("SELECT messages.user_receiver_id AS receiverId, messages.user_sender_id AS senderId, messages.msg_content as msgContent, messages.msg_date AS msgDate, user_profile.img_path AS sendIconImage FROM messages LEFT JOIN user_profile ON user_profile.user_id = messages.user_sender_id AND user_profile.profile_status = 1 WHERE (messages.user_receiver_id = :userSenderId AND messages.user_sender_id = :userReceiverId) OR (messages.user_receiver_id = :userReceiverId AND messages.user_sender_id = :userSenderId) ORDER BY messages.timestamp ASC");
		 $this->db->bind(":userReceiverId", $receiverId);
		 $this->db->bind(":userSenderId", $senderId);
		 $row = $this->db->resultSet();
		if ($row) {
			return $row;
		} else {
			return false;
		}
	 }
}