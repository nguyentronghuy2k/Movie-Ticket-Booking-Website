<!DOCTYPE html>
<html>
<head>
	<title>Danh Sách Phim</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/list-film.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<nav id="menu">
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
					echo "<li><a href='logout.php'>Đăng Xuất</a></li>";
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
	<div class="main">
		<div class="title">
			<h1>Danh Sách Phim</h1>
		</div>
		<nav id="time">
		<input type="checkbox" id="responsive-menu">
		
		<ul id="option">
			<?php 
				if (isset($_GET['user'])) {
					echo "<li id='option_li'><a href='list-film.php?user={$_GET['user']}' target='_blank'>Tất Cả</a></li>";
					echo "<li id='option_li'><a href='dangchieu.php?user={$_GET['user']}' style='color:red;'>Đang Chiếu</a></li>";
					echo "<li id='option_li'><a href='sapchieu.php?user={$_GET['user']}' target='_blank'>Sắp Chiếu</a></li>";
				}
				else {
					echo "<li id='option_li'><a href='list-film.php' target='_blank'>Tất Cả</a></li>";
					echo "<li id='option_li'><a href='dangchieu.php' style='color:red;'>Đang Chiếu</a></li>";
					echo "<li id='option_li'><a href='sapchieu.php' target='_blank'>Sắp Chiếu</a></li>";
				}
			?>
		</ul>
		</nav>
		<div class="products-grid">
				<?php
						require('connect.php');
						$sql1 = "SELECT * FROM phim WHERE trangthai = N'Đang Chiếu'";
						$result1 = $conn->query($sql1);
						if ($result1->num_rows > 0) {
							while($row1 = $result1->fetch_assoc()) {
							?>
								<div class="film-lists">
									<div class="product-images">
										<a href="detail.php?id=<?= $row1['maphim'] ?> <?php if (isset($_GET['user'])) {echo "&amp;user={$_GET['user']}";} ?>" title="<?= $row1['tenphim'] ?>" class="product-image">
											<img src="<?= $row1['hinhanh'] ?>" style="height: 260px;width: 185px;">
										</a>
									</div>
									<div class="product-info">
										<h2 class="product-name"><a href="#" title="BLOODSHOT"><?= $row1['tenphim'] ?></a></h2>
										<div class="info">
											<span class="info-bold">Thể loại: </span>
											<span class="info-normal"><?= $row1['theloai'] ?></span>
										</div>
										<div class="info">
											<span class="info-bold">Thời lượng: </span>
											<span class="info-normal"><?= $row1['thoiluong'] ?> phút</span>
										</div>
										<div class="info">
											<span class="info-bold">Khởi chiếu: </span>
											<span class="info-normal"><?= $row1['khoichieu'] ?></span>
										</div>
									 </div>
								</div>
							<?php 	}
								}
					?>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="footer-address">
			<h3>C&Ocirc;NG TY TNHH CJ CGV VIETNAM</h3>
			<p>Giấy CNĐKDN: 0303675393, đăng k&yacute; lần đầu ng&agrave;y 31/7/2008, đăng k&yacute; thay đổi lần thứ 5 ng&agrave;y 14/10/2015, cấp bởi Sở KHĐT th&agrave;nh phố Hồ Ch&iacute; Minh.</p>
			<p>Địa Chỉ:&nbsp;Tầng 2, Rivera Park Saigon - Số 7/28 Th&agrave;nh Th&aacute;i, P.14, Q.10, TPHCM.</p>
			<p>Hotline: 1900 6017</p>
			<p>COPYRIGHT 2017 CJ CGV. All RIGHTS RESERVED .</p>
		</div>
	</div>
</body>
</html>