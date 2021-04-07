<?php include('accesscheck.php'); 

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS <?php  echo YEARTEXT; ?></title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="../assets/css/select2.css" />
		<link rel="stylesheet" href="../assets/css/datepicker.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-editable.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
	<link rel="stylesheet" href="common.css" />
	</head>

	<body class="no-skin">
	<div class="loader"></div>
				<?php include('validheader.php'); ?>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<!-- #section:settings.box -->
						<!-- /section:settings.box -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									

									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
																				<ul class="nav nav-list">
											<li class="hover">
												<a href="dashboardhome.php">
													<i class="menu-icon fa fa-home"></i>
													<span class="menu-text"> HOME </span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="gatApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"> <b>GAT APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover active">
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
				

<?php
		//New code added starts by RB on DEc 12,2017
		//If Walkin applications date starts
		$today = new DateTime();
		$gat_ends = new DateTime(WALKIN_END_DATE);
		$sysdifference  = date_diff($gat_ends,$today);
		$sysdaydiff = (int)$sysdifference->format("%r%a");


		if($sysdaydiff <=0){

		//New code added ends
			?>


	<!-- WALKIN MODEL START -->
	<div id="modal-walkin-form" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" id="walkin-exam-form">
					<div class="modal-body">
						<h4 class="header blue bolder smaller">Apply for WALK-IN</h4>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right">
								Test Center <sup> <i class="icon-asterisk"></i> </sup> :
								<br/><!--(Select Test Center for Walkin Process)-->
							</label>
							<div class="col-sm-8">
<!--Edited to conduct walk-in Exam From-->

<input  type="radio" name="center"   id="center1" value="center1" class="ace" checked/>
								<span class="lbl"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  Online,<br>
								   &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;Contact:7799834586<br></span>
								
								<br/>
								<br/>







<!--
								<input  type="radio" name="center"   id="center1" value="center1" class="ace" checked/>
								<span class="lbl"> &nbsp; &nbsp; Eduquity Career Technologies PVT LTD,<br>
								&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;CHANDRAYAAN 2nd Floor, Building No 6-1-116/19,<br>
								&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Street 13 Padmarao Nagar(Parsigutta Road),<br>
								&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Secunderabad, Hyderabad-5000 025(Telangana)<br>
								&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Phone:040-23243010<br></span>
								&nbsp; &nbsp; &nbsp;
								<br/>
								<br/>
								
								

								 <input  type="radio" name="center"   id="center2" value="center2" class="ace"/>
								<span class="lbl"> &nbsp; &nbsp; &nbsp;MSIT Learning Center,<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;University College of Engineering(Autonomous),<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Principal Building Block, JNTUK,<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kakinada - 533003<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Phone: 7799834586 <br/></span> 
								<br/>
								<br/>
								<input  type="radio" name="center"   id="center3" value="center3" class="ace"/>
								<span class="lbl"> &nbsp; &nbsp; &nbsp;Directorate of University Industry Interaction Centre ,<br/>
								&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;(UIIC)<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Jawaharlal Nehru Technological University Hyderabad,<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								Ground Floor,Computer Lab, Admissions Block,<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Hyderabad - 500085, Telangana, India.<br/>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Phone: 7799834586 <br/></span>-->
							</div>
						</div>
						<br/>
						<br/>
						<div class="error-block alert alert-danger hidden">
							<i class="icon-remove"></i> <span class="message">  </span>
						</div> 
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancel
						</button>
						<button class="btn btn-sm btn-primary" type="button" id="walkbtn">
							<i class="ace-icon fa fa-check"></i>
							Apply
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- WALKIN MODEL START -->		


	<!-- WALKIN MODEL START -->
	<div id="modal-score-form" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-body">
						<h4 class="header blue bolder smaller">Score Details</h4>
						<div id='scoreDetailsDiv'>Loading...</div>
						
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Close
						</button>
					</div>
			</div>
		</div>
	</div>
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
													<span id="warningApplyBtn" style="display:none;"><strong>Alert: You have already applied.</strong></span>
													<a href="#modal-walkin-form" id= "applyLinkBtn" data-backdrop='static' data-keyboard='false' role="button" class="btn btn-round btn-yellow btn-sm" data-toggle="modal">
													<strong>CLICK HERE TO APPLY FOR WALK-IN</strong>
													</a>
													<br/><br/><strong><?php echo $_SESSION['username'];?>, </strong>
														walk-in entrance test can be taken <b>only one time</b>, but you can take<b> GAT Regular one time</b> &nbsp;&nbsp;
														
														
														
													<br/><!--
													<strong><u>Exam Dates & Test Centers</u></strong>
													<br/>
													<strong>Hyderabad & Kakinada: </strong> <?php  echo WALKIN_START; ?> to <?php  echo WALKIN_END; ?> on Thursday and Friday every week
													<br/>
													**Candidates can take exam on any Thursday and Friday  every week from <?php  echo WALKIN_START." to ".WALKIN_END  ?>-->
													<!--." ".DATES_INCLUDETEXT;-->
													<br/>
													**Please Book your slot after you pay the fee. <strong>(if you pay the fee, link will be visible under Date&Slot column in the below table) </strong>
												</div>

												<!--<div class="col-xs-1"></div>
												<div class="col-xs-10">
													<div class="table-header" align="center">
														WALK_IN Exam Dates
													</div>
													<table id="sample-table-2" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
													<thead>
														<tr>
															<td align='center'><b>Date</b></td>
															<td align='center'><b>Centers</b></td>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Feb 24th 2016 & Feb 25th 2016</td>
															<td>Hyderabad</td>
														</tr>
														<tr>
															<td>Mar 09th 2016 & Mar 10th 2016</td>
															<td>Hyderabad</td>
														</tr>
														<tr>
															<td>Apr 14th 2016 to May 21st 2016<br/><br/>	
on any Thursday, Friday, Saturday and Sunday every week from 14th April 2016 to 21st May 2016 including May 16, 17, 18.</td>
															<td>Hyderabad & Kakinada</td>
														</tr>
													</tbody>
													</table>
												</div>
												<div class="col-xs-1"></div> -->
												<div class="clearfix"></div>
												
											<?php
												$flag = 0;
												if ($stmt = $mysqli->prepare("SELECT 
																				u.applicationNo, u.testCenter, u.slotdate, u.slotNo,
																				u.paymentType, u.paymentStatus, u.testTaken
																				from userApplications u WHERE u.email = ? and u.appType='WALKIN' order by u.applicationNo")) { 
													$stmt->bind_param('s', $_SESSION['email']); 
													$stmt->execute();
													$stmt->store_result();
													$stmt->bind_result($appno, $testcenter,$slotdate, $slotno, $paymenttype,$paymentstatus, $testtaken); 
													$totalWalkinApps = 0;
													while($stmt->fetch())
													{
														$today = date("Y-m-d");
														$totalWalkinApps = $totalWalkinApps + 1;
														if($flag==0)
														{
																echo '<div class="col-xs-1"></div>
																					<div class="col-xs-10"><div class="table-header" align="center">
																							Your WALK-IN Application Details
																							
																					</div>
																		<table id="sample-table-1" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">';
																echo "<thead>
																	<tr>
																		<th>Application No</th>
																		<th>Test Center</th>
																		<th>Payment Details</th>
																		<th>Date & Slot</th>
																		<th>Score</th>
																	</tr>
																</thead>
																<tbody>";
														}	
														$flag=1;
														echo "<tr>";
														echo "<td>".$appno."</td>";
														echo "<td>".$testcenter."</td>";
														if($paymentstatus=="yes")
														{
															echo "<td> Success with ".$paymenttype." Payment"."</td>";
														}
														else
														{
																echo "<td>"."Payment Pending"."</td>";
														}
														if($slotno==1)
														{
															echo "<td>".$slotdate." - 10:00 A.M."."</td>";
														}
														elseif($slotno==2)
														{
															echo "<td>".$slotdate." - 2:00 P.M."."</td>";
														}
														elseif($slotno==0 && $paymentstatus=="yes")
														{
															echo "<td>"."<a href='slotbooking.php'><b><font color='red'>Book your Slot</font></b></a>"."</td>";
														}
														elseif($slotno==0 && $paymentstatus=="no")
														{
															echo "<td>"."Payment Pending"."</td>";
														}
														else 
														{
															echo "<td>"."Payment Pending"."</td>";
														}
														if($paymentstatus=="no" || $slotdate==NULL || $slotdate=="" || $today<$slotdate)
														{
															echo "<td>"."Exam Not Taken"."</td>";
														}
														else
														{
																echo "<td><a href='https://online.cbexams.com/MSITOnlineScorecard/Scorecard.aspx' class='scoreBtn' shallticketno='".$appno."' >open in a new tab to Get  Score Details</a></td>";
														}
														echo "</tr>";
													}
													if($totalWalkinApps>=1)
													{
														echo "<script>
																		document.getElementById('applyLinkBtn').style.display = 'none';
																		document.getElementById('warningApplyBtn').style.display = 'block';
															</script>";
													}
													$stmt->close();
													}
													if($flag==0)
													{
														echo '<div class="col-xs-12" align="center">';
														echo "<br/><br/><span style='color:red;'>You have not applied for walkin. Please Apply.</span>";
														echo '</div>';
														
													}
													else
													{
														echo "</tbody></table></div>";
													}
															?>
												
											<h5>&nbsp;</h5>
										  </div>
												<!-- /.table-responsive -->
																			
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
													<strong>YOU CAN NOT APPLY NOW. LAST DATE TO APPLY WALKIN EXAM IS  <?php echo date("M j, Y", strtotime(WALKIN_END_DATE));?>.</strong>
														
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
							&copy; <?php  echo YEARTEXT; ?>
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
	jQuery(function($) {
		<?php if(isset($_GET['successMsg']))
			{ 
		?>
			bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<?php echo $_GET['successMsg']; ?>' +
									'</div></div>',
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}			
					});
			
		<?php }?>
		
			$(".loader").fadeOut("slow");
				$('#sidebar2').insertBefore('.page-content');			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
				$('a[ data-original-title]').tooltip();
			
			$('.scoreBtn').click(function(event) { 
				var shallticketno = "161W00039";
				var semailid = "leelakishoregoriparthi@gmail.com";
				
				event.preventDefault();
				var newForm = jQuery('<form>', {
										'action': 'http://122.181.157.2/MSITScoreCard2016/process.aspx',
										'target': '_blank',
										'method': 'POST'
										}).append(
												jQuery('<input>', {
													'name': 'hallticketno',
													'value': shallticketno,
												}),
												jQuery('<input>', {
													'name': 'emailid',
													'value': semailid,
												})
											);
				newForm.submit();
			});
			
		    $('#walkbtn').click(function() {
				var postData=$('#walkin-exam-form').serializeArray();
				$('#walkin-exam-form input,select,button').attr("disabled",true);
				bootbox.hideAll();
					bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'WALKIN Application is in Progress. Please Wait... ' +
									'</div></div>'
					});
				$.ajax(
				{
					url : "authentication/walkin_exam_details_update.php",
					type: "POST",
					data : postData,
					success:function(data, textStatus, jqXHR) 
					{
						bootbox.hideAll();
						if(data.indexOf("ERROR") > -1)
						{
							bootbox.dialog({
								closeButton:false,
								message: data, 
								buttons: {
									"Close" : {
										"label" : "Close",
										"className" : "btn-sm btn-danger",
										callback: function()
										{
											$('#modal-walkin-form').modal('hide');
											bootbox.hideAll();
										}
									}
								}
							});
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
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						bootbox.dialog({
							message: "Unable to save data due to network failure", 
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary"
								}
							}
						});
					}
				}).always(function(){
						$('#walkin-exam-form input,select,button').attr("disabled",false);	
				});			
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
