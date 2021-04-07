<?php include('accesscheck.php'); ?>
<?php 
		$dropdownText = "";
		$appcount = 1;
		if ($stmt = $mysqli->prepare("SELECT applicationNo, appType from userApplications WHERE email = ?  and (paymentStatus='no' || (paymentStatus='yes' && paymentType='DD')) order by appType, applicationNo ")) { 
			//applicationNo not like '%W%' and
			$stmt->bind_param('s', $_SESSION['email']); 
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($appno, $appType); 
			while($stmt->fetch())
			{
				if($appcount == 1)
				{
					$dropdownText = "<select name='payApplicationNo' id='payApplicationNo'>";
				}
				if($appType=='GAT' || $appType=='GRE')
				{
					$_SESSION['gatappno'] = $appno;
					$dropdownText = $dropdownText."<option value='gatappno'>GAT-".$_SESSION['gatappno']."</option>";
				}
				else
				{
					//New code added by RB on May 24,2018
					
					$today = new DateTime();
					$walkin_ends = new DateTime(WALKIN_END_DATE);
					$sysdifference  = date_diff($walkin_ends,$today);
					$sysdaydiff = (int)$sysdifference->format("%r%a");


					if($sysdaydiff <=0){
					
						$_SESSION['walkinappno'.$appcount] = $appno;
						$dropdownText = $dropdownText."<option value='walkinappno".$appcount."'>WALKIN-".$_SESSION['walkinappno'.$appcount]."</option>";
					}
					else{
						$appcount = $appcount - 1;
						//$dropdownText = $dropdownText."<option value='walkinappno".$appcount."'>WALKIN ENDS</option>";
					}
				}
				$appcount = $appcount + 1;
			}
			if($appcount!=1)
			{
				$dropdownText = $dropdownText."</select>";
			}
			$stmt->close();
		}							
?>


<div class="widget-box">	

	<div class="widget-body">

		<div class="widget-main">
			<?php 

				//Code modified on May 24, 2018 by RB
				$today = new DateTime();
				$gat_ends = new DateTime(GAT_END);
				$sysdifference  = date_diff($gat_ends,$today);
				$sysdaydiff = (int)$sysdifference->format("%r%a");
								

				if(($appcount==1) || ($sysdaydiff > 0)){


					?>
						<div class="text-danger">
							<strong>
								<i class="ace-icon fa fa-times"></i>
							</strong>
								You don't have any applications pending for ONLINE Payment.
								<br />
						</div>
		<?php } else { ?>
				<!-- <p class="alert alert-warning "> 
						You can pay online eventhough if you entered your DD details. 
					</p> -->
			<form class="form-horizontal" id="credit-payment-form" method="post" action="paymentsystem/payment_request_secure.php">

				<h4 class="header purple bolder smaller">Payment Details</h4>

				<div class="space"></div>

				

				<div class="form-group">

					<label class="col-sm-3 control-label no-padding-right" for="creditcardno">

							Amount (Rs.) <sup> <i class="icon-asterisk"></i> </sup>:

					</label>



					<div class="col-sm-3">

						<span class="lead"><strong><?php echo APPLICATION_FEE;?></strong></span><input class="input-large" type="text" id="MAmount" name="MAmount" value="700" hidden />

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