<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$qry = "SELECT full_name, email, mobile_no, walkinAppNo, paymentType, center, slotdate, CASE slotno WHEN 1 THEN '10:00AM' WHEN 2 THEN '02:00PM' ELSE '' END as slotTime FROM walkinApplicationsView where paymentStatus = 'yes'";
$qry = $qry." order by walkinAppNo";
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