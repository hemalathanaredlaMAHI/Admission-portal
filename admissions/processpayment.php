<?php
include 'db_connect.php';
header('Access-Control-Allow-Origin: *');

if(isset($_GET['trackid']) && isset($_GET['appno']) && isset($_GET['apptype']) && isset($_GET['password']) && $_GET['password']=="MsPay789123")
{
	$existPayStatus = "NO";
	$existPayType = "NO";
	if($_GET['apptype'] == 'walkin')
	{
		if ($stmt11 = $mysqli->prepare("SELECT paymentStatus, paymentType from walkinApplications where walkinAppNo = ?")) {
			$stmt11->bind_param('s', $_GET['appno']); 
			$stmt11->execute();
			$stmt11->store_result();
			$stmt11->bind_result($existPayStatus, $existPayType); 
			$stmt11->fetch();
		}
	}
	if($_GET['apptype'] == 'gat')
	{
		if ($stmt11 = $mysqli->prepare("SELECT paymentStatus, paymentType from gatApplications where gatAppNo = ?")) {
			$stmt11->bind_param('s', $_GET['appno']); 
			$stmt11->execute();
			$stmt11->store_result();
			$stmt11->bind_result($existPayStatus, $existPayType); 
			$stmt11->fetch();
		}
	}
	if($existPayStatus=="yes")
	{
		echo "Already Paid with ".$existPayType." <a href='txncheck.php'>Click here to Go Back</a>";
	}
	else
	{
		$qry1 = "insert into paymentDetails(ResPaymentId,appl_id,apl_name,ResTrackID,ResErrorNo,ResResult,ResPosdate,ResTranId,ResRef,ResAmount,email,mobile,bd_payment_status,txnDate) 
		SELECT 
			ResPaymentId, 
			appl_id, 
			apl_name, 
			ResTrackID, 
			ResErrorNo, 
			'Completed successfully.', 
			ResPosdate, 
			ResTranId,
			ResRef,
			ResAmount,
			email,
			mobile,
			'0300',
			txnDate 
		FROM paymentDetailsFailed 
		WHERE ResTrackID = '".$_GET['trackid']."'";

		$qry2 = "DELETE FROM paymentDetailsFailed WHERE ResTrackID = '".$_GET['trackid']."'";

		$qry3 = "";
		if($_GET['apptype'] == 'walkin')
			$qry3 = "UPDATE walkinApplications SET paymentType = 'ONLINE', paymentStatus = 'yes' where walkinAppNo = '".$_GET['appno']."'";
		if($_GET['apptype'] == 'gat')
			$qry3 = "UPDATE gatApplications SET paymentType = 'ONLINE', paymentStatus = 'yes' where gatAppNo = '".$_GET['appno']."'";

		$mysqli->query("START TRANSACTION");
		if($mysqli->query($qry1))
		{
			if($mysqli->query($qry2))
			{
				if($mysqli->query($qry3))
				{
					$mysqli->query("COMMIT");				
					echo "Processed!!! <a href='txncheck.php'>Click here to Go Back</a>";		
				}
				else
				{
					$mysqli->query("ROLLBACK");
					echo "Failed!!!. <a href='txncheck.php'>Click here to Go Back</a>";		
				}
			}
			else
			{
				$mysqli->query("ROLLBACK");
				echo "Failed!!!. <a href='txncheck.php'>Click here to Go Back</a>";
			}
		}
		else
		{
			$mysqli->query("ROLLBACK");
			echo "Failed!!!. <a href='txncheck.php'>Click here to Go Back</a>";
		}
		$mysqli->close();
	}
}
else
{
	echo "Failed!!!. <a href='txncheck.php'>Click here to Go Back</a>";
}

?>