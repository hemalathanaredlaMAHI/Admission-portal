<?php
	include 'authentication/securelogin_functions.php';
	sec_session_start();
	include 'db_connect.php';
		if (login_check($mysqli)) #checking if session already exists
		{
		}
		else              
		{
			header("Location:login.php?message=Invalid Access. Please login first.");
			exit;
		}
?>
