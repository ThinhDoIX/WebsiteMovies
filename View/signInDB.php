<?php 
	session_start();
	require_once('../Controller/UserController.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>SignIn</title>
</head>
<body>
	<?php
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			if($_POST['password'] === '12345' && $_POST['username'] === 'admin' ) {
				header("Location: myAdminPage.php");
			} else {
				$user = new UserCtrl();
				$result = $user->getUserByName($username);
				$row = $result->fetch_assoc();

				if($_POST['password'] == $row['password'] && $_POST['username'] == $row['username']) {
					$_SESSION['isLoggedIn'] = TRUE;
					$_SESSION['currentUser'] = $row['id'];
					header("Location: index.php");
				} else {
					echo "<div class='alert alert-danger'> Invalid username or password </div>";
				}
			}
		}
	?>
</body>
</html>