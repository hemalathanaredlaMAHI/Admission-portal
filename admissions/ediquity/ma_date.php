<?php 


ini_set('errors', '0');
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

							echo "<a href='udasdfcpjp245/userdetails.csv'><font color='red'><b>Click here to download the user details</b></font></a>";

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

														

														<?php 
														$result1 = mysqli_query($con,"select slotdate from slotavailability order by slotdate");
														while($row1 = mysqli_fetch_array($result1))
														{
															echo "<option value='".$row1['slotdate']."'>".$row1['slotdate']."</option>";
														}
														?>			
<!-- 
<option value="2017-03-16">March 16 2017</option>
<option value="2017-03-17">March 17 2017</option>
<option value="2017-03-18">March 18 2017</option>
<option value="2017-03-19">March 19 2017</option>
<option value="2017-03-23">March 23 2017</option>
<option value="2017-03-24">March 24 2017</option>
<option value="2017-03-25">March 25 2017</option>
<option value="2017-03-26">March 26 2017</option>
<option value="2017-03-30">March 30 2017</option>
<option value="2017-03-31">March 31 2017</option>
<option value="2017-04-01">April 01 2017</option>
<option value="2017-04-02">April 02 2017</option>
<option value="2017-04-06">April 06 2017</option>
<option value="2017-04-07">April 07 2017</option>
<option value="2017-04-08">April 08 2017</option>
<option value="2017-04-09">April 09 2017</option>
<option value="2017-04-13">April 13 2017</option>
<option value="2017-04-14">April 14 2017</option>
<option value="2017-04-15">April 15 2017</option>
<option value="2017-04-16">April 16 2017</option>
<option value="2017-04-20">April 20 2017</option>
<option value="2017-04-21">April 21 2017</option>
<option value="2017-04-22">April 22 2017</option>
<option value="2017-04-23">April 23 2017</option>
<option value="2017-04-27">April 27 2017</option>
<option value="2017-04-28">April 28 2017</option>
<option value="2017-04-29">April 29 2017</option>
<option value="2017-04-30">April 30 2017</option>
<option value="2017-05-04">May 04 2017</option>
<option value="2017-05-05">May 05 2017</option>
<option value="2017-05-06">May 06 2017</option>
<option value="2017-05-07">May 07 2017</option>
<option value="2017-05-11">May 11 2017</option>
<option value="2017-05-12">May 12 2017</option>
<option value="2017-05-13">May 13 2017</option>
<option value="2017-05-14">May 14 2017</option>
<option value="2017-05-15">May 15 2017</option>
<option value="2017-05-16">May 16 2017</option>
<option value="2017-05-17">May 17 2017</option>
<option value="2017-05-18">May 18 2017</option>
<option value="2017-05-19">May 19 2017</option>
<option value="2017-05-20">May 20 2017</option> -->




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

				<?php 
				$result1 = mysqli_query($con,"select slotdate from slotavailability order by slotdate");
				while($row1 = mysqli_fetch_array($result1))
				{
					echo "<option value='".$row1['slotdate']."'>".$row1['slotdate']."</option>";
				}
				?>															
<!-- <option value="2017-03-16">March 16 2017</option>
<option value="2017-03-17">March 17 2017</option>
<option value="2017-03-18">March 18 2017</option>
<option value="2017-03-19">March 19 2017</option>
<option value="2017-03-23">March 23 2017</option>
<option value="2017-03-24">March 24 2017</option>
<option value="2017-03-25">March 25 2017</option>
<option value="2017-03-26">March 26 2017</option>
<option value="2017-03-30">March 30 2017</option>
<option value="2017-03-31">March 31 2017</option>
<option value="2017-04-01">April 01 2017</option>
<option value="2017-04-02">April 02 2017</option>
<option value="2017-04-06">April 06 2017</option>
<option value="2017-04-07">April 07 2017</option>
<option value="2017-04-08">April 08 2017</option>
<option value="2017-04-09">April 09 2017</option>
<option value="2017-04-13">April 13 2017</option>
<option value="2017-04-14">April 14 2017</option>
<option value="2017-04-15">April 15 2017</option>
<option value="2017-04-16">April 16 2017</option>
<option value="2017-04-20">April 20 2017</option>
<option value="2017-04-21">April 21 2017</option>
<option value="2017-04-22">April 22 2017</option>
<option value="2017-04-23">April 23 2017</option>
<option value="2017-04-27">April 27 2017</option>
<option value="2017-04-28">April 28 2017</option>
<option value="2017-04-29">April 29 2017</option>
<option value="2017-04-30">April 30 2017</option>
<option value="2017-05-04">May 04 2017</option>
<option value="2017-05-05">May 05 2017</option>
<option value="2017-05-06">May 06 2017</option>
<option value="2017-05-07">May 07 2017</option>
<option value="2017-05-11">May 11 2017</option>
<option value="2017-05-12">May 12 2017</option>
<option value="2017-05-13">May 13 2017</option>
<option value="2017-05-14">May 14 2017</option>
<option value="2017-05-15">May 15 2017</option>
<option value="2017-05-16">May 16 2017</option>
<option value="2017-05-17">May 17 2017</option>
<option value="2017-05-18">May 18 2017</option>
<option value="2017-05-19">May 19 2017</option>
<option value="2017-05-20">May 20 2017</option> -->


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

	