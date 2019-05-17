<?php
	require_once('../Controller/MovieController.php');

	$name = $_POST['name'];
	$description = $_POST['description'];
	$trailer = $_POST['trailerUpload'];	
	$year = $_POST['year'];
	$timeline = $_POST['timeline'];
	$director = $_POST['director'];
	$category = $_POST['category'];
	$stars = $_POST['stars'];
	$imageUpload = "../images/" . $_FILES['imageUpload']['name'];
	move_uploaded_file($_FILES['imageUpload']['tmp_name'], $imageUpload);

	$coverUpload = "../images/" . $_FILES['coverUpload']['name'];
	move_uploaded_file($_FILES['coverUpload']['tmp_name'], $coverUpload);

	$linkUpload = "../videos/" . $_FILES['linkUpload']['name'];
	move_uploaded_file($_FILES['linkUpload']['tmp_name'], $linkUpload);

	$movie = new MovieCtrl();
	$isOK = $movie->addMovie($year, $name, $timeline, $director, $stars, 0, $description, $imageUpload, $coverUpload, $trailer, $linkUpload, $category);
	if($isOK == TRUE) {
		echo "
			<div class='alert alert-success' role='alert'>
			  Cập nhật phim thành công
			</div>
		";
	} else {
		echo
		"
			<div class='alert alert-warning' role='alert'>
			  Cập nhật phim không thành công
			</div>
		";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Cập nhật phim</title>
		
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		
	</body>
</html>