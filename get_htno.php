<?php
date_default_timezone_set('Asia/Kolkata');
define("HOST", "45.79.134.238"); // The host you want to connect to.
define("USER", "msitprogram"); // The database username.
define("PASSWORD", "v3NXLXC5YjFPjmH7"); // The database password. 
define("DATABASE", "msitprog_admissions"); // The database name.
define("prefix","");
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.

$email = $_POST['email'];
$appno = $_POST['htno'];
$qry = "select center from gat_halltickets where email = '$email' and gatAppNO = '$appno' and htStatus = 'YES'";
if ($result = $mysqli->query($qry)) 
{
	if($row = $result->fetch_object()) 
	{
		$id=$appno.'.pdf';
		$pdffilename = 'admissions/authentication/halltickets/'.$row->center.'/'.$id;
		//header('Location:downloadGatHT.php?status=success&center='.$row->center.'&appno='.$appno);	
		header('Location:'.$pdffilename);
	}
	else
	{	
		header('Location:downloadGatHT.php?error=Details Not Found Please Enter Correct Details');					    
	}
}
else
{	
	header('Location:downloadGatHT.php?error=Something went wrong. Please contact us');					    
}
?>
