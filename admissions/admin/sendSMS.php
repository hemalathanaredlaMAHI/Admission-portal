<?php
include('accesscheck.php');

if(!isset($_GET['message']) || $_GET['message']=="")
{
	exit;
}
if(!isset($_GET['mobnumber']) || $_GET['mobnumber']=="")
{
	exit;
}
$message = $_GET['message'];
$mobnumber = $_GET['mobnumber'];
//$mobnumber = "7702042333"; //change by Ranjith
if (strlen($mobnumber)!=12 || substr($mobnumber, 0, 2) !== '91')
{
	$mobnumber = "91".$mobnumber;
}
$ch = curl_init('http://bsms.slabs.mobi/spanelv2/api.php?');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=msitsms&password=MsAdmin@2016&from=MSITAD&to=".$mobnumber."&message=".$message);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$data = curl_exec($ch);
header("Location:offlineApps.php?message=Successfully Sent SMS.");
exit;
?>