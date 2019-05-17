<?php 
	class Comment {

		private $cid;
		private $mid;
		private $name;
		private $mesage;
		

		public function Movie($cid, $mid, $name, $message) {
			$this->cid = $cid;
			$this->mid = $mid;
			$this->name = $name;
			$this->message = $message;
			
		}
	}
?>