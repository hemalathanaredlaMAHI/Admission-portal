<?php
include("db_connect.php");

	if ($stmt = $mysqli->prepare("SELECT email, appl_id, ResAmount, ResTrackID from paymentDetailsFailed where ResResult = 'url_tamper'")) {
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($txn_email, $txn_appno, $txn_amount, $txn_trackid); 
		while($stmt->fetch())
		{
			echo $txn_email."==".$txn_appno."==".$txn_trackid."<br/>";
			if ($stmt1 = $mysqli->prepare("SELECT email, appno, amount, paymentID, response, txnRef, txnTranID, txnError, trackIdResponse from onlineTransactions where trackID = ?")) {
				$stmt1->bind_param('s', $txn_trackid); 
				$stmt1->execute();
				$stmt1->store_result();
				$stmt1->bind_result($email, $appl_id, $ResAmount, $txn_paymentId, $txn_response, $txn_ref, $txn_tranId, $txn_error, $txn_trackIdResponse); 
				$stmt1->fetch();
				if($txn_email != $email)
					echo "<br/>@@@===Email<br/>";
				if($txn_appno != $appl_id)
					echo "<br/>@@@===appno<br/>";
				if($txn_amount != $ResAmount)
					echo "<br/>@@@===Amount<br/>";
				if($txn_paymentId != "Not Recieved")
					echo "<br/>@@@===Payment Id<br/>";
				if($txn_response != "Payment Request Initiated")
					echo "<br/>@@@===Txn Response <br/>";
				if($txn_ref != "")
					echo "<br/>@@@===txn ref<br/>";
				if($txn_tranId != "") 
					echo "<br/>@@@===txn tranid<br/>";
				if($txn_error != "")
					echo "<br/>@@@===txn error<br/>";
				if($txn_trackIdResponse != "Customer Redirected to PG, response pending")
						echo "<br/>@@@===track id response <br/>";
			}
		}
	}

?>





