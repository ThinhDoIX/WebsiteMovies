<!DOCTYPE html>
<html>
<head>
	<title>Đăng kí</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	
<!--<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">-->
</head>
<body>
	<style type="text/css">
		.bg {
			background: url(images/register-bg.jpg) no-repeat;
			width: 100%;
			height: 100vh;
			background-size: cover;
		}

		.form-container {
			position: absolute;
			background: transparent;
			padding: 30px;
			top: 15vh;
			border-radius: 10px;
			box-shadow: 5px 5px 5px 5px #000000;
		}

		.my-text-color {
			color: #1c4451;
		}

		@media only screen and (max-width: 678px) {
			.bg {
				background-size: cover;
			}
		}
	</style>

	<section class="container-fluid bg">
		<section class="row justify-content-end">

			<section class="col-12 col-sm-6 col-md-3">
				<form class="form-container" method="post" action="View/addUserDB.php">
					
					<div class="container-fluid justify-content-center">
						<h1 class="my-text-color">Đăng kí</h1>
					</div>

					<!--Nhập tên tài khoản-->
					<div class="form-group">
						<input type="text" name="username" class="form-control" id="inputUsername" aria-describedby="usernameHelp" placeholder="Tài khoản" required>
						<small id="usernameHelp" class="form-text text-muted">Tên tài khoản hiển thị trên website</small>
					</div>

					<!--Nhập mật khẩu-->
					<div class="form-group">
						<input type="password" name="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" placeholder="Mật khẩu" required>
						<small id="passwordHelp" class="form-text text-muted">Mật khẩu phải trên 6 ký tự</small>

					</div>

					<!--Nhập mật khẩu 2nd-->
					<div class="form-group">
						<input type="password" name="password_2" class="form-control" id="inputPassword_2" aria-describedby="password2Help" placeholder="Mật khẩu" required>
						<small id="password2Help" class="form-text text-muted">Nhập lại mật khẩu</small>

					</div>

					<!--Nhập email-->
					<div class="form-group">
				    	<input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Nhập email">
				    	<small id="emailHelp" class="form-text text-muted">Không bắt buộc</small>

				  	</div>

				  	<!-- ĐĂNG KÝ-->
				  	<button type="submit" id="registerbtn" class="btn btn-primary btn-block" autofocus>Đăng kí</button>
		
				</form>
			</section>

		</section>
	</section>


<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#registerbtn').click(function(event){
				//alert("Hello"); worked
				var username = $('#inputUsername').val();
				var pass1 = $('#inputPassword').val();
				var pass2 = $('#inputPassword_2').val();
				var email = $('#inputEmail').val();
				
				if(pass1.length < 6) {
					event.preventDefault();
					alert("Mật khẩu phải hơn 6 ký tự");
				}
				if(!(pass1 === pass2)) {
					event.preventDefault();
					alert("Mật khẩu phải trùng khớp");
				}
			});
		});
	</script>
</body>
</html>