<?php
	include 'authentication/securelogin_functions.php';
	
	sec_session_start();
	
	$_SESSION['username'] = NULL;
	$_SESSION['login_string'] = NULL;
	
	session_unset();
	session_destroy();

	header("Location:index.php");
	exit;
?>
