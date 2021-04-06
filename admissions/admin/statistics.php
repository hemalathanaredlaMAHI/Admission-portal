<?php include('accesscheck.php'); 
		require('../authentication/fpdf/fpdf.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Dashboard</title>

	<meta name="description" content="Static &amp; Dynamic Tables" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/css/font-awesome.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="assets/css/ace-fonts.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
	<![endif]-->

	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="assets/css/ace-ie.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="assets/js/ace-extra.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.js"></script>
	<![endif]-->
</head>

<body class="no-skin">
		<?php include('header.php'); ?>
<div class="main-container" id="main-container">
	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>
	<?php include('sidebar.php'); ?>
	<div class="main-content">
		<div class="main-content-inner">
			<!-- #section:basics/content.breadcrumbs -->
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">
					try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
				</script>

				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">Home</a>
					</li>

					
					<li class="active">Dashboard</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<!-- /section:basics/content.breadcrumbs -->
			<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box widget-color-blue2 light-border" id="searchCustomersDiv">
						<div class="widget-header widget-header-blue widget-header-flat">
						<h4 class="widget-title lighter">Applications Status</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main">	
								<div id="fuelux-wizard-container">
									<table class="table table-striped table-bordered table-hover" width="50%">
												<thead class="thin-border-bottom">
													<tr>
														<th>
															<i class="icon-user"></i>
															Parameter
														</th>
														<th>Total Count</th>
														<!-- <th>Occupied Seats</th>
														<th>Remaining Seats</th> -->
													</tr>
												</thead>
												
												<tbody>
						<?php 
							$regStudents = 0;
							$totalUniqApps = 0;
							$gatPaid = 0;
							$gatNotPaid = 0;
							$grePaid = 0;
							$walkinPaid = 0 ;

							$qry1 = "SELECT count(*) as count FROM dashboardView";
							$result1 = $mysqli->query($qry1);
							while($temp1 = $result1->fetch_object())
							{
								$regStudents = $temp1->count;	
							}
							
							$qry1 = "SELECT COUNT(DISTINCT(email)) as no_of_applications FROM dashboardView where paymentStatus='yes'";
							$result1 = $mysqli->query($qry1);
							if($temp1 = $result1->fetch_object())
							{
								$totalUniqApps = $temp1->no_of_applications;	
							}
							
							$qry1 = "SELECT count(*) as count FROM gatApplications where paymentStatus='yes' and examType='GAT'";
							$result1 = $mysqli->query($qry1);
							if($temp1 = $result1->fetch_object())
							{
								$gatPaid = $temp1->count;	
							}
							
							$qry1 = "SELECT count(*) as count FROM gatApplications where paymentStatus='no' and examType='GAT'";
							$result1 = $mysqli->query($qry1);
							if($temp1 = $result1->fetch_object())
							{
								$gatNotPaid = $temp1->count;	
							}

							$qry1 = "SELECT count(*) as count FROM gatApplications where paymentStatus='yes' and examType='GRE'";
							$result1 = $mysqli->query($qry1);
							if($temp1 = $result1->fetch_object())
							{
								$grePaid = $temp1->count;	
							}

							$qry1 = "SELECT count(DISTINCT(email)) as count FROM `walkinApplications` where paymentStatus='yes'";
							$result1 = $mysqli->query($qry1);
							if($temp1 = $result1->fetch_object())
							{
								$walkinPaid = $temp1->count;	
							}
							
						?>
												

													<tr>
														<td>
															 Total active registered students (Paid and Unpaid)
														</td>
														<td>
															<?php echo $regStudents; ?>
														</td>
														
													</tr>
													<tr>
														<td>
															 Unique Applications (Paid)
														</td>
														<td>
															<?php echo $totalUniqApps; ?>
														</td>
														
													</tr>
													<tr>
														<td>
															 Total GAT Paid
														</td>
														<td>
															<?php echo $gatPaid; ?>
														</td>
														
													</tr>
													<tr>
														<td>
															<font color="red"> Total GAT Not Paid
																</font>
														</td>
														<td>
															<font color="red"><?php echo $gatNotPaid; ?></font>
														</td>
														
													</tr>
													
													<tr>
														<td>
															 Total GRE Paid
														</td>
														<td>
															<?php echo $grePaid; ?>
														</td>
														
													</tr>

													<tr>
														<td>
															 Total Walkin Paid (Unique)
														</td>
														<td>
															<?php echo $walkinPaid; ?>
														</td>
														
													</tr>
												</tbody>
											</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>

<div class="row">
				<div class="col-xs-12">
					<div class="widget-box widget-color-blue2 light-border" id="searchCustomersDiv">
						<div class="widget-header widget-header-blue widget-header-flat">
								<h4 class="widget-title lighter">Source of MSIT</h4>
							</div>
						<div class="widget-body">
							<div class="widget-main">	
								<div id="fuelux-wizard-container">
									<table class="table table-striped table-bordered table-hover" width="50%">
												<thead class="thin-border-bottom">
													<tr>
														<th>
															<i class="icon-user"></i>
															Source
														</th>
														<th>Total Count</th>
														<!-- <th>Occupied Seats</th>
														<th>Remaining Seats</th> -->
													</tr>
												</thead>
												
												<tbody>
						<?php 
						$media = 0;
						$socialnw = 0;
						$msitad = 0;
						$alumni = 0;
						$friends = 0;
						$others = 0;
						


						$qry1 = "SELECT count(*) as count FROM `source_of_msit` where source like 'media%'";
						$result1 = $mysqli->query($qry1);
						if($temp1 = $result1->fetch_object())
						{
							$media = $temp1->count;	
						}

						$qry1 = "SELECT count(*) as count FROM `source_of_msit` where source like 'socialnw%'";
						$result1 = $mysqli->query($qry1);
						if($temp1 = $result1->fetch_object())
						{
							$socialnw = $temp1->count;	
						}

						$qry1 = "SELECT count(*) as count FROM `source_of_msit` where source like 'msitad%'";
						$result1 = $mysqli->query($qry1);
						if($temp1 = $result1->fetch_object())
						{
							$msitad = $temp1->count;	
						}

						$qry1 = "SELECT count(*) as count FROM `source_of_msit` where source like 'alumni%'";
						$result1 = $mysqli->query($qry1);
						if($temp1 = $result1->fetch_object())
						{
							$alumni = $temp1->count;	
						}

						$qry1 = "SELECT count(*) as count FROM `source_of_msit` where source like 'friends%'";
						$result1 = $mysqli->query($qry1);
						if($temp1 = $result1->fetch_object())
						{
							$freinds = $temp1->count;	
						}

						$qry1 = "SELECT count(*) as count FROM `source_of_msit` where source like 'others%'";
						$result1 = $mysqli->query($qry1);
						if($temp1 = $result1->fetch_object())
						{
							$others = $temp1->count;	
						}
						?>
												

													<tr>
														<td>
															 News Paper/Print Media
														</td>
														<td>
															<?php echo $media; ?>
														</td>
														
													</tr>
													<tr>
														<td>
															 Social Network
														</td>
														<td>
															<?php echo $socialnw; ?>
														</td>
														
													</tr>
													<tr>
														<td>
															 MSIT Alumni
														</td>
														<td>
															<?php echo $alumni; ?>
														</td>
														
													</tr>
													<tr>
														<td>
															Friends/Relatives
														</td>
														<td>
															<?php echo $freinds; ?>
														</td>
														
													</tr>
													
													<tr>
														<td>
															 MSIT Ad
														</td>
														<td>
															<?php echo $msitad; ?>
														</td>
														
													</tr>
													<tr>
														<td>
															 Others
														</td>
														<td>
															<?php echo $others; ?>
														</td>
														
													</tr>
												</tbody>
											</table>
							
								</div>
							</div>
						</div>
					</div>
				</div>
				</div> 
	

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include('footer.php'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/dataTables.buttons.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.flash.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.html5.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.print.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.colVis.js"></script>
		<script src="assets/js/dataTables/extensions/select/dataTables.select.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
		<script src="assets/js/ace/elements.colorpicker.js"></script>
		<script src="assets/js/ace/elements.fileinput.js"></script>
		<script src="assets/js/ace/elements.typeahead.js"></script>
		<script src="assets/js/ace/elements.wysiwyg.js"></script>
		<script src="assets/js/ace/elements.spinner.js"></script>
		<script src="assets/js/ace/elements.treeview.js"></script>
		<script src="assets/js/ace/elements.wizard.js"></script>
		<script src="assets/js/ace/elements.aside.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.ajax-content.js"></script>
		<script src="assets/js/ace/ace.touch-drag.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="assets/js/ace/ace.submenu-hover.js"></script>
		<script src="assets/js/ace/ace.widget-box.js"></script>
		<script src="assets/js/ace/ace.settings.js"></script>
		<script src="assets/js/ace/ace.settings-rtl.js"></script>
		<script src="assets/js/ace/ace.settings-skin.js"></script>
		<script src="assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>

		

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		
		<script type="text/javascript"> ace.vars['base'] = '.'; </script>
		<script src="assets/js/ace/elements.onpage-help.js"></script>
		<script src="assets/js/ace/ace.onpage-help.js"></script>
				<script src="docs/assets/js/rainbow.js"></script>
		<script src="docs/assets/js/language/generic.js"></script>
		<script src="docs/assets/js/language/html.js"></script>
		<script src="docs/assets/js/language/css.js"></script>
		<script src="docs/assets/js/language/javascript.js"></script>

	</body>
</html>
