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
	<title>Quản Lý Danh Sách Đặt Vé</title>
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
			<li><a href="quanliphim.php">Quản Lí Phim</a></li>
			<li><a href="quanlirap.php">Quản Lí Rạp</a></li>
			<li><a href="logout.php">Đăng Xuất</a></li>
		</ul>
    </nav>
    <table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: 20px auto auto auto">
		<tr class="header">
			<td>Tên Khách Hàng</td>
			<td>Tên Phim</td>
			<td>Tên Rạp</td>
			<td>Ngày Chiếu</td>
			<td>Giờ Chiếu</td>
			<td>Số Ghế</td>
			<td>Tổng Giá</td>
		</tr>
		<?php
			require('connect.php');
			$sql = "SELECT * FROM bookve";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					$total=0;
					while($row = $result->fetch_assoc()) {
			?>
						<?php
							$sql1 = "SELECT * FROM khachhang WHERE username_KH = '{$row['username_KH']}'";
							$result1 = $conn->query($sql1);
							$row1 = $result1->fetch_assoc();
						?>
						<tr class="item">
							<td><?= $row1['TenKH'] ?></td>
							<td><?= $row['tenphim'] ?></td>
							<td><?= $row['tenrap'] ?></td>
							<td><?= $row['ngaychieu'] ?></td>
							<td><?= $row['giochieu'] ?></td>
							<td><?= $row['ghe'] ?></td>
							<td><?= $row['tonggia'] ?> VNĐ</td>
						</tr>
						<?php
							$total += $row['tonggia'];
						?>
			<?php 	}
				}
		?>
		<tr class="header">
			<td>Tổng Tiền:</td>
			<td><?php echo $total; ?> VNĐ</td>
		</tr>
	</table>
</body>
</html>