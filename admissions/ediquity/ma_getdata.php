<?php
include 'authentication/securelogin_functions.php';
sec_session_start();
include("db_connect.php");
include("accesscheck.php");
$post = (!empty($_POST)) ? true : false;
if($post)
{
	$date = stripslashes($_POST['fromdate']);
	$date1 = stripslashes($_POST['todate']);
	$stringData = "User_Id,cFullName,dob,Gender,HallTicket,Center,Testdate_Assigned,testclot_assigned,TestType,Paymenttype,txnTranID,ImageUrl,Email"."\n";
	$heading = "User_Id,cFullName,dob,Gender,HallTicket,Center,Testdate_Assigned,testclot_assigned,TestType,Paymenttype,txnTranID,ImageUrl,Email".PHP_EOL;
	//$file = fopen("udasdfcpjp245/userdetails.csv","w");
	$result = mysqli_query($con,"SELECT * from walkinApplicationsView WHERE slotdate between '".$date."' and '".$date1."'");
	$columns_total = mysqli_num_fields($result);
	$usercount=1;
	while($row = mysqli_fetch_array($result))
	{
		$result1 = mysqli_query($con,"select * from ma_user_profile where email='".$row['email']."'");
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
            $line = $line.$row['center'].",";
            /********************************************************************
            
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $randomString = ''; 
  
            for ($i = 0; $i < 10; $i++)
             { 
                 $index = rand(0, strlen($characters) - 1); 
                 $randomString .= $characters[$index]; 
             } 
             $pass=$randomString;
             $appno=$row['walkinAppNo'];
             $line = $pass.",";
             $sql2 = "INSERT INTO  Ediquity_Online (App_No,Password) VALUES ('$appno','$pass')";
		     $query2 = $mysqli->prepare($sql2);
		     $query2->execute();
		     

            **************************************************************/

			$line = $line.$row['slotdate'].",";
			$line = $line.$row['slotNo'].",";
			$line = $line."w,";
			$line = $line.$row['paymentType'].",";
			$payment_id = '';
			if($row['paymentType'] == 'DD')
			{
				 $result2 = mysqli_query($con,"SELECT ddno from ddTransactions WHERE appno ='".$row['walkinAppNo']."'");
				 $row2 = mysqli_fetch_array($result2);
				 $payment_id =   $row2['ddno']; 
			}
			else
			{
				$result2 = mysqli_query($con,"SELECT ResPaymentId from paymentDetails WHERE appl_id ='".$row['walkinAppNo']."' and bd_payment_status='0300'");
				$row2 = mysqli_fetch_array($result2);
				$payment_id =  $row2['ResPaymentId'] ;
			}
			$line = $line.$payment_id.",";
			$line = $line."http://msitprogram.net/admissions2015/authentication/profile_images/".$row1['image_url'].",";
			$line = $line.$row['email'].PHP_EOL;
			$usercount = $usercount+1;
			$payment_id = '';
			$stringData .= $line;
			//fputcsv($file,explode(',',$line));
		}
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