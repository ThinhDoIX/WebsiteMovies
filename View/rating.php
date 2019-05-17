<?php 
	require_once("../Controller/RateController.php");

	$uid = $_POST['uid'];
	$mid = $_POST['mid'];
	$rate = $_POST['rate'];

	$submitRate = new RateCtrl();
	$submitRate->addRate($uid, $mid, $rate);
	
?>