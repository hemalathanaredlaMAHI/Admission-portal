<?php 
	include 'authentication/securelogin_functions.php';
	sec_session_start();
	include("db_connect.php");
	include("accesscheck.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>User Profile Page - Ace Admin</title>

		<meta name="description" content="3 styles with inline editable feature" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="css/widget.css" />
		
		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />

		<!-- fonts -->

		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="css/widget.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		
			<?php include("ma_header.php"); ?>
		
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<?php include("ma_sidebar.php"); ?>



				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Personal Details</a>
							</li>
							
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<div id="user-profile-1" class="row">
									<div class="widget-box">	
										<div class="widget-body">
											<div class="widget-main">
												<form class="form-horizontal" id="details-form">
													<!--<div class="profile-edit-tab-content">-->
														<!--<div id="edit-basic" >-->
															<h4 class="header blue bolder smaller">General</h4>

															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="fullname">
																		Email of Applicant:  <sup> <i class="icon-asterisk"></i> </sup>:
																</label>

																<div class="col-sm-3">
																	<input class="input-large" type="text" id="email"  name="email"/>
																</div>
															</div>
															
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="fullname">
																		Application ID:  <sup> <i class="icon-asterisk"></i> </sup>:
																</label>

																<div class="col-sm-9">
																	<input class="input-large" type="text" id="appID"  name="appID"/>
																	<button type="button" class="btn btn-info" onclick="get_ApplicationId()">Check ID</button>
																	<p id="application_Number"></p>
																</div>
																
															</div>
																
													<div class="warning-block alert alert-warning hidden">
															<center> <strong> Saving Data Please Wait...</strong> </center>
													</div>
													
													<div class="success-block alert alert-success hidden">
															<center> <strong> Your Personal Details has been successfully saved </strong> </center>
													</div>
													
													<div class="error-block alert alert-danger hidden">
															<i class="icon-remove"></i>  <span class="message">  </span>
														</div>
												

													<div class="clearfix form-actions">
														<div class="col-md-offset-3 col-md-9">
															<button class="btn btn-info" type="submit">
																<i class="icon-ok bigger-110"></i>
																Save
															</button>

															&nbsp; &nbsp;
															<button class="btn" type="reset">
																<i class="icon-undo bigger-110"></i>
																Reset
															</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div><!-- /user-profile -->
								

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						
						
						
						
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

			
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>
		
		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<!-- inline scripts related to this page -->
		
		
		
		<script type="text/javascript">
			jQuery(function($) {
				$(".chosen-select").chosen(); 
				$('#user-profile-1')
				.find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-1 input[type=file]').ace_file_input('reset_input');
					
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					console.log("date picked");
					$(this).prev().focus();
				})
			
			});
		</script>
		<script src="js/ma_details.js"></script>
	</body>
</html>
