<?php

include dirname(dirname(__FILE__)).'/db_connect.php';

$email = $_GET['email'];
$key = $_GET['key'];

$query = "select * from ma_users where email = '".$email."' and status = '".$key."'";
	
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
		
	$query1 = "update ma_users set status = 'active' where email = '".$email."' and status = '".$key."'";
	
	if($stmt1 = $mysqli->prepare($query1))
	{
		$stmt1->execute();
		$stmt1->close();
			
		header("Location:../login.php?message=Congratulations!!<br />Successfully activated your account.<br />Please login here to access your account.");
	}
}
else
{
	header("Location:../login.php?message=Sorry!!<br />We are not recognized you.<br />Please check your activation email link. or Please register here.");
}	
?>