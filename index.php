<?php 
	require_once("Controller/MovieController.php");
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

<!--============================= STYLE ==========================================-->
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

	footer {
		background-color: #fff;
		border-radius: 5px 5px 0 0;
	}
	.card {
		background-color: #2a2d33 !important;
	}
	.card-body {
		color: #326ee5 !important;
	}
	.card {
		height: auto !important;
	}
	.card-body {
		height: 100% !important;
	}
	div.container.updated-list {
		background-color: #e9ecef;
			border-radius: 0.25rem;
			padding: 0.75rem 1rem;
	}
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
	.ih-item.square.effect3 .info h3 {
		padding-top: 0px !important;
	}
	.ih-item.square{
		border: none;
	}
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
	
	a.login-to-use:hover {
		text-decoration: none;
	}
	
</style>
<!--===============================================================================================-->


<!--============================== NAVBAR ==================================================-->
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

				<!--NAM PHAT HANH-->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Năm phát hành</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">2019</a>
			          <a class="dropdown-item" href="#">2018</a>
			          <a class="dropdown-item" href="#">2017</a>
			          <a class="dropdown-item" href="#">2016</a>
		        	</div>
				</li>

			</ul>

			<!--SEARCH FORM-->
			<form class="form-inline my-2 my-lg-0" action="search.php" method="get">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="fcontent">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchbtn" autofocus="on">Search</button>
		    </form>

	    	<a href="login.php" class="btn btn-danger ml-2" role="button">Đăng nhập</a>
		</div>
	</nav>
</div>

<!-- ===================================================================================== -->

<!-- ================================ Own Carousel ========================================-->
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
							<div class='item'>
								<a href='watch.php?watchid={$row['id']}'>
									<img src='{$row['image']}' class='card-img-top' alt='...'>
								</a>
							</div>
						";
					}
				?>
			</div>
		</div>
	</div>		
</div>


<!-- ////////////////////////////////////////////////////////////////////////////////////// -->


<div class="container">
	<div class="row mt-3">
		<!-- =========================== START OF 9 COLUMNS ===============================-->
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
			
			<!--=========================== PHIM MỚI CẬP NHẬT ==========================-->
			<div class="container pl-0 pr-0 mt-2">
				<div class="container updated-list">
					<div class="row justify-content-between">
						<h4 class="ml-2">PHIM MỚI CẬP NHẬT</h4>
					</div>
				</div>
			</div>

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

			<!--================================= PHIM NỔI BẬT NHẤT ====================================-->
			<div class="container pl-0 pr-0 mt-2">
				<!-- Phim mới cập nhật-->
				<div class="container updated-list">
					<div class="row justify-content-between">
						<h4 class="ml-2">ANIME MỚI CẬP NHẬT</h4>
					</div>
				</div>
			</div>
			<div class="col-sm-12 p-0">

				<!-- CUSTOM STYLE IHOVER-->

				<div class="row">
					<?php
						$anime = 'Anime';
						$movielist = new MovieCtrl();
						$list = $movielist->getMovieByType($anime);
						if($list->num_rows < 1) {
							echo 
							"
								<div class='alert alert-dark' role='alert'>
								  <h3>Không có Anime nào cập nhật gần đây</h3>
								</div>
							";
						}
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
		<!-- ==================================== END OF 9 COLUMNS =====================================-->
		

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
		      <li><a class="text-muted" href="search_category.php?fcategory=1">Hành động</a></li>
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
	</script>
</body>
</html>