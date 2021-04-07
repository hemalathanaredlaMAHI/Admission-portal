<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	include 'db_connect.php';
	
$post = (!empty($_POST)) ? true : false;
if($post)
{
	$password = stripslashes($_POST['p']);
	$key = stripslashes($_POST['statuskey']);
	
	$i = 0;
	if($stmt = $mysqli->prepare("select emailID from forgotPassword where status = ?"))
	{
		$stmt->bind_param('s', $key); 
		$stmt->execute();
		$stmt->bind_result($emailID);
		while ($stmt->fetch()) 
		{
			$i = 1;
		}
		$stmt->close();
	}
	if($i==1)
	{
		$userName = $emailID;
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$password = hash('sha512', $password.$random_salt);

		if ($insert_stmt = $mysqli->prepare("update ma_users set password=?, salt=? where email=?"))
		{    
			$insert_stmt->bind_param('sss', $password,$random_salt,$userName); 
			$insert_stmt->execute();
			$insert_stmt->close();

			$query2= "delete from forgotPassword where emailID='".$userName."'";
			if($stmt2 = $mysqli->prepare($query2))
			{
				$stmt2->execute();
				$stmt2->close();
			}
			echo "success";
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
		header("Location:forgotpassword.php?message=Sorry!! We did not recognized you. <br />Please check your activation userName link. or Please register here.");
	}	
}	
else 
{ 
	echo 'invalid';
	exit;
}
?>