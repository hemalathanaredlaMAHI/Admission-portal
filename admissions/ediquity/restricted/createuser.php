<?php
include 'securelogin_functions.php';
include 'functions.php';
include dirname(dirname(__FILE__)).'/db_connect.php';
$post = (!empty($_POST)) ? true : false;
if($post)
{
	
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['p'];
	$status = "active";
	$i = 0;
	$query = "select * from externalUsers where username = '".$username."'";
	if($stmt = $mysqli->prepare($query))
	{
		$stmt->execute();
		while ($stmt->fetch()) 
		{
			$i = 1;
		}
		$stmt->close();
	}
	
	if($i==1)
	{
		echo "user name already exists";
		exit;
	}
	else
	{	
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$password = hash('sha512', $password.$random_salt);
 
		if ($insert_stmt = $mysqli->prepare("INSERT INTO externalUsers (username, email, password, salt, usertype, status) VALUES (?, ?, ?, ?, ?, ?)")) {    
			$insert_stmt->bind_param('ssssss', $username, $email, $password, $random_salt, $usertype, $status); 
			$insert_stmt->execute();
			$insert_stmt->close();
			echo "success";
		}
		else
		{
			echo "Unable to Register at this time.<br/>Please call us to Help you.";
			exit;
		}
	}	
}
else 
{ 
	echo 'failed';
	exit;
}
?>