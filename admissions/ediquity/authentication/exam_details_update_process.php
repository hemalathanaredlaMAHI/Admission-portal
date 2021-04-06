<?php

	include 'securelogin_functions.php';
	include 'functions.php';	
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';

$post = (!empty($_POST)) ? true : false;
if($post)
{
	$email = $_SESSION['email'];

	$admission_type = stripslashes($_POST['course']);
	$test_center1 = stripslashes($_POST['centre1']);
	$examtype = stripslashes($_POST['exam']);

	$gre_analytical=0;
	$gre_score=0;
	if(isset($_POST['greAnalytical']))
		$gre_analytical = floatval(stripslashes($_POST['greAnalytical']));
	if(isset($_POST['greScore']))
		$gre_score = intval(stripslashes($_POST['greScore']));

	$toefl_score = intval(stripslashes($_POST['toefl']));

	
	if ($insert_stmt = $mysqli->prepare("update ma_user_gat_exam_details set admission_type =?, test_center1=?, examtype=?, gre_analytical=?, gre_score=?, toefl_score=? where email = ? ")) {   			
			$insert_stmt->bind_param('sssssss', $admission_type, $test_center1, $examtype, $gre_analytical, $gre_score, $toefl_score, $email); 
			$insert_stmt->execute();
			$insert_stmt->close();
		
		if($_SESSION['application_status'] !="yes")
		{
			$GAT_App_Number = "MSIT2014GAT";
		
			if ($insert_stmt = $mysqli->prepare("select LPAD(app_counter,5,'0') as counter from gat_applications")) {   			
				$insert_stmt->execute();
				$insert_stmt->store_result();
				$insert_stmt->bind_result($app_counter); 
				$insert_stmt->fetch();
				$GAT_App_Number = $GAT_App_Number.$app_counter;	
				$insert_stmt->close();
			}
			else
			{
				echo "<br/>Not able to submit the application.<br/>Please Call us once to help yoou.111";
				exit;
			}
			
			$app_counter = $app_counter+1;
			if ($insert_stmt = $mysqli->prepare("update gat_applications set app_counter =?")) {   			
				$insert_stmt->bind_param('s', $app_counter); 
				$insert_stmt->execute();
				$insert_stmt->close();
			}
			else
			{
				echo "<br/>Not able to submit the application.<br/>Please Call us once to help yoou.222";
				exit;
			}
			
			if ($insert_stmt = $mysqli->prepare("update ma_user_gat_exam_details set appno =? where email = ? ")) {   			
			$insert_stmt->bind_param('ss', $GAT_App_Number, $email); 
			$insert_stmt->execute();
			$insert_stmt->close();
			}
			else
			{
				echo "<br/>Not able to submit the application.<br/>Please Call us once to help yoou.3333";
				exit;
			}
		
			$application_status = "yes";
			if ($insert_stmt = $mysqli->prepare("update ma_offline_users set application_status = ? where email = ? ")) {   			
				$insert_stmt->bind_param('ss', $application_status, $email ); 
				$insert_stmt->execute();
				$insert_stmt->close();
			}
			$_SESSION['application_status'] = $application_status;
			$_SESSION['gat_application_no'] = $GAT_App_Number;
			echo "<br/>Successfully submitted the Application for GAT.<br/>Your Application Number is: ".$GAT_App_Number;
		}
		else
		{
			echo "<br/>Successfully updated the Application details.";
		}
	}
	else
	{
				echo "<br/>Not able to submit the application.<br/>Please Call us once to help yoou.";
	}
}
?>