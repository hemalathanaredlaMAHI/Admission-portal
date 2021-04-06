<?php

include dirname(dirname(__FILE__)).'/db_connect.php';

function login() 
{
	$email = $_SESSION['email'];
   if ($stmt = $mysqli->prepare("SELECT status, photo_status, profileupdate, application_status, payment_status FROM ".prefix."ma_users WHERE email = ?")) 
   { 
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($status, $photo_status, $profileupdate, $application_status, $payment_status); // get variables from result.
      $stmt->fetch();
 
   }
}
?>