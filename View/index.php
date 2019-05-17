<?php 

	session_start();
	require_once('../Controller/UserController.php');
	require_once('../Controller/MovieController.php');
	require_once('../Controller/BookmarkController.php');
	if($_SESSION['isLoggedIn'] == TRUE && isset($_SESSION['currentUser'])) {
		$currentUserId = $_SESSION['currentUser'];
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Xem phim|HD|Nhanh</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="../css/ihover.css">
	<link rel="stylesheet" type="text/css" href="../css/rating.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<style type="text/css">
	body {
		background-color: rgb(71, 75, 86) !important;
	}

	img:hover{
		opacity: 0.8;
	}	

	img.img-carousel {
		opacity: 0.3;
	}
	.ih-item.square.effect3 .info h3 {
		padding-top: 0px !important;
	}
	.ih-item.square{
		border: none !important;
	}
	footer {
		background-color: #fff;
		border-radius: 5px 5px 0 0;
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
				<form class="form-inline my-2 my-lg-0" action="search.php" method="get">
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="fcontent">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchbtn" autofocus="on">Search</button>
			    </form>

		    	<div class="dropdown">
				  <button class="btn btn-danger ml-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <?php 
			    		$user = new UserCtrl();
			    		$result = $user->getUserById($currentUserId);
			    		$userinfo = $result->fetch_assoc();
			    		echo "{$userinfo['username']}";
			    	?>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="#">Quản lý tài khoản</a>
				    <a class="dropdown-item" href="../index.php">Đăng Xuất</a>
				  </div>
				</div>
			</div>
	</nav>

</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

<!-- Own Carousel -->
<div class="container top-movie-list-header mt-3">
	
	<div class="row top-movie">
		<div class="col-lg-12">
			<h2 style="color: white;">PHIM ĐỀ CỬ</h2>
		</div>
	</div>


	<div class="row top-movie-list">
		<div class="col-sm-12">
			<div class="owl-carousel owl-theme">
				
			    <?php 
					$movie = new MovieCtrl();
					$result = $movie->getAllMovie();
					$noRows = $result->num_rows;

					for($i=0; $i < $noRows; $i++) {
						$row = $result->fetch_assoc();
						echo 
						"
							<div class='item'><a href='watch.php?watchid={$row['id']}'><img src='{$row['image']}' class='card-img-top' alt='...' ></a></div>
						";
					}
				?>
				</div>
			    
			</div>
		</div>		
	</div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////// -->


<div class="container">
	
	<div class="row mt-3">
		
		<div class="col-lg-9" id="main-page">

			<!--Slider card-->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				
				
			  	<div class="carousel-inner">
			  		<?php 
			  			$movie = new MovieCtrl();
			  			$list = $movie->getAllMovie();

			  			for($i=0; $i < $list->num_rows;$i++) {
			  				$row = $list->fetch_assoc();
			  				if($i==0) {
			  					echo 
				  				"	
				  					<div class='card bg-dark text-white carousel-item active'>
									  <img src='{$row['image']}' class='card-img img-carousel' alt='...' style='max-height:500px;'>
									  <div class='carousel-caption d-md-block'>
									    <h5 class='card-title'>{$row['name']}</h5>

									    <p class='card-text'>{$row['description']}</p>
									  </div>
									</div>
				  				"
				  				;
			  				} else {
			  					echo 
				  				"	
				  					<div class='card bg-dark text-white carousel-item'>
									  <img src='{$row['image']}' class='card-img img-carousel'  alt='...' style='max-height:500px;'>
									  <div class='carousel-caption d-md-block'>
									    <h5 class='card-title'>{$row['name']}</h5>

									    <p class='card-text'>{$row['description']}</p>
									  </div>
									</div>
				  				"
				  				;
			  				}
			  				
			  			}
			  		?>
			  	</div>

			  	<ol class="carousel-indicators">
			    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  	</ol>

			  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
			  	</a>
			  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
			  	</a>
			</div>
			
			<style type="text/css">
				div.container.updated-list {
					background-color: #e9ecef;
  					border-radius: 0.25rem;
  					padding: 0.75rem 1rem;
				}
			</style>

			<!--PHIM MỚI CẬP NHẬT-->
			<div class="container pl-0 pr-0 mt-2">
				<!-- Phim mới cập nhật-->
				<div class="container updated-list">
					<div class="row justify-content-between">
						<h4 class="ml-2">PHIM MỚI CẬP NHẬT</h4>
				
					</div>
				</div>
			</div>

			<style type="text/css">
				.ih-item img {
				  width: 100%;
				  height: 100%;
				}

				.ih-item.square {
				  position: relative;
				  width: auto;
				  height: auto;
				  border: 8px solid #fff;
				  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
				}
			</style>

			<!--Nội dung PHIM CẬP NHÂT-->
			<div class="col-sm-12 p-0">
				<div class="row">
					

					<?php
						$movielist = new MovieCtrl();
						$list = $movielist->getAllMovie();
						for($i=0 ; $i < $list->num_rows; $i++) {
							$row = $list->fetch_assoc();
							echo 
							"
								<div class='col-6 col-sm-4 col-md-4 col-lg-3'>
									<div class='ih-item square effect3 bottom_to_top mt-3'>
									 	<a href='watch.php?watchid={$row['id']}''>
									        <div class='img'>
									        	<img src='{$row['image']}' alt='image'>
									        </div>
									        <div class='info'>
									          <h3>{$row['name']}</h3>
									          <p>{$row['timeline']}</p>
								        	</div>
								        </a>
						        	</div>
					        	</div>
							"
							;

						}

					?>

				</div>
			</div>
			<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

			<!--PHIM NỔI BẬT NHẤT-->
			<div class="container pl-0 pr-0 mt-2">
				<!-- Phim mới cập nhật-->
				<div class="container updated-list">
					<div class="row justify-content-between">
						<h4 class="ml-2">PHIM NỔI BẬT NHẤT</h4>
						
					</div>
				</div>
			</div>

			<div class="col-sm-12 p-0">
				<div class="row">
					<?php
						$movielist = new MovieCtrl();
						$list = $movielist->getAllMovie();
						for($i=0 ; $i < $list->num_rows; $i++) {
							$row = $list->fetch_assoc();
							echo 
							"
								<div class='col-6 col-sm-4 col-md-4 col-lg-3'>
									<div class='ih-item square effect3 bottom_to_top mt-3'>
									 	<a href='watch.php?watchid={$row['id']}''>
									        <div class='img'>
									        	<img src='{$row['image']}' alt='image'>
									        </div>
									        <div class='info'>
									          <h3>{$row['name']}</h3>
									          <p>{$row['timeline']}</p>
								        	</div>
								        </a>
						        	</div>
					        	</div>
							"
							;

						}

					?>
				</div>
			</div>
			<!-- ////////////////////////////////////////////////////////////////////////////////////// -->
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

					<!--Hiển thị phim đánh dấu-->

					<div class="container-fluid right" style="background-color: inherit; height: auto;">


						<?php 
								$markMovie = new BmCtrl();
								$allMark = $markMovie->getBookmarkById($currentUserId);
								
								if($allMark->num_rows < 1) {
									echo 
									"
									<div class='alert alert-info' role='alert'>
  Bạn chưa lưu phim nào cả!
</div>";
								} else {
									for($i=0; $i < $allMark->num_rows; $i++) {
										$mark = $allMark->fetch_assoc();
										echo 
										"
											<div class='row mb-2'>
							
											<div class='col-4'>
												<a href='watch.php?watchid={$mark['mid']}'><img src='{$mark['image']}' class='img-fluid' alt='Responsive image' style='border-radius: 5px; border-color: #ddd;'></a>
											</div>
											<div class='col-8'>
												
												<ul style='list-style-type: none; padding-left: 0;'>
													<li>
														<a href='watch.php?watchid={$mark['mid']}'>{$mark['name']}</a>							
													</li>
													<li>
														<small>{$mark['rate']}/5 | {$mark['timeline']}</small>
													</li>
												</ul>
											
											</div>
										</div>
										";
									}
								}
								
						?>
					</div>

					<!--///////////////////////////////////////////////////////////-->



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
								$new = $result->fetch_assoc();
								echo 
								"
									<div class='row mb-2'>
						
										<div class='col-4'>
											<a href='watch.php?watchid={$new['id']}'><img src='{$new['image']}' class='img-fluid' alt='Responsive image' style='border-radius: 5px; border-color: #ddd;'></a>
										</div>
										<div class='col-8'>
											
											<ul style='list-style-type: none; padding-left: 0;'>
												<li>
													<a href='watch.php?watchid={$new['id']}'>{$new['name']}</a>							
												</li>
												<li>
													<small>{$new['rate']}/5 | {$new['timeline']}</small>
												</li>
											</ul>
										
										</div>
									</div>
								";
							}
						?>
					</div>
				</div>

				</style>

				
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
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
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

		
		
	</script>
</body>
</html>