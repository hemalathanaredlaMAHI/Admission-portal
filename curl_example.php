<?php 
  $appno='11111';
$ch = curl_init('http://msitprogram.net/admissions/authentication/sendmail_hall.php');

			curl_setopt($ch, CURLOPT_POST, 1);

			curl_setopt($ch, CURLOPT_POSTFIELDS, "id=".$appno);

			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

			curl_setopt($ch, CURLOPT_TIMEOUT, 1);

			curl_exec($ch);

			curl_close($ch);
  
?>  