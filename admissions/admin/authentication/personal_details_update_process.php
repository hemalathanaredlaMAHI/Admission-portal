<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	include dirname(dirname(__FILE__)).'/db_connect.php';
	$post = (!empty($_POST)) ? true : false;

if($post)
{
	$email = $_POST['email'];
	$full_name = stripslashes($_POST['fullname']);
	$parent_name = stripslashes($_POST['parent']);
	$parent_relation = stripslashes($_POST['relation']);
	$nationality = stripslashes($_POST['nationality']);
	$gender = stripslashes($_POST['gender']);
	$btechstatus = stripslashes($_POST['btechstatus']);
	$btechyear = stripslashes($_POST['btechyear']);
	$date_of_birth = stripslashes($_POST['dob']);
	$address_line1 = stripslashes($_POST['address1']);
	$address_line2 = stripslashes($_POST['address2']);
	$place_town = stripslashes($_POST['village']);
	$city = stripslashes($_POST['city']);
	$pincode = stripslashes($_POST['pincode']);
	$mobile_no = stripslashes($_POST['mobile']);
	$landline_no = stripslashes($_POST['landline']);
	$board_name = stripslashes($_POST['board']);
	$board_serialno = stripslashes($_POST['serialno']);
	$btech = "Pursuing";
	if($btechstatus!="Pursuing")
		$btech = $btechyear;
	
	$offlinegatappno = stripslashes($_POST['offlinegatappno']);
	$offlinetestcentre = stripslashes($_POST['offlinetestcentre']);
	$offlineexam = stripslashes($_POST['offlineexam']);
	$offlinegreQuant = stripslashes($_POST['offlinegreQuant']);
	$offlinegreAnalytical = stripslashes($_POST['offlinegreAnalytical']);
	$offlinetoefl = stripslashes($_POST['offlinetoefl']);
	$offlineielts = stripslashes($_POST['offlineielts']);
	
	$ddno = stripslashes($_POST['offlineddno']);
	$issue_date = stripslashes($_POST['offlineissuedate']);
	$bank_name = stripslashes($_POST['offlinebankname']);
	$bank_branch = stripslashes($_POST['offlinebankbranch']);
	
	if ($insert_stmt = $mysqli->prepare("update ma_user_profile set full_name=?, gender =?, date_of_birth=?, nationality=?, address_line1=?, address_line2=?, place_town=?, city = ?, pincode=?, mobile_no=?, landline_no=?, parent_name=?, parent_relation=? where email = ? ")) {   			
			$insert_stmt->bind_param('ssssssssssssss', $full_name, $gender, $date_of_birth, $nationality, $address_line1, $address_line2, $place_town, $city, $pincode, $mobile_no, $landline_no, $parent_name, $parent_relation, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
		if ($insert_stmt = $mysqli->prepare("update ma_users set username=?, board_name =?, board_number=?, btech=?, phone_no=? where email = ? ")) {   			
			$insert_stmt->bind_param('ssssss', $full_name, $board_name, $board_serialno, $btech, $mobile_no, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
			$profileupdate = "yes";
			if ($insert_stmt = $mysqli->prepare("update ma_users set profileupdate = ? where email = ? ")) {   			
				$insert_stmt->bind_param('ss', $profileupdate, $email ); 
				$insert_stmt->execute();
				$insert_stmt->close();
				
				$actionType = stripslashes($_POST['offlineaction']);
				$ddactionType = stripslashes($_POST['offlineddaction']);
				$GAT_App_Number = stripslashes($_POST['offlinegatappno']);
				$admission_type = stripslashes($_POST['offlinecourse']);
				$test_center1 = stripslashes($_POST['offlinetestcentre']);
				$examtype = stripslashes($_POST['offlineexam']);
				$gre_analytical=0;
				$gre_score=0;
				$toefl_score = 0;
				$ielts_score = 0;
				if(isset($_POST['offlinegreAnalytical']))
					$gre_analytical = floatval(stripslashes($_POST['offlinegreAnalytical']));
				if(isset($_POST['offlinegreQuant']))
					$gre_score = intval(stripslashes($_POST['offlinegreQuant']));
				if(isset($_POST['offlinetoefl']))
					$toefl_score = intval(stripslashes($_POST['offlinetoefl']));
				if(isset($_POST['offlineielts']))
					$ielts_score = intval(stripslashes($_POST['offlineielts']));
				$PaymentType = "DD";
				$PaymentStatus = "yes";
				if($GAT_App_Number!="")
				{
					$appflag = 0;
					if($actionType=="UPDATE")
					{
						if ($insert_stmt = $mysqli->prepare("update gatApplications set 
														gatAppNo = ?, testCenter = ?, examType = ?, greAnalytical = ?,
														greScore = ?, toeflScore = ?, ieltsScore = ? where email = ?
														")) 
						{   			
							$insert_stmt->bind_param('ssssssss', $GAT_App_Number, $test_center1, $examtype, $gre_analytical,
																$gre_score,$toefl_score,$ielts_score, $email); 
							$insert_stmt->execute();
							$insert_stmt->close();
							$appflag = 1;
						}
						else
						{
							echo "Not able to Save your Personal Details. Please call us to help you.";
							exit;
						}			
					}
					else
					{
						if ($insert_stmt = $mysqli->prepare("insert into gatApplications(
															email, gatAppNo,testCenter, examType, greAnalytical,
															greScore, toeflScore, ieltsScore, 
															paymentType, paymentStatus) 
															values (?,?,?,?,?,?,?,?,?,?)")) {   			
							$insert_stmt->bind_param('ssssssssss',  $email, $GAT_App_Number,$test_center1, $examtype, $gre_analytical, 
																	$gre_score,$toefl_score,$ielts_score,$PaymentType,$PaymentStatus); 
							$insert_stmt->execute();
							$insert_stmt->close();
							$appflag = 1;
						}
						else
						{
							echo "Not able to Save your Personal Details. Please call us to help you.";
							exit;
						}
					}
					if($ddno!="" && $appflag == 1)
					{
						if($ddactionType=="UPDATE")
						{
							if ($insert_stmt = $mysqli->prepare("update ddTransactions set 
															ddno = ?, bank_name = ?, bank_branch = ?, issue_date = ?
															 where appno = ?
															")) 
							{   			
								$insert_stmt->bind_param('sssss', $ddno, $bank_name, $bank_branch, $issue_date, $GAT_App_Number); 
								$insert_stmt->execute();
								$insert_stmt->close();
							}
							else
							{
								echo "Not able to Save your Personal Details. Please call us to help you.";
								exit;
							}			
						}
						else
						{
							$offlinestatus = "Verified";
							if ($insert_stmt = $mysqli->prepare("insert into ddTransactions(email, appno, ddno, bank_name, bank_branch, issue_date, status) values(?,?,?,?,?,?,?) ")) 
							{   			
								$insert_stmt->bind_param('sssssss', $email, $GAT_App_Number, $ddno, $bank_name, $bank_branch, $issue_date,$offlinestatus); 
								$insert_stmt->execute();
								$insert_stmt->close(); 
							}
							else
							{
								echo "Not able to Save your Personal Details. Please call us to help you.";
								exit;
							}
						}		
					}							
				}
			}
			else
			{
				echo "Not able to Save your Personal Details. Please call us to help you.";
				exit;
			}
			echo "Successfully Saved the Details.";
		}
		else
		{
			echo "Not able to Save your Personal Details. Please call us to help you.";
		}
}}
?>