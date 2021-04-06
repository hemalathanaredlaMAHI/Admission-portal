<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$testcenter = $_GET['testcenter'];
$emailstatus = $_GET['emailstatus'];
$onlyht = $_GET['onlyht'];

$qry = "select email, full_name, mobile_no, gatAppNo, center, testTime from gat_halltickets where emailStatus = '".$emailstatus."'";
if( $testcenter!='All' )
{	
	$qry = $qry." and center = '".$testcenter."'";	
}
if( $onlyht!='NO' && $onlyht!='' &&  $onlyht!=null)
{	
	$qry = $qry." and gatAppNo = '".$onlyht."'";	
}

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
$result->close();
$mysqli->close();
echo json_encode($myArray);
?>