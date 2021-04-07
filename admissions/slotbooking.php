<?php include('accesscheck.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS <?php  echo YEARTEXT; ?></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="../assets/css/select2.css" />
		<link rel="stylesheet" href="../assets/css/datepicker.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-editable.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
	</head>
	<body class="no-skin">
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
								<div class="hidden">
									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
										<ul class="nav nav-list">
											<li class="hover">
												<a href="dashboardhome.php">
													<i class="menu-icon fa fa-home"></i>
													<span class="menu-text"> HOME </span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="gatApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"> <b>GAT APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover active">
												<a href="walkinApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"><b>WALKIN APPLICATION</b></span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="payment.php">
													<i class="menu-icon fa fa-credit-card"></i>
													<span class="menu-text"> <b>PAY ONLINE/DD</b></span>
												</a>

												<b class="arrow"></b>
											</li>
										</ul><!-- /.nav-list -->
									</div><!-- .sidebar2 -->
								</div><!-- hidden -->
							</div><!-- /.col 12-->
						</div><!-- /.row -->
						
						<div class="row">
							<div class="col-xs-12">
								
								
									<div class="widget-box">	

										<div class="widget-body">

											<div class="widget-main">

											

												<form class="form-horizontal" method="post" action="authentication/slot_booking_update.php">

													

													<h4 class="header blue bolder smaller"> Please book your slot here </h4>

													

													

													

													

													

													<div class="row">

														

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

															 	Select Your Application Number <sup> <i class="icon-asterisk"></i> </sup>  :

															</label>

												      <?php 
													  
													  $email = $_SESSION['email'];
													 
													    
													  ?>

															<div class="col-sm-3">

															<select class=\"width-20chosen-select centres\" id="appnumber" name="appnumber" data-placeholder=\"Preference 1\" onchange="getdate(this.value)"/>

															<option value=\"\"> select Application Number  </option>

															<?php
															
															
															
															 

													if ($stmt = $mysqli->prepare("SELECT applicationNo FROM userApplications where appType = 'WALKIN' and paymentStatus = 'yes' and slotdate is null and email = ?")) { 

														$stmt->bind_param('s', $email); 

														$stmt->execute();

														$stmt->bind_result($pappno); 

														while($stmt->fetch())

														{

															echo "<option value=".$pappno.">".$pappno."</option>";

														}

													}

													?>

													

													</select></div>

														</div>

														

														

													</div>

													

													<div class="row">

														

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

																Date <sup> <i class="icon-asterisk"></i> </sup> :

															</label>

												

															<div class="col-sm-3" id="datediv">

															<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" >

															<option value=\"\" disabled selected> select slot Application Number first  </option>

															</select></div>

														</div>

														

														

													</div>

													<div class="row">

														

														<div class="form-group">

															<label class="col-sm-3 control-label no-padding-right" for="centre1">

																Time <sup> <i class="icon-asterisk"></i> </sup> :

															</label>

												

															<div class="col-sm-3" id="timediv">

															<select class=\"width-20chosen-select centres\" id=\"time\" name=\"time\" data-placeholder=\"Preference 1\" >

															<option value=\"\" disabled selected> select slot date first  </option>

															</select></div>

														</div>

													

														

													</div>

													<div class="error-block alert alert-danger hidden">

													<i class="icon-remove"></i> <span class="message">  </span>

													</div> 

												

													<div class="clearfix form-actions">

														<div class="col-md-offset-3 col-md-9">

															<button class="btn btn-info" type="submit">

																<i class="icon-ok bigger-110"></i>

																Save

															</button>



															
															

														</div>

													</div>

													

													

												

												</form>

												

												

												

											</div> <!-- widget-main -->

										</div><!-- widget body -->

									</div> <!-- widget box -->
								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">MSIT</span>
							JNTU &copy; <?php echo YEARTEXT; ?>
						</span>
						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>
							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>
							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
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
		<!-- inline scripts related to this page -->
		<script type="text/javascript">

		function update_names(){	
			$( "#dd-payment-form .form-group input, select" ).each(function( index ) {
				if($(this).attr('name')==undefined)
				{
					$(this).attr('name',$(this).attr('id'));
					//console.log($(this).attr('name'));
				}
			
				
			});
		}

				function getXMLHTTP() { //fuction to return the xml http object

						var xmlhttp=false;	

						try{

							xmlhttp=new XMLHttpRequest();

						}

						catch(e)	{		

							try{			

								xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

							}

							catch(e){

								try{

								xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

								}

								catch(e1){

									xmlhttp=false;

								}

							}

						}

							

						return xmlhttp;

					}

					

					function getdate(Hallticket) {		

						

						var strURL="finddate.php?Hallticket="+Hallticket;

						

						var req = getXMLHTTP();

						

						if (req) {

							

							req.onreadystatechange = function() {

								if (req.readyState == 4) {

									// only if "OK"

									if (req.status == 200) {						

										document.getElementById('datediv').innerHTML=req.responseText;						

									} else {

										alert("There was a problem while using XMLHTTP:\n" + req.statusText);

									}

								}				

							}			

							req.open("GET", strURL, true);

							req.send(null);

						}		

					}

					function getslot(dateid) {		

					var appno = document.getElementById("appnumber").value;

					var strURL="findtime.php?date="+dateid+"&appno="+appno;

					document.getElementById('timediv').innerHTML="Loading...";

					//alert(strURL);

					var req = getXMLHTTP();

		

					if (req) {

			

					req.onreadystatechange = function() {

					if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('timediv').innerHTML=req.responseText;						

					} else {

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
		
jQuery(function($){

			$('#tabs > ul > li').click(function(event){
				$("form .help-block").remove();
				$("form .has-error, .has-info").removeClass('has-error').removeClass('has-info');
				$('form').reset();
			});
			$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});				
			$('#sidebar2').insertBefore('.page-content');
			$('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			$('a[ data-original-title]').tooltip();
			$('.input-mask-phone').mask('(999) 999-9999');

				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
				});
			   
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
