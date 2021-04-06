<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$emailstatus = $_GET['emailstatus'];
$onlyht = $_GET['onlyht'];

$qry = "select email, fullName, mobileno, appno, cdate, ctime from gat_call_letters where email_status = '".$emailstatus."'";
if( $onlyht!='NO' && $onlyht!='' &&  $onlyht!=null)
{	
	$qry = $qry." and appno = '".$onlyht."'";	
}

$qry = $qry." order by rank";

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