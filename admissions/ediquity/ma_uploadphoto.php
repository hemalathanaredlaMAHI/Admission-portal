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
		<title>User Profile Page - Ace Admin</title>

		<meta name="description" content="3 styles with inline editable feature" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />

		<!-- fonts -->

		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="css/widget.css" />

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

						

					</div>

					<div class="page-content">
					
						<div class="page-header">
							
						</div><!-- /.page-header -->
				

						
						<hr>
						
						
						<div class="row">
							<div class="col-xs-12">
								<div id="user-profile-1" class="row">
									<div class="widget-box">	
										<div class="widget-body">
											<div class="widget-main">
												<form class="form-horizontal" id="upload-photo-form" action='ma_importmarks.php' method='POST' enctype='multipart/form-data'>
													<!--<div class="profile-edit-tab-content">-->
														<!--<div id="edit-basic" >-->

															
															<div class="row"><br/>
																															
																	<div  class="col-sm-2">
																	</div>
																	<div  class="col-sm-6">
																		
																		<div class="form-group">
																			<input type="file" class=".input-large" id="file" name="file" />
																		</div>
													<div class="warning-block alert alert-warning hidden">
															<center> <strong> Uploading File Please Wait...</strong> </center>
													</div>
													
													<div class="success-block alert alert-success hidden">
															<center> <strong> Your File has been successfully uploaded </strong> </center>
													</div>

														<div id="upload_button">
															<center><button class="btn btn-lg btn-purple" type="submit">
																<i class="icon-cloud-upload bigger-200"></i>
																Upload your File
															</button></center>
														</div>
																	</div>
																	
	
															</div>

															<div class="space"></div>
														
														<!--</div>-->

													<!--</div>-->
													
												</form>
											</div>
										</div>
									</div>
								</div><!-- /user-profile -->
								

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

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/bootbox.min.js"></script>
		
		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<!-- inline scripts related to this page -->
		
		
		
		<script type="text/javascript">
			jQuery(function($) {
	
				
				$(".chosen-select").chosen(); 
				
				
				///////////////////////////////////////////
				$('#user-profile-1')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Double click here to Upload Your File',
					btn_change:null,
					no_icon:'icon-picture',
					thumbnail:'large',
					droppable:true,
					before_change: function(files, dropped) {
						var file = files[0];
						if(typeof file === "string") {//files is just a file name here (in browsers that don't support FileReader API)
							if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
						}
						else {//file is a File object
							var type = $.trim(file.type);
							if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
									|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
								) return false;
			
							if( file.size > 1024000 ) {//1 MB
								return false;
							}
						}
						return true;
					}
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-1 input[type=file]').ace_file_input('reset_input');
					
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					console.log("date picked");
					$(this).prev().focus();
				})
			
			});
		</script>
		<script src="js/uploadphoto.js"></script>
	</body>
</html>
