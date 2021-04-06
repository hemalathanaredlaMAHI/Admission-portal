<?php
include 'securelogin_functions.php';
include 'functions.php';
include dirname(dirname(__FILE__)).'/db_connect.php';
include("class.phpmailer.php"); 
$post = (!empty($_POST)) ? true : false;
if($post)
{
	
	$emailID = stripslashes($_POST['emailID']);
	$status = md5(uniqid(rand(), true));
	$email_status = "No Response";
		
	$flag = 0;
	if ($stmt = $mysqli->prepare("SELECT username from ".prefix."ma_users WHERE email = ? ")) { 
													$stmt->bind_param('s', $emailID); 
													
													$stmt->execute();
													
													$stmt->bind_result($userName);
													
													while($stmt->fetch())
													{
														
														
														echo "record exist";
														$flag=1;
													
													}
													$stmt->close();
													
													if($flag==0)
													{
													
													echo "no exist";
													exit;

													}
													
												
	else
	{	
				
		if ($insert_stmt = $mysqli->prepare("INSERT INTO forgot_password VALUES (?, ?, ? ,?)")) {    
			
			$insert_stmt->bind_param('ssss', $userName, $emailID,$status, $email_status); 
			$insert_stmt->execute();
			$insert_stmt->close();
			//header("location:/admissions2015/communication/sendMail_forgot.php?email=".$emailID);
			
			$ch = curl_init(SERVER.'communication/sendMail_forgot.php?');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$emailID);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 1);
			curl_exec($ch);
			curl_close($ch);
			
			echo "success";
			exit;
		}
		else
		{
			echo "Unable to send email at this time.<br/>Please call us to Help you.";
			exit;
		}
		
		}
	   
		
	}	
}
else 
{ 
	echo 'invalid';
	exit;
}
?>