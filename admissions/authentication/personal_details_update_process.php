<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';
	$post = (!empty($_POST)) ? true : false;

if($post)
{

	$email = $_SESSION['email'];
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
	
	if ($insert_stmt = $mysqli->prepare("update ma_user_profile set full_name=?, gender =?, date_of_birth=?, nationality=?, address_line1=?, address_line2=?, place_town=?, city = ?, pincode=?, mobile_no=?, landline_no=?, parent_name=?, parent_relation=? where email = ? ")) {   			
			$insert_stmt->bind_param('ssssssssssssss', $full_name, $gender, $date_of_birth, $nationality, $address_line1, $address_line2, $place_town, $city, $pincode, $mobile_no, $landline_no, $parent_name, $parent_relation, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
		if ($insert_stmt = $mysqli->prepare("update ma_users set username=?, board_name =?, board_number=?, btech=?, phone_no=? where email = ? ")) {   			
			$insert_stmt->bind_param('ssssss', $full_name, $board_name, $board_serialno, $btech, $mobile_no, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
					
			if($_SESSION['profileupdate']!="yes")
			{
				$profileupdate = "yes";
				if ($insert_stmt = $mysqli->prepare("update ma_users set profileupdate = ? where email = ? ")) {   			
				$insert_stmt->bind_param('ss', $profileupdate, $email ); 
				$insert_stmt->execute();
				$insert_stmt->close();
				$_SESSION['profileupdate'] = $profileupdate;
				$_SESSION['mobile_no'] = $mobile_no;
				}
				else
				{
					echo "Not able to Save your Personal Details. Please call us to help you.";
					exit;
				}
			}
			echo "Successfully Saved your Personal Details.";
		}
		else
		{
			echo "Not able to Save your Personal Details. Please call us to help you.";
		}
}}
?>