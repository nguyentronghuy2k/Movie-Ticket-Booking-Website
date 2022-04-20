<?php
	session_start();
?>
<?php
	// Turn off all error reporting
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Kí</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/register.css">
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
			<li><a href="index.php" target="_blank">Trang Chủ</a></li>
			<li><a href="list-film.php" target="_blank">Danh Sách Phim</a></li>
			<li><a href="cumrap.php" target="_blank">Cụm Rạp</a></li>
			<li><a href="login.php" target="_blank">Đăng Nhập</a></li>
		</ul>
	</nav>
	<div class="main">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<a href="login.php"><button type="button" class="toggle-btn">Đăng Nhập</button></a>
				<a href="register.php"><button type="button" class="toggle-btn">Đăng Kí</button></a>
			</div>
			<form id="register" class="input-group" action="" method="POST">
				<input type="text" name="name" class="input-field" placeholder="Họ tên" required>
				<input type="tel" name="phone" class="input-field" placeholder="Số điện thoại" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" required>
				<input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="text" name="username" class="input-field" placeholder="Tên Tài Khoản" required>
				<input type="password" name="password" class="input-field" placeholder="Mật khẩu" required>
                <label class="gender-title">
                		<span>Giới Tính *</span>
                		<input type="radio" placeholder="Male" name="gender" id="male" value="Nam"> Nam
                		<input type="radio" placeholder="Female" name="gender" id="female" value="Nữ">Nữ
                </label>

				<button type="submit" class="submit-btn">ĐĂNG KÍ</button>
			</form>
			<?php
				if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
					require_once("connect.php");
					$name = $_POST["name"];
					$phone = $_POST["phone"];
					$email = $_POST["email"];
					$username = $_POST["username"];
					$password = $_POST["password"];
					$gender = $_POST["gender"];
					
					$sql = "INSERT INTO khachhang (TenKH, GioiTinh, username_KH, password_KH, Email,phone) VALUES ('$name', '$gender', '$username', '$password', '$email', '$phone')";
					if ($conn->query($sql) === TRUE) {
						$sql1 = " SELECT * FROM khachhang WHERE username_KH = '$username' AND password_KH = '$password'";
						$result1 = $conn->query($sql1);
						$row1 = $result1->fetch_object();
						$id1=$row1->username_KH;
						header("location: index.php?user={$id1}");
					} else {
						echo "<p style='color:red;text-align:center'>Tài khoản hoặc Email của bạn đã được sử dụng</p>";
					}
					$conn->close();
				}
    		?>
		</div>
		<p style="text-align:center;color:red;top:-100px;"><?= $error ?></p>
	</div>
</body>
</html>