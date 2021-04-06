<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$qry = "select * from billdesk_paymentDetails";	
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