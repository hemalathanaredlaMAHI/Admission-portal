<?php include('accesscheck.php');
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
										<h4 class="widget-title lighter">Search the Student</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<form class="form-horizontal" method="Get" action="student_reg_details.php">
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
	$landline_no="";
	$rank = "";
	$gender = "";
	$address_line1 = "";
	$address_line2 = "";
	$place_town = "";
	$city = "";
	$pincode = "";
	$image_url = "";
	$cdate = "";

	$qry = "select full_name,a.email,gender,address_line1,address_line2,place_town,city,pincode,mobile_no,landline_no,a.image_url,a.parent_name,appno,cdate,rank from ma_user_profile a,gen_admit_letters b where a.email = b.email and b.appno='".$_GET['appno']."'";
	$result = $mysqli->query($qry);
	while($temp = $result->fetch_object())
	{
		$found = "YES";
		$email = $temp->email;
		$fullName = $temp->full_name;
		$parentName = $temp->parent_name;
		$mobile = $temp->mobile_no;
		$landline_no = $temp->landline_no;
		$rank = $temp->rank;
		$cdate = $temp->cdate;
		$image_url = $temp->image_url;

		$gender = $temp->gender;
		$address_line1 = $temp->address_line1;
		$address_line2 = $temp->address_line2;
		$place_town = $temp->place_town;
		$city = $temp->city;
		$pincode = $temp->pincode;



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

<form class="form-horizontal" action="student_reg_submit.php" method ="post" target="_blank">
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

<div class="col-sm-8">
<input class="input-large" type="text" name="fullName" id="fullName"  value='<?php echo $fullName; ?>'/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Email : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" readonly type="text" name="email" id="email"  value='<?php echo $email; ?>'/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Alternate Email : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="alt_email" id="alt_email"  />
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Gender : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<select name="gender" id="gender">
  <option value="Male" <?php echo $gender=="Male"?"selected":""; ?>>Male</option> />
  <option value="Female" <?php echo $gender=="Female"?"selected":""; ?>>Female</option> />
 </select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Student Phn No : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="mobile" id="mobile" value='<?php echo $mobile; ?>'/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Parent/Guardian Name : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="parentName" id="parentName" value='<?php echo $parentName; ?>'/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Parent/Guardian Phn : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="landline_no" id="parentName" value='<?php echo $landline_no; ?>'/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="fullname">
Counseling Date : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-3">
                
<input class="input-large" type="text" name="cdate" id="cdate" value='<?php echo $cdate; ?>'/>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
BTech College: <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="btech" id="btech">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Address Line 1: <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="address_line1" id="address_line1" value='<?php echo $address_line1; ?>'>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Address Line 2: <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="address_line2" id="address_line2" value='<?php echo $address_line2; ?>'/>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Town <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="place_town" id="place_town" value='<?php echo $place_town; ?>'/>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
City : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="city" id="city" value='<?php echo $city; ?>' />
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="parent">
Pincode : <sup> <i class="icon-asterisk"></i> </sup>:
</label>

<div class="col-sm-8">
<input class="input-large" type="text" name="pincode" id="pincode" value='<?php echo $pincode; ?>'/>
</div>
</div>
<div class="clearfix form-actions">
<div class="col-md-offset-3 col-md-9">
<button class="btn btn-info" type="submit">
<i class="icon-ok bigger-110"></i>
Submit
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
