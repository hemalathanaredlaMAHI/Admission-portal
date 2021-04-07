<?php include('accesscheck.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS <?php echo YEARTEXT; ?></title>
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

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="hidden">
									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
																					<ul class="nav nav-list">
											<li class="hover">
												<a href="dashboardhome.php">
													<i class="menu-icon fa fa-home"></i>
													<span class="menu-text"> HOME </span>
												</a>

												<b class="arrow"></b>
											</li>
											<!-- <li class="hover">
												<a href="gatApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"> <b>GAT APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="walkinApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"><b>WALKIN APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li> -->
											<li class="hover active">
												<a href="paymentAdmissions.php">
													<i class="menu-icon fa fa-credit-card"></i>
													<span class="menu-text"> <b>PAY ONLINE FOR ADMISSIONS</b></span>
												</a>

												<b class="arrow"></b>
											</li>
										</ul><!-- /.nav-list -->
									</div><!-- .sidebar2 -->
								</div><!-- hidden -->
							</div><!-- /.col 12-->
						</div><!-- /.row -->
						
						<?php
							$flag = 0;
							if ($stmt = $mysqli->prepare("SELECT 
															applicationNo,testCenter, paymentType, paymentStatus,
															appType 
															from userApplications WHERE email = ?  ")) { 
								$stmt->bind_param('s', $_SESSION['email']); 
								$stmt->execute();
								$stmt->store_result();
								$stmt->bind_result($appno, $testcenter, $paymenttype,$paymentstatus,$appType); 
								while($stmt->fetch())
								{
									$flag = 1;
								}
							}								
						?>
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-sm-12">
										<?php if($flag==0) { 
												?>
												<div class="col-sm-6">
													<h3 class="header smaller lighter green">
														<i class="ace-icon fa fa-bullhorn"></i>
														Alerts
													</h3>
													<div class="alert alert-danger">
														<strong>
														<i class="ace-icon fa fa-times"></i>
														Oh!
														</strong>
														You have not applied any applications. Please apply now.
														<br />
													</div>
												</div>
											<?php } else {?>
										
					
					<div class="tabbable" id="paymentPageTab">
						<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
							<li id="myPaymentsli">
								<a data-toggle="tab" href="#myPaymentsAdmissions">My Payments</a>
							</li>
							<li id="payOnlineli">
								<a data-toggle="tab" href="#payOnlineAdmissions">Pay Online</a>
							</li>
							<!-- <li id="payDDli">
								<a data-toggle="tab" href="#payDD">Pay through DD</a>
							</li> -->
						</ul>
						<div class="tab-content">
							<div id="myPaymentsAdmissions" class="tab-pane">
							</div>
							<div id="payOnlineAdmissions" class="tab-pane">
							</div>
							<div id="payDDAdmissions" class="tab-pane">
							
								<?php 
		$dropdownText = "";
		$appcount = 1;
		if ($stmt = $mysqli->prepare("SELECT applicationNo from admissions_payments  
										WHERE email = ?  and paymentStatus='NO' ")) { 
			$stmt->bind_param('s', $_SESSION['email']); 
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($appno, $appType); 
			while($stmt->fetch())
			{
				$dropdownText = "<select name='payApplicationNo' id='payApplicationNo'>";
				$dropdownText = $dropdownText."<option value='gatappno'>GAT-".$appno."</option>";


			}
			$dropdownText = $dropdownText."</select>";
			
			$stmt->close();	
		}
		else
		{
			$appcount = 2;
			$stmt1 = $mysqli->prepare("SELECT phone_no from ma_users  WHERE email = ?  ") ;
			$stmt1->bind_param('s', $_SESSION['email']); 
			$stmt1->execute();
			$stmt1->store_result();
			$stmt1->bind_result($phone_no); 
			$phone_no=1234;
			while($stmt1->fetch())
			{
				$dropdownText = "<select name='payApplicationNo' id='payApplicationNo'>";
				$dropdownText = $dropdownText."<option value='gatappno'>GAT-".$phone_no."</option>";


			}
			$dropdownText = $dropdownText."</select>";
			
			$stmt1->close();	

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
			<!-- <form class="form-horizontal" id="dd-payment-form">
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
				</div> -->
				
				<!-- change by Ranjith -->
				<!-- <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="amount">
							Amount <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
					<div class="col-sm-3">
						<input class="input-large" type="text" id="amount" name="amount" placeholder="700.00" readonly />
					</div>
				</div> -->
				<!-- change by Ranjith -->
				
				<!-- <div class="form-group">
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
			</form> -->
			<?php } ?>
		</div>
	</div>
</div>

							
							</div>
						</div>
					</div>
										<?php	} ?>
								</div><!-- /.col -->
								</div><!-- /.row -->
								<script type="text/javascript">
									var $path_assets = "../assets";//this will be used in gritter alerts containing images
								</script>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
						<span class="blue bolder">MSIT Admissions</span>
							&copy; <?php echo YEARTEXT; ?>
						</span>
						
					</div>
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
		<!-- inline scripts related to this page -->
		<script type="text/javascript">

		function update_names(){	
			$( "#dd-payment-form .form-group input, select" ).each(function( index ) {
				if($(this).attr('name')==undefined)
				{
					$(this).attr('name',$(this).attr('id'));
					//console.log($(this).attr('name'));
				}
			
				
			});
		}

jQuery(function($)
{
	$(".loader").fadeOut("slow");
	var loadActiveTab = "#myPaymentsAdmissions";
	if(window.location.hash != "") {
		loadActiveTab = window.location.hash;
	}
	if(loadActiveTab!="#payDDAdmissions")
	{
		$(loadActiveTab).html('<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> Loading... Please Wait...');
		$(loadActiveTab).load(loadActiveTab.substring(1)+"Tab.php")			
	}
	$(loadActiveTab).addClass("in");
	$(loadActiveTab).addClass("active");
	$(loadActiveTab+"li").addClass("active");


    $('#myTab4 a').click(function (e) {
        e.preventDefault()
        var tabID = $(this).attr("href").substr(1);
		if(tabID!="payDDAdmissions")
			$("#" + tabID).html('<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> Loading... Please Wait...');
        $(this).tab('show');
		//if(tabID=="myapplications")
		//	$("#" + tabID).load("myApplicationsTab.php")
		//if(tabID=="payDD")
		//	$("#" + tabID).load("payDDTab.php")
		if(tabID=="payOnlineAdmissions")
			$("#" + tabID).load("payOnlineAdmissionsTab.php")
		if(tabID=="myPaymentsAdmissions")
			$("#" + tabID).load("myPaymentsAdmissionsTab.php")
    });

<?php if(isset($_GET['errorMsg'])) 
{?>
bootbox.hideAll();
bootbox.dialog({
		closeButton:false,
		message: "<span style='color:red;font-weight:bold;' align='center'><?php echo $_GET['errorMsg']; ?></span>", 
		buttons: {
			"success" : {
				"label" : "OK",
				"className" : "btn-sm btn-primary"
				}
			}
});					
<?php } ?>	

<?php if(isset($_GET['successMsg'])) 
{?>
bootbox.hideAll();
bootbox.dialog({
		closeButton:false,
		message: "<span style='color:green;font-weight:bold;' align='center'><?php echo $_GET['successMsg']; ?></span>", 
		buttons: {
			"success" : {
				"label" : "OK",
				"className" : "btn-sm btn-primary"
				}
			}
});					
<?php } ?>	

update_names();
$('#dd-payment-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		onClick:true,
		rules: {
			ddno:{
				required:true,
			},
			bankname:{
				required:true
			},
			bankbranch:{
				required:true
			},
			issuedate:{
				required:true
			},
			ddphoto:{
				required:true
			}			
		},

		messages: {
			ddno: {
				required: "Please enter your DD no"
			},
			bankname: {
				required: "Please enter bank name from where DD was issued."
			},
			bankbranch: {
				required: "Please enter branch name of the bank."
			},
			issuedate: {
				required: "Please enter date when DD was issued."
			},
			ddphoto: {
				required: "Please upload scanned copy of dd."
			}
		},

			
		highlight: function (e) {
			if($(e).hasClass('centres'))
			{
				console.log("wronf");
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
			
			//alert("dd");
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
			/*else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}*/
			else error.insertAfter(element.parent());
		},

		invalidHandler: function (event, validator) { //display error alert on form submit   
			//$('.alert-danger', $('.login-form')).show();
		},

		submitHandler: function (form) {
		
			var postData=$(form).serializeArray();
			$('form input,select,button').attr("disabled",true);
			$.ajax(
			{
				url : "authentication/dd_payment_process.php",
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR) 
				{
					bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									data +
									'</div></div>',
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}			
					});
					window.location.assign("payment.php");
					bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'Please Wait... ' +
									'</div></div>'
					});
				},
				beforeSend:function()
				{
					bootbox.hideAll();
					var box = bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'Please Wait... ' +
									'</div></div>'
					});
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					alert("Unable to save data due to network failure");
				}
			}).always(function(){
				$('form input,select,button').attr("disabled",false);
			}).done(function(){
				$('form .success-block').removeClass('hidden');
			});	
		},
				
				
				invalidHandler: function (form) {
					
				}
	});

	$("#dd-payment-form button[type='reset']").click(function(){
		console.log("resetting form");
		$("#dd-payment-form .help-block").remove();
		$("#dd-payment-form .has-error, .has-info").removeClass('has-error').removeClass('has-info');
		
	});


	$('#tabs > ul > li').click(function(event){
		$("form .help-block").remove();
		$("form .has-error, .has-info").removeClass('has-error').removeClass('has-info');
		$('form').reset();
	});
	



		
		
			$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				
			   $('#sidebar2').insertBefore('.page-content');
			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			   
			   

				
			
			
				$('a[ data-original-title]').tooltip();
			
				
				
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
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
