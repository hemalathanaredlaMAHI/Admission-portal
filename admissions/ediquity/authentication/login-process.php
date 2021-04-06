<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';
	$post = (!empty($_POST)) ? true : false;

if($post)
{

	$username = trim($_POST['username']);
	$password = stripslashes($_POST['p']);
	

		if(isset($_POST['username'], $_POST['p'])) 
		{ 
			$username = $_POST['username'];
			$password = $_POST['p']; // The hashed password.
			if(login($username, $password, $mysqli) == true) 
			{
				echo 'success';
			} 
			else 
			{
				echo 'failed';
			}
		} 
		else 
		{ 
			// The correct POST variables were not sent to this page.
			echo 'invalid';
		}
}
?>