<?php
include 'authentication/securelogin_functions.php';
sec_session_start();
include("db_connect.php");
include("accesscheck.php");
$post = (!empty($_POST)) ? true : false;
if($post)
{
	$stringData = "User_Id,cFullName,dob,Gender,HallTicket,Center,Testdate_Assigned,testclot_assigned,TestType,Paymenttype,txnTranID,ImageUrl,Email"."\n";
	$heading = "User_Id,cFullName,dob,Gender,HallTicket,Center,Testdate_Assigned,testclot_assigned,TestType,Paymenttype,txnTranID,ImageUrl,Email".PHP_EOL;
	$result = mysqli_query($con,"SELECT g.*, u.date_of_birth, u.gender from gat_halltickets g, ma_user_profile u WHERE g.email = u.email and g.center ='".$_POST['center']."'");
	$columns_total = mysqli_num_fields($result);
	$usercount=1;
	while($row = mysqli_fetch_array($result))
	{
			$line = $usercount.",";
			$line = $line.$row['full_name'].",";
			$line = $line.$row['date_of_birth'].",";
			if($row['gender']=="Male")
				$line = $line."M,";
			else
				$line = $line."F,";
			$line = $line.$row['gatAppNo'].",";
			$line = $line.$row['center'].",";
			$line = $line.$row['testDate'].",";
			if($row['testTime']=="08:30 AM")
				$line = $line."1".",";
			else if($row['testTime']=="11:30 AM")
				$line = $line."2".",";
			else if($row['testTime']=="02:30 PM")
				$line = $line."3".",";
			else 
				$line = $line.$row['testTime'].",";
			$line = $line."g,";
			$line = $line.$row['paymentType'].",";
			$payment_id = '';
			if($row['paymentType'] == 'DD')
			{
				 $result2 = mysqli_query($con,"SELECT ddno from ddTransactions WHERE appno ='".$row['gatAppNo']."'");
				 $row2 = mysqli_fetch_array($result2);
				 $payment_id =   $row2['ddno']; 
			}
			else
			{
				$result2 = mysqli_query($con,"SELECT ResPaymentId from billdesk_paymentDetails WHERE appl_id ='".$row['gatAppNo']."'");
				$row2 = mysqli_fetch_array($result2);
				$payment_id =  $row2['ResPaymentId'] ;
			}
			$line = $line.$payment_id.",";
			$line = $line."http://msitprogram.net/admissions2015/authentication/profile_images/".$row1['image_url'].",";
			$line = $line.$row['email'].PHP_EOL;
			$usercount = $usercount+1;
			$payment_id = '';
			$stringData .= $line;
	}
	//fclose($file);
	$filename = 'usersdetails.csv'; 
	header("Content-type: application/x-msexcel");
	header("Content-disposition: attachment; filename=".$filename);
	header("Pragma: no-cache");
	header("Expires: 0");	
	echo $stringData;
	//header('Location: ma_date.php?generated=yes');
}
 ?>