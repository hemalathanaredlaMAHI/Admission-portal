<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$qry = "SELECT full_name, email, mobile_no, gatAppNo, center FROM gatApplicationsView where gatAppNo like '%D%'";
$qry = $qry." order by gatAppNo";
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