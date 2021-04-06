<?php 
	include 'authentication/securelogin_functions.php';
	sec_session_start();
	include("db_connect.php");
	include("accesscheck.php");
?>
<?php
    $cfg_dbhost = 'localhost';
    $cfg_database = 'msit_admissions';
    $cfg_dbuser = 'root';
    $cfg_dbpassword = '';

    $link = mysql_connect($cfg_dbhost, $cfg_dbuser, $cfg_dbpassword);

// make projectdb the current db
$db_selected = mysql_select_db($cfg_database, $link);



//echo $qu1;

$result = mysql_query("SELECT * FROM ma_users");
if($row = mysql_fetch_array($result))
 {
 

 }

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Blank Page - Ace Admin</title>

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
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Other Pages</a>
							</li>
							<li class="active">Blank Page</li>
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="row">
						<form name="report_type" method="Get" action="communication/send_payment_alert_SMS.php">
												<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="phno">
													</label>
													<div class="col-md-9">
																<button class="btn btn-primary" type="submit">
																	
																	Send SMS
																</button>
	
													</div>
												</div>
										</form>
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

		<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue"></h3>
										<div class="table-header">
											Payment pending applicants
										</div>

										<div class="table-responsive">
											<table id="sample-table-2" class="table table-striped table-bordered table-hover">
												<thead>
												
													<tr>
														<th>Name</th>
														<th>Phone No</th>
														<th>Email</th>
														<th>Application No</th>
														<th>Payment</th>	
													</tr>
												</thead>

												<tbody>
												<?php
                                      /*echo "SELECT u.user_id,u.user_full_name,u.user_mobile_num,u.user_mail_id,u.user_address,u.role_id,role_name FROM user_register as u,user_roles_master as rol where  u.role_id = rol.role_id and u.role_id!=9 and u.user_id !=".$userid."order by u.user_id";*/
                                     $result = mysql_query("select* from ma_users where payment_status='no' and application_status='yes'");
while($row = mysql_fetch_array($result))
  {

	$email=$row['email'];
	$result1 = mysql_query("select* from ma_user_profile where email='$email'");
	while($row1 = mysql_fetch_array($result1))
	{
		$full_name=$row1['full_name'];
		$mobile_no=$row1['mobile_no'];
	}
	$result2 = mysql_query("select* from ma_user_gat_exam_details where email='$email'");
	while($row2 = mysql_fetch_array($result2))
	{
		$appno=$row2['appno'];
	}
	
	$payment_status = $row['payment_status'];					?>
													<tr>
														<td>
															<a href="#"><?php echo $full_name; ?></a>
														</td>
														<td>
															<a href="#"><?php echo $mobile_no; ?></a>
														</td>

														<td>
															<a href="#"><?php echo $email; ?></a>
														</td>
														<td><?php echo $appno; ?></td>
														<td>
															<span class="label label-sm label-warning"><?php echo $payment_status; ?></span>
														</td>
													</tr>
<?php  } ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>

													
								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
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

		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			     
			      null,null,null, null, null
				  
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>

	</body>
</html>
