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
								Dashboard
							</li>
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Get User Details
							</h1>
						</div><!-- /.page-header -->

						<div class="row-fluid">
							<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <form class="reg-page" id="get-hallticket" action="get_userdetails.php" method="get">
                <div class="reg-header">            
                    <h2>User Details</h2>
                </div>

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input type="text" id="userName" name="userName" placeholder="Enter your Application Number" class="form-control">
                </div>        
				<br>
               
				<div class="error-block alert alert-danger hidden">
					<i class="icon-remove"></i> <span class="message">  </span>
				</div> 
			
                <div class="row">
                  
                    <div class="col-md-6">
                        <button class="btn-u pull-right" type="submit"  >Get</button>                        
                    </div>
                </div>
				</div>
                <hr>
				<?php 
					if(isset($_GET['userName'])) 
					{
					$username = $_GET['userName'];
					
					if ($insert_stmt = $mysqli->prepare("select email,full_name,mobile_no,center,slotdate,slotNo,paymentType from walkinApplicationsView where walkinAppNo=?")) {   			
						$insert_stmt->bind_param('s',$username ); 
						$insert_stmt->execute();
						$insert_stmt->store_result();
						$insert_stmt->bind_result($emailid,$name,$phoneno,$testcenter,$slotdate,$slotno,$paymenttype); 
						$insert_stmt->fetch();
						$insert_stmt->close();
						}
						?>
						</br></br>
						<div class="col-md-12"><span class="orange">
						<strong>User Details :</strong></span></h3>
						<table id="sample-table-1" class="table table-striped table-bordered table-hover">
						<tr>
						<th> Hall Ticket</th>
						<td><?php echo $username?></td>
						</tr>
						<tr>
						<th> Name</th>
						<td><?php echo $name?></td>
						</tr>
						<tr>
						<th> Email-Id</th>
						<td><?php echo $emailid?></td>
						</tr>
						<tr>
						<th> Phone no.</th>
						<td><?php echo $phoneno?></td>
						</tr>
						<tr>
						<th> Test Center</th>
						<td><?php echo $testcenter; ?></td>
						</tr>
						<tr>
						<th> Slot Date</th>
						<td><?php echo $slotdate?></td>
						</tr>
						<tr>
						<th> Slot Time</th>
						<td><?php if($slotno==1)echo "9.00 A.M."; else if($slotno==2)echo "11.30 A.M.";else if($slotno==3)echo "2.00 P.M.";?></td>
						</tr>
						<tr>
						<th> Payment Type</th>
						<td><?php echo $paymenttype?></td>
						</tr>
						</table>
						</div>
						
				<?php }
				?>            
				</form>            
        
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

			</div><!-- /.main-container-inner -->

			
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

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="assets/js/jquery.hotkeys.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="assets/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="assets/js/x-editable/ace-editable.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		
		<script src="assets/js/jquery.validate.min.js"></script>
		<!-- inline scripts related to this page -->
		
		<script src="js/personal_script.js"></script>
		
		<script type="text/javascript">
			
		</script>
		
		
	</body>
</html>
