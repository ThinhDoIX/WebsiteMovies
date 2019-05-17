<?php 
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Movie.php');

	class MovieCtrl {

		private $db;

		public function MovieCtrl() {
			// Kết nối vào databse 
			$this->db = new Database();
		}

		public function getSize() {
			// Lấy số lượng người dùng
			return $this->db->numRow();
		}

		public function getAllMovie() {
			
			$sql = "SELECT * FROM movie";
			$this->db->setSQL($sql);

			// Trả về tất user trong DB
			return $this->db->getResult();
		}

		public function getAllMovieNoType() {
			
			$sql = "SELECT * FROM movie where type = 0";
			$this->db->setSQL($sql);

			// Trả về tất user trong DB
			return $this->db->getResult();
		}

		public function addMovie($year, $name, $timeline, $director, $stars, $rate, $description, $image, $cover, $trailer, $link, $category) {
			// Thêm người dùng vào databse
			$sql = 'INSERT INTO movie (year, name, timeline, director, stars, rate, description, image, cover, trailer, link, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

			$isOK = $this->db->bindInsertMovie($sql, $year, $name, $timeline, $director, $stars, $rate, $description, $image, $cover, $trailer, $link, $category);
			return $isOK;
		}

		public function deleteMovieById($id) {
			$sql = "DELETE from movie where id = '$id'";
			$isOK = $this->db->command($sql);
			return $isOK;
		}

		public function getMovieById($id) {
			$sql = "SELECT * from movie where id = '$id'";
			$this->db->setSQL($sql);
			return $this->db->getResult();
		}

		public function getMovieByName($name) {
			$sql = "SELECT * FROM movie where lower(name) like lower('%$name%')";
			$this->db->setSQL($sql);
			return $this->db->getResult();
		}

		public function getMovieByType($type) {
			$sql = "SELECT * FROM movie where lower(category) like lower('%$type%')";
			$this->db->setSQL($sql);
			return $this->db->getResult();
		}
	}

?>