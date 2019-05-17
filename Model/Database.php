<?php
	// Sử dụng class Database kết nối vào cơ sở dữ liệu
	class Database {
		
		private $conn;
		private $result;
		private $sql;

		public function Database(){
			$this->conn = new mysqli('localhost','root','','theater');
		}

		private function select($sql) {
			$this->result = $this->conn->query($sql);
		}

		public function setSQL($sql) {
			$this->sql = $sql;
		}

		public function getResult() {
			//return a table:
			$this->select($this->sql);
			return $this->result;
		}

		public function command($sql) {
			// insert, delete, update
			return $this->conn->query($sql);
		}

		private function checkConnection() {
			if($this->conn->connect_error) {
				return TRUE;
			}
			return FALSE;
		}
		
		public function bindInsertUser($sql, $username, $password, $email, $type) {
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("sssi", $username, $password, $email, $type);
			$isOK = $stmt->execute();
			$stmt->close();
			return $isOK;
		}

		public function bindInsertMovie($sql, $year, $name, $timeline, $director, $stars, $rate, $description, $image, $cover, $trailer, $link, $category) {
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("sssssissssss", $year, $name, $timeline, $director, $stars, $rate, $description, $image, $cover, $trailer, $link, $category);
			$isOK = $stmt->execute();
			$stmt->close();
			return $isOK;
		}

		public function bindInsertComment($sql, $mid, $name, $message) {
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("iss", $mid, $name, $message);
			$isOK = $stmt->execute();
			$stmt->close();
			return $isOK;
		}

		public function bindInsertBookmark($sql, $uid, $mid) {
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ii", $uid, $mid);
			$isOK = $stmt->execute();
			$stmt->close();
			return $isOK;
		}

		public function bindInsertRate($sql, $uid, $mid, $rate) {
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("iii", $uid, $mid, $rate);
			$isOK = $stmt->execute();
			$stmt->close();
			return $isOK;
		}
	}
?>