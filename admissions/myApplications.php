<?php include('accesscheck.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS 2017</title>

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
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default    navbar-collapse">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							MSIT ADMISSIONS - 2017
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					
					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
						
													<?php 
															$board_name = ""; 
															$board_number = ""; 
															$btech = "";
															$full_name = "";
															$gender = ""; 
															$date_of_birth = ""; 
															$nationality = ""; 
															$address_line1 = ""; 
															$address_line2 = ""; 
															$place_town = ""; 
															$city = ""; 
															$pincode = ""; 
															$mobile_no = ""; 
															$landline_no = ""; 
															$parent_name = ""; 
															$parent_relation = "";
															$profile_pic_url = "";
															$thumb_pic_url = "";
															
															if ($stmt = $mysqli->prepare("SELECT board_name, board_number, btech, full_name, gender, date_of_birth, nationality, 
																								 address_line1, address_line2, place_town, city,
																								 pincode, mobile_no, landline_no, parent_name, parent_relation, 
																								 image_url FROM userProfilesView WHERE email = ?")) 
															{ 
																$stmt->bind_param('s', $_SESSION['email']); 
																$stmt->execute();
																$stmt->store_result();
																$stmt->bind_result($board_name, $board_number, $btech, $full_name, $gender, $date_of_birth, $nationality, 
																					$address_line1, $address_line2, $place_town, $city, $pincode, 
																					$mobile_no, $landline_no, $parent_name, $parent_relation, $profile_pic_url); 
																$stmt->fetch();
															}
															
															$thumb_pic_url = str_replace("-profile","-thumb",$profile_pic_url);
															
															$profile_flag = 0;
															if(isset($_SESSION['application_status']) && $_SESSION['application_status']=="yes")
															{
																if ($stmt = $mysqli->prepare("SELECT test_center1, examtype, gre_analytical, gre_score, toefl_score, ielts_score FROM ".prefix."ma_user_gat_exam_details WHERE email = ?")) { 
																$stmt->bind_param('s', $_SESSION['email']); 
																$stmt->execute();
																$stmt->store_result();
																$stmt->bind_result($test_center1, $examtype, $gre_analytical, $gre_score, $toefl_score, $ielts_score); 
																$stmt->fetch();
																$profile_flag = 1;
																}
															}
																					
													?>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php if($_SESSION["photo_status"]=="yes") echo "authentication/profile_images/".preg_replace('/[^\w\.\- ]/', '', $thumb_pic_url); else echo "../assets/avatars/user.jpg"; ?>" alt="Jason's Photo" />
								<span class="user-info">
									<small><?php echo $_SESSION['username'];?></small>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							
								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<!-- #section:settings.box -->
						<!-- /section:settings.box -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									

									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
										<ul class="nav nav-list">
											<li class="hover">
												<a href="dashboardhome.php">
													<i class="menu-icon fa fa-home"></i>
													<span class="menu-text"> Home </span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover active">
												<a href="myApplications.php">
													<i class="menu-icon fa fa-book"></i>
													<span class="menu-text"> MY APPLICATIONS </span>
												</a>

												<b class="arrow"></b>
											</li>
											<li class="hover">
												<a href="payment.php">
													<i class="menu-icon fa fa-credit-card"></i>
													<span class="menu-text"> MY PAYMENTS </span>
												</a>

												<b class="arrow"></b>
											</li>

											

											

											

										</ul><!-- /.nav-list -->
									</div><!-- .sidebar -->
							

								
								
							</div><!-- /.col -->
						</div><!-- /.row -->
					<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											
											<div class="modal-body">
											
											<form class="form-horizontal" id="gat-exam-form">
													<input type="radio" hidden name="course" checked id="two" value="2" class="ace" />
													
													<div class="row">
													<?php 
														if($_SESSION['application_status'] == "yes" && isset($_SESSION['gat_application_no'])) {
													?>
														
														<h5 class="header bolder red smaller center"> Your GAT Application Number is  <?php echo $_SESSION['gat_application_no']; ?> 
														</h5>
													<?php }?>
														<div class="form-group">
															<label class="col-sm-4 control-label no-padding-right" for="centre1">
																Test Centre <sup> <i class="icon-asterisk"></i> </sup> :
															</label>
												
															<div class="col-sm-8">
															<?php
																$testcenterlist = "<select class=\"width-80 chosen-select centres\" id=\"centre1\" name=\"centre1\" data-placeholder=\"Preference 1\">
																	<option value=\"\" disabled selected> Test Center</option>
																	<option value=\"Tirupati\"> Tirupati </option>
																	<option value=\"Vijayawda\"> Vijayawda </option>
																	<option value=\"Visakhapatnam\"> Visakhapatnam </option>
																	<option value=\"Hyderabad\"> Hyderabad </option>
																	<option value=\"Warangal\"> Warangal </option>
																	<option value=\"Anantapur\"> Anantapur </option>
																	<option value=\"Kakinada\"> Kakinada </option>
																</select>";
																if($profile_flag!=0) 
																	echo str_replace('value="' . $test_center1 . '"','value="' . $test_center1 . '" selected',$testcenterlist);
																else
																	echo $testcenterlist;
															?>
															</div>
														</div>
														
														
													</div>
													
													<div class="form-group">
														<label class="col-sm-4 control-label no-padding-right">
															Exam Type <sup> <i class="icon-asterisk"></i> </sup> :
														</label>

														<div class="col-sm-8">
															<label class="inline">
																<input type="radio" name="exam" <?php if($profile_flag!=0 && $examtype=="GAT") echo "checked" ?> id="GAT" value="GAT" class="ace" />
																<span class="lbl"> GAT </span>
															</label>

															&nbsp; &nbsp; 
															<label class="inline">
																<input  type="radio" name="exam" <?php if($profile_flag!=0 && $examtype=="GRE") echo "checked" ?> id="GRE" value="GRE" class="ace" />
																<span class="lbl"> GRE</span>
															</label>
															&nbsp; &nbsp;
															(Select GRE if you have valid scores)
														</div>
														
													</div>
													
													<h4 class="header blue smaller"> GRE Applicants (<sup> <i class="icon-asterisk"></i> </sup>for GRE Applicants) </h4>
													
													<div class="vspace-xs"></div>
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="greQuant">
																Quant + Verbal <sup> <i class="icon-asterisk"></i> </sup>:
														</label>

														<div class="col-sm-3">
															<input <?php if($profile_flag!=0 && $examtype=="GRE") echo "value='".$gre_score."'" ?> class="input-large gre-input" type="number" id="greScore" name="greScore" />
														</div> 
														<label class="col-sm-3 control-label no-padding-right" for="greAnalytical">
																Analytical <sup> <i class="icon-asterisk"></i> </sup>:
														</label>
														<div class="col-sm-3">
															<input <?php if($profile_flag!=0 && $examtype=="GRE") echo "value='".$gre_analytical."'" ?> class="input-large gre-input" type="number" id="greAnalytical" name="greAnalytical" />
														</div>
													</div>
													
													<h4 class="header blue smaller"> TOEFL (optional) </h4>
													
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="toefl">
																TOEFL score:
														</label>

														<div class="col-sm-3">
															<input class="input-large" type="number" id="toefl" name="toefl" <?php if($profile_flag!=0) echo "value='".$toefl_score."'"?> />
														</div>
														<label class="col-sm-3 control-label no-padding-right" for="toefl">
																IELTS score:
														</label>

														<div class="col-sm-3">
															<input class="input-large" type="number" id="ielts" name="ielts" <?php if($profile_flag!=0) echo "value='".$ielts_score."'"?> />
														</div>
													</div>
													
													<div class="warning-block alert alert-warning hidden">
															<center> <strong> Saving Data Please Wait...</strong> </center>
													</div>
													
													<div class="success-block alert alert-success hidden">
															<center> <strong> Your exam details has been successfully saved </strong> </center>
													</div>
													

													
													
												
												
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>
												<button class="btn btn-sm" type="reset">
																<i class="icon-undo bigger-110"></i>
																Reset
															</button>
												<button class="btn btn-sm btn-primary" type="submit">
													<i class="ace-icon fa fa-check"></i>
													Save
												</button>
											</div>
											</form>
											
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
				
						<div id="modal-walkin-form" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											
											<div class="modal-body">
											
											<form class="form-horizontal" id="walkin-exam-form">
													
													<h4 class="header blue bolder smaller"> Enter the following details </h4>
													
													
													
													
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right">
															Test Center <sup> <i class="icon-asterisk"></i> </sup> :
															<br> (Select Test Center for Walkin Process)
														</label>

														<div class="col-sm-8">
															
															<input  type="radio" name="center"   id="center1" value="center1" class="ace" checked/>

																<span class="lbl"> &nbsp; &nbsp; Eduquity Career Technologies PVT LTD,<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;403, 4th Floor, Myhome Sarovar Plaza,<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Behind British Library, adjacent to medicity,<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Secretariat road, Hyderabad-63<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Ph:040-23243010<br> </span>
															

															&nbsp; &nbsp; &nbsp;
															<br>
															<br>

															
																<input  type="radio" name="center"   id="center2" value="center2" class="ace"/>
																<span class="lbl"> &nbsp; &nbsp; &nbsp;MSIT Learning Center,<br>
																				    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;University College of Engineering(Autonomous),<br>
																				    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Principal Building Block, JNTUK,<br>
																				   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kakinada - 533003, Mobile: 7799834586 <br></span>
															
														</div>
													</div>
													</br>
													</br>
													
													<div class="error-block alert alert-danger hidden">
													<i class="icon-remove"></i> <span class="message">  </span>
													</div> 
												
													
													
													
												
												
													

													
													
												
												
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>
												<button class="btn btn-sm" type="reset">
																<i class="icon-undo bigger-110"></i>
																Reset
															</button>
												<button class="btn btn-sm btn-primary" type="submit">
													<i class="ace-icon fa fa-check"></i>
													Save
												</button>
											</div>
											</form>
											
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
			
			
				
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
			
					<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#myapplications">GAT Application</a>
												</li>
												<li>
													<a data-toggle="tab" href="#mywalkinapplications">Walkin Application</a>
												</li>
												
											</ul>

											<div class="tab-content">
												
							<div id="myapplications" class="tab-pane  in active">
									<div class="widget-box">	
									<div class="widget-body">
										<div class="widget-main">
											
												<div class="table-responsive">
												<h5><span class="orange"><strong>GAT Application Details: </strong></span></h5>
												<table id="sample-table-1" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>GAT Application No</th>
														<th>Exam Type</th>
														<th>Test Center</th>
														<th>Date of Examination</th>
														<th>Slot of Examination</th>
														<th>Score</th>
														<th>Payment Type</th>
														<th>Payment Status</th>
														
													</tr>
												</thead>
												<tbody>
												<?php 
												$flag = 0;
												if ($stmt = $mysqli->prepare("SELECT appno,test_center1,examtype from ma_user_gat_exam_details WHERE email = ?")) { 
													$stmt->bind_param('s', $_SESSION['email']); 
													$stmt->execute();
													$stmt->store_result();
													$stmt->bind_result($appno, $testcenter, $Gexamtype); 
													while($stmt->fetch())
													{
														$flag=1;
														echo "<tr>";
														echo "<td>".$appno."</td>";
														echo "<td>".$Gexamtype."</td>";
														echo "<td>".$testcenter."</td>";
														echo "<td>Not Yet Decided</td>";
														echo "<td>Not Yet Decided</td>";
														echo "<td>Not Applicable</td>";
														echo "<td>";
														if(isset($_SESSION['payment_type'])) echo $_SESSION['payment_type'];
														echo "</td>";
														echo "<td>";
														if(isset($_SESSION['payment_status'])) echo $_SESSION['payment_status'];
														echo "</td>";													
														echo "</tr>";
													}
													$stmt->close();
													}
													if($flag==0)
													{
														echo "<tr><td colspan='6'>You have not applied for GAT</td></tr>";
													}

												?>
												</tbody>
												</table>
												
											<h5>&nbsp;</h5>
										  </div>
												<!-- /.table-responsive -->
																			
										</div>
									</div>
								</div>
							

							</div>					
							
							<div id="mywalkinapplications" class="tab-pane">
									<div class="widget-box">	
									<div class="widget-body">
										<div class="widget-main">
												<div class="table-responsive">
												<h5><span class="orange"><strong>Your Walkin Applications:</strong></span></h5>
												<table id="sample-table-1" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>Walk-in Application No</th>
														<th>Slot Center</th>
														<th>Date of Examination</th>
														<th>Slot of Examination</th>
														<th>Score</th>
														<th>Test Taken</th>
														<th>Payment Type</th>
														<th>Payment Status</th>
														
													</tr>
												</thead>
												<tbody>
												
											<?php
											
									$count=0;
									if ($stmt = $mysqli->prepare("SELECT count(walkinAppNo) FROM ma_walkin WHERE emailID = ?")) { 
									$stmt->bind_param('s', $_SESSION['email']); 
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($count); 
									$stmt->fetch();
									
									}

									
											
												$flag = 0;
												if ($stmt = $mysqli->prepare("SELECT walkinAppNo,TestCenter,slotdate,slotNo,Total,TestTaken,PaymentType,PaymentStatus  from ma_walkin WHERE emailID = ?")) { 
													$stmt->bind_param('s', $_SESSION['email']); 
													$stmt->execute();
													$stmt->store_result();
													$stmt->bind_result($appno, $testcenter,$slotdate, $slotno, $total, $testtaken,$paymenttype,$paymentstatus); 
													while($stmt->fetch())
													{
														$flag=1;
														$total=0;
														$total_score=0;
														if ($stmt1 = $mysqli->prepare("SELECT Total_C FROM ma_userscores WHERE Hallticket_No = ?")) { 
														$stmt1->bind_param('s', $appno); 
														$stmt1->execute();
														$stmt1->bind_result($total_score); 
														$stmt1->fetch();
														$total = $total_score;
														}
														else{
														echo $mysqli->error;
														}
														//echo $total_score;

														echo "<tr>";
														echo "<td>".$appno."</td>";
														
														echo "<td>"; if($testcenter=="center1") echo "Hyderabad"; else echo "Kakinada"; echo "</td>";
														if($slotdate==null && $paymentstatus=="yes"){echo "<td>"."<a href='slotbooking.php'>Book your Slot</a>"."</td>";}
														elseif($slotdate==null && $paymentstatus=="no"){echo "<td>"."Payment Pending"."</td>";}
														else{echo "<td>".$slotdate."</td>";}	
														if($slotno==1){echo "<td>"."10:00 A.M."."</td>";}
														elseif($slotno==2){echo "<td>"."2:00 A.M."."</td>";}
														//elseif($slotno==3){echo "<td>"."2:00 P.M."."</td>";}
														elseif($slotno==0 && $paymentstatus=="yes"){echo "<td>"."<a href='slotbooking.php'>Book your Slot</a>"."</td>";}
														elseif($slotno==0 && $paymentstatus=="no"){echo "<td>"."Payment Pending"."</td>";}
														else {echo "<td>"."Payment Pending"."</td>";}
														if($total==0){echo "<td>"."Exam Not Taken"."</td>";}
														else{echo "<td>".$total." <a href='get_scoredetails.php?userName=".$appno."'>Click here to Get Full Score Details</a></td>";}
														echo "<td>".$testtaken."</td>";
														if($slotdate==" "){echo "<td>"."payment pending"."</td>";}
														else{echo "<td>".$paymenttype."</td>";}
														echo "<td>".$paymentstatus."</td>";
														
														echo "</tr>";
														
														
													
													
													}
													$stmt->close();
													}
													if($flag==0)
													{
														echo "<tr><td colspan='6'>You have not applied for walkin</td></tr>";
													}
															?>
												</tbody>
											</table>
											<h5>&nbsp;</h5>
										  </div>
												<!-- /.table-responsive -->
																			
										</div>
									</div>
								</div>
							
							
									<div class="widget-box">	
										<div class="widget-body">
											<div class="widget-main">
													<form class="form-horizontal" href="#" id="walkin-exam-form">
													
													<h5><span class="orange"><strong>Apply for Walkin</strong></span></h5>
													
													
													
													
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right">
															Test Center <sup> <i class="icon-asterisk"></i> </sup> :
															<br> (Select Test Center for Walkin Process)
														</label>

														<div class="col-sm-8">
															
															<input  type="radio" name="center"   id="center1" value="center1" class="ace" checked />

																<span class="lbl"> &nbsp; &nbsp; Eduquity Career Technologies PVT LTD,<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;403, 4th Floor, Myhome Sarovar Plaza,<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Behind British Library, adjacent to medicity,<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Secretariat road, Hyderabad-63<br>
																					&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Ph:040-23243010<br> </span>
															

															&nbsp; &nbsp; &nbsp;
															

															
																<input  type="radio" name="center"   id="center2" value="center2" class="ace"/>
																<span class="lbl"> &nbsp; &nbsp; &nbsp;MSIT Learning Center,<br>
																				    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;University College of Engineering(Autonomous),<br>
																				    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Principal Building Block, JNTUK,<br>
																				   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kakinada - 533003 <br/> 
																				   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Mobile: 7799834586 <br></span>
															
														</div>
													</div>
													</br>
													</br>
													
													<div class="error-block alert alert-danger hidden">
													<i class="icon-remove"></i> <span class="message">  </span>
													</div> 
												
													<div class="clearfix form-actions">
														<div class="col-md-offset-3 col-md-9">
															<button class="btn btn-info" type="button" id="walkbtn">
																<i class="icon-ok bigger-110"></i>
																Apply for WALKIN
															</button>

															
														</div>
													</div>
													
													
												
												</form>
												
											</div> <!-- widget-main -->
										</div><!-- widget body -->
									</div> <!-- widget box -->
						

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
							<span class="blue bolder">MSIT</span>
							JNTU &copy; 2016-2017
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
		function alert_box(message)					
{
	bootbox.dialog({
		message: message, 
		buttons: {
			"success" : {
				"label" : "OK",
				"className" : "btn-sm btn-primary"
			}
		}
	});
}
jQuery(function($) {
				$('#sidebar2').insertBefore('.page-content');
			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			   
		
				$('a[ data-original-title]').tooltip();
			
	
		    $('#walkbtn').click(function() {
				var postData=$('#walkin-exam-form').serializeArray();
				$('#walkin-exam-form input,select,button').attr("disabled",true);
				bootbox.hideAll();
					bootbox.dialog({
						closeButton: false,
						message: '<div class="row">  ' +
									'<div class="col-md-12 center"> ' +
									'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
									'WALKIN Application is in Progress. Please Wait... ' +
									'</div></div>'
					});
				$.ajax(
				{
					url : "authentication/walkin_exam_details_update.php",
					type: "POST",
					data : postData,
					success:function(data, textStatus, jqXHR) 
					{
						bootbox.hideAll();
						bootbox.dialog({
								closeButton:false,
								message: "Congratulations! Your application has been saved successfully.", 
								buttons: {
									"success" : {
										"label" : "OK",
										"className" : "btn-sm btn-primary",
										callback: function()
										{
											bootbox.dialog({
												closeButton: false,
												message: '<div class="row">  ' +
															'<div class="col-md-12 center"> ' +
															'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
															'Please wait... ' +
															'</div></div>'
											});
											location.reload(true);
										}
									}
								}
						});					
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						bootbox.dialog({
							message: "Unable to save data due to network failure", 
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary"
								}
							}
						});
					}
				}).always(function(){
						$('#walkin-exam-form input,select,button').attr("disabled",false);	
				});			
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
