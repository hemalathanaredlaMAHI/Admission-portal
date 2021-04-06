<?php include('accesscheck.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS 2017</title>
		<meta name="description" content="MSIT ADMISSIONS 2017" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="../assets/css/select2.css" />
		<link rel="stylesheet" href="../assets/css/datepicker.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-editable.css" />
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->
		<script src="../assets/js/ace-extra.js"></script>
		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="common.css" />		
	</head>
	<body class="no-skin">
	<div class="loader"></div>
	<?php include('validheader.php'); ?>
	
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
																				<ul class="nav nav-list">
											<li class="hover">
												<a href="dashboardhome.php">
													<i class="menu-icon fa fa-home"></i>
													<span class="menu-text"> HOME </span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover active">
												<a href="gatApplications_closed.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"> <b>GAT APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="walkinApplications_closed.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"><b>WALKIN APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li> 
											
										</ul><!-- /.nav-list -->

									</div><!-- .sidebar -->
							</div><!-- /.col -->
						</div><!-- /.row -->
				
<!-- Table bulding to display apps -->


											


			
	
			


												
			
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
			
									
							<div id="mywalkinapplications" class="tab-pane in active">
									<div class="widget-box">	
									<div class="widget-body">
										<div class="widget-main">
											
												<div class="table-responsive">
												
												<div class="alert alert-warning">
													<strong>YOU CAN NOT APPLY NOW. LAST DATE TO APPLY GAT EXAM IS MAY 25, 2017.</strong>
														
												</div>

												
										
												
											
										  </div>
												<!-- /.table-responsive -->
											<br/><br/>								
										</div>
									</div>
								</div>
							
							
								
						

							</div>

								
								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						
						
						
			
					
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">MSIT Admissions</span>
							2017
						</span>

						
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
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


		<!-- ace scripts -->
		<script src="../assets/js/ace/elements.scroller.js"></script>
		<script src="../assets/js/ace/elements.colorpicker.js"></script>
		<script src="../assets/js/ace/elements.fileinput.js"></script>
		<script src="../assets/js/ace/elements.typeahead.js"></script>
		<script src="../assets/js/ace/elements.wysiwyg.js"></script>
		<script src="../assets/js/ace/elements.spinner.js"></script>
		<script src="../assets/js/ace/elements.treeview.js"></script>
		<script src="../assets/js/ace/elements.wizard.js"></script>
		<script src="../assets/js/ace/elements.aside.js"></script>
		<script src="../assets/js/ace/ace.js"></script>
		<script src="../assets/js/ace/ace.ajax-content.js"></script>
		<script src="../assets/js/ace/ace.touch-drag.js"></script>
		<script src="../assets/js/ace/ace.sidebar.js"></script>
		<script src="../assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="../assets/js/ace/ace.submenu-hover.js"></script>
		<script src="../assets/js/ace/ace.widget-box.js"></script>
		<script src="../assets/js/ace/ace.settings.js"></script>
		<script src="../assets/js/ace/ace.settings-rtl.js"></script>
		<script src="../assets/js/ace/ace.settings-skin.js"></script>
		<script src="../assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="../assets/js/ace/ace.searchbox-autocomplete.js"></script>

		<script type="text/javascript">


		<!-- inline scripts related to this page -->



	jQuery(function($) 
	{
		$(".loader").fadeOut("slow");
		$('#sidebar2').insertBefore('.page-content');			   
		$('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
		$('a[ data-original-title]').tooltip();

			   })
		</script>
		

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="../assets/css/ace.onpage-help.css" />
	<!--	<link rel="stylesheet" href="../docs/assets/js/themes/sunburst.css" /> -->

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="../assets/js/ace/elements.onpage-help.js"></script>
		<script src="../assets/js/ace/ace.onpage-help.js"></script>
<!--		<script src="../docs/assets/js/rainbow.js"></script>
		<script src="../docs/assets/js/language/generic.js"></script>
		<script src="../docs/assets/js/language/html.js"></script>
		<script src="../docs/assets/js/language/css.js"></script>
		<script src="../docs/assets/js/language/javascript.js"></script>
	-->	<script src="../assets/js/jquery.validate.js"></script>
	</body>
</html>
