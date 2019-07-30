<?php
	session_start();

	include 'sql.php';
	include 'parse.php';
	
	// Add Social account Name, URL & visibility
	function addSocial($acc, $url, $visible, $conn){
		$id = $_SESSION['id']; //Get session id
		$sql = "INSERT INTO accounts (user_id, acc_name, acc_url, visibility) VALUES ($id, '$acc', '$url', '$visible')";
		if ($conn->query($sql) === TRUE) {
    		sendResponse(1, NULL);
		} else {
			sendResponse(0, $conn->error);
		}
	}

	//SignOut & destroy session
	function signOut() {
		session_unset();
		session_destroy();
		sendResponse(1, NULL);
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