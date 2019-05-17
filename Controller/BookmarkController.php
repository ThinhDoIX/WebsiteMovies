
<?php 
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Bookmark.php');

	class BmCtrl {

		private $db;

		public function BmCtrl() {
			// Kết nối vào databse 
			$this->db = new Database();
		}

		public function getSize() {
			// Lấy số lượng người dùng
			return $this->db->numRow();
		}

		public function getAllBookmark() {
			
			$sql = "SELECT * FROM bookmark";
			$this->db->setSQL($sql);

			// Trả về tất user trong DB
			return $this->db->getResult();
		}

		public function getBookmarkById($uid) {
			
			$sql = "SELECT * FROM bookmark, movie, user where uid = $uid and bookmark.uid = user.id and bookmark.mid = movie.id";
			$this->db->setSQL($sql);
					
			return $this->db->getResult();
		}

		public function addBookmark($uid, $mid) {
			// Thêm người dùng vào databse
			$sql = 'INSERT INTO bookmark (uid, mid) VALUES (?, ?)';
			$isOK = $this->db->bindInsertBookmark($sql, $uid, $mid);
			return $isOK;
		}

		public function removeBookmark($uid, $mid) {
			$sql = 'DELETE FROM bookmark where uid = $uid and mid = $mid';
			$isOK = $this->db->command($sql);
			return $isOK;
		}

		public function isBookmarked($uid, $mid) {
			$sql = "SELECT * FROM bookmark where mid =ANY (SELECT mid from bookmark where uid=$uid and mid=$mid)";
			$this->db->setSQL($sql);
			$result = $this->db->getResult();
			if($result->num_rows > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
			//return $this->db->getResult();
		}
	}
?>