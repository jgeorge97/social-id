<?php

	// Database Credentials
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "socialid";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	else {
		echo "Connected successfully <br>";
	}
?>
	