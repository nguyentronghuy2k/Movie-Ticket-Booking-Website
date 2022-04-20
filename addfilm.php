<?php
	$maphim = $_POST["maphim"];
	$tenphim = $_POST["tenphim"];
	$daodien = $_POST["daodien"];
	$dienvien = $_POST["dienvien"];
	$theloai = $_POST["theloai"];
	$thoiluong = $_POST["thoiluong"];
	$Trailer = $_POST["Trailer"];
	$chitiet = $_POST["chitiet"];
	$khoichieu = $_POST["khoichieu"];
	$trangthai = $_POST['trangthai'];
	
	require('connect.php');
	
	if (empty($_POST['id'])) {
		// Add
		$target_dir = "images/";
		$hinhanh = $target_dir . basename($_FILES["fileUpload"]["name"]);
		move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $hinhanh);
		$sql = "INSERT INTO phim VALUES ('$maphim', '$tenphim', '$daodien', '$dienvien', '$theloai', '$thoiluong', '$hinhanh', '$Trailer' , '$chitiet', '$khoichieu','$trangthai')";
	} else {
		$id = $_POST['id'];
		// Update
		$target_dir = "images/";
		$hinhanh = $target_dir . basename($_FILES["fileUpload"]["name"]);
		$sql = "UPDATE phim
				SET maphim = '$maphim', tenphim = '$tenphim', daodien = '$daodien', dienvien = '$dienvien', theloai = '$theloai', thoiluong = '$thoiluong', hinhanh = '$hinhanh', Trailer = '$Trailer', chitiet = '$chitiet', khoichieu = '$khoichieu', trangthai = '$trangthai'
				WHERE maphim = $id ";
	}
	
	if ($conn->query($sql) === TRUE) {
		header('location: quanliphim.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>