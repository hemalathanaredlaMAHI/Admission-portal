<?php
include("../db_connect.php");
//$post = (!empty($_POST)) ? true : false;
//if($post)
//{
$response = array();
$response = explode("|", $_GET['msg']); 

$responseChecksum = strtoupper($response[count($response) - 1]);
$responseWithoutChecksum = array_slice($response,0,-1);
$responseWithoutChecksumStr = implode("|",$responseWithoutChecksum);
$checksomprovidedbybilldesk = 'wY0iv7Ktr7qa'; 	
$checksum = hash_hmac('sha256',$responseWithoutChecksumStr,$checksomprovidedbybilldesk, false);
$checksum_value = strtoupper($checksum);
if($responseChecksum!=$checksum_value)
{
	$json = array("status" => "ERROR", "msg" => "Authentication Failed");
} 
else if($response[14] == '0300' )
{
	$ResMerchantID  =  $response[0];
	$ResTrackID  =  $response[1];
	$ResPaymentId =  $response[2] ; 
	$ResTranId =  $response[3] ; 
	$ResAmount   =    $response[4] ; 
	$date = date_default_timezone_set('Asia/Kolkata');
	$ResPosdate  =    date('Y-m-d', strtotime($response[13]));
	$dbtransDate =  date('Y-m-d', strtotime($response[13])); 
	$bd_payment_status = $response[14] ;
	$ResErrorNo = $response[14];            //Error Number
	$apl_name      =   $response[16];
	$email =  $response[17];   
	$mobile =  $response[18];  
	$appl_id      =   $response[19] ;
	$appl_type      =   $response[20] ;
	$ResResult =      $response[24] ; 
	$txnDate = date("m/d/y G.i:s", time());
	$date = date_default_timezone_set('Asia/Kolkata');
	$dbtransDate = date("m/d/y G.i:s", time());
	
	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO billdesk_paymentDetails(ResPaymentId, ResTrackID,appl_id, apl_name,ResErrorNo, ResResult, ResPosdate, ResTranId, ResRef, ResAmount, email, mobile, bd_payment_status, txnDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)")) 
	{    
		$insert_stmt->bind_param('ssssssssssssss', $ResPaymentId, $ResTrackID, $appl_id, $apl_name, $ResErrorNo, $ResResult, $ResPosdate, $ResTranId, $ResRef, $ResAmount, $email, $mobile, $bd_payment_status, $txnDate); 
		$insert_stmt->execute();
		$insert_stmt->close();
		$json = array("status" => "SUCCESS", "msg" => "Inserted the payment successfully");
	}
	else
	{
		$json = array("status" => "ERROR", "msg" => "Operation failed");
	}
}
//}
//else
//{
//	$json = array("status" => "ERROR", "msg" => "Request method not supported");
//}
 header('Content-type: application/json');
 echo json_encode($json);

?>





