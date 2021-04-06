<?php
include 'securelogin_functions.php';
include 'functions.php';	
sec_session_start();
include dirname(dirname(__FILE__)).'/db_connect.php';
include dirname(dirname(__FILE__)).'/ma_config.php';
$post = (!empty($_POST)) ? true : false;
$post = true;
if($post)
{
	$actionType = stripslashes($_POST['action']);
	$email = $_SESSION['email'];
	$admission_type = stripslashes($_POST['course']);
	$test_center1 = stripslashes($_POST['centre1']);
	$examtype = stripslashes($_POST['exam']);
	if($examtype=="" || $examtype==NULL)
	{
		echo "FAILED";
		exit;
	}
	$gre_analytical=0;
	$gre_score=0;
	$toefl_score = 0;
	$ielts_score = 0;
	$PaymentType="none";
	$PaymentStatus="no";
	if(isset($_POST['greAnalytical']))
		$gre_analytical = floatval(stripslashes($_POST['greAnalytical']));
	if(isset($_POST['greScore']))
		$gre_score = intval(stripslashes($_POST['greScore']));
	if(isset($_POST['toefl']))
		$toefl_score = intval(stripslashes($_POST['toefl']));
	if(isset($_POST['ielts']))
		$ielts_score = intval(stripslashes($_POST['ielts']));
	if($actionType=="UPDATE")
	{
		if ($stmt = $mysqli->prepare("SELECT gatAppNo, paymentType, paymentStatus FROM gatApplications WHERE email = ?")) 
		{ 
			$stmt->bind_param('s',$_SESSION['email']); 
			$stmt->execute();
			$stmt->bind_result($regGatAppNo, $regPaymentType, $regPaymentStatus); 
			$stmt->fetch();
			$stmt->close();
			if($regGatAppNo!=null || $regGatAppNo!='')
			{
				if ($insert_stmt = $mysqli->prepare("update gatApplications set 
													testCenter = ?, examType = ?, greAnalytical = ?,
													greScore = ?, toeflScore = ?, ieltsScore = ? where email = ?
													")) 
				{   			
					$insert_stmt->bind_param('sssssss', $test_center1, $examtype, $gre_analytical,
														$gre_score,$toefl_score,$ielts_score, $email); 
					$insert_stmt->execute();
					$insert_stmt->close();
					echo "UPDATE,".$regGatAppNo.",".$regPaymentStatus.",".$regPaymentType;
				}
				else
				{
					echo "FAILED";
					exit;
				}					
			}
			else
			{
				echo "FAILED";
				exit;
			}
		}
		else
		{
			echo "FAILED";
			exit;
		}
	}
	else
	{
		//$GAT_App_Number = "17";		
		$GAT_App_Number = substr(YEARTEXT,2);
		$GAT_App_Number = $GAT_App_Number.$test_center1.'G';	
		if ($insert_stmt = $mysqli->prepare("insert into gatAppCounter(email) values (?)")) 
		{   			
			$insert_stmt->bind_param('s',  $email); 
			$insert_stmt->execute();
			$seqNumGen = $insert_stmt->insert_id;
			$padSeq = sprintf("%05d", $seqNumGen);
			$GAT_App_Number = $GAT_App_Number.$padSeq;
			$insert_stmt->close();
			if ($insert_stmt = $mysqli->prepare("insert into gatApplications(
												email, gatAppNo,testCenter, examType, greAnalytical,
												greScore, toeflScore, ieltsScore, 
												paymentType, paymentStatus) 
												values (?,?,?,?,?,?,?,?,?,?)")) 
			{   			
				$insert_stmt->bind_param('ssssssssss',  $email, $GAT_App_Number,$test_center1, $examtype, $gre_analytical, 
															$gre_score,$toefl_score,$ielts_score,$PaymentType,$PaymentStatus); 
				$insert_stmt->execute();
				$insert_stmt->close();

				//sending email
				$ch = curl_init(SERVER.'communication/sendApplicationEmail.php?');
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$email."&appno=".$GAT_App_Number);
				curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 1);
				curl_exec($ch);
				curl_close($ch);
				
				//send sms
				$messageText = "Congratulations! Your MSIT GAT Application number is ".$GAT_App_Number.". Please pay the exam fee. Please ignore if you already paid.";
				/*$ch = curl_init(SERVER.'communication/sendMessage.php?');
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "mobnumber=".$_SESSION['mobile_no']."&message=".$messageText);
				curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 1);
				$v = curl_exec($ch);
				curl_close($ch);
				*/
				$mobnumber = $_SESSION['mobile_no'];
				if (strlen($mobnumber)!=12 || substr($mobnumber, 0, 2) !== '91')
				{
					$mobnumber = "91".$mobnumber;
				}
				$ch1 = curl_init('http://smslogin.mobi/spanelv2/api.php?');
				curl_setopt($ch1, CURLOPT_POST, 1);
				curl_setopt($ch1, CURLOPT_POSTFIELDS, "username=msitsmst&password=MsAdmin@2016&from=MSITAD&to=".$mobnumber."&message=".$messageText);
				curl_setopt($ch1, CURLOPT_RETURNTRANSFER,1);
				$data = curl_exec($ch1);
				curl_close($ch1);

				echo "Congratulations!<br/>You have successfully applied for MSIT GAT Exam.<br/>Your application number is: <span style='color:red;font-weight:bold;'>".$GAT_App_Number."</span>";
			}
			else
			{
				echo "FAILED";
				exit;
			}
		}
		else
		{
			echo "FAILED";
			exit;
		}	
	}
}
?>