<?php 
  
// Redirect browser 
//header("Location: https://www.msitprogram.net/webcounselling/"); 
  
//exit; 
?> 

<?php include('ma_config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("../google_analytical_header.php"); ?>
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
	<?php include("../google_analytical_body.php"); ?>
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<table border="0" width="80%" align="center">
					<tr>
						<td width="100%">
							<br/><br/><br/>
							<div id="login-box" class="login-box visible widget-box no-border" style="width:100%;">
								<div class="widget-body">
									<div class="widget-main">
										<div class="center">
											<a href="https://msitprogram.net/"><img src="logo.gif" /></a><img src="UniversityLogos.png" />
										</div>
										<h5 class="center header blue bigger" style="font-weight:bold;">
											<div class="space-4"></div>												
										</h5>						
										<div class="clearfix center">
											<table width="100%">
												<tr>
													<td align="center" width="60%">
														<img id="imagemain" src='msitprocess.png' />
													</td>

													<td align="center" width="40%">
														<!-- <img src='msit_welcome.png' /> -->

														<p><h2>Welcome</h2></p>
														<p><h2>MSIT ADMISSION <?php  echo YEARTEXT; ?></h2></p>
														<br/><br/>
<a href="login.php" style="text-decoration:none;" class="loginBtn">&nbsp;LOGIN</a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="register.php" style="text-decoration:none;" class="registerBtn">REGISTER</a>
			<br/><br/>

							<b>Download App</b>	<a href="https://play.google.com/store/apps/details?id=net.msitprogram.msitgat&hl=en"><img src="android-download.png" width="60%" ></a>
													</td>
												</tr>

											</table>
										</div>
										<div class="card-blockquote">
               <blockquote class="blockquote"> <a href="https://gat-cs-web.firebaseapp.com/" class="newslinks22"  target="_blank" >GAT Computational Problem Solving  Tutorial</a><img src="new_icon_red.gif" /> </blockquote>
            </div>
										<h5 class="center header blue bigger">
											<div class="space-4"></div>												
										</h5>
										<h6 class="center bigger">
											<i class="ace-icon fa fa-envelope bigger-120 red"></i> <?php echo EMAILTEXT; ?>
											&nbsp;&nbsp;|&nbsp;&nbsp;
											<i class="ace-icon fa fa-phone bigger-120 red"></i> <?php echo PHONETEXT.", ".MOBILETEXT; ?> 												
										</h6>
										<div class="space-4"></div>






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
