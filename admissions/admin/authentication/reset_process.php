<?php

include dirname(dirname(__FILE__)).'/db_connect.php';

$userName = $_GET['userName'];
$key = $_GET['key'];

$query = "select * from forgot_password where emailID = '".$userName."' and status = '".$key."'";
	
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
	$query2= "delete from forgot_password where emailID='".$userName."'";
	if($stmt2 = $mysqli->prepare($query2))
	{
		$stmt2->execute();
		$stmt2->close();
	}
	header("Location:../retypePassword.php?userName=".$userName);	
}
else
{
	header("Location:../forgotpassword.php?message=Sorry!! We did not recognized you. <br />Please check your activation userName link. or Please register here.");
}
	
	
?> 