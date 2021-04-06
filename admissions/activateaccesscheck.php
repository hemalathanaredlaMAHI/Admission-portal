<?php
	include 'authentication/securelogin_functions.php';
	sec_session_start();
	include 'db_connect.php';
		if (login_check($mysqli)) #checking if session already exists
		{
			if(
				(isset($_SESSION['status']) && $_SESSION['status']=="active") &&
				(isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']=="yes") &&
				(isset($_SESSION['photo_status']) && $_SESSION['photo_status']=="yes")
			)
			{
					header("Location:dashboardhome.php");
			}
		}
		else              
		{
			header("Location:login.php?message=Invalid Access. Please login first.");
			exit;
		}
?>
