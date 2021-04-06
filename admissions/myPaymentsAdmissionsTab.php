<?php include('accesscheck.php'); ?>
<div class="widget-box">	
	<div class="widget-body">
		<div class="widget-main">
			<div class="table-responsive">
				<h5><span class="orange"><strong>ONLINE TRANSACTIONS:</strong></span></h5>
				<table id="sample-table-1" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Application No</th>
						<th>Track ID</th>
						<th>Exam</th>
						<th>Amount</th>
						<th>Payment ID</th>
						<th>Transaction ID</th>
						<th>Date</th>
						<th>Message</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$flag = 0;
				if ($stmt = $mysqli->prepare("SELECT appno, appType, trackID, amount, paymentID, response, txnTranID, transDate, trackIdResponse from admissions_onlinetransactions WHERE email = ?")) 
				{ 
					$stmt->bind_param('s', $_SESSION['email']); 
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($app_no, $exam_type, $app_track_ID, $amount,  $payment_id, $response, $txn_tran_id, $trans_date, $track_id_response); 
					while($stmt->fetch())
					{
						$flag=1;
						echo "<tr>";
						echo "<td>".$app_no."</td>";
						echo "<td>".$app_track_ID."</td>";
						echo "<td>";
						if($exam_type=="gatappno")
							echo "GAT";
						else
							echo "WALKIN";
						echo "</td>";
						echo "<td>".$amount."</td>";
						echo "<td>".$payment_id."</td>";
						echo "<td>".$txn_tran_id."</td>";
						echo "<td>".$trans_date."</td>";
						echo "<td>".$response."</td>";
						echo "<td><span class='label label-sm label-";
						if($track_id_response=="SUCCESS") 
						{
							echo "success"."'>SUCCESS";
						}
						else 
						{
							echo "warning"."'>FAILED";
						}
						echo "</span></td>";
						echo "</tr>";
					}
					$stmt->close();
				}
				if($flag==0)
				{
					echo "<tr><td colspan='9'>You have not made any Online transactions.</td></tr>";
				}
				?>
				</tbody>

			</table>
			<!-- 
			<h5><span class="orange"><strong>DD TRANSACTIONS:</strong></span></h5>
			<table id="sample-table-1" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Application No</th>
						<th>Exam Type</th>
						<th>Amount</th>
						<th>DD No</th>
						<th>Bank Name</th>
						<th>Bank Branch</th>
						<th>Issue Date</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$flag = 0;
				if ($stmt = $mysqli->prepare("SELECT appno, ddno, bank_name, bank_branch, issue_date from ddTransactions WHERE email = ?")) 
				{ 
					$stmt->bind_param('s', $_SESSION['email']); 
					$stmt->execute();
					$stmt->bind_result($appno, $ddno, $bankname, $bankbranch, $issuedate); 
					while($stmt->fetch())
					{
						$flag=1;
						echo "<tr>";
						echo "<td>".$appno."</td>";
						$pos = strpos($appno,"W");
						if(strpos($appno,"W") == false)
							echo "<td>GAT</td>";
						else 
							echo "<td>WALKIN</td>";
						echo "<td>700.00</td>";
						echo "<td>".$ddno."</td>";
						echo "<td>".$bankname."</td>";
						echo "<td>".$bankbranch."</td>";
						echo "<td>".$issuedate."</td>";
						echo "</tr>";
					}
					$stmt->close();
				}		
				if($flag==0)
				{
					//echo "<tr><td colspan='7'>You have not made any DD transactions.</td></tr>";
				}
			?>
				</tbody>
			</table> -->
		</div><!-- /.table-responsive -->						
		</div>
	</div>
</div>