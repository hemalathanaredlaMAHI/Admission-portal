<?php

include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';



if(!isset($_GET['appno']) || $_GET['appno']=="")
{
	exit;
}
$appno = $_GET['appno'];
$email = "";
if ($result = $mysqli->prepare("SELECT email from ma_user_gat_exam_details where appno= ?")) 
{ 
	  $result->bind_param('s', $appno); 
      $result->execute();
      $result->store_result();
      $result->bind_result($email); 
      $result->fetch();
	  
	if ($stmt = $mysqli->prepare("SELECT mobile_no FROM ma_user_profile WHERE email = ?")) 
	{ 
		  $stmt->bind_param('s', $email); 
		  $stmt->execute();
		  $stmt->store_result();
		  $stmt->bind_result($mobileno); 
		  $stmt->fetch();
			
			error_log("Got DB mobile no ".$mobileno."\n", 3, "logfile.txt");
			
			if (strlen($mobileno)!=12 || substr($source, 0, 2) !== '91')
			{
				$mobileno ="91".$mobileno;
				error_log("added 91 to mobile no ".$mobileno."\n", 3, "logfile.txt");
			}
			$ch = curl_init('http://www.txtguru.in/imobile/api.php?');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "username=msitad&password=12838257&source=MSITAD&dmobile=".$mobileno."&message=Received your application. Please send your email id to 7799834585 ");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$data = curl_exec($ch);
			echo "<script>alert('Successfully sent');window.location.assign('/admissions2014/admin/offline_send_SMS.php');</script>";
			
	}
	else
	{
		echo "<script>alert('Failed to send SMS');window.location.assign('/admissions2014/admin/offline_send_SMS.php');</script>";
	}
}
?>