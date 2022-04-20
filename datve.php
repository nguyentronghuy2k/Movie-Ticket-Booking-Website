<?php
	// Start the session
	session_start();
	if (!isset($_SESSION['isLoggedInUser']) || !isset($_GET['user']) || !isset($_GET['id'])) {
		header('Location: login.php');
	}
?>
<?php
	// Turn off all error reporting
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đặt Vé</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/datve.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Slick Carousel -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>
<body>
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
	<form action="datve_next1.php?id=<?= $row['maphim'] ?><?php if (isset($_GET['user'])) {echo "&amp;user={$_GET['user']}";} ?>" method="POST">
		<div class="datve">
			
			<div class="chon">
				<label for="rap">CHỌN RẠP:</label>
				<br>
				<select id="rap" name="rap">
					<?php
						require('connect.php');
						$sql1 = 'SELECT DISTINCT tenrap FROM chieuphim WHERE maphim = ' . $_GET['id'];
						$result1 = $conn->query($sql1);
						if ($result1->num_rows > 0) {
							while($row1 = $result1->fetch_assoc()) {
								?>
									<option value="<?= $row1['tenrap'] ?>"><?= $row1['tenrap'] ?></option>
								<?php 	}
							}
					?>
				</select>
			</div>
			<div class="chon">
				<label for="phim">CHỌN PHIM:</label>
				<br>
				<select id="phim" name="phim">
					<option value="<?= $row['tenphim'] ?>"><?= $row['tenphim'] ?></option>
				</select>
			</div>
		<input id="mua" type="submit" value="Tiếp Tục">
	</form>
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