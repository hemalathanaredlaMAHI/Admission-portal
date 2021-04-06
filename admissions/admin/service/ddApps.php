<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$qry = "SELECT u.full_name, u.email, u.mobile_no, d.appno, d.ddno, d.bank_name, d.bank_branch, d.issue_date, d.status FROM userProfilesView u, ddTransactions d where d.email = u.email";
$qry = $qry." order by d.appno";
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