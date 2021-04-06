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
?>
<?php

include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';

$result = mysql_query("select* from ma_users where application_status='no'");
while($row = mysql_fetch_array($result))
  {

		  $email=$row['email'];
		$result1 = mysql_query("select* from ma_user_profile where email='$email'");
		while($row1 = mysql_fetch_array($result1))
		{
		   $mobile_no=$row1['mobile_no'];
		}
	
			
			error_log("Got DB mobile no ".$mobileno."\n", 3, "logfile.txt");
			
			if (strlen($mobileno)!=12 || substr($source, 0, 2) !== '91')
			{
				$mobileno ="91".$mobileno;
				error_log("added 91 to mobile no ".$mobileno."\n", 3, "logfile.txt");
			}
			$ch = curl_init('http://www.txtguru.in/imobile/api.php?');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "username=msitad&password=12838257&source=MSITAD&dmobile=".$mobileno."&message=Dear Applicant, Your payment is pending . Please pay as soon as possible ");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$data = curl_exec($ch);

			
	}
				echo "<script>alert('Successfully sent');window.location.assign('/admissions2014/admin/alert_payment_pending.php');</script>";
?>