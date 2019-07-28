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
	
	
	if(isset($_GET['regUser']) && isset($_GET['uname']) && isset($_GET['pass']) && isset($_GET['name'])){
        die(registerUser($_GET['uname'], $_GET['pass'], $_GET['name'], $conn));
    }
	
	
	// Register User using Username, Password & Name
	function registerUser($uname,$pass,$name, $conn) {
		$reg = "INSERT INTO users (id, username, password, name) VALUES (NULL, '$uname', MD5($pass), '$name')";
		if ($conn->query($reg) === TRUE) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $reg . "<br>" . $conn->error;
		}
	}
?>