<?php
include 'securelogin_functions.php';
include 'functions.php';	
sec_session_start();
include dirname(dirname(__FILE__)).'/db_connect.php';
include dirname(dirname(__FILE__)).'/ma_config.php';
$post = (!empty($_POST)) ? true : false;
if($post)
{
	$email = $_SESSION['email'];
	$center = stripslashes($_POST['center']);
	$date = null;
	$time = 0;
	$WALKIN_App_Number = "16";
	$verbal=0;
	$quant=0;
	$reasoning=0;
	$total=0;
	$testtaken="no";
	$PaymentType="none";
	$PaymentStatus="no";
	$testCenter = 0;
	if($center == 'center1')
	{ 
		$WALKIN_App_Number = $WALKIN_App_Number ."1W";
		$testCenter = 1;
	}
	else if($center == 'center2')
	{
		$WALKIN_App_Number = $WALKIN_App_Number ."2W";  
		$testCenter = 2;
	}
	else
	{
		echo  "Not able to submit the application.<br/>Please Call us once to help yoou.000";
		exit;
	}
	
	if ($insert_stmt = $mysqli->prepare("insert into walkinAppCounter(email) values (?)")) 
	{   			
		$insert_stmt->bind_param('s',  $email); 
		$insert_stmt->execute();
		$seqNumGen = $insert_stmt->insert_id;
		$padSeq = sprintf("%05d", $seqNumGen);
		$WALKIN_App_Number = $WALKIN_App_Number.$padSeq;
		$insert_stmt->close();

		if ($insert_stmt = $mysqli->prepare("insert into walkinApplications(
											email, walkinAppNo,testCenter, slotdate, slotNo,
											verbalMarks, quantMarks, reasoningMarks, total,
											testTaken, paymentType, paymentStatus) 
											values (?,?,?,?,?,?,?,?,?,?,?,?)")) 
		{   			
			$insert_stmt->bind_param('ssssssssssss',  $email, $WALKIN_App_Number,$testCenter, $date, $time,$verbal,$quant,
														$reasoning,$total,$testtaken,$PaymentType,$PaymentStatus); 
			$insert_stmt->execute();
			$insert_stmt->close();
			
			//send sms
			$messageText = "Congratulations! Your MSIT Walk-In Application number is ".$WALKIN_App_Number.". Please pay the exam fee and book your slot. Please ignore if you already paid.";
			$ch = curl_init(SERVER.'communication/sendMessage.php?');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "mobnumber=".$_SESSION['mobile_no']."&message=".$messageText);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 1);
			$v = curl_exec($ch);
			curl_close($ch);

			echo "Congratulations!<br/>You have successfully applied for MSIT Walk-In Exam.<br/>Your application number is: <span style='color:red;font-weight:bold;'>".$WALKIN_App_Number."</span>";
		}
		else
		{
			echo "<br/>Not able to submit the application.<br/>Please Call us once to help yoou.";
			exit;
		}
	}
	else
	{
		echo "<br/>Not able to submit the application.<br/>Please Call us once to help yoou.1";
		exit;
	}
}	
?>