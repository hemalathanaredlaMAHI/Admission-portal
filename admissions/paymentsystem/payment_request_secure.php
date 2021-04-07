<?php
include("../ma_config.php");
include("accesscheck.php");

$postedApp = $_POST['payApplicationNo'];
$trackidapp = "";
$email = "";
$appno = "";
$apl_name = " ";
$address = "";
$mobileno = "";
$exam_type = "";
$amount = "";
$transportalID = "";
$transportalPassword = "";
$currencyCode = "";
$langID = "";
$actionCode = "";

error_log("\n\nSTART_PAYMENT_REQUEST\n", 3, "paymentlog.txt");
error_log("******** Online Payment Request- ".$email."-".$trackidapp." ******** \n", 3, "paymentlog.txt");

if($postedApp=="gatappno")
	$exam_type = "GAT";
else
	$exam_type = "WALKIN";

$_SESSION['payApplicationNo'] = $postedApp;

if(isset($_SESSION['email'])) 
{	
	$email = $_SESSION['email'];
}
else
{	
	error_log("REQ001-Not able to retrieve email from session \n", 3, "paymentlog.txt");
	header("Location:https://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}

if(isset($_SESSION['username'])) 
{	
	$apl_name = $_SESSION['username'];
}
else
{	
	error_log("REQ002-Not able to retrieve username from session \n", 3, "paymentlog.txt");
	header("Location:https://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}

if ($stmt = $mysqli->prepare("SELECT * from paymentGatewayDetails WHERE examType = '".$exam_type."' ")) { 
      $stmt->execute();
      $stmt->store_result();
      //$id added on Dec 31,2017 by RB (both in db and here)
      $stmt->bind_result($id,$exam_type, $amount, $transportalID, $transportalPassword, $currencyCode, $langID, $actionCode); 
      $stmt->fetch();
}
else
{	
	error_log("REQ003-Not able to retrieve payment gateway details \n", 3, "paymentlog.txt");
	header("Location:https://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}

if(isset($_SESSION[$postedApp])) 
{
	$appno = $_SESSION[$postedApp];		
	$trackidapp = $appno;
	$_SESSION['transappno'] = $trackidapp;
}
else
{	
	error_log("REQ004-Not able to retrieve the appno \n", 3, "paymentlog.txt");
	header("Location:https://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}
	
if ($stmt = $mysqli->prepare("SELECT count(*) as totaltrans from onlineTransactions WHERE email = ?")) { 
	  $stmt->bind_param('s', $email); 
	  $stmt->execute();
	  $stmt->store_result();
	  $stmt->bind_result($totaltrans); 
	  $stmt->fetch();
		
		$totaltrans = $totaltrans + 1;
		$num_padded = sprintf("%03d", $totaltrans);
		$trackidapp = $trackidapp.$num_padded;
		$_SESSION['transappno'] = $trackidapp;
}
else
{
	error_log("REQ005-Not able to retrieve generate trackidapp no \n", 3, "paymentlog.txt");
	header("Location:https://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}

if ($stmt = $mysqli->prepare("SELECT address_line1, address_line2, place_town, city, pincode, mobile_no FROM ma_user_profile WHERE email = ?")) 
{ 
    $stmt->bind_param('s', $email); 
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($address_line1, $address_line2, $place_town, $city, $pincode, $mobile_no); 
    $stmt->fetch();
	$address = preg_replace('/[^a-zA-Z0-9]/ ', '', $address_line1)." ".preg_replace('/[^a-zA-Z0-9]/ ', '', $address_line2)." ".preg_replace('/[^a-zA-Z0-9]/ ', '', $place_town)." ".preg_replace('/[^a-zA-Z0-9]/ ', '', $city)." ".$pincode;
	$mobileno = $mobile_no;
}
else
{
	error_log("REQ006-Not able to retrieve address details \n", 3, "paymentlog.txt");
	header("Location:https://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}


$trackIdResponse = "Customer Redirected to PG, response pending";
$dbPaymentID = "Not Recieved";
$dbresponse = "Payment Request Initiated";
$dbtxnRef = "";
$dbtxnTranID = "";
$dbtxnError = "";
$date = date_default_timezone_set('Asia/Kolkata');
$dbtransDate = date("m/d/y G.i:s", time());
$MerchantID = "CIHL";
$SecurityID = "cihl";
$TypeField1 = "R";
$amount = $amount.'.00';
$checksomprovidedbybilldesk = 'wY0iv7Ktr7qa'; 	
$params = $MerchantID.'|'.$trackidapp.'|NA|'.$amount.'|NA|NA|NA|INR|NA|'.$TypeField1.'|'.$SecurityID.'|NA|NA|F|'.$apl_name.'|'.$email.'|'.$mobile_no.'|'.$appno.'|'.$postedApp.'|NA|NA|https://msitprogram.net/admissions/paymentsystem/payment_response.php';
$checksum = hash_hmac('sha256',$params,$checksomprovidedbybilldesk, false);
$checksum_value = strtoupper($checksum);
$dataWithCheckSumValue = $params."|".$checksum_value;
$msg = $dataWithCheckSumValue; 
$url = "https://pgi.billdesk.com/pgidsk/PGIMerchantPayment";
if ($insert_stmt = $mysqli->prepare("INSERT INTO onlineTransactions(
										email, appno, appType, trackID, 
										amount, paymentID, response, 
										request, txnRef, txnTranID, txnError, 
										transDate, trackIdResponse) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) 
{    
		$insert_stmt->bind_param('sssssssssssss', 
								$email, $appno, $postedApp, $trackidapp, 
								$amount, $dbPaymentID, $dbresponse, 
								$params, $dbtxnRef, $dbtxnTranID, $dbtxnError, 
								$dbtransDate, $trackIdResponse ); 
		$insert_stmt->execute();
		$insert_stmt->close();
}
else
{
	error_log("REQ001-Not able to create online transaction \n", 3, "paymentlog.txt");
	header("Location:://msitprogram.net/admissions/payment.php?errorMsg=Please try after some time.");
}
error_log("END_PAYMENT_REQUEST\n\n", 3, "paymentlog.txt");
?>
<html>
<div style="position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('../loading-hor.gif') 50% 50% no-repeat rgb(249,249,249);" ></div>
<form name="bdpayment" method="post" action="https://pgi.billdesk.com/pgidsk/PGIMerchantPayment">
	<input type="hidden" name="msg" value=<?php echo $msg;  ?>>
</form>
<script>
   window.onload = function() { 
   document.bdpayment.submit();
   }
</script>
 



	