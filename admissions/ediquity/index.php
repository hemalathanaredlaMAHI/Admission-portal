<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8" />

		<title>Login Page - MSIT Admin</title>



		<meta name="description" content="User login page" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />



		<!-- basic styles -->



		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />



		<!--[if IE 7]>

		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />

		<![endif]-->



		<!-- page specific plugin styles -->



		<!-- fonts -->



		<link rel="stylesheet" href="assets/css/ace-fonts.css" />



		<!-- ace styles -->



		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />



		<!--[if lte IE 8]>

		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />

		<![endif]-->



		<!-- inline styles related to this page -->



		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



		<!--[if lt IE 9]>

		<script src="assets/js/html5shiv.js"></script>

		<script src="assets/js/respond.min.js"></script>

		<![endif]-->

	</head>



	<body class="login-layout">

		<div class="main-container">

			<div class="main-content">

				<div class="row">

					<div class="col-sm-10 col-sm-offset-1">

						<div class="login-container">

							<div class="center">

								<br/><br/><br/><br/><h1>

									<span class="white">Ediquity Login</span>

								</h1>

								

							</div>



							<div class="space-6"></div>



							<div class="position-relative">

								<div id="login-box" class="login-box visible widget-box no-border">

									<div class="widget-body">

										<div class="widget-main">

											<h4 class="header blue lighter bigger">

												<i class="icon-coffee green"></i>

												Please Enter Your Credentials

											</h4>



											<div class="space-6"></div>



											<form id="login-form">

												<fieldset>

													<label class="block clearfix">

														<span class="block input-icon input-icon-right">

															<input type="text" class="form-control" id="username" name="username" placeholder="Username" />

															<i class="icon-user"></i>

														</span>

													</label>



													<label class="block clearfix">

														<span class="block input-icon input-icon-right">

															<input type="password" class="form-control" id="password" name="password" placeholder="Password" />

															<i class="icon-lock"></i>

														</span>

													</label>

													<label class="block clearfix">

														<span class="block input-icon input-icon-right">

															<input type="hidden" class="form-control" id="p" name="p"/>

														</span>

														</label>

													<div class="error-block alert alert-danger hidden">

														<i class="icon-remove"></i>  <span class="message">  </span>

													</div> 	

													<div class="clearfix">

														<button type="submit" align="left" class="width-35 pull-right btn btn-sm btn-primary">

															<i class="icon-key"></i>

															Login

														</button>

													</div>

													<div class="space-4"></div>

												</fieldset>

											</form>

										</div><!-- /widget-main -->

										

									</div><!-- /widget-body -->

								</div><!-- /login-box -->

							</div><!-- /position-relative -->

						</div>

					</div><!-- /.col -->

				</div><!-- /.row -->

			</div>

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



		<!-- inline scripts related to this page -->



		<script type="text/javascript">

			function show_box(id) {

			 jQuery('.widget-box.visible').removeClass('visible');

			 jQuery('#'+id).addClass('visible');

			}

		</script>

				<script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/typeahead-bs2.min.js"></script>



		<!-- page specific plugin scripts -->



		<!--[if lte IE 8]>

		  <script src="assets/js/excanvas.min.js"></script>

		<![endif]-->



		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/jquery.gritter.min.js"></script>

		<script src="assets/js/bootbox.min.js"></script>

		<script src="assets/js/jquery.slimscroll.min.js"></script>

		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>

		<script src="assets/js/jquery.hotkeys.min.js"></script>

		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>

		<script src="assets/js/select2.min.js"></script>

		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>

		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>

		<script src="assets/js/x-editable/bootstrap-editable.min.js"></script>

		<script src="assets/js/x-editable/ace-editable.min.js"></script>

		<script src="assets/js/jquery.maskedinput.min.js"></script>

		<script src="assets/js/chosen.jquery.min.js"></script>



		<!-- ace scripts -->



		<script src="assets/js/ace-elements.min.js"></script>

		<script src="assets/js/ace.min.js"></script>

		

		<script src="assets/js/jquery.validate.min.js"></script>

				<script src="js/sha512.js"></script>

		<script src="js/validation.js"></script>

	</body>

</html>

