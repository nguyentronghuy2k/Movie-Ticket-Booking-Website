<?php
	require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		  if (isset($_GET['id'])) {
			  require('connect.php');
			  $sql = 'SELECT * FROM phim WHERE maphim = ' . $_GET['id'];
			  $result = $conn->query($sql);
			  if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
			  }
		  }
	?>
	<title><?= $row['tenphim'] ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/detail.css">
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
	<div class="product">
		<div class="title">
			<h1>Nội Dung Phim</h1>
		</div>
		<div class="product-img">
			<img src="<?= $row['hinhanh'] ?>" style="width: 200px;height: 300px">
		</div>
		<div class="product-info">
			<div class="product-name">
				<h1><?= $row['tenphim'] ?></h1>
			</div>
			<div class="info">
				<span class="info-bold">Đạo diễn: </span>
				<span class="info-normal"><?= $row['daodien'] ?></span>
			</div>
			<div class="info">
				<span class="info-bold">Diễn viên: </span>
				<span class="info-normal"><?= $row['dienvien'] ?></span>
			</div>
			<div class="info">
				<span class="info-bold">Thể loại: </span>
				<span class="info-normal"><?= $row['theloai'] ?></span>
			</div>
			<div class="info">
				<span class="info-bold">Thời lượng: </span>
				<span class="info-normal"><?= $row['thoiluong'] ?> phút</span>
			</div>
			<div class="info">
				<span class="info-bold">Khởi chiếu: </span>
				<span class="info-normal"><?= $row['khoichieu'] ?></span>
			</div>
			<a title="Mua Vé" class="button" href="datve.php?id=<?= $row['maphim'] ?><?php if (isset($_GET['user'])) {echo "&amp;user={$_GET['user']}";} ?>">Mua Vé</a>
		</div>
	</div>
	<div class="chi-tiet">
		<h2>Chi Tiết</h2>
		<p>
			<?= $row['chitiet'] ?>
		</p>
	</div>
	<div class="trailer">
		<h2>Trailer</h2>
		<p align="center"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $row['Trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
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