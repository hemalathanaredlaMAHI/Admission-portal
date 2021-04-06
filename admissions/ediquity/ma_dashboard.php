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
		<title>MSIT Admissions</title>

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
								Dashboard
							</li>
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
	
	<h3 class="header smaller lighter blue">
											<i class="icon-bullhorn"></i>
											Application Summary
	</h3>
	<div class="col-xs-12 col-sm-12 widget-container-span">
										<div class="widget-box">
											<div class="widget-header header-color-blue2">
											
												<h5 class="bigger lighter">
													<i class="icon-table"></i>
													Users List
												</h5>

												
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="icon-user"></i>
																	Dates
																</th>
																<th>Hyd Slot1</th>
																<th>Hyd Slot2</th>
																<th>Kakinada Slot1</th>
																<th>Kakinada Slot2</th>
															</tr>
														</thead>

														<tbody>
										<?php 
												$result1 = mysqli_query($con,"select hyd_1, hyd_2, hyd_3, kakinada_1, kakinada_2, kakinada_3, slotdate from slotavailability order by slotdate");
												$excludeDates = '2016-02-24,2016-02-25,2016-03-09,2016-03-10';
												$excludeDatesAry = explode(',', $excludeDates);
												while($row1 = mysqli_fetch_array($result1))
												{
										?>			
												<tr>
												<td>
													 <?php echo $row1['slotdate'];?>
												</td>
												<td>
												<?php echo 20-$row1['hyd_1']; ?>
												</td>
												<td>
												<?php echo 20-$row1['hyd_2']; ?>
												</td>
												<td>
												<?php 
													if (in_array($row1['slotdate'], $excludeDatesAry))
														echo $row1['kakinada_1']; 
													else
														echo 5-$row1['kakinada_1']; 
												?>
												</td>
												<td>
												<?php 
													if (in_array($row1['slotdate'], $excludeDatesAry))
														echo $row1['kakinada_2']; 
													else
														echo 5-$row1['kakinada_2']; 
												?>
												</td>
												</tr>
											<?php	} ?>
																															
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div><!-- /span -->								
						
	<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
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
