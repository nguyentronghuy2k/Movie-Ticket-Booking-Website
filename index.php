<?php
	require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title> Movie Ticket Booking Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/showYtVideo.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Slick Carousel -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
	<div class="container">
		<div class="slideshow-container">
			<div class="mySlides fade">
	  			<img src="images/slide1.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
	  			<img src="images/slide2.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
	  			<img src="images/slide3.jpg" style="width:100%">
			</div>

			<div class="mySlides fade">
	  			<img src="images/slide4.png" style="width:100%">
			</div>

			<div class="mySlides fade">
	  			<img src="images/slide5.jpg" style="width:100%">
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="post-slider">
			<div class="title">
				<h2>MOVIE SELECTION</h2>
			</div>
			<i class="fa fa-angle-double-left prev"></i>
			<i class="fa fa-angle-double-right next"></i>
			<div class="post-wrapper">
				<?php
					$sql = "SELECT * FROM phim";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							?>
								<div class="post">
									<a class="show-video" id="<?= $row['Trailer'] ?>"><img src="<?= $row['hinhanh'] ?>" style="width: 240px;height: 360px"></a>
									<div class="post-info">
										<h4><?= $row['tenphim'] ?></h4>
										<a title="Xem chi tiết" class="button" href="detail.php?id=<?= $row['maphim'] ?> <?php if (isset($_GET['user'])) {echo "&amp;user={$_GET['user']}";} ?>" target="_blank">Xem chi tiết</a>
										<a title="Mua Vé" class="button" href="datve.php?id=<?= $row['maphim'] ?><?php if (isset($_GET['user'])) {echo "&amp;user={$_GET['user']}";} ?>">Mua Vé</a>
									</div>
								</div>
							<?php 	}
								}
				?>
			</div>
		</div>
	</div>
	<div class="event">
		<div class="event-title">
			<h2>Event</h2>
		</div>
		<div class="list-event">
			<ul>
				<li>
					<div class="event-border">
						<a href="https://www.cgv.vn/default/newsoffer/u22-vn/" target="_blank">
							<img src="images/event1.jpg" />
						</a>
					</div>
				</li>
				<li>
					<div class="event-border">
						<a href="https://www.cgv.vn/default/newsoffer/happy-wednesday/" target="_blank">
							<img src="images/event2.jpg" />
						</a>
					</div>
				</li>
				<li>
					<div class="event-border">
						<a href="https://www.cgv.vn/default/newsoffer/cgv-culture-day/" target="_blank">
							<img src="images/event3.jpg" />
						</a>
					</div>
				</li>
				<li>
					<div class="event-border">
						<a href="https://www.cgv.vn/default/newsoffer/quyen-loi-moi-nam-2020/" target="_blank">
							<img src="images/event4.jpg" />
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="contact">
		<p>
		<a href="https://www.facebook.com/cgvcinemavietnam ">
		<img  class="MXH" border="0" alt="facebook" src="images/fb.png" width="60" height="60">
		</a>
		<a href="https://www.youtube.com/cgvvietnam">
		<img class="MXH" border="0" alt="youtube" src="images/yt.png" width="60" height="60">
		</a>
		<a href="https://www.instagram.com/cgvcinemasvietnam/">
		<img class="MXH" border="0" alt="instagram" src="images/ig.jpg" width="60" height="60">
		</a>
		<a href="https://zalo.me/1884424922722396289">
		<img class="MXH" border="0" alt="zalo" src="images/zl.png" width="60" height="60">
		</a>
		</p>
	</div>
	<br><br>
	<div class="footer">
		<div class="footer-address">
			<h3>C&Ocirc;NG TY TNHH CJ CGV VIETNAM</h3>
			<p>Giấy CNĐKDN: 0303675393, đăng k&yacute; lần đầu ng&agrave;y 31/7/2008, đăng k&yacute; thay đổi lần thứ 5 ng&agrave;y 14/10/2015, cấp bởi Sở KHĐT th&agrave;nh phố Hồ Ch&iacute; Minh.</p>
			<p>Địa Chỉ:&nbsp;Tầng 2, Rivera Park Saigon - Số 7/28 Th&agrave;nh Th&aacute;i, P.14, Q.10, TPHCM.</p>
			<p>Hotline: 1900 6017</p>
			<p>COPYRIGHT 2017 CJ CGV. All RIGHTS RESERVED .</p>
		</div>
	</div>
<script src="js/jquery.showYtVideo.js"></script>
<script src="js/main.js"></script>
</body>
</html>
