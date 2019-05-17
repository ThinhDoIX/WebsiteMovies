<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
   	<link rel="stylesheet" type="text/css" href="css/sidenav.css">
 

</head>
	<style type="text/css">
		.sidebar-wrapper .sidebar-header .user-pic img {
			max-width: 70px;
			max-height: 70px;
			border-radius: 50%;
			background-size: cover;
		}
	</style>
<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">AniHome AdminPage</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <!--<img class="img-responsive img-rounded" src="images/avata_1.jpg">-->
          <img src="../images/avata_1.jpg" alt="avata_1">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong>Thinh Do</strong>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
     
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Quản lý</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Cơ sở dữ liệu</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#" id="update-movie">Cập nhật
                  </a>
                </li>
                <li>
                  <a href="#" id="list-movie">Danh sách phim
                  </a>
                </li>
                <li>
                  <a href="#" id="category-movie">Quản lý thể loại</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Người dùng</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#" id="delete-user">Xóa người dùng

                  </a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="header-menu">
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a href="../login.php">
              <i class="fa fa-book"></i>
              <span>Đăng xuất</span>
            </a>
          </li>
          <li>
            <a href="#">
           		<i class="fa fa-book"></i>
            	<span>Đăng kí admin</span>
            </a>
          </li>
          <li>
            <a href="../index.php">
              <i class="fa fa-folder"></i>
              <span>Đi đến trang phim</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid" id="main-page">
     
    </div>

  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/sidenav.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
	        $('#update-movie').click(function(e) {
	            e.preventDefault();
	            console.log($('#main-page').load('add.php'));
	        });
	    });

      $(document).ready(function() {
          $('#list-movie').click(function(e) {
              e.preventDefault();
              console.log($('#main-page').load('list.php'));
          });
      });

      $(document).ready(function() {
          $('#category-movie').click(function(e) {
              e.preventDefault();
              console.log($('#main-page').load('updateCategory.php'));
          });
      });

      $(document).ready(function() {
          $('#delete-user').click(function(e) {
              e.preventDefault();
              console.log($('#main-page').load('myUserPage.php'));
          });
      });
    </script>
</body>

</html>