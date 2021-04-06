<?php

include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';



if(!isset($_GET['phno']) || $_GET['phno']=="")
{
	exit;
}
$mobileno = $_GET['phno'];
$email = "";

	
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
			echo "<script>alert('Successfully sent');window.location.assign('/admissions2014/admin/phoneno_send_SMS.php');</script>";	
?>