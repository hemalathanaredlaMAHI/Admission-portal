<?php 
	include 'authentication/securelogin_functions.php';
	sec_session_start();
	include("db_connect.php");
	include("accesscheck.php");
?>
<?php
    $cfg_dbhost = 'localhost';
    $cfg_database = 'msit_admissions';
    $cfg_dbuser = 'root';
    $cfg_dbpassword = 'seshhu';

    $link = mysql_connect($cfg_dbhost, $cfg_dbuser, $cfg_dbpassword);

// make projectdb the current db
$db_selected = mysql_select_db($cfg_database, $link);



//echo $qu1;

$result = mysql_query("SELECT * FROM ma_users");
if($row = mysql_fetch_array($result))
 {
 

 }
$email="";
 $appno="";
  $mobileno="";
  $i=0;
?>
<?php

include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';

$result = mysql_query("SELECT * FROM  ma_online_transactions WHERE appno NOT IN (select appno from ma_online_sms_pending)");
while($row = mysql_fetch_array($result))
  {

		  $email=$row['email'];
		   $appno=$row['appno'];
		$result1 = mysql_query("select* from ma_user_profile where email='$email'");
		while($row1 = mysql_fetch_array($result1))
		{
		   $mobileno=$row1['mobile_no'];
		  //$mobileno = "9676555091";
		  // echo $i;
		   //$i++;
		}
		
	
	
			error_log("Got DB mobile no ".$mobileno."\n", 3, "logfile.txt");
			
			if (strlen($mobileno)!=12 || substr($source, 0, 2) !== '91')
			{
				$mobileno ="91".$mobileno;
				error_log("added 91 to mobile no ".$mobileno."\n", 3, "logfile.txt");
			}
			$ch = curl_init('http://www.txtguru.in/imobile/api.php?');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "username=msitad&password=12838257&source=MSITAD&dmobile=".$mobileno."&message=Dear Applicant, Your DD verification is Pending ");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$data = curl_exec($ch);*/
			$sql="INSERT INTO ma_online_sms_pending(appno,phno)VALUES('$appno', '$mobileno')";
		   $result2=mysql_query($sql);
			
	}
				echo "<script>alert('Successfully sent');window.location.assign('/admissions2014/admin/alert_online_pending.php');</script>";
?>