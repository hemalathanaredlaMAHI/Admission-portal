<?php include('accesscheck.php'); ?>
<!DOCTYPE html>
<?php 
sec_session_start();
include dirname(dirname(__FILE__)).'/ma_config.php';
include dirname(dirname(__FILE__)).'/db_connect.php';
$post = (!empty($_POST)) ? true : false;
if($post)
{
	if($_POST['regtype']=="search")
	{
		$query = "select * from ma_users where email = '".$_POST['searchemail']."'";
		$i = 0;
		if($stmt = $mysqli->prepare($query))
		{
			$stmt->execute();
			while ($stmt->fetch()) 
			{
				$i = 1;
			}
			$stmt->close();
		}
		if($i==0)
			header("Location:offlineApplication.php?message=USER NOT FOUND");
		
		$email = $_POST['searchemail'];
		$_SESSION["offlineemail"] = $email;
		$processstatus = "success";
	}
	else
	{
		$usertype = "student";
		$name = stripslashes($_POST['name']);
		$email = trim($_POST['email']);
		$_SESSION["offlineemail"] = $email;
		$password = stripslashes($_POST['p']);
		$board = $_POST['board'];
		$boardno = $_POST['serialno'];
		$btech = "-";
		$phone = "-";
		$status = "active";
		$profileupdate = "no";
		$photo_status = "no";
		$educationdetails_status = "no";
		$created = date('Y-m-d h:m:s');
		$email_status = "no";
		$processstatus = "success";
		$i = 0;
		$j = 0;
		$query = "select * from ma_users where email = '".$email."'";
		$query1 = "select * from ma_users where board_name = '".$board."' and board_number = '".$boardno."'";
		if($stmt = $mysqli->prepare($query))
		{
			$stmt->execute();
			while ($stmt->fetch()) 
			{
				$i = 1;
			}
			$stmt->close();
		}
		
		if($stmt = $mysqli->prepare($query1))
		{
			$stmt->execute();
			while ($stmt->fetch()) 
			{
				$j = 1;
			}
			$stmt->close();
		}
		
		if($i==1)
		{
				if($j==1)
				{	
					$processstatus = "ERR007: Invalid Email & Board. Please Try Again.";
				}
				else
				{
					$processstatus = "ERR006: Invalid Email. Please Try Again.";
				}
		}
		else if($j==1)
		{
			$processstatus = "ERR005: Invalid Board. Please Try Again.";
		}
		else
		{	
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
			$password = hash('sha512', $password.$random_salt);
			$mysqli->autocommit(FALSE);
			if ($insert_stmt = $mysqli->prepare("INSERT INTO ma_users 
												(username, email, password, salt, usertype, status, board_name, board_number,
												btech, phone_no, photo_status, profileupdate, educationdetails_status, created, email_status) 
												VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {    
				$insert_stmt->bind_param('sssssssssssssss', $name, $email, $password, $random_salt, $usertype, $status, $board, $boardno, 
															  $btech, $phoneno, $photo_status, $profileupdate, $educationdetails_status,$created,$email_status); 
				$insert_stmt->execute();
				$insert_stmt->close();
				
				if ($insert_stmt = $mysqli->prepare("INSERT INTO ma_user_profile (email, full_name) VALUES (?, ?)")) {   			
					$insert_stmt->bind_param('ss', $email, $name); 
					$insert_stmt->execute();
					$insert_stmt->close();

					if ($insert_stmt = $mysqli->prepare("INSERT INTO ma_user_education_details (email) VALUES (?)")) {   			
						$insert_stmt->bind_param('s', $email); 
						$insert_stmt->execute();
						$insert_stmt->close();
						$mysqli->commit();
						$processstatus = "success";
					}
					else
					{
						$processstatus = "ERR003: Unable to Register at this time.<br/>Please contact System Administrator.";
					}
				}
				else
				{
					$processstatus = "ERR002: Unable to Register at this time.<br/>Please contact System Administrator.";
				}
			}
			else
			{
				$processstatus = "ERR001: Unable to Register at this time.<br/>Please contact System Administrator.";
			}			
		}
	}	
}
else 
{ 
	$processstatus = "ERR004: Invalid Request. Please Try Again.";
}
?>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MSIT ADMISSIONS</title>
		<link rel="icon" href="http://msitprogram.net/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="http://msitprogram.net/favicon.ico" type="image/x-icon" />
		<meta name="description" content="MSIT Admissions 2016" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->
		<script src="assets/js/ace-extra.js"></script>
		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="common.css" />
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
										<h4 class="widget-title lighter">Offline Application</h4>
										<span class="pull-right"><a href="offlineApplication.php" class="btn btn-primary">CLICK HERE FOR NEW APPLICATION</a></span>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">										
										<?php 
												if($processstatus != "success"){
													echo "<span style='font-weight:bold;color:red;'>".$processstatus."</span><br/><br/><a href='offlineApplication.php'>Click Here to Start Again</a>"; 
												}
												else {
										?>
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
																$stmt->bind_param('s', $email); 
																$stmt->execute();
																$stmt->store_result();
																$stmt->bind_result($board_name, $board_number, $btech, $full_name, $gender, $date_of_birth, $nationality, 
																					$address_line1, $address_line2, $place_town, $city, $pincode, 
																					$mobile_no, $landline_no, $parent_name, $parent_relation, $profile_pic_url); 
																$stmt->fetch();
															}
															$thumb_pic_url = str_replace("-profile","-thumb",$profile_pic_url);
															
															$profile_flag = 0;
															$offlinegatappno = "";
															if ($stmt = $mysqli->prepare("SELECT 
																				gatAppNo,testCenter, examType, greAnalytical,
																				greScore, toeflScore, ieltsScore
																				from gatApplications WHERE email = ?")) { 
																$stmt->bind_param('s', $email); 
																$stmt->execute();
																$stmt->store_result();
																$stmt->bind_result($offlinegatappno, $offlinetestcentre, $offlineexam, $offlinegreAnalytical, $offlinegreQuant, $offlinetoefl, $offlineielts); 
																$stmt->fetch();
															}	

															if ($stmt = $mysqli->prepare("SELECT 
																				ddno,bank_name, bank_branch, issue_date 
																				from ddTransactions WHERE appno = ?")) { 
																$stmt->bind_param('s', $offlinegatappno); 
																$stmt->execute();
																$stmt->store_result();
																$stmt->bind_result($offlineddno, $offlinebankname, $offlinebankbranch, $offlineissuedate); 
																$stmt->fetch();
															}			
													?>
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-3 center">
					<div>
						<span class="profile-picture">
							<?php 
								if($profile_pic_url!=NULL && $profile_pic_url!="")
								{	
									echo "<img id='avatar' class='editable img-responsive' alt='User Profile Picture' 
									src='../authentication/profile_images/".preg_replace('/[^\w\.\- ]/', '', $profile_pic_url)."' />";
								}
								else
								{
							?>
									<img id="avatar" class="editable img-responsive" src="assets/avatars/profile-pic.jpg" />
							<?php } ?>
						</span>
						<div class="space-4"></div>
						<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
							<div class="inline position-relative">
								<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
									<span class="white" id="profileFullName"><?php echo $full_name; ?></span>
								</a>
							</div>
						</div>
					</div>
					<div class="space-6"></div>
				</div>
				<div class="col-xs-12 col-sm-9">
					<form id="dashboard-form">
						<div class="profile-user-info profile-user-info-striped">
							<div class="profile-info-row">
								<div class="profile-info-name"> Full Name </div>
								<div class="profile-info-value">
									<input type="hidden" name="email" id="email" <?php echo "value='".$email."'"?> />
									<input style="width:300px;" class="col-sm-4" type="text" name="fullname" id="fullname" <?php if($full_name!="") echo "value='".$full_name."'"?> />
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Parent</div>
									<div class="profile-info-value">
											<input type="text" style="width:300px;" name="parent" id="parent" <?php if($parent_name!="") echo "value='".$parent_name."'"?> />
											&nbsp;&nbsp;&nbsp;
											<select id="relation" name="relation" id="relation">
												<option value="">Select Relationship</option>
												<option value="Father" <?php if($parent_relation!="" && $parent_relation=="Father") echo "selected" ?> >Father</option>
												<option value="Mother" <?php if($parent_relation!="" && $parent_relation=="Mother") echo "selected" ?> >Mother</option>
												<option value="Other"  <?php if($parent_relation!="" && $parent_relation=="Other") echo "selected" ?> >Other</option>
											</select>
									</div>
							</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Nationality</div>
										<div class="profile-info-value">
											<?php	
												$list = "<select style=\"width:300px;\" class=\"chosen-select\" id=\"nationality\" name=\"nationality\" data-placeholder=\"Choose a Country...\">
													<option value=\"\" disabled selected>Choose a country</option>
													<option selected value=\"India\" >India</option>
												</select>";
												if($nationality!="") 
													echo str_replace('value="' . $nationality . '"','value="' . $nationality . '" selected',$list);
												else echo $list;
												?>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Gender </div>
										<div class="profile-info-value">
											<label class="inline">
												<input type="radio" name="gender" id="gender" <?php if($gender!="" && $gender=="Male") echo "checked" ?> value="Male" class="ace" />
												<span class="lbl"> Male</span>
											</label>
											&nbsp; &nbsp; &nbsp;
											<label class="inline">
												<input type="radio" name="gender" id="gender" <?php if($gender!="" && $gender=="Female") echo "checked" ?> value="Female" class="ace" />
												<span class="lbl"> Female</span>
											</label>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Date of Birth </div>
										<div class="profile-info-value">
											<div class="input-medium">
												<div class="input-group">
													<input class="input-medium date-picker" id="dob" name="dob" type="text" data-date-format="dd-mm-yyyy" data-date-end-date="31-12-1996" 
													placeholder="dd-mm-yyyy" <?php if($date_of_birth!="") echo "value='".$date_of_birth."'"?> />
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Address </div>
										<div class="profile-info-value">
												<input style="width:300px;" placeholder="Address" type="text" name="address1" id="address1" <?php if($address_line1!="") echo "value='".$address_line1."'"?> />
												<div class="space-6"></div>
												<input style="width:300px;" placeholder="Address" type="text" name="address2" id="address2" <?php if($address_line2!="") echo "value='".$address_line2."'"?> />	
												<div class="space-6"></div>
												<input style="width:300px;" placeholder="Villge or Town" type="text" name="village" id="village" <?php if($place_town!="") echo "value='".$place_town."'"?> />
												<div class="space-6"></div>
												<input style="width:200px;" placeholder="City" type="text" id="city" name="city" <?php if($city!="") echo "value='".$city."'"?> />
												&nbsp;&nbsp;&nbsp;<input placeholder="Pincode" style="width:100px;" type="text" name="pincode" id="pincode" <?php if($pincode!="") echo "value='".$pincode."'"?> />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Phone </div>
										<div class="profile-info-value">
											<input style="width:150px" placeholder="Mobile Number" type="tel" name="mobile" id="mobile" <?php if($mobile_no!="") echo "value='".$mobile_no."'"?> />
											&nbsp;&nbsp;&nbsp;
											<input style="width:150px" placeholder="Landline Number" type="tel" name="landline" id="landline"  <?php if($landline_no!="") echo "value='".$landline_no."'"?> />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> SSC/CBSE/ISCE </div>
										<div class="profile-info-value">
												<select style="width:100px;" id="board" name="board">
													<option value="SSC">SSC</option>
													<option value="CBSE">CBSE</option>
													<option value="ICSE">ICSE</option>
												</select>
												&nbsp;&nbsp;&nbsp;
												<input type="text" <?php if($board_number!="") echo "value='".$board_number."'"?> style="width:200px;" id="serialno" name="serialno" placeholder="SSC/CBSE/ISCE No" />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> B.Tech. </div>
										<div class="profile-info-value">
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
													<option value="2016" <?php if($btech!="" && $btech=="2016") echo "selected" ?> >2016</option><!-- change by Ranjith -->
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
													<option value="2005" <?php if($btech!="" && $btech=="2005") echo "selected" ?> >2005</option>
												</select>
											</label>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> GAT Applicaation NO</div>
											<div class="profile-info-value">
													<input type="text" style="width:300px;" name="offlinegatappno" id="offlinegatappno" <?php if($offlinegatappno!="") echo "value='".$offlinegatappno."'"?> />
													<input type="hidden" name="offlineaction" id="offlineaction" <?php if($offlinegatappno!="") echo "value='UPDATE'"; else echo "value='INSERT'"; ?> />
													<input type="hidden" name="offlinecourse" id="offlinecourse" value="2">
													&nbsp;&nbsp;&nbsp;
													<select class='centres' id='offlinetestcentre' name='offlinetestcentre'>
														<option value=''> Test Center</option>
														<option value="1" <?php if($offlinetestcentre=="1") echo "selected"; ?> >Tirupati</option>
														<option value="2" <?php if($offlinetestcentre=="2") echo "selected"; ?> >Vijayawda</option>
														<option value="3" <?php if($offlinetestcentre=="3") echo "selected"; ?> >Warangal</option>
														<option value="4" <?php if($offlinetestcentre=="4") echo "selected"; ?> >Visakhapatnam</option>
														<option value="5" <?php if($offlinetestcentre=="5") echo "selected"; ?> >Kakinada</option>
														<option value="6" <?php if($offlinetestcentre=="6") echo "selected"; ?> >Anantapur</option>
														<option value="7" <?php if($offlinetestcentre=="7") echo "selected"; ?> >Hyderabad</option>
													</select>
											</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> GAT/GRE </div>
										<div class="profile-info-value">
											<label class="inline">
												<input type="radio" name="offlineexam" id="GAT" <?php if($offlineexam!="" && $offlineexam=="GAT") echo "checked" ?> value="GAT" class="ace" />
												<span class="lbl"> GAT</span>
											</label>
											&nbsp; &nbsp; &nbsp;
											<label class="inline">
												<input type="radio" name="offlineexam" id="GRE" <?php if($offlineexam!="" && $offlineexam=="GRE") echo "checked" ?> value="GRE" class="ace" />
												<span class="lbl"> GRE</span>
											</label>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> GRE Score </div>
										<div class="profile-info-value">
											<input style="width:150px;" placeholder="Quant + Verbal" type="text" id="offlinegreQuant" name="offlinegreQuant" <?php if($offlinegreQuant!="") echo "value='".$offlinegreQuant."'"?> />
											&nbsp;&nbsp;&nbsp;
											<input placeholder="Analytical" style="width:150px;" type="text" name="offlinegreAnalytical" id="offlinegreAnalytical" <?php if($offlinegreAnalytical!="") echo "value='".$offlinegreAnalytical."'"?> />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> TOEFL Score </div>
										<div class="profile-info-value">
											<input style="width:200px;" placeholder="TOEFL Score" type="text" id="offlinetoefl" name="offlinetoefl" <?php if($offlinetoefl!="") echo "value='".$offlinetoefl."'"?> />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> IELTS Score </div>
										<div class="profile-info-value">
											<input style="width:200px;" placeholder="IELTS Score" type="text" id="offlineielts" name="offlineielts" <?php if($offlineielts!="") echo "value='".$offlineielts."'"?> />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> DD No.</div>
										<div class="profile-info-value">
											<input type="hidden" name="offlineddaction" id="offlineddaction" <?php if($offlineddno!="") echo "value='UPDATE'"; else echo "value='INSERT'"; ?> />
											<input style="width:200px;" placeholder="DD No" type="text" id="offlineddno" name="offlineddno" <?php if($offlineddno!="") echo "value='".$offlineddno."'"?> />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> DD Issue Date </div>
										<div class="profile-info-value">
											<div class="input-medium">
												<div class="input-group">
													<input class="input-medium date-picker" id="offlineissuedate" name="offlineissuedate" <?php if($offlineissuedate!="") echo "value='".$offlineissuedate."'"?> type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
													<span class="input-group-addon">
														<i class="icon-calendar"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Bank Name</div>
										<div class="profile-info-value">
											<input style="width:200px;" placeholder="Bank Name" type="text" id="offlinebankname" name="offlinebankname" <?php if($offlinebankname!="") echo "value='".$offlinebankname."'"?> />
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Bank Branch</div>
										<div class="profile-info-value">
											<input style="width:200px;" placeholder="Bank Branch" type="text" id="offlinebankbranch" name="offlinebankbranch" <?php if($offlinebankbranch!="") echo "value='".$offlinebankbranch."'"?> />
										</div>
									</div>
								</div>
								<div class="space-6"></div>
								<div class="error-block alert alert-warning hidden" id='errorblock'>
									<span style="font-color:red;"><center> <strong> Please clear the below errors...</strong> </center></span>
								</div>
								<div class="warning-block alert alert-warning hidden">
									<center> <strong> Saving Data Please Wait...</strong> </center>
								</div>
								<div class="success-block alert alert-success hidden">
									<center> <strong> Details has been successfully saved </strong> </center>
								</div>
								<div class="space-10"></div>
								<div class="col-sm-12" id="submitbtndiv" style="text-align:right;">
									<button class="btn btn-info" type="submit" id="saveprofileBtn">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Save
									</button>
								</div>
							</form>	
					<div class="space-20"></div>
				</div>
			</div>
		</div>

												<?php } ?>					
								
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
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/jquery.gritter.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.easypiechart.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="assets/js/jquery.hotkeys.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.js"></script>
		<script src="assets/js/select2.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.js"></script>
		<script src="assets/js/x-editable/bootstrap-editable.js"></script>
		<script src="assets/js/x-editable/ace-editable.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>


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
jQuery(function($) {
	
	jQuery.validator.addMethod("btech", function (value, element) {
		if(btechchecked&&value=="")	
			return false;
		else return true;

		}, "Please select the year of pass");
	$("#dashboard-form input[name='btechstatus']").change(function(){
			btechvalidation();		
		});
	btechvalidation();
	$(".loader").fadeOut("slow");
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
			board:{
				required:true
			},
			serialno:{
				required:true
			},
			btechyear:{
				required:true
			},
			offlinegatappno:{
				required:true
			},
			offlinetestcentre:{
				required:true
			},
			offlineexam:{
				required:true
			},
			offlineddno:{
				required:true
			},
			offlinebankname:{
				required:true
			},
			offlinebankbranch:{
				required:true
			},
			offlineissuedate:{
				required:true
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
			board:{
				required:"Please enter your board exam type"
			},
			serialno:{
				required:"Please enter your board serial no"
			},
			offlinegatappno:{
				required:"Please enter the Application Number"
			},
			offlinetestcentre:{
				required:"Please select the Test Center"
			},
			offlineexam:{
				required:"Please select the exam type"
			},
			offlineddno:{
				required:"Please enter the DD number"
			},
			offlinebankname:{
				required:"Please enter the bank name"
			},
			offlinebankbranch:{
				required:"Please enter the bank branch"
			},
			offlineissuedate:{
				required:"Please enter the dd issue date"
			}
		},
		invalidHandler: function (event, validator) { 
		},
		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},	
		success: function (e) {				
			$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
			$(e).remove();
		},	
		
		showErrors: function(errorMap, errorList) {
			
			if(errorList.length!=0)
			{
				$('#errorblock').removeClass('hidden');
				$('#errorblock').html(errorList[0].message);				
			}
			else{
				$('#errorblock').addClass('hidden');
			}
		},	
		errorPlacement: function (error, element) {
			 error.appendTo("div.error-block");
		},		
		submitHandler: function (form) {
			bootbox.hideAll();
			bootbox.dialog({
				closeButton: false,
				message: '<div class="row">  ' +
							'<div class="col-md-12 center"> ' +
							'<br/><br/><i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i> ' +
							'Profile update in progress. Please Wait... ' +
							'<br/><br/></div></div>'
			});
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
					bootbox.hideAll();
					bootbox.dialog({
						message: data, 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary",
								callback: function() {
									window.location="offlineApplication.php?processmsg="+data;
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
				$.fn.editableform.loading = "<div class='editableform-loading'>Uploading...<i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
				
				//editables 
				

				
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
							btn_choose: 'Click Me to Change',
							droppable: true,
							maxSize: 1100000,//~100Kb
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|jpeg|png image!',
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
								$(avatar).get(0).src = res.url+"?timestamp=" + new Date().getTime();
								//$(avatar).get(0).attr("src", "/myimg.jpg?timestamp=" + new Date().getTime());
								$('#photomessage').hide();
							}
							else 
							{	
								alert("...."+res.message);
							}
						})
						.fail(function(result) {//failure
							alert("There was an error");
						})
						.always(function() {//called on both success and failure
							if(ie_timeout) clearTimeout(ie_timeout)
							ie_timeout = null;	
						});

						return deferred.promise();
						},
						
						success: function(response, newValue) {
							//consoloe.log("===="+response);
						}
					})
				}catch(e) {}
				
			
				
			
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
					
					allowExt: ['jpg', 'jpeg', 'png', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
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
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
	<!--	<link rel="stylesheet" href="../docs/assets/js/themes/sunburst.css" /> -->

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="assets/js/ace/elements.onpage-help.js"></script>
		<script src="assets/js/ace/ace.onpage-help.js"></script>
<!--		<script src="../docs/assets/js/rainbow.js"></script>
		<script src="../docs/assets/js/language/generic.js"></script>
		<script src="../docs/assets/js/language/html.js"></script>
		<script src="../docs/assets/js/language/css.js"></script>
		<script src="../docs/assets/js/language/javascript.js"></script>
	-->	<script src="assets/js/jquery.validate.js"></script>
	</body>
</html>

