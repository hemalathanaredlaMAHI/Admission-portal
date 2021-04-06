<?php
include 'securelogin_functions.php';
include 'functions.php';
include dirname(dirname(__FILE__)).'/db_connect.php';
include("class.phpmailer.php"); 
$post = (!empty($_POST)) ? true : false;
if($post)
{
	$password = stripslashes($_POST['p']);
	$userName = stripslashes($_POST['userName']);
	$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	$password = hash('sha512', $password.$random_salt);
		
		if ($insert_stmt = $mysqli->prepare("update ma_users set password=?,salt=? where email=?"))
		{    
			
			$insert_stmt->bind_param('sss', $password,$random_salt,$userName); 
			$insert_stmt->execute();
			$insert_stmt->close();
			echo "Your Password Has Been Successfully Reset!";
			exit;
		}
		else
		{
			echo "Unable to Register at this time.<br/>Please call us to Help you.";
			exit;
		}
		
		}	

else 
{ 
	echo 'invalid';
	exit;
}
?>