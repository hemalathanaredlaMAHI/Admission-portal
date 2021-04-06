<?php 
  $appno='111';
$ch = curl_init('http://localhost/msit2021/admissions/authentication/sendmail_hall.php');
print $ch;

			curl_setopt($ch, CURLOPT_POST, 1);
			print $ch.$appno;



			curl_setopt($ch, CURLOPT_POSTFIELDS, "id=".$appno);
			print $ch;


			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			print $ch;


			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			print $ch;


			curl_exec($ch);
			print $ch;
            $response = curl_exec($ch);
$err_status = curl_error($ch);
echo $err_status;
			

			curl_close($ch);
  
?>  