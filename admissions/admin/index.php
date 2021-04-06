<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../../assets/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/css/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../../assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="../../assets/css/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
				<table border="0" width="45%" align="center">
					<tr>
						<td width="100%">
							<br/><br/><br/><br/>

								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<img src="../logo.gif" />
												<i class="ace-icon fa fa-users green"></i>
												Admin Login
											</h4>
											<span style="font-weight:bold;color:red;"><?php echo $_GET['message']; ?></span>
										
											<div class="space-6"></div>

											<form  class="form-horizontal" id="login-form">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" id="email" name="email" placeholder="Email" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
															<input type="hidden" id="p" name="p"/>
														</span>
													</div>
												</div>
													<div class="error-block alert alert-danger hidden">
														<i class="icon-remove"></i>  <span class="message">  </span>
													</div> 
													<div class="space"></div>
													<div class="clearfix">
														<span id="login-loading" style="display:none;">
															<button disabled type="submit" class="width-35 pull-right btn btn-sm btn-primary">
																<i class="ace-icon fa fa-spinner fa-spin white bigger-125"></i>
																<span class="bigger-110">
																Login &nbsp; 
																</span>
															</button>
														</span>
														<button id="msloginbtn" type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>
													<div class="space-4"></div>
											</form>

											

											
											
										</div><!-- /.widget-main -->

										
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

				
				</td></tr></table>
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../../assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="../../assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<!--[if lte IE 8]>
		  <script src="../../assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="../../assets/js/jquery-ui.custom.js"></script>
		<script src="../../assets/js/jquery.ui.touch-punch.js"></script>
		<script src="../../assets/js/jquery.gritter.js"></script>
		<script src="../../assets/js/bootbox.js"></script>
		<script src="../../assets/js/jquery.easypiechart.js"></script>
		<script src="../../assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="../../assets/js/jquery.hotkeys.js"></script>
		<script src="../../assets/js/bootstrap-wysiwyg.js"></script>
		<script src="../../assets/js/select2.js"></script>
		<script src="../../assets/js/fuelux/fuelux.spinner.js"></script>
		<script src="../../assets/js/x-editable/bootstrap-editable.js"></script>
		<script src="../../assets/js/x-editable/ace-editable.js"></script>
		<script src="../../assets/js/jquery.maskedinput.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			
		</script>
		<script src="../../assets/js/jquery.validate.js"></script>

		<script src="js/sha512.js"></script>

		<script src="js/validation.js"></script>
	</body>
</html>
