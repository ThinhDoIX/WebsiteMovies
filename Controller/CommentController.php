<?php 
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Comment.php');

	class CmtCtrl {

		private $db;

		public function CmtCtrl() {
			// Kết nối vào databse 
			$this->db = new Database();
		}

		public function getSize() {
			// Lấy số lượng người dùng
			return $this->db->numRow();
		}

		public function getAllComment() {
			
			$sql = "SELECT * FROM comment";
			$this->db->setSQL($sql);

			// Trả về tất user trong DB
			return $this->db->getResult();
		}

		public function getCommentById($mid) {
			
			$sql = "SELECT * FROM comment where mid = $mid";
			$this->db->setSQL($sql);

			// Trả về tất user trong DB
			return $this->db->getResult();
		}

		public function addComment($mid, $name, $message) {
			// Thêm người dùng vào databse
			$sql = 'INSERT INTO comment (mid, name, message) VALUES (?, ?, ?)';
			$isOK = $this->db->bindInsertComment($sql, $mid, $name, $message);
			return $isOK;
		}

		public function deleteCommentByName($name) {
			$sql = "DELETE from comment where name = '$name'";
			$isOK = $this->db->command($sql);
			return $isOK;
		}
	}

?>