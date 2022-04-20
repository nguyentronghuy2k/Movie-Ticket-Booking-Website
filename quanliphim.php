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
	<title>Quản Lý Danh Sách Phim</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/quanli.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
			<li><a href="themphim.php" target="_blank">Thêm Phim</a></li>
			<li><a href="quanlikhachhang.php">Quản Lí Khách Hàng</a></li>
			<li><a href="quanlidatve.php">Quản Lí Đặt Vé</a></li>
			<li><a href="quanlirap.php">Quản Lí Rạp</a></li>
			<li><a href='logout.php'>Đăng Xuất</a></li>
		</ul>
    </nav>
    <table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: 20px auto auto auto">
		<tr class="header">
			<td>Hình Ảnh</td>
			<td>Tên Phim</td>
			<td>Thể Loại</td>
			<td>Đạo Diễn</td>
			<td>Diễn Viên</td>
			<td>Chi Tiết</td>
			<td>Trạng Thái</td>
			<td>Edit</td>
		</tr>
		<?php
			require('connect.php');
			$sql = "SELECT * FROM phim";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
			?>
						<tr class="item">
							<td><img src="<?= $row['hinhanh'] ?>" style="max-height: 180px"></td>
							<td><?= $row['tenphim'] ?></td>
							<td><?= $row['theloai'] ?></td>
							<td><?= $row['daodien'] ?></td>
							<td><?= $row['dienvien'] ?></td>
							<td><?= $row['chitiet'] ?></td>
							<td><?= $row['trangthai'] ?></td>
							<td><a href="themphim.php?id=<?= $row['maphim'] ?>">Edit</a> | <a href="delete.php?id=<?= $row['maphim'] ?>">Delete</a></td>
						</tr>
			<?php 	}
				}
		?>
		<tr class="control" style="text-align: right; font-weight: bold; font-size: 25px">
			<td colspan="5">
				<h3>Số lượng phim: <?= $result->num_rows ?></h3>
			</td>
		</tr>
	</table>
</body>
</html>