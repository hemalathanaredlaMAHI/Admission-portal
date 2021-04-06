<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';
	$post = (!empty($_POST)) ? true : false;

if($post)
{

	$email = $_SESSION['email'];
	$appno = $_SESSION['gat_application_no'];
	$ddno = stripslashes($_POST['ddno']);
	$bank_name = stripslashes($_POST['bankname']);
	$bank_branch = stripslashes($_POST['bankbranch']);
	$issue_date = stripslashes($_POST['issuedate']);
	
	if ($insert_stmt = $mysqli->prepare("insert into ma_dd_details(email, appno, ddno, bank_name, bank_branch, issue_date) values(?,?,?,?,?,?) ")) {   			
			$insert_stmt->bind_param('ssssss', $email, $appno, $ddno, $bank_name, $bank_branch, $issue_date); 
			$insert_stmt->execute();
			$insert_stmt->close();
			
			if($_SESSION['payment_status']!="yes")
			{
				$payment_status = "yes";
				$payment_type = "DD";
				if ($insert_stmt = $mysqli->prepare("update ma_offline_users set payment_status = ?, payment_type = ? where email = ? ")) {   			
				$insert_stmt->bind_param('sss', $payment_status, $payment_type, $email ); 
				$insert_stmt->execute();
				$insert_stmt->close();
				$_SESSION['payment_status'] = $payment_status;
				$_SESSION['payment_type'] = $payment_type;
				}
			}
			echo "Successfully saved your DD Details. Please send us the DD at the earliest";
		}
}
?>