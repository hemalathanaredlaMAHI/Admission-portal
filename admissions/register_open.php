<?php
session_start();
unset($_SESSION);
$_SESSION = array();
include("captcha/simple-php-captcha.php");
//$_SESSION['captcha'] = simple_php_captcha();
$_SESSION['captcha'] = simple_php_captcha( array(
	'min_length' => 4,
	'max_length' => 4,
	'min_font_size' => 13,
	'max_font_size' => 20,
	'color' => '#666'
));
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS 2017</title>

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

		<!-- Update on Feb 1,2018 by RB -->
		<script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<table border="0" width="45%" align="center">
					<tr>
						<td width="100%">
							<br/><br/><br/>
							<div>
								<div id="signup-box" class="signup-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
									
										<h4 class="header green lighter bigger">
											<img src="logo.gif" />
											<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											
											<form class="form-horizontal" id="registration-form"> 
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="name"> Name: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input title="Please enter your Name" type="text" name="name" id="name" class="form-control" placeholder="Name of the Applicant" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="email"> Email: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input title="Please enter your email" type="email" name="email" id="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="password"> Password: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input title="Please enter password" type="password" name="password" id="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
															<input type="hidden" id="p" name="p"/>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="password2"> Confirm Password: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input title="Please enter password again to confirm" type="password" name="password2" id="password2" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="board"> Board & Serial Number: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<select id="board" name="board" title="Your Board Name" style="width:20%">
																<option value="SSC">SSC</option>
																<option value="CBSE">CBSE</option>
																<option value="ICSE">ICSE</option>
															</select> &nbsp;&nbsp;&nbsp;
															<input style="width:60%" title="Your Board Serial Number" type="text" id="serialno" name="serialno" placeholder="Your Serial No" />
														</span>
													</div>
												</div>

												<!-- Update on Feb 1,2018 by RB -->


												<?php include('howdoyouknowmsit.php'); ?>


													<!--<label class="block">
													<input type="text" id="captchaText" name="captchaText" placeholder="CAPTCHA" />
													<?php
														echo '<img src="'.$_SESSION['captcha']['image_src'].'" alt="CAPTCHA code">';

													?>
													</label>
													-->
													<div class="error-block alert alert-danger hidden">
															<i class="icon-remove"></i>  <span class="message">  </span>
													</div>
													<div class="status-block alert alert-info hidden">
														<strong> Registration </strong> is under process!
													</div>
													<div class="space-10"></div>
													<div class="clearfix">
														<a href="index.php" class="width-45 pull-left btn btn-sm btn-info">
															<i class="ace-icon fa fa-arrow-left icon-on-left"></i>
															<span class="bigger-110">GO HOME</span>
														</a>
														<button type="submit" class="width-45 pull-right btn btn-sm btn-success">
															<span class="bigger-110">REGISTER</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
											</form>

										</div>
										
										
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							
						
						</td>
					</tr>
					</table>
					</div><!-- /.col -->
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
				$( "#name" ).tooltip({
				});
				$( "#email" ).tooltip({
				});
				$( "#password" ).tooltip({
				});
				$( "#password2" ).tooltip({
				});
				$( "#board" ).tooltip({
				});
				$( "#serialno" ).tooltip({
				});

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
