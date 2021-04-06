<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$qry = "SELECT apl_name, email, mobile, appl_id, ResTrackID, ResTranId, txnDate, 'REFUND' as status FROM paymentDetailsFailed where ResTranId in (select ResTranId from billdesk_paymentDetails) and appl_id in (select appl_id from paymentDetails)
union
SELECT apl_name, email, mobile, appl_id, ResTrackID, ResTranId, txnDate, 'CORRECT' FROM paymentDetailsFailed where ResTranId in (select ResTranId from billdesk_paymentDetails) and appl_id not in (select appl_id from paymentDetails)";	
$qry = $qry." order by apl_name";
if ($result = $mysqli->query($qry)) 
{
	$tempArray = array();
	while($row = $result->fetch_object()) 
	{
		$tempArray = $row;
		$myArray['apps'][]=$tempArray;
	}
}
echo json_encode($myArray);
$result->close();
$mysqli->close();
?>