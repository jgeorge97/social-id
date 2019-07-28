<?php
	
	include 'sql.php';
	
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