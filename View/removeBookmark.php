<?php 
	session_start();
	require_once("../Controller/BookmarkController.php");
	if($_SESSION['isLoggedIn'] == TRUE && isset($_SESSION['currentUser'])) {
		$uid = $_SESSION['currentUser'];
	}
	if(isset($_REQUEST['mov'])) {
		$bookmark = new BmCtrl();
		$bookmark->removeBookmark($uid, $_REQUEST['mov']);
	}
	
?>