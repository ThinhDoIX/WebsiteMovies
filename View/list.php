<?php 
	require_once("../Controller/MovieController.php");
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
	    	$list = new MovieCtrl();
	    	$result = $list->getAllMovie();

	    	if($result->num_rows == 0) {
	    		echo 
	    		"
	    			<tr>
				      	<th scope='row'>Không có phim nào để hiển thị</th>
				      	<td>
				      		Chọn cập nhật trong menu để thêm phim
				      	</td>
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
				      		<th scope='col'>Tên phim</th>
				      		<th scope='col'>Thể loại</th>
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
					      <td>{$row['name']}</td>
					      <td>{$row['category']}</td>
					      <td><a href='delete.php?deleteid={$row['id']}' class='btn btn-danger'>Xóa phim</a></td>
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