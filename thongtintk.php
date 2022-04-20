<?php
	// Start the session
	session_start();
	if (!isset($_SESSION['isLoggedInUser']) || !isset($_GET['user'])) {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/thongtintk.css">
    <title>Thông Tin Tài Khoản</title>
</head>
<body>
    <?php
		  if (isset($_GET['user'])) {
			  // Edit
            require('connect.php');
            $sql = "SELECT * FROM khachhang WHERE username_KH ='{$_GET['user']}'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
			  }
		  }
	?>
    <nav>
		<input type="checkbox" id="responsive-menu">
		<label for="responsive-menu">
			<i class="fa fa-bars" id="label-1"></i>
			<i class="fa fa-times" id="label-2"></i>
		</label>
		<ul>
			<?php 
				if (isset($_GET['user'])) {
					$user = $_GET["user"];
					echo "<li><a href='index.php?user={$_GET['user']}' target='_blank'>Trang Chủ</a></li>";
					echo "<li><a href='list-film.php?user={$_GET['user']}' target='_blank'>Danh Sách Phim</a></li>";
					echo "<li><a href='cumrap.php?user={$_GET['user']}' target='_blank'>Cụm Rạp</a></li>";
					echo "<li><a href='thongtintk.php?user={$_GET['user']}' target='_blank'>$user</a></li>";
					echo "<li><a href='logout.php' target='_blank'>Đăng Xuất</a></li>";
				}
				else {
					echo "<li><a href='index.php' target='_blank'>Trang Chủ</a></li>";
					echo "<li><a href='list-film.php' target='_blank'>Danh Sách Phim</a></li>";
					echo "<li><a href='cumrap.php' target='_blank'>Cụm Rạp</a></li>";
					echo "<li><a href='login.php' target='_blank'>Đăng Nhập</a></li>";
				}
			?>
		</ul>
	</nav>
    <div class="profile">
		<div class="title">
			<h1>Thông Tin Tài Khoản</h1>
		</div>
		<div class="profile-info">
            <div class="info">
                <span class="info-bold">Họ Và Tên: </span>
                <span class="info-normal"><?= $row['TenKH'] ?></span>
            </div>
            <div class="info">
                <span class="info-bold">Giới Tính: </span>
                <span class="info-normal"><?= $row['GioiTinh'] ?></span>
            </div>
            <div class="info">
                <span class="info-bold">Tên tài khoản: </span>
                <span class="info-normal"><?= $row['username_KH'] ?></span>
            </div>
			<div class="info">
                <span class="info-bold">Mật khẩu: </span>
                <span class="info-normal" style="-webkit-text-security: disc !important;"><?= $row['password_KH'] ?></span>
            </div>
            <div class="info">
                <span class="info-bold">Email: </span>
                <span class="info-normal"><?= $row['Email'] ?></span>
            </div>
            <div class="info">
                <span class="info-bold">Số Điện Thoại: </span>
                <span class="info-normal"><?= $row['phone'] ?></span>
            </div>
		</div>
		<h1 class="title">Lịch Sử Đặt Vé</h1>
		<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: 20px auto auto auto">
			<tr class="header">
				<td>Tên Phim</td>
				<td>Tên Rạp</td>
				<td>Ngày Chiếu</td>
				<td>Giờ Chiếu</td>
				<td>Số Ghế</td>
				<td>Tổng Giá</td>
			</tr>
			<?php
				require('connect.php');
				$sql1 = "SELECT * FROM bookve WHERE username_KH ='{$_GET['user']}'";
				$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
						while($row1 = $result1->fetch_assoc()) {
				?>
							<tr class="item">
								<td><?= $row1['tenphim'] ?></td>
								<td><?= $row1['tenrap'] ?></td>
								<td><?= $row1['ngaychieu'] ?></td>
								<td><?= $row1['giochieu'] ?></td>
								<td><?= $row1['ghe'] ?></td>
								<td><?= $row1['tonggia'] ?></td>
							</tr>
				<?php 	}
					}
			?>
		</table>
	</div>
</body>
</html>