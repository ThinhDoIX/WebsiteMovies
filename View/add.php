<?php
  session_start();
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cập nhật phim|ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>Cập nhật phim mới</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">

          <form method="POST" enctype="multipart/form-data" action="addProduct.php">

            <div class="mb-3">
              <label for="name">Tên phim</label>
              <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên phim có dấu" required>
              </div>
            </div>
			
			       <div class="mb-3">
              <label for="type">Thể loại</label>
              <div class="input-group">
                <input type="text" class="form-control" id="category" name="category" placeholder="Thể loại">
              </div>
            </div>

            <div class="mb-3">
              <label for="type">Đạo diễn</label>
              <div class="input-group">
                <input type="text" class="form-control" id="director" name="director" placeholder="Đạo diễn phim.">
              </div>
            </div>

            <div class="mb-3">
              <label for="type">Diễn viên</label>
              <div class="input-group">
                <input type="text" class="form-control" id="stars" name="stars" placeholder="Dàn diễn viên">
              </div>
            </div>

            <div class="mb-3">
              <label for="type">Thời lượng phim</label>
              <div class="input-group">
                <input type="text" class="form-control" id="timeline" name="timeline" placeholder="Số tập, Thời gian xem...">
              </div>
            </div>

            <div class="mb-3">
              <label for="type">Năm phát hành</label>
              <div class="input-group">
                <input type="text" class="form-control" id="year" name="year" placeholder="Hiện tại đang cập nhật từ 2016 - 2019.." required>
              </div>
            </div>
			
			       <div class="mb-3">
              <label for="description">Description</label>
              <div class="input-group">
                <textarea class="form-control" id="description" name="description" placeholder="Mô tả phim" required></textarea>
              </div>
            </div>

            <div class="mb-3">
              <label for="trailerUpload">Trailer</label>
              <div class="input-group">
                <input type="text" class="form-control" id="trailerUpload" name="trailerUpload" placeholder="Đưa link vào đây (Nguồn youtube,...)">
              </div>
            </div>
			
			       <div class="mb-3">
              <label for="imageUpload">Image</label>
              <div class="input-group">
                <input type="file" id="imageUpload" name="imageUpload"" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="coverUpload">Ảnh lớn</label>
              <div class="input-group">
                <input type="file" id="coverUpload" name="coverUpload" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="linkUpload">Đường dẫn</label>
              <div class="input-group">
                <input type="file" id="linkUpload" name="linkUpload">
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" id="updateBtn">Cập nhật</button>
          </form>
        </div>
      </div>



      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018-2019 KuroNeko</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Team Đồ án</a></li>
          <li class="list-inline-item"><a href="#">Hỗ Trợ</a></li>
        </ul>
      </footer>
    </div>
  </body>
</html>