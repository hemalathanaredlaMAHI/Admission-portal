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
		<title>Blank Page - Ace Admin</title>

		<meta name="description" content="" />
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
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

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
								<a href="#">Dashboard</a>
							</li>
							
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
						
							<h1>
								User Dashboard Home &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</h1>
							
						</div><!-- /.page-header -->
												
						<!--<?php
							if(isset($_SESSION['photo_status']) && $_SESSION['photo_status']!="yes")
								echo "photo is not uploaded.<br>";
							if(isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']!="yes")
								echo "Profile is not updated.<br>";
							if(isset($_SESSION['application_status']) && $_SESSION['application_status']!="yes")
								echo "Application is not submitted.<br>";
							if(isset($_SESSION['payment_status']) && $_SESSION['payment_status']!="yes")
								echo "Payment is not done.<br>";
							
						?>-->
						<div class="row">
							<div class="col-xs-12">
								<div id="user-profile-1" class="row">
									
									<div class="widget-box">
										
										
										<div class="widget-body">
											<div class="widget-main">
										
												<p class="alert <?php if(isset($_SESSION['photo_status']) && $_SESSION['photo_status']=="yes") echo "alert-success"; else echo "alert-danger"; ?> ">  
													<span class="label <?php if(isset($_SESSION['photo_status']) && $_SESSION['photo_status']!="yes") echo "label-pink"; ?>  arrowed-right"> Step 1 </span> &nbsp;&nbsp;
														<strong>
														<?php if(isset($_SESSION['photo_status']) && $_SESSION['photo_status']=="yes") echo "You have uploaded your photo. You can update your photo by clicking on 'Go' button."; else echo "You need to Upload Photo"; ?>
														 </strong>
													 <a class="btn btn-xs btn-purple" href="ma_uploadphoto.php" style="float:right;" role="button">  
														Go <i class="icon-arrow-right icon-on-right"></i>
													</a>
												</p>
												
												<p class="alert <?php if(isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']=="yes") echo "alert-success"; else echo "alert-danger"; ?> ">  
													<span class="label <?php if(isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']!="yes") echo "label-pink"; ?>  arrowed-right"> Step 2 </span> &nbsp;&nbsp;
														<strong>
														<?php if(isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']=="yes") echo "You have filled the personal details. You can update the details by clicking on 'Go' button."; else echo "You need to fill personal details"; ?>
														 </strong>
													 <a class="btn btn-xs btn-purple" href="ma_personal.php" style="float:right;" role="button">  
														Go <i class="icon-arrow-right icon-on-right"></i>
													</a>
												</p>
												
												<p class="alert <?php if(isset($_SESSION['educationdetails_status']) && $_SESSION['educationdetails_status']=="yes") echo "alert-success"; else echo "alert-danger"; ?> ">  
													<span class="label <?php if(isset($_SESSION['educationdetails_status']) && $_SESSION['educationdetails_status']!="yes") echo "label-pink"; ?> arrowed-right"> Step 3 </span> &nbsp;&nbsp;
														<strong>
														<?php if(isset($_SESSION['educationdetails_status']) && $_SESSION['educationdetails_status']=="yes") echo "You have filled your education details. You can update the details by clicking on 'Go' button."; else echo "You need to fill Education details"; ?>
														</strong>
													<a class="btn btn-xs btn-purple" href="ma_education.php" style="float:right;" role="button">  
														Go <i class="icon-arrow-right icon-on-right"></i>
													</a>
												</p>
												
												<p class="alert <?php if(isset($_SESSION['application_status']) && $_SESSION['application_status']=="yes") echo "alert-success"; else echo "alert-danger"; ?> "> 
													<span class="label <?php if(isset($_SESSION['application_status']) && $_SESSION['application_status']!="yes") echo "label-pink"; ?> arrowed-right"> Step 4 </span> &nbsp;&nbsp;
														<strong>
														<?php if(isset($_SESSION['application_status']) && $_SESSION['application_status']=="yes") echo "You have filled your GAT application details. You can update the details by clicking on 'Go' button."; else echo "You need to fill GAT exam  Application details."; ?>
														</strong>
													  <a class="btn btn-xs btn-purple" href="ma_applygat_offline.php" style="float:right;" role="button">  
														Go <i class="icon-arrow-right icon-on-right"></i>
													</a>
												</p>
												
												<p class="alert <?php if(isset($_SESSION['payment_status']) && $_SESSION['payment_status']=="yes") echo "alert-success"; else echo "alert-danger"; ?> ">
													<span class="label <?php if(isset($_SESSION['payment_status']) && $_SESSION['payment_status']!="yes") echo "label-pink"; ?> arrowed-right"> Step 5 </span> &nbsp;&nbsp;
														<strong> 
														<?php if(isset($_SESSION['payment_status']) && $_SESSION['payment_status']=="yes") echo "You have made your payment for GAT application."; else echo "You need to pay Rs. 1000 for the GAT Application."; ?>
														</strong>
													 <a class="btn btn-xs btn-purple" href="ma_payment.php" style="float:right;" role="button">  
														Go <i class="icon-arrow-right icon-on-right"></i>
													</a>
												</p>
												
												
												
												
												
												
												
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

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
