<?php
	require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		  if (isset($_GET['id'])) {
			  require('connect.php');
			  $sql = "SELECT * FROM rap WHERE marap = '{$_GET['id']}'";
			  $result = $conn->query($sql);
			  if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
			  }
		  }
	?>
	<title><?= $row['tenrap'] ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/chitietrap.css">
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
		<div class="rap">
			<div class="title">
				<h1>Chi Tiết Rạp</h1>
			</div>
			<div class="rap-info">
				<div class="rap-name">
					<h2><?= $row['tenrap'] ?></h1>
				</div>
				<div class="info">
					<span>Địa chỉ:</span>
					<span><?= $row['diachi'] ?></span>
				</div>
			</div>
		</div>
		<h1>Phim Đang Và Sắp Chiếu</h1>
		<div class="products-grid">
				<?php
						require('connect.php');
						$sql1 = "SELECT * FROM chieuphim,phim WHERE chieuphim.tenrap = '{$row['tenrap']}' and chieuphim.maphim = phim.maphim GROUP BY chieuphim.maphim";
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