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
										<h4 class="widget-title lighter">Search DD Payment</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<form class="form-horizontal" method="Get" action="ddPayments.php">
												<div class="space-2"></div>
													<div class="form-group">
															<!--select id="ventureName2" name="ventureName2" class="select2" data-placeholder="Click to Choose...">
															</select-->
															<div class="col-sm-4">
																<div class="col-sm-12" align="center">PLEASE ENTER EMAIL<br/>
																	<input class="form-control" name="email" id="email" type="text" />
																</div>
															</div>
															<div class="col-sm-2">
																<div class="col-sm-12" align="center"><br/>(OR)
																</div>
															</div>
															<div class="col-sm-4">
																<div class="col-sm-12" align="center">PLEASE ENTER APP NO<br/>
																	<input class="form-control" name="appno" id="appno" type="text" />
																</div>
															</div>
															<div class="col-sm-2">
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
							<div class="widget-box widget-color-blue2 light-border" id="ddPayDiv">
								<div class="widget-header widget-header-blue widget-header-flat">
									<h4 class="widget-title lighter">DD Verification</b></h4>
								</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<form class="form-horizontal">
												<div class="space-2"></div>
												<div class="form-group">
													<div class="col-sm-4">
														<div class="col-sm-12" align="center">

		<?php
			if(
				isset($_POST['dd_appno']) && 
				isset($_POST['dd_ddno']) &&
				isset($_POST['dd_bank']) &&
				isset($_POST['dd_branch']) &&
				isset($_POST['dd_issuedate'])
			)
			{
				$ddno=$_POST['dd_ddno'];
				$appno=$_POST['dd_appno'];
				$bank_name=$_POST['dd_bank'];
				$bank_branch=$_POST['dd_branch'];
				$issue_date=$_POST['dd_issuedate'];
				$verified="Verified";
				if ($stmt = $mysqli->prepare("UPDATE ddTransactions SET ddno = ?, bank_name = ?, bank_branch = ?, issue_date = ?, status = ? where appno = ?")) { 
					$stmt->bind_param('ssssss', $ddno, $bank_name, $bank_branch, $issue_date, $verified, $appno); 
					$stmt->execute();
					
					//send sms
					/*$messageText = "Hi, We have received your DD and updated in our system.";
					$mobnumber = $_SESSION['mobile_no'];
					if (strlen($mobnumber)!=12 || substr($mobnumber, 0, 2) !== '91')
					{
						$mobnumber = "91".$mobnumber;
					}
					$ch1 = curl_init('http://bsms.slabs.mobi/spanelv2/api.php?');
					curl_setopt($ch1, CURLOPT_POST, 1);
					curl_setopt($ch1, CURLOPT_POSTFIELDS, "username=msitsms&password=MsAdmin@2016&from=MSITAD&to=".$mobnumber."&message=".$messageText);
					curl_setopt($ch1, CURLOPT_RETURNTRANSFER,1);
					$data = curl_exec($ch1);
					curl_close($ch1);
					*/
	
				?>
					<b>DD has been verified successfully.</b><br/>
					<a href='ddPayments.php'>Click here to Go Back</a>

				<?php 
				}
				else
				{ ?>
					<b>ERROR 001 : Failed!! Please Try Again.</b><br/>
					<a href='ddPayments.php'>Click here to Go Back</a>
			<?php 
				}
			}
			else
			{
			?>
				<b>ERROR 002 :  Failed!! Please Try Again.</b><br/>
				<a href='ddPayments.php'>Click here to Go Back</a>
				
			<?php
			}
			?>

														</div>
													</div>
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

	</body>
</html>
