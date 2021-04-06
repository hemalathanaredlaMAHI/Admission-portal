<?php include('activateaccesscheck.php'); ?>
<?php include('ma_config.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS <?php  echo YEARTEXT; ?></title>

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
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
						
<table border="0" width="45%" align="center">
					<tr>
						<td width="100%">
							<br/><br/><br/>
					
						
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
									<h4 class="header green lighter bigger">
											<img src="logo.gif" />
											<i class="ace-icon fa fa-users blue"></i>
												New User Activation
											</h4>
											<span style="font-weight:bold;color:red;"><?php echo $_GET['message']; ?></span>
											<h5 class="center header red bigger">
												Activation Email has been sent to you. <br/>Please activate your account.<br/>
<div class="space-4"></div>												
											</h5>

							
													<div class="clearfix center">
														<a href="ma_resendEmail.php?email=<?php echo $_SESSION['email']; ?>" id='resendemail' class="btn btn-sm btn-primary">
															<span>Click here to Resend Email</span>
														</a>
													</div>
													<div class="space-4"></div>
											<h6 class="center bigger">
												Already Activated? <a href="login.php">Login Now</a> 												
											</h6>

													<div class="space-4"></div>
												

											

											
											
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
						$('#resendemail').click(function(e){
				event.preventDefault();
				var jLink = $( this );
				//alert(jLink.attr( "href" ));
				$.ajax(
				{
					url : jLink.attr( "href" ),
					type: "GET",
					success:function(data, textStatus, jqXHR) 
					{
						//alert("sdfdf");
						//alert(data);
						bootbox.hideAll();
						bootbox.dialog({
						message: data, 
						closeButton: false,
						buttons: {
							"success" : {
							"label" : "OK",
							"className" : "btn-sm btn-primary"
							}
						}
					});
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						alert("Unable to save data due to network failure");
					},
					beforeSend:function(){
						bootbox.hideAll();
						var box = bootbox.dialog({
										closeButton: false,
										message: '<div class="row">  ' +
												'<div class="col-md-12 center"> ' +
												'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
												'Sending Activation Email. Please Wait... ' +
												'</div></div>'
									});
					},
					complete:function(){
						//alert("done");
							$(".loading_msg").hide();
					}
				});
				return( false );
			}
			
		);
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
