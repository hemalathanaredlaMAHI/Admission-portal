<?php //include('accesscheck.php'); ?>
<?php include('db_connect.php'); ?>
<?php 
if($_REQUEST['wkemail'] ==''){
			header("Location:ma_login.php?message=Invalid Access. Please login first.");
			exit;
} ?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8" />

		<title>MSIT Admissions</title>



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

		<script language="javascript" type="text/javascript">

				function getXMLHTTP() { //fuction to return the xml http object

						var xmlhttp=false;	

						try{

							xmlhttp=new XMLHttpRequest();

						}

						catch(e)	{		

							try{			

								xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

							}

							catch(e){

								try{

								xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

								}

								catch(e1){

									xmlhttp=false;

								}

							}

						}

							

						return xmlhttp;

					}

					

					function getdate(Hallticket) {		

						

						var strURL="finddate.php?Hallticket="+Hallticket;

						

						var req = getXMLHTTP();

						

						if (req) {

							

							req.onreadystatechange = function() {

								if (req.readyState == 4) {

									// only if "OK"

									if (req.status == 200) {						

										document.getElementById('datediv').innerHTML=req.responseText;						

									} else {

										alert("There was a problem while using XMLHTTP:\n" + req.statusText);

									}

								}				

							}			

							req.open("GET", strURL, true);

							req.send(null);

						}		

					}

					function getslot(dateid) {		

					var appno = document.getElementById("appnumber").value;

					var strURL="findtime.php?date="+dateid+"&appno="+appno;

					document.getElementById('timediv').innerHTML="Loading...";

					//alert(strURL);

					var req = getXMLHTTP();

		

					if (req) {

			

					req.onreadystatechange = function() {

					if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('timediv').innerHTML=req.responseText;						

					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}

				

	}

	</script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



		<!--[if lt IE 9]>

		<script src="assets/js/html5shiv.js"></script>

		<script src="assets/js/respond.min.js"></script>

		<![endif]-->

	</head>



	<body>



				<?php include("ma_header_restricted.php"); ?>

		

		<div class="main-container" id="main-container">

			<script type="text/javascript">

				try{ace.settings.check('main-container' , 'fixed')}catch(e){}

			</script>



			<div class="main-container-inner">

				<a class="menu-toggler" id="menu-toggler" href="#">

					<span class="menu-text"></span>

				</a>



				<?php include("ma_sidebar_restricted.php"); ?>





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

								<a href="#">Walkin</a>

							</li>

							

						</ul><!-- .breadcrumb -->



					</div>



					<div class="page-content">

					<div>

							<br>

							<div class="col-sm-3">

								

							</div>

							<div class="col-sm-9">

								<a href="ma_education.php" class="btn btn-lg btn-primary" >

									<i class="icon-arrow-left icon-on-left"></i>

									Previous Step: Education Details

								</a>&nbsp;&nbsp;&nbsp;

								<a href="ma_payment.php" class="btn btn-lg btn-pink" >

									Next Step: WALKIN Exam Fee Payment 

									<i class="icon-arrow-right icon-on-right"></i>

								</a>

							</div>

						</div>

						<div class="page-header">

							<h1>

								Walk-in Slot Booking

							</h1>

						</div><!-- /.page-header -->

						

						

						<div id="fuelux-wizard" class="row-fluid" data-target="#step-container">

							<ul class="wizard-steps">

								<li data-target="#step1">

									<a href="ma_uploadphoto.php"><span class="step">1</span>

									<span class="title">Upload Photo</span></a>

								</li>



								<li data-target="#step2">

									<a href="ma_personal.php"><span class="step">2</span>

									<span class="title">Personal Details</span></a>

								</li>



								<li data-target="#step3">

									<a href="ma_education.php"><span class="step">3</span>

									<span class="title">Education Details</span></a>

								</li>



								<li data-target="#step4" class="active">

									<a href="ma_walkin.php"><span class="step">4</span>

									<span class="title">Appy for Walkin</span></a>

								</li>

								

								<li data-target="#step5">

									<a href="ma_payment.php"><span class="step">5</span>

									<span class="title">Payment</span></a>

								</li>

								

								

								

							</ul>

						</div>





						

						<hr>

						



						<?php 

							if(isset($_SESSION['status']) && $_SESSION['status']!="active")

							{

								echo "<strong>Thank you for your Registration and Visit!!!<br/><br/>Please activate your account to start the MSIT Admission 2014 Application process.<br><br/>We have sent an activation email to your email address.<br><br/>Please check your email and activate the account</strong>";

							}

							else if((isset($_SESSION['photo_status']) && $_SESSION['photo_status']!="yes") || (isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']!="yes") || (isset($_SESSION['educationdetails_status']) && $_SESSION['educationdetails_status']!="yes"))

							{	

								echo "<strong>You need to finish all the below steps to submit your GAT Application

								<ul><li>Upload Photo</li><li>Personal Details</li><li>Education Details</li></ul></strong>";

							}



							

								

						?>



							



						<div class="row-fluid">

							<div class="col-xs-12">

								<div id="user-profile-1" class="row">

									<div class="widget-box">	

										<div class="widget-body">

											<div class="widget-main">

											

												<form class="form-horizontal" method="post" action="authentication/slot_booking_update.php">

													

													<h4 class="header blue bolder smaller"> Please book your slot here </h4>

													

													

													

													

													

													<div class="row">

														

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

															 	Select Your Application Number <sup> <i class="icon-asterisk"></i> </sup>  :

															</label>

												      <?php 
													  
													  $email = $_REQUEST['wkemail'];
													 
													    
													  ?>

															<div class="col-sm-3">

															<select class=\"width-20chosen-select centres\" id="appnumber" name="appnumber" data-placeholder=\"Preference 1\" onchange="getdate(this.value)"/>

															<option value=\"\"> select Application Number  </option>

															<?php
															
															
															
															 

													if ($stmt = $mysqli->prepare("SELECT walkinAppNo FROM ".prefix."ma_walkin WHERE emailID = ? and slotdate is null and PaymentStatus='yes' ")) { 

														$stmt->bind_param('s', $email); 

														$stmt->execute();

														$stmt->bind_result($pappno); 

														while($stmt->fetch())

														{

															echo "<option value=".$pappno.">".$pappno."</option>";

														}

													}

													?>

													

													</select></div>

														</div>

														

														

													</div>

													

													<div class="row">

														

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

																Date <sup> <i class="icon-asterisk"></i> </sup> :

															</label>

												

															<div class="col-sm-3" id="datediv">

															<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" >

															<option value=\"\" disabled selected> select slot Application Number first  </option>

															</select></div>

														</div>

														

														

													</div>

													<div class="row">

														

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

																Time <sup> <i class="icon-asterisk"></i> </sup> :

															</label>

												

															<div class="col-sm-3" id="timediv">

															<select class=\"width-20chosen-select centres\" id=\"time\" name=\"time\" data-placeholder=\"Preference 1\" >

															<option value=\"\" disabled selected> select slot date first  </option>

															</select></div>

														</div>

													

														

													</div>

													<div class="error-block alert alert-danger hidden">

													<i class="icon-remove"></i> <span class="message">  </span>

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

												

												

												

											</div> <!-- widget-main -->

										</div><!-- widget body -->

									</div> <!-- widget box -->

								</div> <!-- row -->

							</div> <!-- col -->

						

						</div> <!-- row -- >	

						

					</div>

				</div><!-- /#ace-settings-container -->

			</div><!-- /.main-container-inner -->



			

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

