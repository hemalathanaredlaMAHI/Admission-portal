<?php
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
if (strlen($mobnumber)!=12 || substr($mobnumber, 0, 2) !== '91')
{
	$mobnumber = "91".$mobnumber;
}
$ch = curl_init('http://smslogin.mobi/spanelv2/api.php?');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=msitsmst&password=MsAdmin@2016&from=MSITAD&to=".$mobnumber."&message=".$message);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$data = curl_exec($ch);
echo $data;

?>