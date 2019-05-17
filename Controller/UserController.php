<?php 
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/User.php');

	class UserCtrl {

		private $db;

		public function UserCtrl() {
			// Kết nối vào databse 
			$this->db = new Database();
		}

		public function getSize() {
			// Lấy số lượng người dùng
			return $this->db->numRow();
		}

		public function getAllUser() {
			
			$sql = "SELECT * FROM user";
			$this->db->setSQL($sql);

			// Trả về tất user trong DB
			return $this->db->getResult();
		}

		/*
		public function getUserByType($type) {
			// Trả về một user có id cho trước
			$sql = "SELECT * FROM user where type = ?";
			
			$result = $this->db->get($sql, $type);

			return $result;
		} */

		public function addUser($username, $password, $email, $type) {
			// Thêm người dùng vào databse
			$sql = 'INSERT INTO user (username, password, email, type) VALUES (?, ?, ?, ?)';
			
			$isOK = $this->db->bindInsertUser($sql, $username, $password, $email, $type);
			return $isOK;
		}

		public function getUserByName($username) {
			$sql = "SELECT * FROM user WHERE username = '$username'";
			$this->db->setSQL($sql);
			return $this->db->getResult();
		}

		public function getUserById($id) {
			$sql = "SELECT * FROM user WHERE id = '$id'";
			$this->db->setSQL($sql);
			return $this->db->getResult();
		}
	}

?>