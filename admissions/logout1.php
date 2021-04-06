<?php
	include 'authentication/securelogin_functions.php';
	
	sec_session_start();
	
	$_SESSION['email'] = NULL;
	$_SESSION['username'] = NULL;
	$_SESSION['login_string'] = NULL;
	
	session_unset();
	session_destroy();

	header("Location:login.php?message=You have successfully loggedout!");
	exit;
?>
