<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';
	$post = (!empty($_POST)) ? true : false;

error_log("\n\nSTART_DD_PAYMENT_REQUEST\n", 3, "paymentlog.txt");
error_log("******** DD Payment Request- ".$email."-".$trackidapp." ******** \n", 3, "paymentlog.txt");
	
if($post)
{
$postedApp = $_POST['payApplicationNo'];

if(isset($_SESSION['email'])) 
{	
	$email = $_SESSION['email'];
}
else
{	
	error_log("REQ001-Not able to retrieve email from session \n", 3, "paymentlog.txt");
	header("Location:http://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}

if(isset($_SESSION['username'])) 
{	
	$apl_name = $_SESSION['username'];
}
else
{	
	error_log("REQ002-Not able to retrieve username from session \n", 3, "paymentlog.txt");
	header("Location:http://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}

if($postedApp=="gatappno")
	$apptype = "GAT";
else
	$apptype = "WALKIN";
$_SESSION['payApplicationNo'] = $postedApp;

$appno = "";
if(isset($_SESSION[$postedApp])) 
{
	$appno = $_SESSION[$postedApp];		
}
else
{	
	error_log("REQ003-Not able to retrieve the appno \n", 3, "paymentlog.txt");
	header("Location:http://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}

$email = $_SESSION['email'];
$ddno = stripslashes($_POST['ddno']);
$bank_name = stripslashes($_POST['bankname']);
$bank_branch = stripslashes($_POST['bankbranch']);
$issue_date = stripslashes($_POST['issuedate']);
	
if ($insert_stmt = $mysqli->prepare("insert into ddTransactions(email, appno, ddno, bank_name, bank_branch, issue_date) values(?,?,?,?,?,?) ")) {   			
	$insert_stmt->bind_param('ssssss', $email, $appno, $ddno, $bank_name, $bank_branch, $issue_date); 
	$insert_stmt->execute();
	$insert_stmt->close();
	
	$payment_status = "yes";
	$payment_type = "DD";
	$updateQueryText = "update gatApplications set paymentType = ?, paymentStatus = ? where gatAppNo = ?";
	if($postedApp!='gatappno')
		$updateQueryText = "update walkinApplications set paymentType = ?, paymentStatus = ? where walkinAppNo = ?";
	if ($insert_stmt = $mysqli->prepare($updateQueryText)) 
	{   			
		$insert_stmt->bind_param('sss', $payment_type, $payment_status, $appno ); 
		$insert_stmt->execute();
		$insert_stmt->close();
		error_log("SUC001-updated success application status \n", 3, "paymentlog.txt");
	}
	else
	{
		error_log("REQ005-Not able to update dd applicatin status\n", 3, "paymentlog.txt");
		header("Location:http://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");		
	}
	error_log("SUC002-Inserted dd transaction\n", 3, "paymentlog.txt");
	echo "Successfully saved your DD Details. Please send us the DD at the earliest";
}
else
{
	error_log("REQ006-Not able to insert dd transaction\n", 3, "paymentlog.txt");
	header("Location:http://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
	
}
error_log("END_DD_PAYMENT_REQUEST\n\n", 3, "paymentlog.txt");
}
?>