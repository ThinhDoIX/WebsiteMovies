<?php 
	require_once("../Controller/UserController.php");
?>
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
</head>
	
<body>
	<table class="table">
	  
	    
	    
	    <?php 
	    	$list = new UserCtrl();
	    	$result = $list->getAllUser();

	    	if($result->num_rows == 0) {
	    		echo 
	    		"
	    			<tr>
				      	<th scope='row'>Không có tài khoản nào để hiển thị</th>
				    </tr>
				    <img src=''>
	    		";
	    	} else {
	    		echo 
	    		"
		    		<thead class='thead-dark'>
				  		<h2>DANH SÁCH PHIM</h2>
				    	<tr>
				      		<th scope='col'>#</th>
				      		<th scope='col'>Tên tài khoản</th>
				      		<th scope='col'>Loại</th>
				      		<th scope='col'>Xóa</th>
				    	</tr>
				  	</thead>
				";
				echo "<tbody>";
				$noRows = $result->num_rows;
				for($i = 1; $i <= $noRows; $i++) {
					$row = $result->fetch_assoc();
					echo
					"
						<tr>
					      <th scope='row'>{$i}</th>
					      <td>{$row['username']}</td>";


					      if($row['type'] == 1) {
					      	echo "<td>Người dùng</td>";	
					      } else {
					      	echo "<td>Admin</td>";
					      }
					      
					     
					      echo "<td><a href='deleteUser.php?uid={$row['id']}' class='btn btn-danger'>Xóa</a></td>
					    </tr>
					";
				}
				echo "</tbody>";			
	    	}
	    ?>

	</table>


<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>