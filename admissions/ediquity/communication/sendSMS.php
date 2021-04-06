<?php

include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';

error_log("========== Sending Email ==========\n", 3, "logfile.txt");

if(!isset($_POST['email']) || $_POST['email']=="")
{
	exit;
}
if(!isset($_POST['appno']) || $_POST['appno']=="")
{
	exit;
}
$email = $_POST['email'];
$appno = $_POST['appno'];

error_log("Got email and app no ".$email." / ".$appno."\n", 3, "logfile.txt");

if ($stmt = $mysqli->prepare("SELECT mobile_no FROM ma_user_profile WHERE email = ?")) { 
      $stmt->bind_param('s', $email); 
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($mobileno); 
      $stmt->fetch();
		
		error_log("Got DB mobile no ".$mobileno."\n", 3, "logfile.txt");
		
		if (strlen($mobileno)!=12 || substr($source, 0, 2) !== '91')
		{
			$mobileno = "91".$mobileno;
			error_log("added 91 to mobile no ".$mobileno."\n", 3, "logfile.txt");
		}

		$ch = curl_init('http://www.txtguru.in/imobile/api.php?');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "username=msitad&password=12838257&source=MSITAD&dmobile=".$mobileno."&message=Your Application Number for MSIT Admissions 2014 is ".$appno);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$data = curl_exec($ch);

}

?>