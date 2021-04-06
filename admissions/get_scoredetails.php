<?php include('accesscheck.php'); ?>

                <?php 


					$username = $_POST['userAppNo'];

					

					

						if ($insert_stmt = $mysqli->prepare("select CFullName,Test_date,Testdate_assigned,testslot_assigned,Verbal_Rw,Quantitative_Rw,Analytical_Rw,Total_C,Verbal_Per,Quantitative_Per,Analytical_Per from userScores where Hallticket_No=?")) {   			

						$insert_stmt->bind_param('s',$username ); 

						$insert_stmt->execute();

						$insert_stmt->store_result();

						$insert_stmt->bind_result($name,$testdate,$testdateassigned,$slotno,$verbal_Rw,$Quant_Rw,$Analysis_Rw,$total,$Verbal_Per,$Quantitative_Per,$Analytical_Per); 

						$insert_stmt->fetch();

						$insert_stmt->close();

						}

						?>


						




						<table id="sample-table-1" class="table table-striped table-bordered table-hover">

						<tr>
						<th style="text-align:right;width:20%;"> Hall Ticket</th>
						<td width="28%"><?php echo $username?></td>
						<td width="4%">&nbsp;</td>
						<th style="text-align:right;width:20%;"> Name</th>
						<td width="28%"><?php echo $name?></td>
						</tr>

						<tr>
						<th style="text-align:right;width:20%;"> Test Date</th>
						<td width="28%"><?php echo $testdate?></td>
						<td width="4%">&nbsp;</td>
						<th style="text-align:right;width:20%;"> Slot Time</th>
						<td width="28%"><?php if($slotno==1)echo "9.00 A.M."; else if($slotno==2)echo "11.30 A.M.";else if($slotno==3)echo "2.00 P.M.";?></td>
						</tr>

						<tr>
						<th style="text-align:right;width:20%;"> Verbal</th>
						<td width="28%"><?php echo $verbal_Rw?></td>
						<td width="4%">&nbsp;</td>
						<th style="text-align:right;width:20%;"> Quantitative</th>
						<td width="28%"><?php echo $Quant_Rw?></td>
						</tr>

						<tr>
						<th style="text-align:right;width:20%;"> Analytical</th>
						<td width="28%"><?php echo $Analysis_Rw?></td>
						<td width="4%">&nbsp;</td>
						<th style="text-align:right;width:20%;"> Total Marks</th>
						<td width="28%"><b><?php echo $total?></b></td>
						</tr>

						</table>

						

