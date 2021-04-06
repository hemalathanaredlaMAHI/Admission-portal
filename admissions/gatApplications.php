<?php include('accesscheck.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS <?php  echo YEARTEXT; ?></title>
		<meta name="description" content="MSIT ADMISSIONS 2016" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="../assets/css/select2.css" />
		<link rel="stylesheet" href="../assets/css/datepicker.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-editable.css" />
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->
		<script src="../assets/js/ace-extra.js"></script>
		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="common.css" />		
	</head>
	<body class="no-skin">
	<div class="loader"></div>
	<?php include('validheader.php'); ?>
	
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
																				<ul class="nav nav-list">
											<li class="hover">
												<a href="dashboardhome.php">
													<i class="menu-icon fa fa-home"></i>
													<span class="menu-text"> HOME </span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover active">
												<a href="gatApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"> <b>GAT APPLICATION</b></span>
													<!--<span class="menu-text"> <b>SPOT ADMISSIONS</b></span>-->
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="walkinApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"><b>WALKIN APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="payment.php">
													<i class="menu-icon fa fa-credit-card"></i>
													<span class="menu-text"> <b>PAY ONLINE</b></span>
												</a>

												<b class="arrow"></b>
											</li>
										</ul><!-- /.nav-list -->

									</div><!-- .sidebar -->
							</div><!-- /.col -->
						</div><!-- /.row -->
				
<!-- Table bulding to display apps -->

					<?php
					//New code added starts by RB on DEc 12,2017
						//If GAT applications date starts
						$today = new DateTime();
						$gat_ends = new DateTime(GAT_END);
						$sysdifference  = date_diff($gat_ends,$today);
						$sysdaydiff = (int)$sysdifference->format("%r%a");
			
						if($sysdaydiff <=0){
			
						//New code added ends	

												$flag = 0;
												$tableCodeText = "";
												if ($stmt = $mysqli->prepare("SELECT 
																				applicationNo,testCenter, paymentType, paymentStatus,
																				appType, greAnalytical, greScore, toeflScore, ieltsScore
																				from userApplications WHERE email = ? and appType in ('GAT','GRE') ")) { 
													$stmt->bind_param('s', $_SESSION['email']); 
													$stmt->execute();
													$stmt->store_result();
													$stmt->bind_result($appno, $testcenter, $paymenttype, $paymentstatus, $appType, $greAnalytical, $greScore, $toeflScore, $ieltsScore); 
													while($stmt->fetch())
													{
														if($flag==0)
														{
																$tableCodeText = $tableCodeText. '<div class="col-xs-1"></div>
																					<div class="col-xs-10">
																					<div class="table-header" align="center">
																							Your GAT Application Details
																							
																					</div>										
																		<table id="sample-table-1" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">';
																$tableCodeText = $tableCodeText. "<thead>
																	<tr>
																		<th>Application No</th>
																		<th>Test Center</th>
																		<th>Payment Details</th>
																		<th>Exam Type</th>
																		<th>Other Details</th>
																	</tr>
																</thead>
																<tbody>";
														}	
														$flag=1;
														$tableCodeText = $tableCodeText. "<tr>";
														$tableCodeText = $tableCodeText. "<td>".$appno."</td>";
														$tableCodeText = $tableCodeText. "<td>".$testcenter."</td>";
														if($paymentstatus=="yes")
														{
															$tableCodeText = $tableCodeText. "<td>".$paymenttype." payment"."</td>";
														}
														else
														{
																$tableCodeText = $tableCodeText. "<td>"."Payment Pending"."</td>";
														}
														$tableCodeText = $tableCodeText. "<td>".$appType."</td>";
														/*$tableCodeText = $tableCodeText. "<td>GRE Analytical: ".$greAnalytical."<br/>GRE Score: ".$greScore."<br/>
																		TOEFL Score: ".$toeflScore."<br/>IELTS Score: ".$ieltsScore."</td>";*/
														$tableCodeText = $tableCodeText. "<td>GRE Analytical: ".$greAnalytical."<br/>GRE Score: ".$greScore."</td>";
														$tableCodeText = $tableCodeText. "</tr>";
													}
													$stmt->close();
													}
													if($flag==0)
													{
														$tableCodeText = $tableCodeText. "<span style='color:red;'>You have not applied for GAT Exam. Please Apply.</span>";
													}
													else
													{
														$tableCodeText = $tableCodeText. "<tr><td colspan='5' align='center'>
														<a href='#modal-form' data-backdrop='static' data-keyboard='false' role='button' class='btn btn-round btn-yellow btn-sm' data-toggle='modal'>
															<strong>
															CLICK HERE TO EDIT YOUR APPLICATION
															</strong>
														</a>
														</td></tr>";
														$tableCodeText = $tableCodeText. "</tbody></table></div>";
													}
												?>

	<!-- GAT MODEL START -->
	<div id="modal-form" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<form class="form-horizontal" id="gat-exam-form">
						<input type="radio" hidden name="course" checked id="two" value="2" class="ace" />
						<input type="text" hidden name="action" id="action" value="<?php if($flag==0) echo "INSERT"; else echo "UPDATE";?>" />
							<div class="row">
								<?php if($flag!=0) { ?>
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="toefl">
											Application Number:
									</label>
									<div class="col-sm-8">
										<input value="<?php echo $appno; ?>" class="width-80 input-large" disabled type="text" id="gatAppNoEdit" name="gatAppNoEdit" />
									</div>
								</div>
								<?php } ?>
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="centre1">
										Test Centre<?php echo $testCenter; ?> <sup> <i class="icon-asterisk"></i> </sup> :
									</label>
									<div class="col-sm-8">
										<?php
										if ($stmt = $mysqli->prepare("SELECT id,center FROM gatCenters")) 
										{ 
											$stmt->execute();
											$stmt->store_result();
											$stmt->bind_result($id, $centerName); 
											$testcenterlist = "<select class='width-80 chosen-select centres' id='centre1' name='centre1' data-placeholder='Preference 1'><option value=''>  Center</option>";
											while($stmt->fetch())
											{
												if($centerName==$testcenter)
													$testcenterlist = $testcenterlist."<option selected value='".$id."'>".$centerName."</option>";
												else
													$testcenterlist = $testcenterlist."<option value='".$id."'>".$centerName."</option>";
											}	
											$stmt->close();
											$testcenterlist = $testcenterlist."</select>";
										}
										echo $testcenterlist;
										?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label no-padding-right">
									Admission Type <sup> <i class="icon-asterisk"></i> </sup> :
								</label>
								<div class="col-sm-8">
									<label class="inline">
										<input type="radio" name="exam" id="GAT" value="GAT" <?php if($flag!=0 && $appType=='GAT') echo "checked"; ?> class="ace" />
										<span class="lbl"> GAT </span>
									</label>
									&nbsp; &nbsp; 
									<label class="inline">
										<input  type="radio" name="exam" id="GRE" value="GRE" <?php if($flag!=0 && $appType=='GRE') echo "checked"; ?> class="ace" />
										<span class="lbl"> GRE</span>
									</label>
									&nbsp; &nbsp;
									(Select GRE if you have valid scores)
								</div>
							</div>
							<span id="greapplicants">
								<h4 class="header blue smaller"> GRE Applicants (<sup> <i class="icon-asterisk"></i> </sup>for GRE Applicants) </h4>
								<div class="vspace-xs"></div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="greQuant">
											Quant + Verbal <sup> <i class="icon-asterisk"></i> </sup>:
									</label>
									<div class="col-sm-3">
										<input value="<?php if($flag!=0) echo $greScore; ?>" class="input-large gre-input" type="number" id="greScore" name="greScore" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="greAnalytical">
											Analytical <sup> <i class="icon-asterisk"></i> </sup>:
									</label>
									<div class="col-sm-3">
										<input value="<?php if($flag!=0) echo $greAnalytical; ?>" class="input-large gre-input" type="number" id="greAnalytical" name="greAnalytical" />
									</div>
								</div>
							</span>
							<!-- <h4 class="header blue smaller"> TOEFL (optional) </h4>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="toefl">
										TOEFL score:
								</label>
								<div class="col-sm-3">
									<input value="<?php if($flag!=0) echo $toeflScore; ?>"class="input-large" type="number" id="toefl" name="toefl" />
								</div>
								<label class="col-sm-3 control-label no-padding-right" for="toefl">
										IELTS score:
								</label>
								<div class="col-sm-3">
									<input value="<?php if($flag!=0) echo $ieltsScore; ?>" class="input-large" type="number" id="ielts" name="ielts" />
								</div>
							</div> -->
							<div class="warning-block alert alert-warning hidden">
									<center> <strong> Saving Data Please Wait...</strong> </center>
							</div>
							<div class="success-block alert alert-success hidden">
									<center> <strong> Your exam details has been successfully saved </strong> </center>
							</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Cancel
					</button>
					<button class="btn btn-sm btn-primary" type="submit" id="gatapplybtn">
						<i class="ace-icon fa fa-check"></i>
						APPLY
					</button>
				</div>
				</form>											
			</div>
		</div>
	</div><!-- PAGE CONTENT ENDS -->
			
	<!-- WALKIN MODEL START -->		
			


												
			
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
			
									
							<div id="mywalkinapplications" class="tab-pane in active">
									<div class="widget-box">	
									<div class="widget-body">
										<div class="widget-main">
											
												<div class="table-responsive">
												
												<div class="alert alert-warning">
													<strong>GAT </strong>
														is the regular entrance test will be conducted for admission into MSIT.
														<br/>
														<strong>Entrance Test Waived </strong> for the candidates with GRE scores above <?php echo GRE_SCORE?> or equivalent old scores also considered.(GRE should have been taken after <?php echo GRE_YEAR?>). 

														<!--<strong>Spot admissions </strong>
														are for allotment of vacant seats in the MSIT program in the universities
														<br/>
														Jawaharlal Nehru Technological University Hyderabad/ Kakinada/ Anantapur/ SV University Tirupati.
														<br/>
														<strong>The available seats are JNTUH-53, JNTUK- 50, JNTUA-50, SVU - 50 only.

                                                          -->



														<?php 
														if($flag==0)
														{ ?>
															<br/><br/>
														<a href="#modal-form" data-backdrop='static' data-keyboard='false' role="button" class="btn btn-round btn-yellow btn-sm" data-toggle="modal">
															<strong>
															<!--CLICK HERE TO APPLY FOR SPOT ADMISSION-->
															CLICK HERE TO APPLY FOR GAT
															</strong>
														</a>
														<?php } ?>
												</div>

												<?php echo $tableCodeText; ?>
										
												
											
										  </div>
												<!-- /.table-responsive -->
											<br/><br/>								
										</div>
									</div>
								</div>
							
							
							<?php }
							//New code added starts by RB on DEc 12,2017
							//If GAT applications date expires
								else{
								?>
								<div id="mywalkinapplications" class="tab-pane in active">
									<div class="widget-box">	
									<div class="widget-body">
										<div class="widget-main">
											
												<div class="table-responsive">
												
												<div class="alert alert-warning">
													<strong>YOU CAN NOT APPLY NOW. LAST DATE TO APPLY GAT EXAM IS  <?php echo date("M j, Y", strtotime(GAT_END));?>.</strong>
														
												</div>

												
										
												
											
										  </div>
												<!-- /.table-responsive -->
											<br/><br/>								
										</div>
									</div>
								</div>
						
							<?php }

							//New code added ends
							?>
								
						

							</div>

								
								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						
						
						
			
					
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">MSIT Admissions</span>
							&copy; <?php echo YEARTEXT; ?>
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="../assets/js/jquery-ui.custom.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.js"></script>
		<script src="../assets/js/jquery.gritter.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/jquery.easypiechart.js"></script>
		<script src="../assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="../assets/js/jquery.hotkeys.js"></script>
		<script src="../assets/js/bootstrap-wysiwyg.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/fuelux/fuelux.spinner.js"></script>
		<script src="../assets/js/x-editable/bootstrap-editable.js"></script>
		<script src="../assets/js/x-editable/ace-editable.js"></script>
		<script src="../assets/js/jquery.maskedinput.js"></script>


		<!-- ace scripts -->
		<script src="../assets/js/ace/elements.scroller.js"></script>
		<script src="../assets/js/ace/elements.colorpicker.js"></script>
		<script src="../assets/js/ace/elements.fileinput.js"></script>
		<script src="../assets/js/ace/elements.typeahead.js"></script>
		<script src="../assets/js/ace/elements.wysiwyg.js"></script>
		<script src="../assets/js/ace/elements.spinner.js"></script>
		<script src="../assets/js/ace/elements.treeview.js"></script>
		<script src="../assets/js/ace/elements.wizard.js"></script>
		<script src="../assets/js/ace/elements.aside.js"></script>
		<script src="../assets/js/ace/ace.js"></script>
		<script src="../assets/js/ace/ace.ajax-content.js"></script>
		<script src="../assets/js/ace/ace.touch-drag.js"></script>
		<script src="../assets/js/ace/ace.sidebar.js"></script>
		<script src="../assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="../assets/js/ace/ace.submenu-hover.js"></script>
		<script src="../assets/js/ace/ace.widget-box.js"></script>
		<script src="../assets/js/ace/ace.settings.js"></script>
		<script src="../assets/js/ace/ace.settings-rtl.js"></script>
		<script src="../assets/js/ace/ace.settings-skin.js"></script>
		<script src="../assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="../assets/js/ace/ace.searchbox-autocomplete.js"></script>

		<script type="text/javascript">


		<!-- inline scripts related to this page -->
function  grevalidation(){
	
	if($("#gat-exam-form input[name='exam']:checked").val()=="GAT" )
	{
		$("#gat-exam-form .gre-input").attr('disabled',true);
		checked=false;
		$('#greapplicants').hide();
	}
	else if($("#gat-exam-form input[name='exam']:checked").val()=="GRE" )
	{
		$("#gat-exam-form .gre-input").attr('disabled',false);
		checked=true;
		$('#greapplicants').show();
	}
	else
	{
		$("#gat-exam-form .gre-input").attr('disabled',true);
		checked=false;
		$('#greapplicants').hide();
	}
}


	jQuery(function($) 
	{
		$(".loader").fadeOut("slow");
		$('#sidebar2').insertBefore('.page-content');			   
		$('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
		$('a[ data-original-title]').tooltip();
		
		jQuery.validator.addMethod("grescore", function (value, element) {

					if(checked&&value=="")	

						return false;

					else if(checked&&value<301) 

						return false;	

					else return true;

		}, "You should have atleast 301");
		jQuery.validator.addMethod("gre", function (value, element) {

					if(checked&&value=="")	

						return false;

					else if(checked&&value<3.5 || value>6) 

						return false;	

					else return true;

		}, "You should have atleast 3.5");

	grevalidation();
		$("#gat-exam-form input[name='exam']").change(function(){
			grevalidation();		
		});

		$('#gat-exam-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			onkeyup:false,
			rules: {
				centre1:{
					required:true
				},
				greAnalytical:{
					gre:'required'
				},
				greScore:{
					grescore:'required'
				}

			},
			messages: {
				centre1: {
					required: "Please select your first preference."
				}
			},
			highlight: function (e) {
				if($(e).hasClass('centres'))
				{
					console.log("Error");
					$(e).closest('.col-sm-3').removeClass('has-info').addClass('has-error');
				}
				else $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
			success: function (l,e) {
				if($(e).hasClass('centres'))
				{
					$(e).closest('.col-sm-3').removeClass('has-error').addClass('has-info');
				}
				else $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
				$(l).remove();
			},
			errorPlacement: function (error, element) {
				if(element.is(':checkbox') || element.is(':radio')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},



			invalidHandler: function (event, validator) { //display error alert on form submit   

				//$('.alert-danger', $('.login-form')).show();

			},
			submitHandler: function (form) {
				var postData=$(form).serializeArray();
					$('#modal-form').hide();
					bootbox.hideAll();
					bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<br/><br/><i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'GAT Application is in Progress. Please Wait... ' +
									'<br/><br/></div></div>'
					});
				$('form .status-block').removeClass('hidden');
				$('form input,select,button').attr("disabled",true);
				$.ajax(
				{
					url : "authentication/exam_details_update_process.php",

					type: "POST",

					data : postData,

					success:function(data, textStatus, jqXHR) 
					{
						bootbox.hideAll();
						if(data=="FAILED")
						{
							bootbox.dialog({
								closeButton:false,
								message: "Not able to submit the application.<br/>Please Call us once to help yoou.", 
								buttons: {
									"success" : {
										"label" : "OKAY",
										"className" : "btn-sm btn-danger",
										callback: function()
										{
											bootbox.dialog({
												closeButton: false,
												message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
											});
											location.reload(true);
										}
									}
								}
							});
						}
						else if(data.indexOf("UPDATE") > -1)
						{
							var resultAry = data.split(',');
							if(resultAry[3]=='ONLINE')
							{
								bootbox.dialog({
								closeButton:false,
								message: "Application No: "+resultAry[1]+" has been updated successfully.", 
								buttons: {
									"success" : {
										"label" : "OKAY",
										"className" : "btn-sm btn-success",
										callback: function()
										{
											bootbox.dialog({
												closeButton: false,
												message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
											});
											location.reload(true);
										}
									}
								}
								});
							}
							else if(resultAry[2]=='no')
							{
								bootbox.dialog({
									closeButton:false,
									message: "Application No: "+resultAry[1]+" has been updated successfully.<br/>Please pay the exam fee.", 
									buttons: {
										"payOnline" : {
											"label" : "PAY ONLINE",
											"className" : "btn-sm btn-success",
											callback: function()
											{
												bootbox.dialog({
													closeButton: false,
													message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
												});
												window.location.href = "payment.php#payOnline";
											}
										}
										/*
										//DD payment is closed after 2017 admissions ...update by RB Jan2,2018
										"payDD" : {
											"label" : "PAY WITH DD",
											"className" : "btn-sm btn-success",
											callback: function()
											{
												bootbox.dialog({
													closeButton: false,
													message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
												});
												window.location.href = "payment.php#payDD";
											}
										},
										"success" : {
											"label" : "PAY LATER",
											"className" : "btn-sm btn-danger",
											callback: function()
											{
												bootbox.dialog({
													closeButton: false,
													message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
												}); 
												location.reload(true);
											}
										} */
									}
								});
							}
							else
							{
								bootbox.dialog({
									closeButton:false,
									message: "Application No: "+resultAry[1]+" has been updated successfully.<br/>You have made the payment thorugh DD.<br/>If you didn't send the DD, you can still make the payment online.", 
									buttons: {
										"payOnline" : {
											"label" : "PAY ONLINE",
											"className" : "btn-sm btn-success",
											callback: function()
											{
												bootbox.dialog({
													closeButton: false,
													message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
												});
												window.location.href = "payment.php#payOnline";
												
											}
										},
										"success" : {
											"label" : "CLOSE",
											"className" : "btn-sm btn-danger",
											callback: function()
											{
												bootbox.dialog({
													closeButton: false,
													message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
												});
												location.reload(true);
											}
										}
									}
								});
							}
						}
						else
						{
							bootbox.dialog({
								closeButton:false,
								message: data, 
								buttons: {
									"payOnline" : {
										"label" : "PAY ONLINE",
										"className" : "btn-sm btn-success",
										callback: function()
										{
											//alert("dsfsd");
											bootbox.dialog({
													closeButton: false,
													message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
												});
												window.location.href = "payment.php#payOnline";
											
										}
									},
									//DD payment is closed after 2017 admissions ...update by RB Jan2,2018
									/*"payDD" : {
										"label" : "PAY WITH DD",
										"className" : "btn-sm btn-success",
										callback: function()
										{
												bootbox.dialog({
													closeButton: false,
													message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
												});
												window.location.href = "payment.php#payDD";
											
										}
									},*/
									"success" : {
										"label" : "PAY LATER",
										"className" : "btn-sm btn-danger",
										callback: function()
										{
											bootbox.dialog({
												closeButton: false,
												message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
											});
											location.reload(true);
										}
									}
								}
							});
						}
						
					},

					error: function(jqXHR, textStatus, errorThrown) 
					{
						bootbox.hideAll();
		bootbox.dialog({
		message: "Unable to save data due to network failure" + textStatus, 
		buttons: {
			"success" : {

				"label" : "OK",

				"className" : "btn-sm btn-primary"
			}
		}
	});
					}

				}).always(function(){

						grevalidation();

						$('form input,select,button').attr("disabled",false);
				}).done(function(){

						$('form .status-block').addClass('hidden');

						$('form .success-block').removeClass('hidden');

				});

			}

			

		});


			   })
		</script>
		

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="../assets/css/ace.onpage-help.css" />
	<!--	<link rel="stylesheet" href="../docs/assets/js/themes/sunburst.css" /> -->

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="../assets/js/ace/elements.onpage-help.js"></script>
		<script src="../assets/js/ace/ace.onpage-help.js"></script>
<!--		<script src="../docs/assets/js/rainbow.js"></script>
		<script src="../docs/assets/js/language/generic.js"></script>
		<script src="../docs/assets/js/language/html.js"></script>
		<script src="../docs/assets/js/language/css.js"></script>
		<script src="../docs/assets/js/language/javascript.js"></script>
	-->	<script src="../assets/js/jquery.validate.js"></script>
	</body>
</html>
