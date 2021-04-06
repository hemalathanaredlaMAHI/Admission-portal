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

		<title>MSIT 2016</title>



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

								<a href="#">Download GAT</a>

							</li>

							

						</ul><!-- .breadcrumb -->



					</div>

					

					<div class="row-fluid">

							<div class="col-xs-12">

								<div id="user-profile-1" class="row">

									<div class="widget-box">	

										<div class="widget-body">

											<div class="widget-main">

											

												<form class="form-horizontal" method="post" action="ma_getGATdata.php">

													

													<?php if(isset($_GET['generated']))

						{

							if($_GET['generated']=="yes")

							{

								echo "<a href='".$_GET['center']."_".$_GET['date']."_GATdetails.csv'><font color='red'><b>Click here to download the details</b></font></a>";

							}

							else

							{

								echo "Please try again";

							}

						}

						?>

													

													<h4 class="header blue bolder smaller"> Please select yor choice </h4>

													

													

													

													

													

													<div class="row">

														

														

					

													<div class="row">

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

																Center <sup> <i class="icon-asterisk"></i> </sup> :

															</label>

												

															<div class="col-sm-3" id="datediv">

															<select class="width-20chosen-select centres" id="center" name="center" data-placeholder="Preference 1" >

															<option value=""> Select Center</option>

															<option value="Hyderabad">Hyderabad</option>

															<option value="Tirupati">Tirupati</option>

															<option value="Vijayawda">Vijayawada</option>

															<option value="Warangal">Warangal</option>

															<option value="Visakhapatnam">Visakhapatnam</option>

															<option value="Kakinada">Kakinada</option>

															<option value="Anantapur">Anantapur</option>

															</select></div>

														</div>

														

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

																Date <sup> <i class="icon-asterisk"></i> </sup> :

															</label>

												

															<div class="col-sm-3" id="datediv">

															<select class="width-20chosen-select centres" id="date" name="date" data-placeholder="Preference 1" >
															<option value=""> Select Date</option>
															<option value="28-May-2016">28-May-2016</option>
															</select></div>

														</div>

														

														

													</div>

												

													<div class="error-block alert alert-danger hidden">

													<i class="icon-remove"></i> <span class="message">  </span>

													</div> 

													<br/>

													

														<div class="col-md-offset-3 col-md-9">

															<button class="btn btn-info" type="submit">

																<i class="icon-ok bigger-110"></i>

																GET DATA

															</button>



															&nbsp; &nbsp;

															<button class="btn" type="reset">

																<i class="icon-undo bigger-110"></i>

																Reset

															</button>

														</div>

													

													

													

												

												</form>

												

												

												

											</div> <!-- widget-main -->

										</div><!-- widget body -->

									</div> <!-- widget box -->

								</div> <!-- row -->

							</div> <!-- col -->

						



				

			

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

		<!-- inline scripts related to this page -->

		<script src="js/slotbookingscript.js"></script>

		

		

		<script type="text/javascript">

			jQuery(function($) {

				$(".chosen-select").chosen(); 

			});	

		</script>

	</body>

</html>

