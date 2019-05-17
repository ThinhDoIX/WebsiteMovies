<?php 
	require_once("Controller/MovieController.php");
	require_once("Controller/CommentController.php");
	$idwatch = $_REQUEST['watchid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Xem phim|HD|Nhanh</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="css/ihover.css">
	<link rel="stylesheet" type="text/css" href="css/rating.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<style type="text/css">
	body {
		background-color: rgb(71, 75, 86) !important;
	}

	img:hover{
		opacity: 0.8;
	}	

	img.cover {
		border-radius: 5px;
		opacity: 0.5;
	}
	footer {
		background-color: #fff;
		border-radius: 5px 5px 0 0;
	}

	img.avata {
		width: 60px;
		height: 60px;
	}

	input.form-control.comment-area {
		height: auto;
	}
	a.login-to-use:hover {
		text-decoration: none;
		color: red;
	}
</style>

<!-- NAVBAR HEADER -->
<div class="container justify-content-between">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="index.php" class="navbar-brand">AniHome</a>
		<button class="navbar-toggler myToggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
					</li>

					<!--Thể Loại-->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thể loại</a>

						<!--Danh sách các thể loại-->
						<!--Danh sách các thể loại-->
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="search_category.php?fcategory=1">Hành động</a>
				          <a class="dropdown-item" href="search_category.php?fcategory=2">Lãng mạn</a>
				          <a class="dropdown-item" href="search_category.php?fcategory=3">Hài hước</a>
				          <a class="dropdown-item" href="search_category.php?fcategory=4">Kinh dị</a>
				          <a class="dropdown-item" href="search_category.php?fcategory=5">Phiêu lưu</a>
				          <a class="dropdown-item" href="search_category.php?fcategory=6">Anime</a>
				        </div>
					</li>

					<!--Năm phát hành-->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Năm phát hành</a>

						<!--Danh sách các thể loại-->
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">2019</a>
			          <a class="dropdown-item" href="#">2018</a>
			          <a class="dropdown-item" href="#">2017</a>
			          <a class="dropdown-item" href="#">2016</a>
			        </div>
					</li>

				</ul>

				<!--Nội dung bên phải Navbar-->
				<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>

		    <a href="login.php" class="btn btn-danger ml-2" role="button">Đăng nhập</a>
			</div>
	</nav>

</div>



<div class="container">
	
	<div class="row">
		
		<div class="col-lg-9 watch-area">
			<?php 
				$movie = new MovieCtrl();
				$mv = $movie->getMovieById($idwatch);
				$watching = $mv->fetch_assoc();
				// HIỂN THỊ VIDEO
				//<img src='{$watching['cover']}' class='img-fluid cover mt-3' alt='Responsive image'>
				echo 
				"
					<video width='100%' height='auto' controls class='mt-3'>
					  <source src='{$watching['link']}' type='video/mp4'>
					</video>
				";
			?>

			<!--NỘI DUNG CHÈN DETAIL-->
			<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">
			    	CHI TIẾT
			    </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="trailer-tab" data-toggle="tab" href="#trailer" role="tab" aria-controls="trailer" aria-selected="false">Trailer</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="option-tab" data-toggle="tab" href="#option" role="tab" aria-controls="option" aria-selected="false">Tùy chọn</a>
			  </li>
			</ul>

			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab"> <!--DEATAIL-->
			    	<ul class="list-group">
					  <?php 
					  	echo 
					  	"<li class='list-group-item d-flex justify-content-left align-items-center'>
					  	
    						<h4>{$watching['name']}</h4>
    					</li>";

					  echo 
					  	"<li class='list-group-item d-flex justify-content-left align-items-center'>
					  	<strong>Thời lượng:</strong>
    					{$watching['timeline']}</li>";

    					 echo 
					  	"<li class='list-group-item d-flex justify-content-left align-items-center'>
					  	<strong>Đạo diễn: </strong>
    					{$watching['director']}</li>";

    					 echo 
					  	"<li class='list-group-item d-flex justify-content-left align-items-center'>
					  	<strong>Thể loại: </strong>
    					{$watching['category']}</li>";


					  	echo 
					  	"<li class='list-group-item d-flex justify-content-between align-items-center'>
    					
    					<i>
    						{$watching['description']}
    					</i>
    					</li>";
					  ?>
					</ul>
				</div>
		  		<div class="tab-pane fade" id="trailer" role="tabpanel" aria-labelledby="trailer-tab">
			  		<div class="embed-responsive embed-responsive-16by9">
				  		<iframe class="embed-responsive-item" src="<?php echo"{$watching['trailer']}";?>" allowfullscreen></iframe>
					</div>
			  	</div>
			  	<div class="tab-pane fade" id="option" role="tabpanel" aria-labelledby="option-tab">
			  		<ul class="list-group">
			  			<li class='list-group-item d-flex justify-content-start align-items-center'>
			  				<h4>Bookmark: </h4> 
		  					<a href="login.php" class='login-to-use ml-3'>
								  Đăng nhập để sử dụng
							</a>
		  					
			  			</li>
			  			<li class='list-group-item d-flex justify-content-start align-items-center'>
			  				<h4>Đánh giá: </h4> 
			  				<a href="login.php" class='login-to-use ml-3'>
								  Đăng nhập để sử dụng
							</a>
			  			</li>
			  		</ul>
	  			</div>
			</div>

			<!--COMMENT SECTION -->
			<style type="text/css">
				.avata {
					max-height: 64px;
					max-width: 64px;
				}

				.comment-section {
					background-color: #fff;
					border-radius: 8px;
					padding: 10px;
				}
				.postname {
					height: 80px;
					width: 350px;
				}
			</style>



			<div class="container mt-4 comment-section">
				<div class="comment"><h3>Bình luận về phim</h3></div>
				<hr>
				<!-- your comment here-->
				<fieldset style="width: 430px; margin-left: 10px;">
					<legend>Bình luận ở đây</legend>
					<form method="POST" action="" onSubmit="window.location.reload();"

>
						<table>
							<tr>
								<td>Tên</td>
								<td><input type="text" name="postname"></input></td>						
							</tr>
							<tr>
								<td>Nội dung</td>
								<td><textarea type="text" name="message" required></textarea></td>				
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="post" value="Đăng"></input></td>			
							</tr>
						</table>
						
					</form>
				</fieldset>



				<!--/////////////////////////////////////////////////////////////////-->
				<hr>
			

					
					<!--===========================================================================================-->
					<!--PHP Gửi bình luận-->
					<?php 
						// $idwatch: id của phim
						// $name: tên người bình luận
						// $message: nội dung bình luận
						$cmtload = new CmtCtrl();
						$flag = 0;
						if($flag == 0) {
							// hiển thị tất cả bình luận trước đó
							$allCommentLoad = $cmtload->getCommentById($idwatch);
							for($c = 0; $c < $allCommentLoad->num_rows; $c++) {
								$load = $allCommentLoad->fetch_assoc();
								echo "
									<div class='media mb-3'>
									<img src='images/avata.png' class='mr-3 avata' alt='avata'>
									<div class='media-body'>
										<h5 class='mt-0'>{$load['name']}</h5>
										{$load['message']}
									</div>
									</div>
								";
							}
							$flag = 1;
						}

						$cmt = new CmtCtrl();
						if(isset($_POST['post'])) {
							$name = $_POST['postname'];
							$message = $_POST['message'];
							// Lưu cmt vào csdl:
							$isOK = $cmt->addComment($idwatch, $name, $message);
							
							// Hiển thị toàn bộ comment
							$allComment = $cmt->getCommentById($idwatch);
							for($c = 0; $c < $allComment->num_rows; $c++) {
								$row = $allComment->fetch_assoc();
								echo "
									<div class='media mb-3'>
									<img src='images/avata.png' class='mr-3 avata' alt='avata'>
									<div class='media-body'>
										<h5 class='mt-0'>{$row['name']}</h5>
										{$row['message']}
									</div>
									</div>
								";
							}
						}
					?>
			</div>
			<!--///////////////////////////////////////////////////////-->
		</div>

		<style type="text/css">
			div.right-nav {
				background-color: #1b1d21;
				border-radius: 5px;
			}
			div.right {
				color: white;
			}

			div.container-fluid.right {
				padding-right: 0;
				padding-left: 0;
			}

		</style>

		<div class="col-lg-3 right-nav mt-4">
			<div class="row">
				<div class="col-sm-12">
					<div class="container right"><h5 class="mt-3"><i class="fas fa-star"></i>PHIM ĐÃ ĐÁNH DẤU</h5></div>
					<div class="dropdown-divider"></div>

					<a href="login.php" class='login-to-use'>
						<div class="alert alert-warning" role="alert">
						  Đăng nhập để sử dụng
						</div>
					</a>
				</div>
				<div class="col-sm-12">
					<div class="container right"><h5 class="mt-3"><i class="far fa-clock"></i>PHIM MỚI CẬP NHẬT</h5></div>
					<div class="dropdown-divider"></div>

					<div class="container-fluid right" style="background-color: inherit; height: auto;">


						<?php 
								$movie = new MovieCtrl();
								$result = $movie->getAllMovie();
								$noRows = $result->num_rows;

								for($i=0; $i < $noRows; $i++) {
									$row = $result->fetch_assoc();
									echo 
									"
										<div class='row mb-2'>
						
										<div class='col-4'>
											<a href='watch.php?watchid={$row['id']}'><img src='{$row['image']}' class='img-fluid' alt='Responsive image' style='border-radius: 5px; border-color: #ddd;'></a>
										</div>
										<div class='col-8'>
											
											<ul style='list-style-type: none; padding-left: 0;'>
												<li>
													<a href='watch.php?watchid={$row['id']}'>{$row['name']}</a>							
												</li>
												<li>
													<small>{$row['rate']}/5 | {$row['timeline']}</small>
												</li>
											</ul>
										
										</div>
									</div>
									";
								}
						?>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<footer class="mt-3 p-3">
    <div class="container">
    	<div class="row">
		  <div class="col-sm-12 col-lg-3">
		    <h5>@Copyright 2018-2019</h5>
		  </div>

		  <div class="col-sm-12 col-lg-3">
		    <h5>Thể loại</h5>
		    <ul class="list-unstyled text-small">
		      <li><a class="text-muted" href="#">Hành động</a></li>
		      <li><a class="text-muted" href="#">Tình cảm</a></li>
		      <li><a class="text-muted" href="#">Hài hước</a></li>
		      <li><a class="text-muted" href="#">Phiêu lưu</a></li>
		    </ul>
		  </div>

		  <div class="col-sm-12 col-lg-3">
		    <h5>Năm</h5>
		    <ul class="list-unstyled text-small">
		      <li><a class="text-muted" href="#">2019</a></li>
		      <li><a class="text-muted" href="#">2018</a></li>
		      <li><a class="text-muted" href="#">2017</a></li>
		      <li><a class="text-muted" href="#">2016</a></li>
		    </ul>
		  </div>

		  <div class="col-sm-12 col-lg-3">
		    <h5>About</h5>
		    <ul class="list-unstyled text-small">
		      <li><a class="text-muted" href="#">Trang web AniHome</a></li>
		      <li><a class="text-muted" href="#">anihome4u@mail.vn</a></li>
		      <li><a class="text-muted" href="#">Thành viên</a></li>
		    </ul>
		  </div>
		</div>
    </div>
  </footer>

<!--===============================================================================================-->
<div class="modal" id="comment-state" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="alert-success">Đã gửi bình luận</p>
      </div>
    </div>
  </div>
</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<!--===============================================================================================-->
	<script>
		$('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    autoplay:true,
    		autoplayTimeout:3000,
    		autoplayHoverPause:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:6
		        }
		    }
		})

		$('#c-post').click(function() {
			var message = $('#message').val();
			if(message == '') {
				$('#modal').on('shown.bs.modal', function () {
				  
				})
			}
		});
	</script>
</body>
</html>