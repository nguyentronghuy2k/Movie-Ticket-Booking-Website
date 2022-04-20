<?php
	// Start the session
	session_start();
	if (!isset($_SESSION['isLoggedInAdmin'])) {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php 
			if (isset($_GET['id'])) {
				echo 'Sửa Phim';
			} else {
				echo 'Thêm Phim';
			}
		?>
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/themphim.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<nav>
		<input type="checkbox" id="responsive-menu">
		<label for="responsive-menu">
			<i class="fa fa-bars" id="label-1"></i>
			<i class="fa fa-times" id="label-2"></i>
		</label>
		<ul>
			<li><a href="index.php" target="_blank">Trang Chủ</a></li>
			<li><a href="list-film.php" target="_blank">Danh Sách Phim</a></li>
			<li><a href="cumrap.php" target="_blank">Cụm Rạp</a></li>
			<li><a href="quanliphim.php">Quản Lí Phim</a></li>
			<li><a href="quanlikhachhang.php">Quản Lí Khách Hàng</a></li>
			<li><a href="quanlidatve.php">Quản Lí Đặt Vé</a></li>
			<li><a href="quanlirap.php">Quản Lí Rạp</a></li>
			<li><a href='logout.php'>Đăng Xuất</a></li>
		</ul>
	</nav>
	<div class="main">
		<div class="form-box">
			<div class="title">
				<h1>
					<?php 
						if (isset($_GET['id'])) {
							echo 'Sửa Phim';
						} else {
							echo 'Thêm Phim';
						}
					?>
				</h1>
			</div>
			<?php
				$maphim = $tenphim = $daodien = $dienvien = $theloai = $thoiluong = $hinhanh =$Trailer = $chitiet = $khoichieu = $trangthai = '';
				if (isset($_GET['id'])) {
					// Edit
					require('connect.php');
					$sql = 'SELECT * FROM phim WHERE maphim = ' . $_GET['id'];
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$maphim = $row['maphim'];
						$tenphim = $row['tenphim'];
						$daodien = $row['daodien'];
						$dienvien = $row['dienvien'];
						$theloai = $row['theloai'];
						$thoiluong = $row['thoiluong'];
						$hinhanh = $row['hinhanh'];
						$Trailer = $row['Trailer'];
						$chitiet = $row['chitiet'];
						$khoichieu = $row['khoichieu'];
						$trangthai = $row['trangthai'];
					}
				}
			?>
			<form id="themphim" class="input-group" action="addfilm.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $maphim ?>">
				<input type="text" name="maphim" class="input-field" placeholder="Mã phim" value="<?= $maphim ?>" required>
				<input type="text" name="tenphim" class="input-field" placeholder="Tên phim"value="<?= $tenphim ?>" required>
				<input type="text" name="daodien" class="input-field" placeholder="Đạo diễn" value="<?= $daodien ?>" required>
                <input type="text" name="dienvien" class="input-field" placeholder="Diễn viên" value="<?= $dienvien ?>" required>
				<input type="text" name="theloai" class="input-field" placeholder="Thể loại" value="<?= $theloai ?>" required>
				<input type="text" name="thoiluong" class="input-field" placeholder="Thời lượng" value="<?= $thoiluong ?>" required>
				<input type="file" id="fileUpload" class="input-field" name="fileUpload" accept=".jpg, .png"  value="<?= $hinhanh ?>"required>
				<input type="text" name="Trailer" class="input-field" placeholder="https://www.youtube.com/embed/" value="<?= $Trailer ?>" required>
				<textarea class="input-field" name="chitiet" placeholder="Chi tiết" required><?= $chitiet ?></textarea>
				<input type="text" name="khoichieu" class="input-field" placeholder="Khởi chiếu" value="<?= $khoichieu ?>" required>
				<div class="input-field">
					<label for="trangthai">CHỌN TRẠNG THÁI</label>
					<br>
					<select id="trangthai" name="trangthai">
						<option value="Sắp Chiếu" <?php if ($trangthai == 'Sắp Chiếu') echo 'selected'; ?> >Sắp Chiếu</option>
						<option value="Đang Chiếu" <?php if ($trangthai == 'Đang Chiếu') echo 'selected'; ?> >Đang Chiếu</option>
					</select>
				</div>
				<button type="submit" class="submit-btn">
					<?php 
						if (isset($_GET['id'])) {
							echo 'Sửa Phim';
						} else {
							echo 'Thêm Phim';
						}
					?>
				</button>
			</form>
		</div>
	</div>
</body>
</html>