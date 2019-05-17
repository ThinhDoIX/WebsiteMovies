<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	
</head>
<body>
	<style type="text/css">
		.bg {
			background: url(https://images5.alphacoders.com/374/thumb-1920-374329.jpg) no-repeat; 
			width: 100%;
			height: 100vh;
			background-size: 100%;
		}

		.form-container {
			position: absolute;
			background: transparent;
			padding: 30px;
			top: 15vh;
			border-radius: 10px;
		}

		@media only screen and (max-width: 678px) {
			.bg {
				background-size: 300%;
			}
		}
		.back {
			background-color: #fff;
			color: black;
		}
	</style>

	<section class="container-fluid bg">
		<section class="row justify-content-center">

			<section class="col-12 col-sm-6 col-md-3">
				<form class="form-container" method="post" action="View/signInDB.php">

					<div class="container justify-content-center">
						<h1 class="text-white">Đăng nhập</h1>
					</div>

					<!--Nhập Tên người dùng-->
					<div class="form-group">
				    	<input name="username" type="text" class="form-control" id="inputUsername" aria-describedby="usernameHelp" placeholder="Tên người dùng">
				  	</div>

					<!--Nhập mật khẩu-->
					<div class="form-group">
						<input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" placeholder="Mật khẩu">
					</div>

				  	<!-- ĐĂNG KÝ-->
				  	<button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
				  	<a href="register.php" class="btn btn-primary btn-block">Đăng kí</a>
				  	<a href="index.php" class="btn btn-primary btn-block back">Về trang chủ</a>
				</form>
			</section>

		</section>
	</section>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>