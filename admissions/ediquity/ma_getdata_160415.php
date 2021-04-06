<?php

ini_set('errors', '0');
include 'db_connect.php';

$post = (!empty($_POST)) ? true : false;

if($post)

{

$date = stripslashes($_POST['fromdate']);

$date1 = stripslashes($_POST['todate']);

echo $date;

echo $date1;

echo "SELECT * from ma_walkin WHERE slotdate between '".$date."' and '".$date1."'";

$fWrite = fopen("userdetails.csv","w");

$heading = "User_Id,cFullName,dob,Gender,HallTicket,Center,Testdate_Assigned,testclot_assigned,TestType,Paymenttype,txnTranID,ImageUrl,Email".PHP_EOL;

fwrite($fWrite, $heading);



$result = mysqli_query($con,"SELECT * from ma_walkin WHERE slotdate between '".$date."' and '".$date1."'");

$columns_total = mysqli_num_fields($result);



$usercount=1;

while($row = mysqli_fetch_array($result))

{

	$result1 = mysqli_query($con,"select * from ma_user_profile where email='".$row['emailID']."'");

	while($row1 = mysqli_fetch_array($result1))

	{

		$line = $usercount.",";

		$line = $line.$row1['full_name'].",";

		$line = $line.$row1['date_of_birth'].",";

		if($row1['gender']=="Male")

			$line = $line."M,";

		else

			$line = $line."F,";

		$line = $line.$row['walkinAppNo'].",";

		if($row['TestCenter']=="center1")

			$line = $line."1,";

		else

			$line = $line."2,";

		$line = $line.$row['slotdate'].",";

		$line = $line.$row['slotNo'].",";

		$line = $line."w,";

		$line = $line.$row['PaymentType'].",";

		

		//$result2 = mysqli_query($con,"SELECT txnTranID from ma_walkin_online_transactions WHERE appno ='".$row['walkinAppNo']."' and response='CAPTURED'");
		
		
		$result2 = mysqli_query($con,"SELECT ResPaymentId from ma_payment_details_walkin WHERE appl_id ='".$row['walkinAppNo']."' and bd_payment_status='0300'");

		$row2 = mysqli_fetch_array($result2);

		

		$line = $line.$row2['ResPaymentId'].",";

		$line = $line."http://msitprogram.net/admissions2015/authentication/profile_images/".$row1['image_url'].",";

		$line = $line.$row['emailID'].PHP_EOL;

		fwrite($fWrite, $line);

		$usercount = $usercount+1;

	}

}

fclose($fWrite);

header("Location:ma_date.php?generated=yes"); 

}

 ?>