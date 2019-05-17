<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Database.php');

	class RateCtrl {

		private $db;

		public function RateCtrl () {
			$this->db = new Database();
		}

		public function addRate($uid, $mid, $rate) {
			$sql = "INSERT INTO rating VALUES (?, ?, ?)";
			$isOK = $this->db->bindInsertRate($sql, $uid, $mid, $rate);
			return $isOK;
		}

		public function getRate($uid, $mid) {
			$sql = "SELECT rate FROM rating where uid = $uid and mid = $mid";
			$this->db->setSQL($sql);
			return $this->db->getResult();
		}
	}

?>