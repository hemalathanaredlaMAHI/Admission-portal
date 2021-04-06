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
										<h4 class="widget-title lighter">Lerning Center Status</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="icon-user"></i>
																	Learning Center
																</th>
																<th>Total Seats</th>
																<th>Occupied Seats</th>
																<th>Remaining Seats</th>
															</tr>
														</thead>
														
														<tbody>
														<?php 
														$iiith = 0;
														$jntuh = 0;
														$jntuk = 0;
														$jntua = 0;
														$svu =0;
														$iiith_total = 125;
														$jntuh_total = 100;
														$jntuk_total = 50;
														$jntua_total = 50;
														$svu_total = 50;
														$qry1 = "SELECT learning_center, count(*) as filled FROM gen_admit_letters group by learning_center";
														$result1 = $mysqli->query($qry1);
														while($temp1 = $result1->fetch_object())
														{
															if($temp1->learning_center=="IIITH")
															{
																$iiith = $temp1->filled;
															}
															if($temp1->learning_center=="JNTUH")
															{
																$jntuh = $temp1->filled;
															}
															if($temp1->learning_center=="JNTUK")
															{
																$jntuk = $temp1->filled;
															}
															if($temp1->learning_center=="JNTUA")
															{
																$jntua = $temp1->filled;
															}
															if($temp1->learning_center=="SVU")
															{
																$svu = $temp1->filled;
															}
														}
														?>
														

															<tr>
																<td width='30%'>
																	 IIIT Hyderabad
																</td>
																<td>
																	<?php echo $iiith_total; ?>
																</td>
																<td align='center'>
																	<span class="label label-warning"><?php echo $iiith; ?></span>
																</td>
																<td>
																	 <?php $iiit_rem = $iiith_total-$iiith; echo $iiit_rem; ?>
																</td>
															</tr>
															<tr>
																<td>
																	 JNTU Hyderabad
																</td>
																<td>
																	<?php echo $jntuh_total; ?>
																</td>
																<td align='center'>
																	<span class="label label-warning"><?php echo $jntuh; ?></span>
																</td>
																<td>
																	 <?php $jntuh_rem = $jntuh_total-$jntuh; echo $jntuh_rem; ?>
																</td>
															</tr>
															<tr>
																<td>
																	 JNTU Kakinada
																</td>
																<td>
																	<?php echo $jntuk_total; ?>
																</td>
																<td align='center'>
																	<span class="label label-warning"><?php echo $jntuk; ?></span>
																</td>
																<td>
																	 <?php $jntuk_rem = $jntuk_total-$jntuk; echo $jntuk_rem; ?>
																</td>
															</tr>
															<tr>
																<td>
																	 JNTU Anantapur
																</td>
																<td>
																	<?php echo $jntua_total; ?>
																</td>
																<td align='center'>
																	<span class="label label-warning"><?php echo $jntua; ?></span>
																</td>
																<td>
																	 <?php $jntua_rem = $jntua_total-$jntua; echo $jntua_rem; ?>
																</td>
															</tr>
															<tr>
																<td>
																	 SVU Tirupati
																</td>
																<td>
																	<?php echo $svu_total; ?>
																</td>
																<td align='center'>
																	<span class="label label-warning"><?php echo $svu; ?></span>
																</td>
																<td>
																	 <?php $svu_rem = $svu_total-$svu; echo $svu_rem; ?>
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
										<h4 class="widget-title lighter">Search the Applicant</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<form class="form-horizontal" method="Get" action="genAL.php">
												<div class="space-2"></div>
													<div class="form-group">
															<div class="col-sm-3"></div>
															<div class="col-sm-6">
																<div class="col-sm-8" align="center">APPLICATION NUMBER<br/>
																	<input class="form-control" name="appno" id="appno" placeholder="Application Number" type="text" />
																</div>
																<div class="col-sm-4">
																	<br/>
																<button class="pull-right btn btn-sm btn-success" type="submit">
																	<span class="bigger-110">&nbsp;&nbsp;SEARCH&nbsp;&nbsp;</span>
																</button>
																</div>
															</div>
															<div class="col-sm-3"></div>
													</div>
													
											</form>
									
										</div>
									</div>
								</div>
							</div>
						</div>
						</div> 
		
