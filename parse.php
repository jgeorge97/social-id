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

?>