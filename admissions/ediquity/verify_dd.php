
<?php
	include 'authentication/securelogin_functions.php';
	sec_session_start();
	include("db_connect.php");
	include("accesscheck.php");
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
$email="";
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
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<div class="col-xs-12">
										<form name="report_type" method="Get" action="verify_dd.php">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="email">
															Email Id <sup> <i class="icon-asterisk"></i> </sup>:
													</label>

													<div class="col-sm-9">
														<input class="input-large" type="text" id="email" name="email"/>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="appno">
													</label>

													<div class="col-sm-9">
														OR
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="appno">
															Application No <sup> <i class="icon-asterisk"></i> </sup>:
													</label>

													<div class="col-sm-9">
														<input class="input-large" type="text" id="appno" name="appno"/>
													</div><br/><br/>
												</div>
												
												<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="appno">
													</label>
													<div class="col-md-9">
																<button class="btn btn-primary" type="submit">
																	
																	GO
																</button>

																
													</div>
												</div>
										</form>
									</div>
							<div>
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->
			<?php
			$appno = "";
			$ddno = "";
			$bank_name = "";
		    $bank_branch = "";
			$issue_date = "";
			$email="";
				//$get = (!empty($_GET)) ? true : false;
					if(isset($_GET['email']) && $_GET['email']!="")
					{
						$email=$_GET['email'];
						$result = mysql_query("select * from ma_dd_details where email='$email'");
						while($row = mysql_fetch_array($result))
						{
							$appno =$row['appno'];
							$ddno =$row['ddno'];
							$bank_name = $row['bank_name'];
							$bank_branch = $row['bank_branch'];
							$issue_date = $row['issue_date'];
						}
					}
					else if(isset($_GET['appno']) && $_GET['appno']!="")
					{
						$appno=$_GET['appno'];
						$result = mysql_query("select * from ma_dd_details where appno='$appno'");
						while($row = mysql_fetch_array($result))
						{
							$email =$row['email'];
							$ddno =$row['ddno'];
							$bank_name = $row['bank_name'];
							$bank_branch = $row['bank_branch'];
							$issue_date = $row['issue_date'];
						}
					}
				 
			?>
			<?php if(isset($_GET['email']) || isset($_GET['appno'])){?>
			<form name="ddverify" method="Post" action="insert_verification.php">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="email">
						Email <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
				<div class="col-sm-3">
					<input type="text" id="email" name="email" value="<?php echo $email;?>" readonly>  
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="appno">
						Application No <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
				<div class="col-sm-3">
					<input type="text" id="appno" name="appno" value="<?php echo $appno;?>" readonly>  
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="ddno">
						DD No <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
				<div class="col-sm-3">
					<input type="text" id="ddno" name="ddno" value="<?php echo $ddno;?>">  
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="bank_name">
						Bank Name <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
				<div class="col-sm-3">
					<input class="input-large" type="text" id="bank_name" name="bank_name" value="<?php echo $bank_name; ?>" />
				</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="bank_branch">
						Bank Branch <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
				<div class="col-sm-3">
					<input class="input-large" type="text" id="bank_branch" name="bank_branch" value="<?php echo $bank_branch; ?>" />
				</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="issue_date">
						Issue Date <sup> <i class="icon-asterisk"></i> </sup>:
					</label>
				<div class="col-sm-3">
					<input class="input-large" type="text" id="issue_date" name="issue_date" value="<?php echo $issue_date; ?>" />
				</div>
				</div>	
				<div class="form-group">
				<div class="col-sm-3">
				<button type="submit" name="Go">Save</button>
				</div>
				</div>
			</form>
<?php }?>
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
		<script src="js/validations.js"></script>
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
			     
			      null,null,null, null, null, null, null, null
				  
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
