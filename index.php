<?php
	
	include 'sql.php';
	include 'parse.php';
	
	
	// Register User using Username, Password & Name
	function registerUser($uname,$pass,$name, $conn) {
		$reg = "INSERT INTO users (id, username, password, name) VALUES (NULL, '$uname', MD5($pass), '$name')";
		if ($conn->query($reg) === TRUE) {
    		sendResponse(1, NULL);
		} else {
			sendResponse(0, $conn->error);
    		//echo "Error: " . $reg . "<br>" . $conn->error;
		}
	}

	//SignIn with username & password
	function signIn($uname, $pass, $conn) {
		$u_id = mysqli_query($conn, "SELECT id FROM users WHERE username = '$uname' AND password = MD5($pass) LIMIT 1"); // Execute query
		if ($u_id && (mysqli_num_rows($u_id)==1)) { //Check if query result is valid
			session_start();
			$_SESSION['id'] = mysqli_fetch_assoc($u_id)['id']; // Assign session id as userid
			sendResponse(1, $_SESSION['id']);

		}
		
	}
	
	function sendResponse($status, $data){
		if($status)
		   $resp['status'] = "OK";
		else
		   $resp['status'] = "Failed";

		$resp["data"] =  $data;
		echo(json_encode($resp));
		}

?>