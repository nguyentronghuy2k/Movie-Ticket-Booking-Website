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
		<?php
			require("connect.php");
			$username_KH = $_GET['user'];
			$tenrap = $_POST['rap'];
			$tenphim = $_POST['phim'];
			$ngaychieu = $_POST['day'];
		?>
	<form action="" method="POST">
		<div class="datve">
			
			<div class="chon">
				<label for="rap">CHỌN RẠP:</label>
				<br>
				<select id="rap" name="rap">
					<option value="<?= $tenrap ?>"><?= $tenrap ?></option>
				</select>
			</div>
			<div class="chon">
				<label for="phim">CHỌN PHIM:</label>
				<br>
				<select id="phim" name="phim">
					<option value="<?= $row['tenphim'] ?>"><?= $row['tenphim'] ?></option>
				</select>
			</div>
			<div class="chon">
				<label for="day">CHỌN NGÀY XEM:</label>
				<br>
				<select id="day" name="day">
					<option value="<?= $ngaychieu  ?>"><?= $ngaychieu  ?></option>
				</select>
			</div>
			<div class="chon">
				<label for="gioxem">CHỌN GIỜ XEM:</label>
				<br>
				<select id="gioxem" name="gioxem" required>
					<?php
						require('connect.php');
						$sql3 = "SELECT giochieu FROM chieuphim WHERE tenrap = '{$tenrap}' and ngaychieu = '{$ngaychieu}'";
						$result3 = $conn->query($sql3);
						if ($result3->num_rows > 0) {
							while($row3 = $result3->fetch_assoc()) {
								?>
									<option value="<?= $row3['giochieu'] ?>"><?= $row3['giochieu'] ?></option>
								<?php 	}
							}
					?>
				</select>
			</div>
			<div class="chon">
				<label for="ve">CHỌN LOẠI VÉ:</label>
				<br>
				<select id="ve" name="ve">
					<option value="100000">Trẻ Em: 100.000đ</option>
					<option value="200000">Người Lớn: 200.000đ</option>
				</select>
			</div>
			<div class="chon">
				<label for="combo">CHỌN COMBO:</label>
				<br>
				<select id="combo" name="combo">
					<option value="55000">Pepsi + Bắp Ngọt: 55.000đ</option>
					<option value="60000">Pepsi + Bắp phô mai: 60.000đ</option>
					<option value="55000">7up + Bắp Ngọt: 55.000đ</option>
					<option value="60000">7up + Bắp phô mai: 60.000đ</option>
					<option value="55000">Mirinda + Bắp Ngọt: 55.000đ</option>
					<option value="60000">Mirinda + Bắp phô mai: 60.000đ</option>
					<option value="55000">Aquafina + Bắp Ngọt: 55.000đ</option>
					<option value="60000">Aquafina + Bắp phô mai: 60.000đ</option>
				</select>
			</div>
			<div class="chon">
				<label for="soluongcombo">CHỌN SỐ LƯỢNG COMBO:</label>
				<br>
				<select id="soluongcombo" name="soluongcombo">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
			</div>
			<div class="chon">
					<label for="chonghe">CHỌN GHẾ:</label>
					<br>
					  <div id="map">
						<input type="checkbox" id="A1" name="seat[]" value="A1">
						<div class="seat" style="background-color:#ccc"><label for="A1"><a id="LA1">A1</a></label></div>
						<input type="checkbox" id="A2" name="seat[]" value="A2">
						<div class="seat" style="background-color:#ccc"><label for="A2"><a id="LA2">A2</a></label></div>
						<input type="checkbox" id="A3" name="seat[]" value="A3">
						<div class="seat" style="background-color:#ccc"><label for="A3"><a id="LA3">A3</a></label></div>
						<input type="checkbox" id="A4" name="seat[]" value="A4">
						<div class="seat" style="background-color:#ccc"><label for="A4"><a id="LA4">A4</a></label></div>
						<input type="checkbox" id="A5" name="seat[]" value="A5">
						<div class="seat" style="background-color:#ccc"><label for="A5"><a id="LA5">A5</a></label></div>
						<input type="checkbox" id="B1" name="seat[]" value="B1">
						<div class="seat" style="background-color:#ccc"><label for="B1"><a id="LB1">B1</a></label></div>
						<input type="checkbox" id="B2" name="seat[]" value="B2">
						<div class="seat" style="background-color:#ccc"><label for="B2"><a id="LB2">B2</a></label></div>
						<input type="checkbox" id="B3" name="seat[]" value="B3">
						<div class="seat" style="background-color:#ccc"><label for="B3"><a id="LB3">B3</a></label></div>
						<input type="checkbox" id="B4" name="seat[]" value="B4">
						<div class="seat" style="background-color:#ccc"><label for="B4"><a id="LB4">B4</a></label></div>
						<input type="checkbox" id="B5" name="seat[]" value="B5">
						<div class="seat" style="background-color:#ccc"><label for="B5"><a id="LB5">B5</a></label></div>
						<input type="checkbox" id="C1" name="seat[]" value="C1">
						<div class="seat" style="background-color:#ccc"><label for="C1"><a id="LC1">C1</a></label></div>
						<input type="checkbox" id="C2" name="seat[]" value="C2">
						<div class="seat" style="background-color:#ccc"><label for="C2"><a id="LC2">C2</a></label></div>
						<input type="checkbox" id="C3" name="seat[]" value="C3">
						<div class="seat" style="background-color:#ccc"><label for="C3"><a id="LC3">C3</a></label></div>
						<input type="checkbox" id="C4" name="seat[]" value="C4">
						<div class="seat" style="background-color:#ccc"><label for="C4"><a id="LC4">C4</a></label></div>
						<input type="checkbox" id="C5" name="seat[]" value="C5">
						<div class="seat" style="background-color:#ccc"><label for="C5"><a id="LC5">C5</a></label></div>
						<input type="checkbox" id="D1" name="seat[]" value="D1">
						<div class="seat" style="background-color:#ccc"><label for="D1"><a id="LD1">D1</a></label></div>
						<input type="checkbox" id="D2" name="seat[]" value="D2">
						<div class="seat" style="background-color:#ccc"><label for="D2"><a id="LD2">D2</a></label></div>
						<input type="checkbox" id="D3" name="seat[]" value="D3">
						<div class="seat" style="background-color:#ccc"><label for="D3"><a id="LD3">D3</a></label></div>
						<input type="checkbox" id="D4" name="seat[]" value="D4">
						<div class="seat" style="background-color:#ccc"><label for="D4"><a id="LD4">D4</a></label></div>
						<input type="checkbox" id="D5" name="seat[]" value="D5">
						<div class="seat" style="background-color:#ccc"><label for="D5"><a id="LD5">D5</a></label></div>
						<input type="checkbox" id="E1" name="seat[]" value="E1">
						<div class="seat" style="background-color:#ccc"><label for="E1"><a id="LE1">E1</a></label></div>
						<input type="checkbox" id="E2" name="seat[]" value="E2">
						<div class="seat" style="background-color:#ccc"><label for="E2"><a id="LE2">E2</a></label></div>
						<input type="checkbox" id="E3" name="seat[]" value="E3">
						<div class="seat" style="background-color:#ccc"><label for="E3"><a id="LE3">E3</a></label></div>
						<input type="checkbox" id="E4" name="seat[]" value="E4">
						<div class="seat" style="background-color:#ccc"><label for="E4"><a id="LE4">E4</a></label></div>
						<input type="checkbox" id="E5" name="seat[]" value="E5">
						<div class="seat" style="background-color:#ccc"><label for="E5"><a id="LE5">E5</a></label></div>
					  </div>
			</div>
		<input id="mua" type="submit" value="Mua vé">
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
	<?php
		function function_alert($msg) {
    		echo "<script type='text/javascript'>alert('$msg');</script>";
		}
	?>
	<?php
		require("connect.php");
		$giochieu = $_POST['gioxem'];
		$ve = $_POST['ve'];
		$combo = $_POST['combo'];
		$soluongcombo = $_POST['soluongcombo'];
		$giacombo = $combo*$soluongcombo;
		$ghe = $_POST['seat'];
		$soluongve = 0;
		foreach ($ghe as $soghe) {
			$soluongve = $soluongve + 1;
		}
		$giave = $ve*$soluongve;
		$tonggia = $giave + $giacombo;
		$list_seat=implode(" ",$ghe);

		if (isset($tenrap) && isset($tenphim) && isset($ngaychieu) && isset($giochieu) && isset($ve) && isset($combo) && isset($list_seat)) {
			$sql4 = "INSERT INTO bookve VALUES ('$username_KH', '$tenrap', '$tenphim', '$ngaychieu', '$giochieu','$giave', '$giacombo', '$tonggia', '$list_seat')";
			if ($conn->query($sql4) === TRUE) {
				function_alert("Bạn đã đặt vé thành công !");
			}
			else {
				function_alert("Ghế này đã được đặt! Vui lòng chọn ghế khác");
				$conn->close();
			}
		}
    ?>
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