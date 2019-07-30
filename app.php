<?php
	session_start();

	include 'sql.php';
	include 'parse.php';
	
	// Add Social account Name, URL & visibility
	function addSocial($acc, $url, $visible, $conn){
		$id = $_SESSION['id']; //Get current user id from session id
		$sql = "INSERT INTO accounts (user_id, acc_name, acc_url, visibility) VALUES ($id, '$acc', '$url', '$visible')";
		if ($conn->query($sql) === TRUE) {
    		sendResponse(1, NULL);
		} else {
			sendResponse(0, $conn->error);
		}
	}

	// Returns username when an id is passed
	function getUserbyID($uid, $conn){
		$user = mysqli_query($conn, "SELECT username FROM users WHERE id = $uid LIMIT 1");
		if ($user && (mysqli_num_rows($user)==1)) { //Check if query result is valid
			sendResponse(1, mysqli_fetch_assoc($user)['username']);
		}
		else{
			sendResponse(0, NULL);
		}
	}

	// Sends a friend request to a user using their id
	function sendRequest($fuid, $conn){
		$cuid = $_SESSION['id']; //Get current user id from session id
		$request = "INSERT INTO friend (id_1, id_2) VALUES ($cuid, $fuid)";
		if ($conn->query($request) === TRUE) {
    		sendResponse(1, NULL);
		} else {
			sendResponse(0, $conn->error);
		}
	}

	// List all friend requests of current user
	function listRequest($conn){
		$cuid = $_SESSION['id']; //Get current user id from session id
		$frnd = mysqli_query($conn, "SELECT name FROM users WHERE id = ANY (SELECT id_1 FROM friend WHERE id_2 = $cuid AND status = 0)");
		if ($frnd->num_rows > 0) {
		    while($row = $frnd->fetch_assoc()) { //Fetches each name of user & outputs them 
		        sendResponse(1, $row["name"]);
		    }
		} 	
		else {
	    	sendResponse(0, NULL);
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