<?php
	require('connect.php');
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM phim WHERE maphim = " . $id;
	
	if ($conn->query($sql) === TRUE) {
		header('location: quanliphim.php');
	} else {
		echo "Error deleting record: " . $conn->error;
	}
	$conn->close();
?>