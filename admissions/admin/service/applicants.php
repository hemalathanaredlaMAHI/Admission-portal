<?php
include dirname(dirname(__FILE__)).'/db_connect.php';
header('Access-Control-Allow-Origin: *');
$myArray = array();

$appType = "All";
if(isset($_GET['app']))
	$appType = $_GET['app'];	

$center = "All";
if(isset($_GET['center']))
	$center = $_GET['center'];	

$payment = "All";
if(isset($_GET['payment']))
	$payment = $_GET['payment'];	




if($appType=='All' && $center=='All' && $payment=='All')
{
	$qry = "select * from dashboardView";	
}
else
{
	$qry = "select * from dashboardView where 1=1 ";	
	$appCnd = "";
	$centCnd = "";
	$payCnd = "";
	if($appType!='All')
	{
		if($appType=='GATGRE')
			$appCnd = "appType in ('GAT','GRE')";
		else
			$appCnd = "appType = '".$appType."'";
	}	
	if($center!='All')
	{
		$centCnd = "testCenter = '".$center."'";
	}	
	if($payment!='All')
	{
		if($payment=='DD' || $payment=='ONLINE')
			$payCnd = "paymentType like '".$payment."%'";
		if($payment=='yes' || $payment=='no')
			$payCnd = "paymentStatus = '".$payment."'";
	}
	if($appCnd != "")
	{
		$qry = $qry." and ".$appCnd;
	}
	if($centCnd != "")
	{
		$qry = $qry." and ".$centCnd;
	}
	if($payCnd != "")
	{
		$qry = $qry." and ".$payCnd;
	}
}
$qry = $qry." order by applicationNo";
if ($result = $mysqli->query($qry)) 
{
	$tempArray = array();
	while($row = $result->fetch_object()) 
	{
		$tempArray = $row;
		//array_push($myArray, $tempArray);
		$myArray['apps'][]=$tempArray;
	}
}
//$resultApps['gatApps'] = $myArray; 
echo json_encode($myArray);
$result->close();
$mysqli->close();
?>