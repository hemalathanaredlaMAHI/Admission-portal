<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';
	$post = (!empty($_POST)) ? true : false;

if($post)
{

	$email = trim($_POST['email']);
	$password = stripslashes($_POST['p']);
	

		if(isset($_POST['email'], $_POST['p'])) 
		{ 
			$email = $_POST['email'];
			$password = $_POST['p']; // The hashed password.
			if(login($email, $password, $mysqli) == true) 
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
			echo 'invalid';
		}
}
?>