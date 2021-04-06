<?php
	include 'authentication/securelogin_functions.php';
	
	sec_session_start();
	
	$_SESSION['email'] = NULL;
	$_SESSION['username'] = NULL;
	$_SESSION['login_string'] = NULL;
	$_SESSION['usertype'] = NULL;
	$_SESSION['status'] = NULL;
	$_SESSION['photo_status'] = NULL;
	$_SESSION['profileupdate'] = NULL;
	$_SESSION['application_status'] = NULL;
	$_SESSION['payment_status'] = NULL;
	$_SESSION['educationdetails_status'] = NULL;
	$_SESSION['payment_type'] = NULL;
	$_SESSION['gat_application_no'] = NULL;
	$_SESSION['walkin_application_status']=NULL;
	$_SESSION['walkin_payment_status']=NULL;
	$_SESSION['walkinapp1']= NULL;
	$_SESSION['walkinapp2']= NULL;
	$_SESSION['walkinapp1_pay']= NULL;
	$_SESSION['walkinapp2_pay']= NULL;
	$_SESSION['walkinapp1_pay_type']= NULL;
	$_SESSION['walkinapp2_pay_type']= NULL;
				
			   
	session_unset();
	session_destroy();

	header("Location:login.php?message=You have successfully loggedout!");
	exit;
?>
