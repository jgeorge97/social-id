<?php
	// Script to Parse Functions & Arguments

	// Register User, Get username, password, name
	if(isset($_GET['regUser']) && isset($_GET['uname']) && isset($_GET['pass']) && isset($_GET['name'])){
	        die(registerUser($_GET['uname'], $_GET['pass'], $_GET['name'], $conn));
	    }

	// SignIn with username & password
	if(isset($_GET['signIn']) && isset($_GET['uname']) && isset($_GET['pass'])){
	        die(signIn($_GET['uname'], $_GET['pass'], $conn));
	    }

	// SignOut
	if(isset($_GET['signOut'])){
	        die(signOut());
	    }

	// Add Social Network, Get Account Name, URL & visibility
	if(isset($_GET['addSocial']) && isset($_GET['acc']) && isset($_GET['url']) && isset($_GET['visible'])){
	        die(addSocial($_GET['acc'], $_GET['url'],$_GET['visible'], $conn));
	    }

	//Get username by id
	if(isset($_GET['getUser']) && isset($_GET['uid'])){
	        die(getUserbyID($_GET['uid'], $conn));
	    }

	// Sends a friend request to user with their id
	if(isset($_GET['sendReq']) && isset($_GET['fuid'])){
	        die(sendRequest($_GET['fuid'], $conn));
	    }

	// List all friend requests of the current user
	if(isset($_GET['listReq'])){
	        die(listRequest($conn));
	    }
?>