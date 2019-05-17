<?php 
	require_once('../Controller/UserController.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin: Thêm Users</title>
</head>
<body>
	<?php 

		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$user = new UserCtrl();
		$isAdded = $user->addUser($username, $password, $email, 1);

		if($isAdded) {
			echo "Đăng kí thành công";
		} else {
			echo "Đăng kí thất bại";
		}

		header("Location: ../index.php");
	?>
</body>
</html>