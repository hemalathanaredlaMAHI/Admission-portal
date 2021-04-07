<?php

include 'db_connect.php';

$userName = $_GET['userName'];
$key = $_GET['key'];
$query = "select * from forgotPassword where emailID = '".$userName."' and status = '".$key."'";
$i = 0;
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
	header("Location:retypePassword.php?statuskey=".$key);	
}
else
{
	header("Location:forgotpassword.php?message=Sorry!! We did not recognized you. <br />Please check your activation userName link. or Please register here.");
}
	
	
?> 