<?php
	include dirname(dirname(__FILE__)).'/db_connect.php';
	header('Access-Control-Allow-Origin: *');
	$myArray = array();

	$status = "";
	if(isset($_GET["status1"])){
		$status = $_GET["status1"];
	}

	## Read value
	//$draw = $_POST['draw'];
	$start = $_GET['iDisplayStart'];
	$length = $_GET['iDisplayLength']; // Rows display per page	
	$searchValue = $_GET['sSearch']; // Search value
	
	$qry = "select student.*, student_zoomlinks.*, gat_call_letters.*, counselling_payment.*, online_counselling_slots.* from student_zoomlinks left join gat_call_letters on gat_call_letters.email=student_zoomlinks.email left join counselling_payment on counselling_payment.primaryEmail=student_zoomlinks.email left join student on student.primaryEmail=student_zoomlinks.email left join online_counselling_slots on online_counselling_slots.id=student_zoomlinks.zoomlinkId";

	if( $status!='')  
	{	
		if( $status=='declaration_verified')  
		{	
			$qry = $qry." where student_zoomlinks.verification_status='Verified'";	
		}

		if( $status=='declaration_not_verified')  
		{	
			$qry = $qry." where student_zoomlinks.verification_status!='Verified'";	
		}

		if( $status=='admission_under_process')  
		{	
			$qry = $qry." where student_zoomlinks.admission_status='' and student_zoomlinks.preferences!=''";	
		}

		if( $status=='admission_alloted')  
		{	
			$qry = $qry." where student_zoomlinks.admission_status='Alloted'";	
		}

		if( $status=='admission_refund')  
		{	
			$qry = $qry." where student_zoomlinks.admission_status='Refund'";	
		}

		if( $status=='paymentverified')  
		{	
			$qry = $qry." where counselling_payment.Verification='admission_refund'";	
		}
		if( $status=='all')  
		{	
			$qry = $qry." where student_zoomlinks.admission_status=''";	
		}	
	}
	else{
		$qry = $qry." where student_zoomlinks.admission_status=''";	
	}

	## Search 
	$searchQuery = "";
	if($searchValue != ''){
	   $qry = $qry." and (student_zoomlinks.email like '%".$searchValue."%' or 
	        student_zoomlinks.rank='".$searchValue."') ";
	}
	//echo $qry; die();
	## Total number of records without filtering
	$sel = $mysqli->query($qry);	
	$totalRecords = $sel->num_rows;

	$qry = $qry." order by gat_call_letters.rank limit $start, $length";
	if ($result = $mysqli->query($qry)) 
	{
		$tempArray = array();

		$file_path = "../../webcounselling/admin/uploads/";
		$profile_file_path = "../authentication/profile_images/";
		while($row = $result->fetch_array()) 
		{
			$tempArray = [];
			$rank = "";
			$rank_temp = "";
			if(isset($row[23]))
				$rank = "<span style='color:green;font-weight:bold;font-size:14px;'>".$row[23]."</span>";
				$rank_temp = $row[23];

			$tempArray["Personal_Details"] = "<b>Rank : </b>".$rank."<br/><b>Full Name : </b>".$row[0]." ".$row[1]."<br/><b>DOB : </b>".date("d-m-Y",strtotime($row[2]))."<br/><b>Govt ID : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[3]."'>".$row[3]."</a>"."<br/><br/> <b>Email : </b>".$row[4]."<br/><b>Mobile : </b>".$row[5]."<br/><b>Alt Mobile : </b>".$row[6]."<br/><b>Father Name : </b>".$row[7]."<br/><b>Father Mobile : </b>".$row[8]."<br/><b>Mother Name : </b>".$row[10]."<br/><b>Mother Mobile : </b>".$row[11];

			$dt_tm = $row[72]." ".$row[73];
			$tempArray["zoom_call_details"] = "<b>Date & Time: </b><br/>".date("d-m-Y h:i A",strtotime($dt_tm))."<br/><b>Session : </b>".$row[74]."<br/><br/><b>Zoom Link : </b><br/><a target='_blank' href='".$row[77]."'>".$row[78]."</a><br/><b>Meeting ID : </b>".$row[78]."<br/><b>Password : </b>".$row[79];
;

			$tempArray["admission"] = "<b>Learing Center :</b> ".$row[30]."<br/><b>Attendence Photo : </b>  <a target='_blank' href='".$file_path.$row[4]."/".$row[31]."'>".$row[31]."</a><br/><br/>";

			if($row[32]=="Alloted"){
				$tempArray["admission"] = $tempArray["admission"]."<a href='../authentication/admitletters/".$row[41].".pdf' target='_blank'><spa><i class='menu-icon fa fa-download'></i></span>&nbsp;Admit Letter</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='../authentication/admitletters/".$row[41]."_loan_doc.pdf' target='_blank'><spa><i class='menu-icon fa fa-download'></i></span>&nbsp;Loan Document</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href='../authentication/send_admission_docs.php?email=".$row[4]."' target='_blank' class='btn btn-sm btn-success'>Send Mail</a>";

				$tempArray["admission"] = $tempArray["admission"]."<br/><br/><b>Admission : </b><br/><b>Status : </b>".$row[32]."<br/><b>Learing Center : </b>".$row[36]."<br/><b>Serial No. : </b>".$row[35]."<br/><b>Remarks : </b>".$row[33]."<br/><b>Updated By : </b>".$row[34]."<br/>at ".date("d-m-Y h:iA",strtotime($row[38]))."<br/>";
			}
			else if($row[32]=="Refund"){
				//$tempArray["admission"] = $tempArray["admission"]."<Button class='btn btn-sm btn-success' onclick='admitOrReject(\"".$row[4]."\")'>Allot/Refund</Button>";

				$tempArray["admission"] = $tempArray["admission"]."<br/><br/><b>Admission : </b><br/><b>Status : </b>".$row[32]."<br/><b>Remarks : </b>".$row[33]."<br/><b>Updated By : </b>".$row[34]."<br/>at ".date("d-m-Y h:iA",strtotime($row[38]));
			}
			else{
				$tempArray["admission"] = $tempArray["admission"]."<span id='admit_btn_$rank_temp' ><Button class='btn btn-sm btn-success' onclick='admitOrReject(\"".$row[4]."\",$rank_temp, \"".$row[41]."\")'>Allot/Refund</Button></span><br/><br/><div id='admit_div_".$rank_temp."'></div>";
			}

			if($row[27]==""){
				$row[27]="Not Yet Verified";
			}
			$tempArray["declaration_form"] = "<b>Uploaded Declaration Form</b><br/><a target='_blank' href='".$file_path.$row[4]."/".$row[26]."'>".$row[26]."</a><br/><br/><Button class='btn btn-sm btn-success' onclick='verifyDeclarationForm(\"".$row[4]."\")'>Verify</Button>"."<br/><br/><b>Declaration Form : </b><br/><b>Status : </b>".$row[27]."<br/><b>Remarks : </b>".$row[29]."<br/><b>Updated By : </b>".$row[28]."<br/>at ".date("d-m-Y h:iA",strtotime($row[38]));

			$tempArray["Remarks"] = "<br/><br/><b>Admission : </b><br/><b>Status : </b>".$row[32]."<br/><b>Remarks : </b>".$row[33]."<br/><b>Updated By : </b>".$row[34]."at ".date("d-m-Y h:iA",strtotime($row[38]));

			$tempArray["Created_At"] =date("d-m-Y h:iA",strtotime($row[29]));			
			$myArray[]=$tempArray;
		}
	}
	$result->close();
	$mysqli->close();

	## Response
	$response = array(
	  "iTotalRecords" => $totalRecords,
  	  "iTotalDisplayRecords" => $totalRecords,
	  "aaData" => $myArray
	);

	echo json_encode($response);
?>