<?php if(isset($_GET['appno']) && $_GET['appno']!="")	{ 
	$found = "NO";
	$email = "";
	$fullName = "";
	$parentName = "";
	$mobile = "";
	$rank = "";
	$lcenter = "";
	$cdate = "";
	$ddno = "";
	$dddate = "";
	$ddbank = "";
	$ddbranch = "";
	$ddamount = "";
	$image_url = "";
	$qry = "Select * from gen_admit_letters where appno = '".$_GET['appno']."'";
	$result = $mysqli->query($qry);
	while($temp = $result->fetch_object())
	{
		$found = "YES";
		$email = $temp->email;
		$fullName = $temp->fullName;
		$parentName = $temp->parent_name;
		$mobile = $temp->mobileno;
		$rank = $temp->rank;
		$lcenter = $temp->learning_center;
		$cdate = $temp->cdate;
		$ddno = $temp->ddno;
		$dddate = $temp->dd_date;
		$ddbank = $temp->dd_bank;
		$ddbranch = $temp->dd_branch;
		$ddamount = $temp->dd_amount;
		$image_url = $temp->image_url;
	}

?>	


<div class="col-xs-12">
<div id="user-profile-1" class="row">
<div class="widget-box">	
<div class="widget-body">
<div class="widget-main">
<div class="row">
<?php if($found=="NO") { ?>
	<h4 class="red smaller">&nbsp;&nbsp;&nbsp;Sorry! Applicant not Found.</h4>
<?php } else { ?>
<div class="col-xs-12 col-sm-8">

<form class="form-horizontal" action="genAdmitLetter.php" method ="post">
<!--<div class="profile-edit-tab-content">-->
<!--<div id="edit-basic" >-->
<h4 class="header blue bolder smaller">Enter the Applicant Details</h4>
<div class="space"></div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Rank : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" readonly name="rank" id="rank" value='<?php echo $rank; ?>'/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right">
Application No : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" readonly type="text" name="app_no" id="app_no" value='<?php echo $_GET['appno']; ?>'/>
</div>
</div>	
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Applicant's Name : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" name="name" id="name"  value='<?php echo $fullName; ?>'/>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Parent Name : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" name="fname" id="fname" value='<?php echo $parentName; ?>'/>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="fullname">
Learning Center : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
                
<select name="center" class="width-80 chosen-select pass-year" id="center" required="">
<option value=''>SELECT</option>
<option <?php if($lcenter=='IIITH') echo "selected"; ?> value='IIITH'>IIITH</option>
<option <?php if($lcenter=='JNTUH') echo "selected"; ?> value='JNTUH'>JNTUH</option>
<option <?php if($lcenter=='JNTUK') echo "selected"; ?> value='JNTUK'>JNTUK</option>
<option <?php if($lcenter=='JNTUA') echo "selected"; ?> value='JNTUA'>JNTUA</option>
<option <?php if($lcenter=='SVU') echo "selected"; ?> value='SVU'>SVU</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="fullname">
Date : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
                
<select name="date" id="date">
<!-- <option <?php if($lcenter=='2016-06-21') echo "selected"; ?> value='2016-06-21'>21 June 2016</option> -->
<option <?php if($lcenter=='2019-06-12') echo "selected"; ?> value='2019-06-12'>12 June 2019</option>
<option <?php if($lcenter=='2019-06-13') echo "selected"; ?> value='2019-06-13'>13 June 2019</option>
<!-- <option <?php if($lcenter=='2018-06-12') echo "selected"; ?> value='2018-06-13'>13 June 2018</option> -->
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
DD No / Txn Ref: <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" name="dd_no" id="dd_no" value='<?php echo $ddno; ?>'>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
DD Date / Txn Date: <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" name="dddate" id="dddate" value='<?php echo $dddate; ?>'/>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Name of the Bank : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" name="bank" id="bank" value='<?php echo $ddbank; ?>'/>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Name of the Branch : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" name="branch" id="branch" value='<?php echo $ddbranch; ?>' />
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Amount : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
<input class="input-large" type="text" name="amount" id="amount" value='30000'/>
</div>
</div>
<div class="clearfix form-actions">
<div class="col-md-offset-3 col-md-9">
<button class="btn btn-info" type="submit">
<i class="icon-ok bigger-110"></i>
Generate Admit Letter
</button>

&nbsp; &nbsp;
<button class="btn" type="reset">
<i class="icon-undo bigger-110"></i>
Clear
</button>
</div>
</div>
</form>

</div>

<div class="col-xs-12 col-sm-4 center">
											<div style="margin-top:40px;">
												<!-- #section:pages/profile.picture -->
												<span class="profile-picture">
													
													<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="User Profile Picture" src="../authentication/profile_images/<?php echo $image_url; ?>"></img>												</span>

												<!-- /section:pages/profile.picture -->
												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<span class="white" id="profileFullName"><?php echo $fullName; ?></span>
														</a>

														
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											<!-- #section:pages/profile.contact -->
											<div class="profile-contact-info">
												<div class="profile-contact-links align-center">
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-phone bigger-120 green"></i>
														<span id="profileContactNumber"><?php echo $mobile; ?></span>
													</a>
													<br>
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-envelope bigger-120 pink"></i>
														<?php echo $email; ?>										</a>

													
												</div>

											</div>

												<div class="hr hr12 dotted"></div>

										
										</div>
										<?php } ?>
										
</div>
</div>
</div>
</div>
</div><!-- /user-profile -->
</div>
<?php } ?>
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
