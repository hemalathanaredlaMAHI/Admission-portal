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



		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.full.min.css" />



		<!-- fonts -->



		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<link rel="stylesheet" href="assets/css/chosen.css" />



		<!-- ace styles -->



		<link rel="stylesheet" href="assets/css/ace.min.css" />

		

		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<link rel="stylesheet" href="css/widget.css" />

		<link rel="stylesheet" href="css/payment.css" />

		

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



					</div>



					<div class="page-content">

					

						<!-- /.page-header -->

				



						<?php if(isset($_GET['generated']))

						{

							if($_GET['generated']=="yes")

							{

								echo "<a href='userdetails.csv'><font color='red'><b>Click here to download the user details</b></font></a>";

							}

							else

							{

								echo "Please try again";

							}

						}

						?>

						<hr>

						

						

												

								<!-- 4th Tab -->

							

								<div class="widget-box">	

									<div class="widget-body">

										<div class="widget-main">

										

												

											<form class="form-horizontal" id="select date form" action="ma_getdata.php" method="post">

											

												

												<div class="form-group">

													<label class="col-sm-3 control-label no-padding-right" for="fromdate">

														From: <sup> <i class="icon-asterisk"></i> </sup>:

													</label>



													<div class="col-sm-8">

														<div class="input-medium">

															<div class="input-group">

															<select class=\"width-80 chosen-select centres\" id="fromdate" name="fromdate" data-placeholder="Preference 1">

																	<option value="" disabled selected> Select Date</option>

																	<option value="2014-04-16"> 16 April </option>
                                                                    <option value="2014-04-17"> 17 April </option>

																	<option value="2014-04-18"> 18 April </option>

																	<option value="2014-04-19"> 19 April </option>

																	<option value="2014-04-20"> 20 April </option>

																	<option value="2014-04-24"> 24 April </option>

																	<option value="2014-04-25"> 25 April </option>

																	<option value="2014-04-26"> 26 April </option>

																	<option value="2014-04-27"> 27 April </option>

																	<option value="2014-05-1"> 1 May </option>

																	<option value="2014-05-2"> 2 May </option>

																	<option value="2014-05-3"> 3 May </option>

																	<option value="2014-05-4"> 4 May </option>

																	<option value="2014-05-8"> 8 May </option>

																	<option value="2014-05-9"> 9 May </option>

																	<option value="2014-05-10"> 10 May </option>

																	<option value="2014-05-11"> 11 May </option>

																	<option value="2014-05-15"> 15 May </option>

																	<option value="2014-05-16"> 16 May </option>

																	<option value="2014-05-17"> 17 May </option>

																	<option value="2014-05-18"> 18 May </option>

																	<option value="2014-05-19"> 19 May </option>

																	<option value="2014-05-20"> 20 May </option>

																	<option value="2014-05-21"> 21 May </option>

																	<option value="2014-05-22"> 22 May </option>

																	<option value="2014-05-23"> 23 May </option>

																</select>

																<!--<input class="input-medium date-picker" id="fromdate" name="fromdate" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" /> -->

																

															</div>

														</div>

													</div>

													</br> &nbsp;&nbsp;

													<label class="col-sm-3 control-label no-padding-right" for="todate">

														To: <sup> <i class="icon-asterisk"></i> </sup>:

													</label>



													<div class="col-sm-8">

														<div class="input-medium">

															<div class="input-group">

							<select class=\"width-80 chosen-select centres\" id="todate" name="todate" data-placeholder="Preference 1">

																	<option value="" disabled selected> Select Date</option>

																	<option value="2014-04-17"> 17 April </option>

																	<option value="2014-04-18"> 18 April </option>

																	<option value="2014-04-19"> 19 April </option>

																	<option value="2014-04-20"> 20 April </option>

																	<option value="2014-04-24"> 24 April </option>

																	<option value="2014-04-25"> 25 April </option>

																	<option value="2014-04-26"> 26 April </option>

																	<option value="2014-04-27"> 27 April </option>

																	<option value="2014-05-1"> 1 May </option>

																	<option value="2014-05-2"> 2 May </option>

																	<option value="2014-05-3"> 3 May </option>

																	<option value="2014-05-4"> 4 May </option>

																	<option value="2014-05-8"> 8 May </option>

																	<option value="2014-05-9"> 9 May </option>

																	<option value="2014-05-10"> 10 May </option>

																	<option value="2014-05-11"> 11 May </option>

																	<option value="2014-05-15"> 15 May </option>

																	<option value="2014-05-16"> 16 May </option>

																	<option value="2014-05-17"> 17 May </option>

																	<option value="2014-05-18"> 18 May </option>

																	<option value="2014-05-19"> 19 May </option>

																	<option value="2014-05-20"> 20 May </option>

																	<option value="2014-05-21"> 21 May </option>

																	<option value="2014-05-22"> 22 May </option>

																	<option value="2014-05-23"> 23 May </option>

																</select>

																								<!--<input class="input-medium date-picker" id="todate" name="todate" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" /> -->

																

															</div>

														</div>

													</div>

												</div>

												

													<div class="space"></div>

														

													

													

												<div class="clearfix">

													<div class="col-md-offset-3 col-md-6">

														<button class="btn btn-primary" type="submit">

															<i class="icon-ok bigger-110"></i>

															Submit

														</button>

														&nbsp; &nbsp;

														<button class="btn" type="reset">

															<i class="icon-undo bigger-110"></i>

															Cancel

														</button>

													</div>

												</div>

												

												<div class="space"></div>										

												

											</form>

										

										</div>

									</div>

								</div>

							

					

					</div> <!--page-content-->

				</div> <!--main-content-->

			</div> <!--main-container-inner-->

		</div> <!--main-container-->

		

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



		<script src="assets/js/jquery-ui-1.10.3.full.min.js"></script>

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="assets/js/chosen.jquery.min.js"></script>

		<script src="assets/js/jquery.validate.min.js"></script>



		<!-- ace scripts -->



		<script src="assets/js/ace-elements.min.js"></script>

		<script src="assets/js/ace.min.js"></script>



		<!-- inline scripts related to this page -->



		<script type="text/javascript">

			jQuery(function($) {

				//jquery tabs

				//console.log('lol');

				$(".chosen-select").chosen(); 

				$( "#tabs" ).tabs();

				//$(".chosen-select").chosen(); 

				

				$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){

					console.log("date picked");

					$(this).prev().focus();

				});

				

				$('#tabs-4')

				.find('input[type=file]').ace_file_input({

					style:'well',

					btn_choose:'Upload Scanned DD',

					btn_change:null,

					no_icon:'icon-picture',

					thumbnail:'large',

					droppable:true,

					before_change: function(files, dropped) {

						var file = files[0];

						if(typeof file === "string") {//files is just a file name here (in browsers that don't support FileReader API)

							if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;

						}

						else {//file is a File object

							var type = $.trim(file.type);

							if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )

									|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!

								) return false;

			

							if( file.size > 1024000 ) {//1 MB

								return false;

							}

						}

						return true;

					}

				});

			});

		</script>

		

		

	</body>

</html>

			