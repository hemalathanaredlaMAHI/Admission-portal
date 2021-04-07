<?php include('accesscheck.php'); ?>
	<?php 
		$dropdownText = "";
		$appcount = 1;
		if ($stmt = $mysqli->prepare("SELECT applicationNo, appType from userApplications  
										WHERE email = ?  and paymentStatus='no' order by appType ")) { 
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
					$_SESSION['walkinappno'.$appcount] = $appno;
					$dropdownText = $dropdownText."<option value='walkinappno".$appcount."'>WALKIN-".$_SESSION['walkinappno'.$appcount]."</option>";
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
				<?php if($appcount==1) {?>
						<div class="text-danger">
							<strong>
								<i class="ace-icon fa fa-times"></i>
							</strong>
								You don't have any applications pending for DD Payment.
								<br />
						</div>
		<?php } else { ?>
			<form class="form-horizontal" id="dd-payment-form">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="ddno">
						Application No <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
					<div class="col-sm-3">	
					<?php echo $dropdownText; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="ddno">
						DD No <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
					<div class="col-sm-3">
						<input class="input-large" type="text" id="ddno" name="ddno" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="bankname">
						Issue Bank Name <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
					<div class="col-sm-3">
						<input class="input-large" type="text" id="bankname" name="bankname" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="bankbranch">
							Bank Branch <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
					<div class="col-sm-3">
						<input class="input-large" type="text" id="bankbranch" name="bankbranch" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="issuedate">
						Issue Date<sup> <i class="icon-asterisk"></i> </sup>:
					</label>
					<div class="col-sm-8">
						<div class="input-medium">
							<div class="input-group">
								<input class="input-medium date-picker" id="issuedate" name="issuedate" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" />
								<span class="input-group-addon">
									<i class="icon-calendar"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="space"></div>
					<div class="success-block alert alert-success hidden">
						<center> <strong> Your DD Details have been successfully saved. Please send your dd to us at the earliest. </strong> </center>
					</div>
				<div class="clearfix">
					<div class="col-md-offset-3 col-md-6">
						<button class="btn btn-primary" type="submit">
							<i class="icon-ok bigger-110"></i>
							Pay
						</button>
					</div>
				</div>
				<div class="space"></div>
				<p class="alert alert-warning "> 
					Note: Please try to use Online Payment mode for more convenience process.
				</p>
			</form>
			<?php } ?>
		</div>
	</div>
</div>
