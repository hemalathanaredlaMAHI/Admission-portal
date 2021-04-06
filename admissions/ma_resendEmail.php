<?php

include("ma_config.php");

$ch = curl_init(SERVER.'communication/sendEmail.php?');

curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$_GET['email']);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

$data = trim(curl_exec($ch));

	//echo "===".$data."====";

	if($data == "sent")
	{
		echo "An Email has been sent. Please activate your account.";
	}
	else if($data == "activated")
	{
		echo "Your account has been already activated.";
	}
	else
	{
		echo "Unable to send email. Please call us to help you.";
	}

?>