<?php 

	class User {

		private $id;
		private $username;
		private $password;
		private $email;
		private $type;

		public function User($username, $password, $email, $type) {
			$this->username = $username;
			$this->password = $password;
			$this->email = $email;
			$this->type = $type;
		} 
	}
?>