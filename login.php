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
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login.css">
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
		</ul>
	</nav>
	<div class="main">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<a href="login.php"><button type="button" class="toggle-btn">Đăng Nhập</button></a>
				<a href="register.php"><button type="button" class="toggle-btn">Đăng Kí</button></a>
			</div>
			<form id="login" class="input-group" action="" method="POST">
				<input type="text" name="username" class="input-field username" placeholder="Tên tài khoản" required autofocus>
				<input type="password" name="password" class="input-field password" placeholder="Mật khẩu" required>
				<button type="submit" class="submit-btn">ĐĂNG NHẬP</button>
			</form>
		</div>
	</div>
	<?php
		if (isset($_POST["username"]) && isset($_POST["password"])) {
			require_once("connect.php");
			
			$username = $_POST["username"];
			$password =$_POST["password"];
			

			
			$sql = " SELECT * FROM manager WHERE username = '$username' AND password = '$password'";
			$result = $conn->query($sql);
			$row = $result->fetch_object();
			$id=$row->id;
			if ($result->num_rows === 1) {
				$_SESSION['isLoggedInAdmin'] = 1;
				header("Location: quanliphim.php?id={$id}");
				
			}
			else {
				$sql1 = " SELECT * FROM khachhang WHERE username_KH = '$username' AND password_KH = '$password'";
				$result1 = $conn->query($sql1);
				$row1 = $result1->fetch_object();
				$id1=$row1->username_KH;
				if ($result1->num_rows === 1) {
					$_SESSION['isLoggedInUser'] = 1;
					header("Location: index.php?user={$id1}");
						
				}
				else {
					echo "<p style='color:red;text-align:center'>Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng</p>";
				}
			}
		}
		
		?>
</body>
</html>