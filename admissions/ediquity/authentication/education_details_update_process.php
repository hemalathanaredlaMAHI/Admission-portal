<?php
	include 'securelogin_functions.php';
	include 'functions.php';	
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';

$post = (!empty($_POST)) ? true : false;
if($post)
{
	$email = $_SESSION['email'];

	$sscExamName = stripslashes($_POST['sscExamName']);
	$sscYear = stripslashes($_POST['sscYear']);
	$sscInstitute = stripslashes($_POST['sscInstitute']);
	$sscBoard = stripslashes($_POST['sscBoard']);
	$sscPercentage = stripslashes($_POST['sscPercentage']);
	$sscClass = stripslashes($_POST['sscClass']);
	
	
	if ($insert_stmt = $mysqli->prepare("update ma_user_education_details set name_of_exam_tenth =?, year_of_passing_tenth=?, education_institute_tenth=?, board_of_tenth=?, overall_percentage_tenth=?, division_of_tenth=? where email = ? ")) {   			
			$insert_stmt->bind_param('sssssss', $sscExamName, $sscYear, $sscInstitute, $sscBoard, $sscPercentage, $sscClass, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
			
			echo "<br/>Successfully updated SSC details.";
		}
	else
	{
			echo "<br/>Not able to update your SSC details. Please contact Administrator.";
	}
	
	//inter
	$interExamName = stripslashes($_POST['interExamName']);
	$interYear = stripslashes($_POST['interYear']);
	$interInstitute = stripslashes($_POST['interInstitute']);
	$interBoard = stripslashes($_POST['interBoard']);
	$interPercentage = stripslashes($_POST['interPercentage']);
	$interClass = stripslashes($_POST['interClass']);
	
	
	if ($insert_stmt = $mysqli->prepare("update ma_user_education_details set name_of_exam_inter =?, year_of_passing_inter=?, education_institute_inter=?, board_of_inter=?, overall_percentage_inter=?, division_of_inter=? where email = ? ")) {   			
			$insert_stmt->bind_param('sssssss', $interExamName, $interYear, $interInstitute, $interBoard, $interPercentage, $interClass, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
			
			echo "<br/>Successfully updated Intermediate details.";
		}
	else
	{
			echo "<br/>Not able to update your Intermediate details. Please contact Administrator.";
	}

	//Degree
	$gradExamName = stripslashes($_POST['gradExamName']);
	$gradYear = stripslashes($_POST['gradYear']);
	$gradInstitute = stripslashes($_POST['gradInstitute']);
	$gradBoard = stripslashes($_POST['gradBoard']);
	$gradPercentage = stripslashes($_POST['gradPercentage']);
	$gradClass = stripslashes($_POST['gradClass']);
	
	
	if ($insert_stmt = $mysqli->prepare("update ma_user_education_details set name_of_exam_graduation =?, year_of_passing_graduation=?, education_institute_graduation=?, university_of_graduation=?, overall_percentage_graduation=?, division_of_graduation=? where email = ? ")) {   			
			$insert_stmt->bind_param('sssssss', $gradExamName, $gradYear, $gradInstitute, $gradBoard, $gradPercentage, $gradClass, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
			
			echo "<br/>Successfully updated Graduation details.";
		}
	else
	{
			echo "<br/>Not able to update your Graduation details. Please contact Administrator.";
	}
		
		//Post Degree
		$postgradExamName = stripslashes($_POST['postgradExamName']);
		if($postgradExamName==null || $postgradExamName=="")
		{
		}
		else
		{
		$postgradYear = stripslashes($_POST['postgradYear']);
		$postgradInstitute = stripslashes($_POST['postgradInstitute']);
		$postgradBoard = stripslashes($_POST['postgradBoard']);
		$postgradPercentage = stripslashes($_POST['postgradPercentage']);
		$postgradClass = stripslashes($_POST['postgradClass']);
	
	
		if ($insert_stmt = $mysqli->prepare("update ma_user_education_details set name_of_exam_postgraduation =?, year_of_passing_postgraduation=?, education_institute_postgraduation=?, university_of_postgraduation=?, overall_percentage_postgraduation=?, division_of_postgraduation=? where email = ? ")) {   			
			$insert_stmt->bind_param('sssssss', $postgradExamName, $postgradYear, $postgradInstitute, $postgradBoard, $postgradPercentage, $postgradClass, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
			
			echo "<br/>Successfully updated Post Graduation details.";
		}
		else
		{
			echo "<br/>Not able to update your Post Graduation details. Please contact Administrator.";
		}
		}
	
	if($_SESSION['educationdetails_status'] !="yes")
	{
		$educationdetails_status = "yes";
		if ($insert_stmt = $mysqli->prepare("update ma_users set educationdetails_status = ? where email = ? ")) {   			
			$insert_stmt->bind_param('ss', $educationdetails_status, $email ); 
			$insert_stmt->execute();
			$insert_stmt->close();
		}
		$_SESSION['educationdetails_status'] = $educationdetails_status;
	}
	
}
?>