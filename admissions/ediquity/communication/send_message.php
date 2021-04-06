<?php

include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';



if(!isset($_GET['phno']) || $_GET['phno']=="")
{
	exit;
}
$phno = $_GET['phno'];
$msg = $_GET['msg'];

			
			
			if (strlen($phno)!=12 || substr($source, 0, 2) !== '91')
			{
				$phno ="91".$phno;
				
			}
		//	$mobileno ="918179150987";
			$ch = curl_init('http://www.txtguru.in/imobile/api.php?');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "username=msitad&password=12838257&source=MSITAD&dmobile=".$phno."&message=".$msg);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$data = curl_exec($ch);
			echo "<script>alert('SMS Sent');window.location.assign('/admissions2014/admin/SMS.php');</script>";
			
?>