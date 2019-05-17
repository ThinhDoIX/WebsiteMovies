<?php 
	session_start();
	require_once("../Controller/BookmarkController.php");
	if($_SESSION['isLoggedIn'] == TRUE && isset($_SESSION['currentUser'])) {
		$uid = $_SESSION['currentUser'];
	}
	if(isset($_REQUEST['mov'])) {
		$bookmark = new BmCtrl();
		$isOK = $bookmark->addBookmark($uid, $_REQUEST['mov']);
	}
	
	if($isOK == TRUE) {
		echo 
		"<div class='alert alert-success' role='alert'>
			Đã bookmark thành công!
		</div>
";
	}

?>