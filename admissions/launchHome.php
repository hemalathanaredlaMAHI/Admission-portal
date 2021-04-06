<?php include('ma_config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
		<style type="text/css">
.registerBtn {
	-moz-box-shadow:inset 0px 39px 0px -24px #e67a73;
	-webkit-box-shadow:inset 0px 39px 0px -24px #e67a73;
	box-shadow:inset 0px 39px 0px -24px #e67a73;
	background-color:#e4685d;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #ffffff;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:8px 15px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.registerBtn:active {
	position:relative;
	top:1px;
}
.registerBtn:hover {
	color:black;
}

.loginBtn {
	-moz-box-shadow:inset 0px 39px 0px -24px #7fbd44;
	-webkit-box-shadow:inset 0px 39px 0px -24px #7fbd44;
	box-shadow:inset 0px 39px 0px -24px #7fbd44;
	background-color:#74b33a;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #268a16;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:8px 15px;
	text-decoration:none;
	text-shadow:0px 1px 0px #7ac732;
}
.loginBtn:active {
	position:relative;
	top:1px;
}
.loginBtn:hover {
	color:black;
}
		</style>
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
				<table border="0" width="60%" align="center">
					<tr>
						<td width="100%">
								<br/><br/><br/>
								<div id="login-box" class="login-box visible widget-box no-border" style="width:100%;">
									<div class="widget-body">
										<div class="widget-main">
											<div class="clearfix center">
													<table border="0" width="100%">
													<tr>
														<td align="center" width="100%">
															<br/><br/>
															<a href="launch.html" style="text-decoration:none;">
															<img src='launchimg.png' border="0" /></a>
															<br/><br/>
															
														</td>
													</tr>
															
														</table>
													</div>
												

											

											
											
										</div><!-- /.widget-main -->

										
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
					
						</td>
					</tr>
				</table>
					
					
				</div><!-- /.row -->
			</div><!-- /.main-content -->
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
		<script src="../assets/js/jquery.validate.js"></script>

		<script src="js/sha512.js"></script>

		<script src="js/validation.js"></script>
	</body>
</html>
