<?php include('accesscheck.php'); ?>
<?php 	
		if ($stmt = $mysqli->prepare("SELECT counselling_date from admissions_payments  
										WHERE email = ?  and paymentStatus='NO' and payments_closed='no'")) { 
			$stmt->bind_param('s', $_SESSION['email']); 
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($counselling_date); 
			while($stmt->fetch())
			{

					date_default_timezone_set("Asia/Kolkata");
					 $currentTime = date("H");
					 $d=strtotime("tomorrow");
					 //echo "Tomorrwo is ".date("m/d/Y ",$d);
					$currentDate = date_create(date("m/d/Y ",$d));
					$closeDate = date_create($counselling_date);
					//echo "<br>Closed date  is ".$counselling_date;
					$diff = date_diff($closeDate,$currentDate)->format("%R%a");

					if($diff == 0 && $currentTime>=17){
						$update_query = "UPDATE admissions_payments set payments_closed = 'yes' WHERE counselling_date = '$counselling_date'";
										
						$res = $mysqli->query($update_query);
						
						//echo "Updating status";
					}
				}
			}




		$dropdownText = "";
		$appcount = 1;
		if ($stmt = $mysqli->prepare("SELECT appno from admissions_payments  
										WHERE email = ?  and paymentStatus='NO' and payments_closed='no'")) { 
			$stmt->bind_param('s', $_SESSION['email']); 
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($appno); 
			while($stmt->fetch())
			{
				$appcount = $appcount + 1;
				$_SESSION['gatappno'] = $appno;
				$dropdownText = "<select name='payApplicationNo' id='payApplicationNo'>";
				$dropdownText = $dropdownText."<option value='gatappno'>".$appno."</option>";


			}
			$dropdownText = $dropdownText."</select>";
			
			$stmt->close();	
		}
		else
		{

			/*******************************************************/


			/*************************************************************/
			$dropdownText = "";
			$appcount = 1;
			if ($stmt1 = $mysqli->prepare("SELECT phone_no from ma_users  
										WHERE email = ? ")) { 
			$stmt1->bind_param('s', $_SESSION['email']); 
			$stmt1->execute();
			$stmt1->store_result();
			$stmt1->bind_result($phone_no); 
			while($stmt1->fetch())
			{
				$appcount = $appcount + 1;
				$_SESSION['gatappno'] = $phone_no;
				$dropdownText = "<select name='payApplicationNo' id='payApplicationNo'>";
				$dropdownText = $dropdownText."<option value='gatappno'>".$phone_no."</option>";


			}
			$dropdownText = $dropdownText."</select>";
			
			$stmt1->close();	

			


		}
	}
?>


<div class="widget-box">	

	<div class="widget-body">

		<div class="widget-main">
				<?php if($appcount==1) {?>
						<div class="text-danger">
							<strong>
								<i class="ace-icon fa fa-times"></i>
							</strong>
								You don't have any applications pending for ONLINE Payment.
								<br />
						</div>
		<?php } else { ?>
				<p class="alert alert-warning "> 
						<!-- You can pay online eventhough if you entered your DD details.  -->
					</p>
			<form class="form-horizontal" id="credit-payment-form" method="post" action="paymentsystem/payment_request_secure_admissions.php">

				<h4 class="header purple bolder smaller">Payment Details</h4>

				<div class="space"></div>

				

				<div class="form-group">

					<label class="col-sm-3 control-label no-padding-right" for="creditcardno">

							Amount (Rs.) <sup> <i class="icon-asterisk"></i> </sup>:

					</label>



					<div class="col-sm-3">

						<span class="lead"><strong>30000</strong></span><input class="input-large" type="text" id="MAmount" name="MAmount" value="700" hidden />

					</div>

				</div>

																

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="creditcw">
							Application Number
							<sup> <i class="icon-asterisk"></i> </sup>:
					</label>
					<div class="col-sm-3">
					<?php echo $dropdownText; ?>
					</div>
				</div>



				<p class="alert alert-warning "> 

					 <label>

						<input name="termsncond" checked id="termsncond"type="checkbox" class="ace" required/>

						<span class="lbl"> </span>

					</label>I hereby declare that I agree to the terms and conditions of <strong>CIHL</strong> 
					&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;

					<a href="http://msitprogram.net/terms_conditions.php" target="_blank" class="link">Read terms and conditions</a>

				</p>

				

						<div class="error-block alert alert-danger hidden">

							<i class="icon-remove"></i>  <span class="message">  </span>

						</div>

						

						

						<div class="status-block alert alert-info hidden">

							<strong> Redirecting to Payment Gateway </strong> 

						</div>

				

				<div class="clearfix form-actions">

						<div class="col-md-offset-3 col-md-6">

							<button class="btn btn-primary" type="submit" id="online">

								<i class="icon-ok bigger-110"></i>

								PAY NOW

							</button>



							

						</div>

				</div>

				

				<p class="alert alert-warning "> 

				Note: After clicking on the "Pay" button, you will be directed to a secure gateway for payment.  <strong>Don't Close the Browser or Stop Until the Page returns MSIT Website.</strong> </p>

				

		  </form>
		<?php } ?>
			

		</div>

	</div>

</div>