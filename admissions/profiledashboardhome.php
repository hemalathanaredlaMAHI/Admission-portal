<?php include('activateaccesscheck.php'); ?>
<?php include('ma_config.php'); ?>
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
							MSIT ADMISSIONS - <?php  echo YEARTEXT; ?>
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
															
																					
													?>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small><?php echo $_SESSION['username'];?></small>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							
								<li>
									<a href="logout.php">
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
								<div class="col-xs-4"></div>
								<div class="col-xs-6 center">
								<br/>
									<div class="alert alert-danger">
											<strong>
												<i class="ace-icon fa fa-times"></i>
												<?php 
												if(
													isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']!="yes" &&
													isset($_SESSION['photo_status']) && $_SESSION['photo_status']!="yes"
												)
												{ 
													echo "Please upload your photo and update your profile details.";
												}
												else if(isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']!="yes")
												{ 
													echo "Please update your profile details by using the Edit link below.";
												}
												else if(isset($_SESSION['photo_status']) && $_SESSION['photo_status']!="yes")
												{ 
													echo "Please upload your photo by clicking on the default photo below.";
												}
												else
													echo "";
												?>
											</strong>
									</div>
								</div>
								<div class="col-xs-2"></div>
							</div>
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
			
						
								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
											<br/>
												<!-- #section:pages/profile.picture -->
												<span class="profile-picture">
													
													<?php 
														if($_SESSION["photo_status"]=="yes")
														{	
															echo "<img id=\"avatar\" class=\"editable img-responsive\" width=\"150\" height=\"200\" alt=\"User Profile Picture\" 
															src=\"authentication/profile_images/".preg_replace('/[^\w\.\- ]/', '', $profile_pic_url)."\" />";
															
														}
														else
														{
													?>
															<img id="avatar" class="editable img-responsive" src="../assets/avatars/profile-pic.jpg" />
													<?php } ?>
													
												</span>

												<!-- /section:pages/profile.picture -->
												<div class="space-4"></div>
												<span class="red" id="profileFullName">Please upload jpg/jpeg format only</span>
												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															
															<span class="white" id="profileFullName"><?php echo $full_name; ?></span>
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
														<span id="profileContactNumber"><?php echo $mobile_no; ?></span>
													</a>
													<br/>
													<a href="#" class="btn btn-link">
														<i class="ace-icon fa fa-envelope bigger-120 pink"></i>
														<?php echo $_SESSION['email']; ?>
													</a>

													
												</div>

												<div class="space-6"></div>

												<!--<div class="profile-social-links align-center">
													<a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
														<i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
													</a>

													<a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
														<i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
													</a>

													<a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
														<i class="middle ace-icon fa fa-pinterest-square fa-2x red"></i>
													</a>
												</div> -->
											</div>

											<!-- /section:pages/profile.contact -->
											
											<!-- #section:custom/extra.grid -->
											<!-- <div class="clearfix">
												<div class="grid2">
													<span class="bigger-175 blue">25</span>

													<br />
													Followers
												</div>

												<div class="grid2">
													<span class="bigger-175 blue">12</span>

													<br />
													Following
												</div>
											</div>-->

											<!-- /section:custom/extra.grid -->
											<!--<div class="hr hr16 dotted"></div>-->
										</div>

										<div class="col-xs-12 col-sm-9">
											<!-- #section:pages/profile.info -->
											<form id="dashboard-form">
											<span class="col-sm-12" style="text-align:right;" id="editprofileSpan">
												<a href="javascript:void(0)" id="editprofile">Edit <i class="fa fa-edit light-orange bigger-110"></i></a>
											</span>
											<span class="col-sm-12" style="text-align:right;display:none;" id="saveprofileSpan">
												<a href="javascript:void(0)" id="saveprofile">Save <i class="fa fa-save light-orange bigger-110"></i></a>
											</span>
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Full Name </div>

													<div class="profile-info-value">
														<span>
														<span id="fullnameText"><?php echo $full_name; ?></span>
														<span style="display:none;" id="fullnameEdit">
															<input style="width:300px;" class="col-sm-4" type="text" name="fullname" id="fullname" <?php if($full_name!="") echo "value='".$full_name."'"?> />
														</span>
														
														</span>
													</div>
												</div>
												

												<div class="profile-info-row">
													<div class="profile-info-name"> Parent</div>

													<div class="profile-info-value">
														<span>
															<span id="parentText"><?php if($parent_name!="") echo $parent_name." - ". $parent_relation; ?></span>
															<span style="display:none;" id="parentEdit">
																<input type="text" style="width:300px;" name="parent" id="parent" <?php if($parent_name!="") echo "value='".$parent_name."'"?> />
																&nbsp;&nbsp;&nbsp;
																<select id="relation" name="relation" id="relation">
																	<option value="">Select Relationship</option>
																	<option value="Father" <?php if($parent_relation!="" && $parent_relation=="Father") echo "selected" ?> >Father</option>
																	<option value="Mother" <?php if($parent_relation!="" && $parent_relation=="Mother") echo "selected" ?> >Mother</option>
																	<option value="Other"  <?php if($parent_relation!="" && $parent_relation=="Other") echo "selected" ?> >Other</option>
																</select>
															</span>
														</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Nationality</div>

													<div class="profile-info-value">
														<span>
														<span id="nationalityText"><?php if($nationality!="") echo $nationality; ?></span>
														<span id="nationalityEdit" style="display:none;">
														<?php	
																	$list = "<select style=\"width:300px;\" class=\"chosen-select\" id=\"nationality\" name=\"nationality\" data-placeholder=\"Choose a Country...\">
																		<option value=\"\" disabled selected>Choose a country</option>
																		<option value=\"Afghanistan\">Afghanistan</option>
																		<option value=\"Albania\">Albania</option>
																		<option value=\"Algeria\">Algeria</option>
																		<option value=\"American Samoa\">American Samoa</option>
																		<option value=\"Andorra\">Andorra</option>
																		<option value=\"Angola\">Angola</option>
																		<option value=\"Anguilla\">Anguilla</option>
																		<option value=\"Antigua and Barbuda\">Antigua and Barbuda</option>
																		<option value=\"Argentina\">Argentina</option>
																		<option value=\"Australia\">Australia</option>
																		<option value=\"Austria\">Austria</option>
																		<option value=\"Bahamas\">Bahamas</option>
																		<option value=\"Bahrain\">Bahrain</option>
																		<option value=\"Bangladesh\">Bangladesh</option>
																		<option value=\"Barbados\">Barbados</option>
																		<option value=\"Belgium\">Belgium</option>
																		<option value=\"Belize\">Belize</option>
																		<option value=\"Benin\">Benin</option>
																		<option value=\"Bermuda\">Bermuda</option>
																		<option value=\"Bhutan\">Bhutan</option>
																		<option value=\"Bolivia\">Bolivia</option>
																		<option value=\"Botswana\">Botswana</option>
																		<option value=\"Brazil\">Brazil</option>
																		<option value=\"Brunei Darussalam\">Brunei Darussalam</option>
																		<option value=\"Bulgaria\">Bulgaria</option>
																		<option value=\"Burkina Faso\">Burkina Faso</option>
																		<option value=\"Burundi\">Burundi</option>
																		<option value=\"Cambodia\">Cambodia</option>
																		<option value=\"Cameroon\">Cameroon</option>
																		<option value=\"Cape Verde\">Cape Verde</option>
																		<option value=\"Cayman Islands\">Cayman Islands</option>
																		<option value=\"Central African Rep.\">Central African Rep.</option>
																		<option value=\"Chad\">Chad</option>
																		<option value=\"Chile\">Chile</option>
																		<option value=\"China\">China</option>
																		<option value=\"Colombia\">Colombia</option>
																		<option value=\"Comoros\">Comoros</option>
																		<option value=\"Congo\">Congo</option>
																		<option value=\"Cook Islands\">Cook Islands</option>
																		<option value=\"Costa Rica\">Costa Rica</option>
																		<option value=\"Cuba\">Cuba</option>
																		<option value=\"Cyprus\">Cyprus</option>
																		<option value=\"Czechoslovakia\">Czechoslovakia</option>
																		<option value=\"Denmark\">Denmark</option>
																		<option value=\"Djibouti\">Djibouti</option>
																		<option value=\"Dominica\">Dominica</option>
																		<option value=\"Dominican Republic\">Dominican Republic</option>
																		<option value=\"Ecuador\">Ecuador</option>
																		<option value=\"Egypt\">Egypt</option>
																		<option value=\"El Salvador\">El Salvador</option>
																		<option value=\"Equatorial Guinea\">Equatorial Guinea</option>
																		<option value=\"Estonia\">Estonia</option>
																		<option value=\"Ethiopia\">Ethiopia</option>
																		<option value=\"Falkland Isl. (Malvinas)\">Falkland Isl. (Malvinas)</option>
																		<option value=\"Fiji\">Fiji</option>
																		<option value=\"Finland\">Finland</option>
																		<option value=\"France\">France</option>
																		<option value=\"Gabon\">Gabon</option>
																		<option value=\"Gambia\">Gambia</option>
																		<option value=\"Germany\">Germany</option>
																		<option value=\"Ghana\">Ghana</option>
																		<option value=\"Gibraltar\">Gibraltar</option>
																		<option value=\"Greece\">Greece</option>
																		<option value=\"Greenland\">Greenland</option>
																		<option value=\"Grenada\">Grenada</option>
																		<option value=\"Guadeloupe (Fr.)\">Guadeloupe (Fr.)</option>
																		<option value=\"Guam (US)\">Guam (US)</option>
																		<option value=\"Guatemala\">Guatemala</option>
																		<option value=\"Guinea\">Guinea</option>
																		<option value=\"Guinea Bissau\">Guinea Bissau</option>
																		<option value=\"Guyana\">Guyana</option>
																		<option value=\"Haiti\">Haiti</option>
																		<option value=\"Honduras\">Honduras</option>
																		<option value=\"Hong Kong\">Hong Kong</option>
																		<option value=\"Hungary\">Hungary</option>
																		<option value=\"Iceland\">Iceland</option>
																		<option value=\"India\" >India</option>
																		<option value=\"Indonesia\">Indonesia</option>
																		<option value=\"Iran\">Iran</option>
																		<option value=\"Iraq\">Iraq</option>
																		<option value=\"Ireland\">Ireland</option>
																		<option value=\"Israel\">Israel</option>
																		<option value=\"Italy\">Italy</option>
																		<option value=\"Ivory Coast\">Ivory Coast</option>
																		<option value=\"Jamaica\">Jamaica</option>
																		<option value=\"Japan\">Japan</option>
																		<option value=\"Jordan\">Jordan</option>
																		<option value=\"Kenya\">Kenya</option>
																		<option value=\"Kiribati\">Kiribati</option>
																		<option value=\"Korea (North)\">Korea (North)</option>
																		<option value=\"Korea (South)\">Korea (South)</option>
																		<option value=\"Kuwait\">Kuwait</option>
																		<option value=\"Laos\">Laos</option>
																		<option value=\"Latvia\">Latvia</option>
																		<option value=\"Lebanon\">Lebanon</option>
																		<option value=\"Lesotho\">Lesotho</option>
																		<option value=\"Liberia\">Liberia</option>
																		<option value=\"Libya\">Libya</option>
																		<option value=\"Liechtenstein\">Liechtenstein</option>
																		<option value=\"Lithuania\">Lithuania</option>
																		<option value=\"Luxembourg\">Luxembourg</option>
																		<option value=\"Macau\">Macau</option>
																		<option value=\"Madagascar (Republic of)\">Madagascar (Republic of)</option>
																		<option value=\"Malawi\">Malawi</option>
																		<option value=\"Malaysia\">Malaysia</option>
																		<option value=\"Maldives\">Maldives</option>
																		<option value=\"Mali\">Mali</option>
																		<option value=\"Malta\">Malta</option>
																		<option value=\"Martinique (Fr.)\">Martinique (Fr.)</option>
																		<option value=\"Mauritania\">Mauritania</option>
																		<option value=\"Mauritius\">Mauritius</option>
																		<option value=\"Mayotte\">Mayotte</option>
																		<option value=\"Mexico\">Mexico</option>
																		<option value=\"Monaco\">Monaco</option>
																		<option value=\"Mongolia\">Mongolia</option>
																		<option value=\"Montserrat\">Montserrat</option>
																		<option value=\"Morocco\">Morocco</option>
																		<option value=\"Mozambique\">Mozambique</option>
																		<option value=\"Myanmar\">Myanmar</option>
																		<option value=\"Namibia\">Namibia</option>
																		<option value=\"Nauru\">Nauru</option>
																		<option value=\"Nepal\">Nepal</option>
																		<option value=\"Netherlands\">Netherlands</option>
																		<option value=\"New Caledonia (Fr.)\">New Caledonia (Fr.)</option>
																		<option value=\"New Zealand\">New Zealand</option>
																		<option value=\"Nicaragua\">Nicaragua</option>
																		<option value=\"Niger\">Niger</option>
																		<option value=\"Nigeria\">Nigeria</option>
																		<option value=\"Niue\">Niue</option>
																		<option value=\"Norfolk Island\">Norfolk Island</option>
																		<option value=\"Northern Mariana Isl.\">Northern Mariana Isl.</option>
																		<option value=\"Norway\">Norway</option>
																		<option value=\"Oman\">Oman</option>
																		<option value=\"Pakistan\">Pakistan</option>
																		<option value=\"Panama\">Panama</option>
																		<option value=\"Papua New Guinea\">Papua New Guinea</option>
																		<option value=\"Paraguay\">Paraguay</option>
																		<option value=\"Peru\">Peru</option>
																		<option value=\"Philippines\">Philippines</option>
																		<option value=\"Pitcairn\">Pitcairn</option>
																		<option value=\"Poland\">Poland</option>
																		<option value=\"Polynesia (Fr.)\">Polynesia (Fr.)</option>
																		<option value=\"Portugal\">Portugal</option>
																		<option value=\"Puerto Rico (US)\">Puerto Rico (US)</option>
																		<option value=\"Qatar\">Qatar</option>
																		<option value=\"Reunion (Fr.)\">Reunion (Fr.)</option>
																		<option value=\"Romania\">Romania</option>
																		<option value=\"Russian Federation\">Russian Federation</option>
																		<option value=\"Rwanda\">Rwanda</option>
																		<option value=\"Saint Lucia\">Saint Lucia</option>
																		<option value=\"San Marino\">San Marino</option>
																		<option value=\"Saudi Arabia\">Saudi Arabia</option>
																		<option value=\"Senegal\">Senegal</option>
																		<option value=\"Seychelles\">Seychelles</option>
																		<option value=\"Sierra Leone\">Sierra Leone</option>
																		<option value=\"Singapore\">Singapore</option>
																		<option value=\"Somalia\">Somalia</option>
																		<option value=\"South Africa\">South Africa</option>
																		<option value=\"Spain\">Spain</option>
																		<option value=\"Sri Lanka\">Sri Lanka</option>
																		<option value=\"St. Pierre &amp; Miquelon\">St. Pierre &amp; Miquelon</option>
																		<option value=\"St.Vincent &amp; Grenadines\">St.Vincent &amp; Grenadines</option>
																		<option value=\"Sudan\">Sudan</option>
																		<option value=\"Suriname\">Suriname</option>
																		<option value=\"Swaziland\">Swaziland</option>
																		<option value=\"Sweden\">Sweden</option>
																		<option value=\"Switzerland\">Switzerland</option>
																		<option value=\"Syria\">Syria</option>
																		<option value=\"Taiwan\">Taiwan</option>
																		<option value=\"Tanzania\">Tanzania</option>
																		<option value=\"Thailand\">Thailand</option>
																		<option value=\"Togo\">Togo</option>
																		<option value=\"Tokelau\">Tokelau</option>
																		<option value=\"Tonga\">Tonga</option>
																		<option value=\"Tunisia\">Tunisia</option>
																		<option value=\"Turkey\">Turkey</option>
																		<option value=\"Tuvalu\">Tuvalu</option>
																		<option value=\"Uganda\">Uganda</option>
																		<option value=\"United Arab Emirates\">United Arab Emirates</option>
																		<option value=\"United Kingdom\">United Kingdom</option>
																		<option value=\"Uruguay\">Uruguay</option>
																		<option value=\"Vanuatu\">Vanuatu</option>
																		<option value=\"Venezuela\">Venezuela</option>
																		<option value=\"Vietnam\">Vietnam</option>
																		<option value=\"Wallis &amp; Futuna Islands\">Wallis &amp; Futuna Islands</option>
																		<option value=\"Yemen\">Yemen</option>
																		<option value=\"Yugoslavia\">Yugoslavia</option>
																		<option value=\"Zaire\">Zaire</option>
																		<option value=\"Zambia\">Zambia</option>
																		<option value=\"Zimbabwe\">Zimbabwe</option>
																	</select>";
																	if($nationality!="") 
																		echo str_replace('value="' . $nationality . '"','value="' . $nationality . '" selected',$list);
																	else echo $list;
																	?>
																</span>
																</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Gender </div>

													<div class="profile-info-value">
														<span>
														<span id="genderText"><?php if($gender!="") echo $gender; ?></span>
														<span id="genderEdit" style="display:none;">
														<label class="inline">
															<input type="radio" name="gender" id="gender" <?php if($gender!="" && $gender=="Male") echo "checked" ?> value="Male" class="ace" />
															<span class="lbl"> Male</span>
														</label>

														&nbsp; &nbsp; &nbsp;
														<label class="inline">
															<input type="radio" name="gender" id="gender" <?php if($gender!="" && $gender=="Female") echo "checked" ?> value="Female" class="ace" />
															<span class="lbl"> Female</span>
														</label>
														</span>
														</span>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Date of Birth </div>

													<div class="profile-info-value">
														<span>
														<span id="dobText"><?php if($date_of_birth!="") echo $date_of_birth; ?></span>
														<span id="dobEdit" style="display:none;">
														
														
														<div class="input-medium">
																		<div class="input-group">
																			<input class="input-medium date-picker" id="dob" name="dob" type="text" data-date-format="dd-mm-yyyy" 
																			placeholder="dd-mm-yyyy" <?php if($date_of_birth!="") echo "value='".$date_of_birth."'"?> />
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	</div>
														</span>
														</span>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Address </div>

													<div class="profile-info-value">
														<span>
														<span id="addressText">
															<i class="fa fa-map-marker light-orange bigger-110"></i>
															<?php if($address_line1!="") echo $address_line1.", ".$address_line2.", ".$place_town.", ".$city.", ".$pincode; ?>
														</span>
														<span id="addressEdit" style="display:none;">
															<input style="width:300px;" placeholder="Address" type="text" name="address1" id="address1" <?php if($address_line1!="") echo "value='".$address_line1."'"?> />
															<div class="space-6"></div>
															<input style="width:300px;" placeholder="Address" type="text" name="address2" id="address2" <?php if($address_line2!="") echo "value='".$address_line2."'"?> />	
															<div class="space-6"></div>
															<input style="width:300px;" placeholder="Villge or Town" type="text" name="village" id="village" <?php if($place_town!="") echo "value='".$place_town."'"?> />
															<div class="space-6"></div>
															<input style="width:200px;" placeholder="City" type="text" id="city" name="city" <?php if($city!="") echo "value='".$city."'"?> />
															&nbsp;&nbsp;&nbsp;<input placeholder="Pincode" style="width:100px;" type="text" name="pincode" id="pincode" <?php if($pincode!="") echo "value='".$pincode."'"?> />
														</span>
														</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Phone </div>

													<div class="profile-info-value">
														<span>
														<span id="phoneText"><?php if($mobile_no!="") echo "Mobile-".$mobile_no." Father-".$landline_no; ?></span>
														<span id="phoneEdit" style="display:none;">
														<input style="width:150px" placeholder="Mobile Number" type="tel" name="mobile" id="mobile" <?php if($mobile_no!="") echo "value='".$mobile_no."'"?> />
														&nbsp;&nbsp;&nbsp;
														<input style="width:150px" placeholder="Parent Number" type="tel" name="landline" id="landline"  <?php if($landline_no!="") echo "value='".$landline_no."'"?> required/>
														</span>
														</span>
													</div>
												</div>
												
												<div class="profile-info-row">
													<!--<div class="profile-info-name"> SSC/CBSE/ISCE </div>-->
													<div class="profile-info-name"> Btech Branch </div>

													<div class="profile-info-value">
														<span>
															<span id="boardText"><?php if($board_number!="") echo $board_name; if($board_number!="") echo " - ".$board_number; ?></span>
															<span id="boardEdit" style="display:none;">
															
															<select style="width:100px;" id="board" name="board">
																
																<option <?php if($board_name!="" && $board_name=="IT") echo "selected"?> value="IT">IT</option>

																<option <?php if($board_name!="" && $board_name=="CSE") echo "selected"?> value="CSE">CSE</option>

																

																<option <?php if($board_name!="" && $board_name=="ECE") echo "selected"?> value="ECE">ECE</option>
																<option <?php if($board_name!="" && $board_name=="EEE") echo "selected"?> value="EEE">EEE</option>
																<option <?php if($board_name!="" && $board_name=="CHE") echo "selected"?> value="CHE">CHE</option>
																<option <?php if($board_name!="" && $board_name=="CIVIL") echo "selected"?> value="CIVIL">CIVIL</option>
																<option <?php if($board_name!="" && $board_name=="MECH") echo "selected"?> value="MECH">MECH</option>
																<option <?php if($board_name!="" && $board_name=="OTHERS") echo "selected"?> value="OTHERS">OTHERS</option>








															</select>
															&nbsp;&nbsp;&nbsp;
															<!--<input type="text" <?php if($board_number!="") echo "value='".$board_number."'"?> style="width:200px;" id="serialno" name="serialno" placeholder="COLLEGE NAME" />-->
															College Name:
															<input type="text" style="width:200px;" id="serialno" name="serialno" placeholder="COLLEGE NAME" />

															</span>
														</span>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> B.Tech.</div>
													<div class="profile-info-value">
														<span>
														<span id="btechstatusText"><?php if($btech!="" && $btech=="Pursuing") echo "Pursuing now."; else echo "Passed in year ".$btech; ?> </span>
														<span id="btechstatusEdit" style="display:none;">
														<label class="inline">
															<input type="radio" name="btechstatus"  <?php if($btech!="" && $btech=="Pursuing") echo "checked" ?> value="Pursuing" class="ace" />
															<span class="lbl"> Final Year Pursuing</span>
														</label>

														&nbsp; &nbsp; &nbsp;
														<label class="inline">
															<input type="radio" name="btechstatus"  <?php if($btech!="" && $btech!="Pursuing") echo "checked" ?> value="Passed" class="ace" />
															<span class="lbl"> Passed in Year </span>
															<select style="width:150px;" id="btechyear" name="btechyear">
																<option value="" >Select Year of Pass</option>

															<?php 
															for($yr=date('Y');$yr>date('Y')-15;$yr--){
																$options = "<option value=".$yr;
																if($btech!="" && $btech==$yr) 
																	$options= $options. " selected";
																$options= $options.">".$yr."</option>";
																echo $options;
															}
															?>
																<!-- <option value="2017" <?php if($btech!="" && $btech=="2017") echo "selected" ?> >2017</option>
																<option value="2016" <?php if($btech!="" && $btech=="2016") echo "selected" ?> >2016</option>
																<option value="2015" <?php if($btech!="" && $btech=="2015") echo "selected" ?> >2015</option>
																<option value="2014" <?php if($btech!="" && $btech=="2014") echo "selected" ?> >2014</option>
																<option value="2013" <?php if($btech!="" && $btech=="2013") echo "selected" ?> >2013</option>
																<option value="2012" <?php if($btech!="" && $btech=="2012") echo "selected" ?> >2012</option>
																<option value="2011" <?php if($btech!="" && $btech=="2011") echo "selected" ?> >2011</option>
																<option value="2010" <?php if($btech!="" && $btech=="2010") echo "selected" ?> >2010</option>
																<option value="2009" <?php if($btech!="" && $btech=="2009") echo "selected" ?> >2009</option>
																<option value="2008" <?php if($btech!="" && $btech=="2008") echo "selected" ?> >2008</option>
																<option value="2007" <?php if($btech!="" && $btech=="2007") echo "selected" ?> >2007</option>
																<option value="2006" <?php if($btech!="" && $btech=="2006") echo "selected" ?> >2006</option>
																<option value="2005" <?php if($btech!="" && $btech=="2005") echo "selected" ?> >2005</option> -->
															</select>
														</label>
														</span>
														</span>
													</div>
												</div>
												
											</div>
												
												<div class="space-6"></div>
												<div class="warning-block alert alert-warning hidden">
													<center> <strong> Saving Data Please Wait...</strong> </center>
												</div>
												<div class="success-block alert alert-success hidden">
													<center> <strong> Your Details has been successfully saved </strong> </center>
												</div>

											<div class="space-10"></div>
											<div class="col-sm-12" id="submitbtndiv" style="text-align:right;display:none;">
												<button class="btn btn-info" type="submit" id="saveprofileBtn">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Save
												</button>
											</div>
											</form>	
												
											<!-- /section:pages/profile.info -->
											<div class="space-20"></div>

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
							JNTU &copy; <?php  echo YEARTEXT.'-'.(YEARTEXT+2); ?>
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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
function  btechvalidation(){
	
	if($("#dashboard-form input[name='btechstatus']:checked").val()=="Pursuing" )
	{
		$("#btechyear").attr('disabled',true);
		btechchecked=false;
	}
	else
	{
		$("#btechyear").attr('disabled',false);
		btechchecked=true;
	}
}
function expand(textbox) {
		if (!textbox.startW) { textbox.startW = textbox.offsetWidth; }
    
    var style = textbox.style;
    
    //Force complete recalculation of width
    //in case characters are deleted and not added:
    style.width = 0;
    
    //http://stackoverflow.com/a/9312727/1869660
    var desiredW = textbox.scrollWidth;
    //Optional padding to reduce "jerkyness" when typing:
    desiredW += textbox.offsetHeight;
    
    style.width = Math.max(desiredW, textbox.startW) + 'px';
}


jQuery(function($) {
		$(window).load(function(){
			<?php if(isset($_SESSION['profileupdate']) && $_SESSION['profileupdate']!="yes") 
					echo "$('#editprofile').trigger('click');";
			?>
		});
		
			jQuery.validator.addMethod("btech", function (value, element) {
		if(btechchecked&&value=="")	
			return false;
		else return true;

		}, "Please select the year of pass");
	$("#dashboard-form input[name='btechstatus']").change(function(){
			btechvalidation();		
		});
	btechvalidation();
	
		$('#dashboard-form').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				onClick:true,
				rules: {
					fullname:{
						required:true,
						minlength:5
					},
					parent: {
						required: true,
						minlength:4
					},
					relation: {
						required: true
					},
					nationality: {
						required: true
					},
					gender: {
						required: true
					},
					dob: {
						required: true
					},
					address1:{
						required:true
					},
					village:{
						required:true
					},
					city:{
						required:true
					},
					pincode:{
						required:true
					},
					mobile:{
						required:true
					},
					landline:{
						required:true
					},
					board:{
						required:true
					},
					serialno:{
						required:true
					},	
					btechyear:{
						btech:'required'
					}								
				},
		
				messages: {
					fullname: {
						required: "Please enter your Full Name.",
						minlength: "Full Name must be greater than 5 characters length."
					},
					parent: {
						required: "Please enter your parent/guardian name.",
						minlength: "Parent/Guardian name must be greater than 4 characters length."
					},
					relation: {
						required: "Please enter relationship with parent."
					},					
					nationality: {
						required: "Please select your nationality."
					},					
					gender: {
						required: "Please select your gender."
					},					
					dob: {
						required: "Please enter your date of birth"
					},
					address1:{
						required:"Please enter your home address"
					},
					village:{
						required:"Please enter your village/mandal/place name"
					},
					city:{
						required:"Please enter your city/town name"
					},
					pincode:{
						required:"Please enter your pincode of your home address"
					},					
					mobile:{
						required:"Please enter your mobile no"
					},
					landline:{
						required:"Please enter your father mobile no"
					},
					board:{
						required:"Please enter your board exam type"
					},
					serialno:{
						required:"Please enter your board serial no"
					}	
	
				},
		
				invalidHandler: function (event, validator) { //display error alert on form submit   
					//$('.alert-danger', $('.login-form')).show();
				},
		
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},
		
				success: function (e) {				
					$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
					$(e).remove();
				},		
				errorPlacement: function (error, element) {
					error.addClass('errorMessage');
					if(element.is(':checkbox') || element.is(':radio')) {
						var controls = element.closest('div[class*="col-"]');
						if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
						else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
					}
					else if(element.is('.select2')) {
						error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
					}
					else if(element.is('.chosen-select')) {
						error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
					}
					else error.insertAfter(element.parent());
				},		
				submitHandler: function (form) {
					//console.log("form successfully submitted");
					var postData=$(form).serializeArray();
					$('form .status-block').removeClass('hidden');
					$('form input,select,button').attr("disabled",true);
					
					$.ajax(
					{
						url : "authentication/personal_details_update_process.php",
						type: "POST",
						data : postData,
						success:function(data, textStatus, jqXHR) 
						{
							$('#fullnameText').html($('#fullname').val());
							$('#profileFullName').html($('#fullname').val());
							$('#fullnameText').show();
							$('#fullnameEdit').hide();

							$('#parentText').html($('#parent').val()+" - "+$('#relation').val());
							$('#parentText').show();
							$('#parentEdit').hide();

							$('#nationalityText').html($('#nationality').val());
							$('#nationalityText').show();
							$('#nationalityEdit').hide();

							$('#genderText').html($('#gender').val());
							$('#genderText').show();
							$('#genderEdit').hide();

							$('#dobText').html($('#dob').val());
							$('#dobText').show();
							$('#dobEdit').hide();

							$('#addressText').html("<i class=\"fa fa-map-marker light-orange bigger-110\"></i> "+$('#address1').val()+", "+$('#address2').val()+", "+$('#village').val()+", "+$('#city').val()+", "+$('#pincode').val());
							$('#addressText').show();
							$('#addressEdit').hide();

							$('#phoneText').html("Mobile-"+$('#mobile').val()+" Landline-"+$('#landline').val());
							$('#profileContactNumber').html($('#mobile').val());
							$('#phoneText').show();
							$('#phoneEdit').hide();

							$('#boardText').html($('#board').val()+" - "+$('#serialno').val());
							$('#boardText').show();
							$('#boardEdit').hide();

							if($("input[name='btechstatus']:checked").val() == "Pursuing")
								$('#btechstatusText').html("Pursuing now.");
							else
								$('#btechstatusText').html("Passed"); 
							$('#btechstatusText').show();
							$('#btechstatusEdit').hide();

							$('#editprofileSpan').show();
							$('#submitbtndiv').hide();
							$('#profilemessage').hide();
							bootbox.hideAll();
							bootbox.dialog({
								closeButton:false,
								message: data, 
								buttons: {
									"success" : {
										"label" : "OK",
										"className" : "btn-sm btn-primary",
										callback: function() {
													bootbox.hideAll();
													var box = bootbox.dialog({
														closeButton: false,
														message: '<div class="row">  ' +
																	'<div class="col-md-12 center"> ' +
																	'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
																	'Reloading. Please Wait... ' +
																	'</div></div>'
													});
													location.reload(true);
												  }
									}
								}
							});
						},
						beforeSend:function()
						{
							bootbox.hideAll();
							var box = bootbox.dialog({
								closeButton: false,
								message: '<div class="row">  ' +
											'<div class="col-md-12 center"> ' +
											'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
											'Saving Profile Details. Please Wait... ' +
											'</div></div>'
							});
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							bootbox.hideAll();
							bootbox.dialog({
								closeButton:false,
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
						$('form input,select,button').attr("disabled",false);
						
					}).done(function(){
						$('form .status-block').addClass('hidden');
						$('form .success-block').removeClass('hidden');
						
					});
					
				},
				invalidHandler: function (form) {
				}
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
			   
		
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
				
				//editables 
				
				$('#editprofile').click(function(){
					$('#fullnameText').hide();
					$('#fullnameEdit').show();

					$('#parentText').hide();
					$('#parentEdit').show();

					$('#nationalityText').hide();
					$('#nationalityEdit').show();

					$('#genderText').hide();
					$('#genderEdit').show();

					$('#dobText').hide();
					$('#dobEdit').show();

					$('#addressText').hide();
					$('#addressEdit').show();

					$('#phoneText').hide();
					$('#phoneEdit').show();

					$('#boardText').hide();
					$('#boardEdit').show();

					$('#btechstatusText').hide();
					$('#btechstatusEdit').show();

					$('#editprofileSpan').hide();
					$('#submitbtndiv').show();
					//$('#saveprofileSpan').show();

					});
				

				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em
			
					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							maxSize: 1100000,//~100Kb
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|jpeg',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 1000Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
						var submit_url = 'file-upload.php';//please modify submit_url accordingly
						var deferred = null;
						var avatar = '#avatar';

						//if value is empty (""), it means no valid files were selected
						//but it may still be submitted by x-editable plugin
						//because "" (empty string) is different from previous non-empty value whatever it was
						//so we return just here to prevent problems
						var value = $(avatar).next().find('input[type=hidden]:eq(0)').val();
						if(!value || value.length == 0) {
							deferred = new $.Deferred
							deferred.resolve();
							return deferred.promise();
						}

						var $form = $(avatar).next().find('.editableform:eq(0)')
						var file_input = $form.find('input[type=file]:eq(0)');
						var pk = $(avatar).attr('data-pk');//primary key to be sent to server

						var ie_timeout = null


						if( "FormData" in window ) {
							var formData_object = new FormData();//create empty FormData object
							
							//serialize our form (which excludes file inputs)
							$.each($form.serializeArray(), function(i, item) {
								//add them one by one to our FormData 
								formData_object.append(item.name, item.value);							
							});
							//and then add files
							$form.find('input[type=file]').each(function(){
								var field_name = $(this).attr('name');
								var files = $(this).data('ace_input_files');
								if(files && files.length > 0) {
									formData_object.append(field_name, files[0]);
								}
							});

							//append primary key to our formData
							formData_object.append('pk', pk);

							deferred = $.ajax({
										url: submit_url,
									   type: 'POST',
								processData: false,//important
								contentType: false,//important
								   dataType: 'json',//server response type
									   data: formData_object
							})
						}
						else {
							deferred = new $.Deferred

							var temporary_iframe_id = 'temporary-iframe-'+(new Date()).getTime()+'-'+(parseInt(Math.random()*1000));
							var temp_iframe = 
									$('<iframe id="'+temporary_iframe_id+'" name="'+temporary_iframe_id+'" \
									frameborder="0" width="0" height="0" src="about:blank"\
									style="position:absolute; z-index:-1; visibility: hidden;"></iframe>')
									.insertAfter($form);
									
							$form.append('<input type="hidden" name="temporary-iframe-id" value="'+temporary_iframe_id+'" />');
							
							//append primary key (pk) to our form
							$('<input type="hidden" name="pk" />').val(pk).appendTo($form);
							
							temp_iframe.data('deferrer' , deferred);
							//we save the deferred object to the iframe and in our server side response
							//we use "temporary-iframe-id" to access iframe and its deferred object

							$form.attr({
									  action: submit_url,
									  method: 'POST',
									 enctype: 'multipart/form-data',
									  target: temporary_iframe_id //important
							});

							$form.get(0).submit();

							//if we don't receive any response after 30 seconds, declare it as failed!
							ie_timeout = setTimeout(function(){
								ie_timeout = null;
								temp_iframe.attr('src', 'about:blank').remove();
								deferred.reject({'status':'fail', 'message':'Timeout!'});
							} , 30000);
						}


						//deferred callbacks, triggered by both ajax and iframe solution
						deferred
						.done(function(result) {//success
							var res = result[0];//the `result` is formatted by your server side response and is arbitrary
							if(res.status == 'OK') 
							{
								$(avatar).get(0).src = res.url;
								bootbox.dialog({
								message: "Your photo has been uploaded successfully.", 
								buttons: {
									"success" : {
										"label" : "OK",
										"className" : "btn-sm btn-primary",
										callback: function() {
													bootbox.hideAll();
													var box = bootbox.dialog({
														closeButton: false,
														message: '<div class="row">  ' +
																	'<div class="col-md-12 center"> ' +
																	'<i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
																	'Reloading. Please Wait... ' +
																	'</div></div>'
													});
													location.reload(true);
												  }
										}
									}
								});
							
							}
							else 
							{	
								/*bootbox.dialog({
									message: res.message, 
									buttons: {
										"error" : {
											"label" : "OK",
											"className" : "btn-sm btn-primary"
										}
									}
								});
								*/
								alert(res.message);
							}
								
						})
						.fail(function(result) {//failure
							alert("There was an error"+result);
						})
						.always(function() {//called on both success and failure
							if(ie_timeout) clearTimeout(ie_timeout)
							ie_timeout = null;	
						});

						return deferred.promise();
						},
						
						success: function(response, newValue) {
							//alert("===="+response);
						}
					})
				}catch(e) {}
				
				/**
				//let's display edit mode by default?
				var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
				if(blank_image) {
					$('#avatar').editable('show').on('hidden', function(e, reason) {
						if(reason == 'onblur') {
							$('#avatar').editable('show');
							return;
						}
						$('#avatar').off('hidden');
					})
				}
				*/
			
				//another option is using modals
				$('#avatar2').on('click', function(){
					var modal = 
					'<div class="modal fade">\
					  <div class="modal-dialog">\
					   <div class="modal-content">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Avatar</h4>\
						</div>\
						\
						<form class="no-margin">\
						 <div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
						 </div>\
						\
						 <div class="modal-footer center">\
							<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
							<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
						 </div>\
						</form>\
					  </div>\
					 </div>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'ace-icon fa fa-picture-o',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						allowExt: ['jpg', 'jpeg'],
						allowMime: ['image/jpg', 'image/jpeg']
					});
			
					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;
						
						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
						
						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();
							
							modal.modal("hide");
			
							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#avatar2').get(0).src = thumb;
			
							working = false;
						});
						
						
						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));
			
						return false;
					});
							
				});
			
				
			
				//////////////////////////////
				$('#profile-feed-1').ace_scroll({
					height: '250px',
					mouseWheelLock: true,
					alwaysVisible : true
				});
			
				$('a[ data-original-title]').tooltip();
			
				$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 72;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});
			  
				///////////////////////////////////////////
			
				//right & left position
				//show the user info on right or left depending on its position
				$('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
					var $this = $(this);
					var $parent = $this.closest('.tab-pane');
			
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $this.offset();
					var w2 = $this.width();
			
					var place = 'left';
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';
					
					$this.find('.popover').removeClass('right left').addClass(place);
				}).on('click', function(e) {
					e.preventDefault();
				});
			
			
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'ace-icon fa fa-picture-o',
					thumbnail:'large',
					droppable:true,
					
					allowExt: ['jpg', 'jpeg', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/gif']
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');
			
				$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);
			
			
				////////////////////
				//change profile
				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.user-profile').parent().addClass('hide');
					$('#user-profile-'+which).parent().removeClass('hide');
				});
				
				
				
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
