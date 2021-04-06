<?php include('accesscheck.php'); ?>
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
										<h4 class="widget-title lighter">Search Existing Application</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<form class="form-horizontal" method="POST" action="offlineRegistration.php">
												<div class="space-2"></div>
													<div class="form-group">
															<!--select id="ventureName2" name="ventureName2" class="select2" data-placeholder="Click to Choose...">
															</select-->
															<div class="col-sm-12" align="center" style="color:red;font-weight:bold;" ><?php if( isset($_GET['message']) ) echo $_GET['message']; ?></div>
															<div class="col-sm-3"></div>
															<div class="col-sm-6">
																<div class="col-sm-12" align="center">PLEASE ENTER EMAIL<br/>
																	<input class="form-control" name="searchemail" id="searchemail" type="text" />
																	<input class="form-control" name="regtype" id="regtype" type="hidden" value="search" />
																</div>
															</div>
															<div class="col-sm-3">
																<br/>
																<button class="input-group-addon btn-app btn-success" style="cursor: pointer;color: #ffffff;border-color:rgba(126, 138, 125, 0.23) !important;width: 50px" type="submit">
																<span class="glyphicon glyphicon-search"></span>
																</button>
																
															</div>
													</div>
											</form>
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
										<h4 class="widget-title lighter">NEW Offline Application</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<form class="form-horizontal" id="registration-form" name="registration-form" method="POST" action="offlineRegistration.php" onsubmit="return validateOfflineData();"> 
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="name"> Name: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input title="Please enter your Name" type="text" name="name" id="name" class="form-control" placeholder="Name of the Applicant" />
															<input class="form-control" name="regtype" id="regtype" type="hidden" value="new" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="email"> Email: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input title="Please enter your email" type="email" name="email" id="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="password"> Password: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<input title="Please enter password" disabled value="MsIt#Adm@16" type="password" name="password" id="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
															<input type="hidden" id="p" name="p"/>
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="board"> Board & Serial Number: </label>
													<div class="col-sm-9">
														<span class="block input-icon input-icon-right">
															<select id="board" name="board" title="Your Board Name" style="width:20%">
																<option value="SSC">SSC</option>
																<option value="CBSE">CBSE</option>
																<option value="ICSE">ICSE</option>
															</select> &nbsp;&nbsp;&nbsp;
															<input style="width:60%" title="Your Board Serial Number" type="text" id="serialno" name="serialno" placeholder="Your Serial No" />
														</span>
													</div>
												</div>
													<?php if(isset($_GET['processmsg'])) {?>
														<div class="alert alert-success" style="font-weight:bold;" align="center">
															<?php echo $_GET['processmsg']; ?>	
														</div>
													<?php } ?>
													
													<div class="error-block alert alert-danger hidden">
															<i class="icon-remove"></i>  <span class="message">  </span>
													</div>
													<div class="status-block alert alert-info hidden">
														<strong> Registration </strong> is under process!
													</div>
													<div class="space-10"></div>
													<div class="clearfix">
														<button type="submit" class="pull-right btn btn-sm btn-success">
															<span class="bigger-110">PROCEED</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
											</form>


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
<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$( "#name" ).tooltip({
				});
				$( "#email" ).tooltip({
				});
				$( "#password" ).tooltip({
				});
				$( "#password2" ).tooltip({
				});
				$( "#board" ).tooltip({
				});
				$( "#serialno" ).tooltip({
				});

			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			
		</script>
		<script src="assets/js/jquery.validate.js"></script>

		<script src="js/sha512.js"></script>

		<script src="js/validation.js"></script>
	</body>
</html>
