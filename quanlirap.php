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
	<title>Quản Lý Danh Sách Rạp</title>
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
			<li><a href="quanliphim.php">Quản Lý Phim</a></li>
			<li><a href="quanlidatve.php">Quản Lí Đặt Vé</a></li>
			<li><a href="logout.php">Đăng Xuất</a></li>
		</ul>
    </nav>
    <table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: 20px auto auto auto">
		<tr class="header">
			<td>Tên Rạp</td>
			<td>Phim Chiếu</td>
			<td>Ngày Chiếu</td>
			<td>Giờ Chiếu</td>
		</tr>
		<?php
			require('connect.php');
			$sql = "SELECT * FROM chieuphim,phim WHERE phim.maphim = chieuphim.maphim";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
			?>
						<tr class="item">
							<td><?= $row['tenrap'] ?></td>
							<td><?= $row['tenphim'] ?></td>
							<td><?= $row['ngaychieu'] ?></td>
							<td><?= $row['giochieu'] ?></td>
						</tr>
			<?php 	}
				}
		?>
	</table>
</body>
</html>