<?php session_start();
include 'securelogin_functions.php';
include 'functions.php';
include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';
include("class.phpmailer.php"); 
$post = (!empty($_POST)) ? true : false;
if($post)
{
	/*$captcha_text = $_POST['captchaText'];
	if($_SESSION['captcha']['code']!=$captcha_text)
	{
		echo "invalid_captcha--".$captcha_text."--".$_SESSION['captcha']['code'];
		exit;		
	}*/
	$usertype = "student";
	$name = stripslashes($_POST['name']);
	$email = trim($_POST['email']);
	$password = stripslashes($_POST['p']);
	$board = "NA";//$_POST['board'];
	$boardno = $_POST['serialno'];
	$btech = "-";
	$phone = "-";
	$status = md5(uniqid(rand(), true));
	$profileupdate = "no";
	$photo_status = "no";
	$educationdetails_status = "no";
	$created = date('Y-m-d h:m:s');
	$email_status = "no";


/*+++++++++++++++++++++++++++++++++++++++++++++++
	Newly added code by RB on Feb 2,2018
	To know the source of msit
	++++++++++++++++++++++++++++++++++++++++++++*/
	$source_of_msit = $_POST['msit'];
	//echo "Source of msit ".$source_of_msit;

	if($source_of_msit == "media"){
		$source_of_msit = $source_of_msit."#".$_POST['media'];
	//	echo "Source of msit ".$source_of_msit;		
	}

	else if($source_of_msit == "socialnw"){
		$source_of_msit = $source_of_msit."#".$_POST['socialnw'];
	//	echo "Source of msit ".$source_of_msit;		
	}
	else if($source_of_msit == "msitad"){
		$source_of_msit = $source_of_msit."#".$_POST['msitad'];
	//	echo "Source of msit ".$source_of_msit;		
	}
	else if($source_of_msit == "others"){
		$source_of_msit = $source_of_msit."#".$_POST['others'];
	//	echo "Source of msit ".$source_of_msit;		
	}

	$i=0;
	$query = "select * from source_of_msit where email = '".$email."'";
	if($stmt = $mysqli->prepare($query))//to check duplicate entry
	{
		$stmt->execute();
		while ($stmt->fetch()) 
		{
			$i = 1;
		}
		$stmt->close();
	}
	if($i == 0){
		$sql2 = "INSERT INTO source_of_msit (email,source,created) VALUES ('$email','$source_of_msit','$created')";
		$query2 = $mysqli->prepare($sql2);
		$query2->execute();
	}


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


	$i = 0;
	$j = 0;
	$query = "select * from ma_users where email = '".$email."'";
	
	//Below line commented on Nov 21,2017 by Ranjith. to remove server side valifation for ssc number

	//$query1 = "select * from ma_users where board_name = '".$board."' and board_number = '".$boardno."'";
	if($stmt = $mysqli->prepare($query))
	{
		$stmt->execute();
		while ($stmt->fetch()) 
		{
			$i = 1;
		}
		$stmt->close();
	}
	
	//change by RB on Nov 21,2017
	/*if($stmt = $mysqli->prepare($query1))
	{
		$stmt->execute();
		while ($stmt->fetch()) 
		{
			$j = 1;
		}
		$stmt->close();
	}
	*/
	if($i==1)
	{	
			//change by RB on Nov 21,2017
			/*if($j==1)
			{	
				echo "invalid_email_board";
				exit;
			}
			else
			{
				echo "invalid_email";
				exit;
			}*/

			echo "invalid_email";
				exit;
	}
	//change by RB on Nov 21,2017
	/*else if($j==1)
	{
		echo "invalid_board";
		exit;
	}*/
	else
	{	
		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$password = hash('sha512', $password.$random_salt);
		$mysqli->autocommit(FALSE);
		if ($insert_stmt = $mysqli->prepare("INSERT INTO ma_users 
											(username, email, password, salt, usertype, status, board_name, board_number,
											btech, phone_no, photo_status, profileupdate, educationdetails_status, created, email_status) 
											VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {    
			$insert_stmt->bind_param('sssssssssssssss', $name, $email, $password, $random_salt, $usertype, $status, $board, $boardno, 
														  $btech, $phoneno, $photo_status, $profileupdate, $educationdetails_status,$created,$email_status); 
			$insert_stmt->execute();
			$insert_stmt->close();
			
			if ($insert_stmt = $mysqli->prepare("INSERT INTO ma_user_profile (email, full_name) VALUES (?, ?)")) {   			
				$insert_stmt->bind_param('ss', $email, $name); 
				$insert_stmt->execute();
				$insert_stmt->close();

				if ($insert_stmt = $mysqli->prepare("INSERT INTO ma_user_education_details (email) VALUES (?)")) {   			
					$insert_stmt->bind_param('s', $email); 
					$insert_stmt->execute();
					$insert_stmt->close();
					$mysqli->commit();

					$ch = curl_init(SERVER.'communication/sendEmail.php?');
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$email);
					curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
					curl_setopt($ch, CURLOPT_TIMEOUT, 1);
					curl_exec($ch);
					curl_close($ch);
					sec_session_start();
					$login_usertype = "student";
					$login_email = trim($_POST['email']);
					$login_password = stripslashes($_POST['p']);	
					if(login($login_email, $login_password, $login_usertype, $mysqli) == true) 
					{
						echo 'login_success';
						exit;
					} 
					else 
					{
						echo 'login_failed';
						exit;
					}
				}
				else
				{
					echo "3.Unable to Register at this time.<br/>Please call us to Help you.";
					exit;
				}
			}
			else
			{
				echo "2.Unable to Register at this time.<br/>Please call us to Help you.";
				exit;
			}
		}
		else
		{
			echo "1.Unable to Register at this time.<br/>Please call us to Help you.";
			exit;
		}			
	}	
}
else 
{ 
	echo 'invalid';
	exit;
}
?>