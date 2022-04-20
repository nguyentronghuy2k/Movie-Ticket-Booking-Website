<?php
	require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cụm Rạp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/cumrap.css">
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
		<div class="title-1">
			<h1>Danh Sách Các Rạp</h1>
		</div>
		<div class="list-cinema">
			<div class="search">
				<p style="width:60%;font-size:25px;">Tìm Rạp</p>
				<input type="text" id="search-cinema" class="form-control" onkeyup="search()" placeholder="Nhập Vào Tên Rạp">	
			</div>
			<div class="list">
				<p style="width:60%;font-size:25px;">Tên Rạp</p>
  				
				<ul id="myUL">
					<?php
						$sql = "SELECT * FROM rap";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
						?>
								<li class="rap"><a href="chitietrap.php?id=<?= $row['marap'] ?><?php if (isset($_GET['user'])) {echo "&amp;user={$_GET['user']}";} ?>"><?= $row['tenrap'] ?></a></li>
						<?php 	}
						}
					?>
				</ul>
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
	<script>
		
		function search() {
  			var input, filter, table, tr, td, i, txtValue;
  			input = document.getElementById("search-cinema");
  			filter = input.value.toUpperCase();
  			table = document.getElementById("myUL");
  			tr = table.getElementsByTagName("li");

  			// Loop through all table rows, and hide those who don't match the search query
  			for (i = 0; i < tr.length; i++) {
    			td = tr[i].getElementsByTagName("a")[0];
    			if (td) {
      				txtValue = td.textContent || td.innerText;
      				if (txtValue.toUpperCase().indexOf(filter) > -1) {
        				tr[i].style.display = "";
      				} else {
        				tr[i].style.display = "none";
      				}
    			}
  			}
		}
		
	</script>
</body>
</html>