<?php include('accesscheck.php'); ?>
<div class="widget-box">	
	<div class="widget-body">
		<div class="widget-main">
			<div class="table-responsive">
			<h5><span class="orange"><strong>GAT Exam Details:</strong></span></h5>
			<table id="sample-table-1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>GAT Application No</th>
						<th>Exam Type</th>
						<th>Test Center</th>
						<th>Payment Type</th>
						<th>Payment Status</th>
						<th>Date & Slot</th>
						<th>Score</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$flag = 0;
				if ($stmt = $mysqli->prepare("SELECT appno,test_center1,examtype from ma_user_gat_exam_details WHERE email = ?")) { 
					$stmt->bind_param('s', $_SESSION['email']); 
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($appno, $testcenter, $Gexamtype); 
					while($stmt->fetch())
					{
						$flag=1;
						echo "<tr>";
						echo "<td>".$appno."</td>";
						echo "<td>".$Gexamtype."</td>";
						echo "<td>".$testcenter."</td>";
						echo "<td>";
						if(isset($_SESSION['payment_type'])) echo $_SESSION['payment_type'];
						echo "</td>";
						echo "<td>";
						if(isset($_SESSION['payment_status'])) echo $_SESSION['payment_status'];
						echo "</td>";													
						echo "<td>Not Yet Decided</td>";
						echo "<td>Not Yet Decided</td>";
						echo "</tr>";
					}
					$stmt->close();
					}
					if($flag==0)
					{
						echo "<tr><td colspan='6'>You have not applied for GAT</td></tr>";
					}

				?>
				</tbody>
				</table>
				<h5><span class="orange"><strong>Walkin Exam Details:</strong></span></h5>
				<table id="sample-table-1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Walk-in Application No</th>
						<th>Slot Center</th>
						<th>Date of Examination</th>
						<th>Slot of Examination</th>
						<th>Score</th>
						<th>Test Taken</th>
						<th>Payment Type</th>
						<th>Payment Status</th>
						
					</tr>
				</thead>
				<tbody>
				
			<?php
			
	$count=0;
	if ($stmt = $mysqli->prepare("SELECT count(walkinAppNo) FROM ".prefix."ma_walkin WHERE emailID = ?")) { 
	$stmt->bind_param('s', $_SESSION['email']); 
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($count); 
	$stmt->fetch();
	
	}

	
			
				$flag = 0;
				if ($stmt = $mysqli->prepare("SELECT walkinAppNo,TestCenter,slotdate,slotNo,Total,TestTaken,PaymentType,PaymentStatus  from ".prefix."ma_walkin WHERE emailID = ?")) { 
					$stmt->bind_param('s', $_SESSION['email']); 
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($appno, $testcenter,$slotdate, $slotno, $total, $testtaken,$paymenttype,$paymentstatus); 
					while($stmt->fetch())
					{
						$flag=1;
						$total=0;
						$total_score=0;
						if ($stmt1 = $mysqli->prepare("SELECT Total_C FROM ma_userscores WHERE Hallticket_No = ?")) { 
						$stmt1->bind_param('s', $appno); 
						$stmt1->execute();
						$stmt1->bind_result($total_score); 
						$stmt1->fetch();
						$total = $total_score;
						}
						else{
						echo $mysqli->error;
						}
						//echo $total_score;

						echo "<tr>";
						echo "<td>".$appno."</td>";
						
						echo "<td>"; if($testcenter=="center1") echo "Hyderabad"; else echo "Kakinada"; echo "</td>";
						if($slotdate==null && $paymentstatus=="yes"){echo "<td>"."<a href='slotbooking.php'>Book your Slot</a>"."</td>";}
						elseif($slotdate==null && $paymentstatus=="no"){echo "<td>"."Payment Pending"."</td>";}
						else{echo "<td>".$slotdate."</td>";}	
						if($slotno==1){echo "<td>"."10:00 A.M."."</td>";}
						elseif($slotno==2){echo "<td>"."2:00 A.M."."</td>";}
						//elseif($slotno==3){echo "<td>"."2:00 P.M."."</td>";}
						elseif($slotno==0 && $paymentstatus=="yes"){echo "<td>"."<a href='slotbooking.php'>Book your Slot</a>"."</td>";}
						elseif($slotno==0 && $paymentstatus=="no"){echo "<td>"."Payment Pending"."</td>";}
						else {echo "<td>"."Payment Pending"."</td>";}
						if($total==0){echo "<td>"."Exam Not Taken"."</td>";}
						else{echo "<td>".$total." <a href='get_scoredetails.php?userName=".$appno."'>Click here to Get Full Score Details</a></td>";}
						echo "<td>".$testtaken."</td>";
						if($slotdate==" "){echo "<td>"."payment pending"."</td>";}
						else{echo "<td>".$paymenttype."</td>";}
						echo "<td>".$paymentstatus."</td>";
						
						echo "</tr>";
						
						
					
					
					}
					$stmt->close();
					}
					if($flag==0)
					{
						echo "<tr><td colspan='6'>You have not applied for walkin</td></tr>";
					}
							?>
				</tbody>
			</table>
			<h5>&nbsp;</h5>
		  </div>
				<!-- /.table-responsive -->
											
		</div>
	</div>
</div>