<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$emailstatus = $_GET['emailstatus'];
$onlyht = $_GET['onlyht'];

$qry = "select a.email, a.fullName, a.mobile_no, a.appno, a.paymentType, b.ResPaymentId , b.txnDate from admissions_payments a join admissions_paymentdetails b on a.appno=b.appl_id where a.paymentStatus = '".$emailstatus."'";
if( $onlyht!='NO' && $onlyht!='' &&  $onlyht!=null)
{	
	$qry = $qry." and a.appno = '".$onlyht."'";	
}

//$qry = $qry." order by rank";
//echo "Query is ".$qry;
if ($result = $mysqli->query($qry)) 
{
	$tempArray = array();
	while($row = $result->fetch_object()) 
	{
		$tempArray = $row;
		$myArray['apps'][]=$tempArray;
	}
}
$result->close();
$mysqli->close();
echo json_encode($myArray);
?>