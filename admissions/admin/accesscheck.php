<?php
	include 'authentication/securelogin_functions.php';
	sec_session_start();
	include 'db_connect.php';
	include '../ma_config.php';
	if (login_check($mysqli)) #checking if session already exists
	{
	}
	else              
	{
		header("Location:index.php?message=Invalid Access. Please login first.");
		exit;
	}
?>
