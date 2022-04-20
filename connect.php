<?php
	$servername = "localhost";
	$username = "root";
	$password = "culeo9999%";
	$dbname = "quanlicinema";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>