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

	## Search 
	$searchQuery = " ";
	if($searchValue != ''){
	   $searchQuery = " and (emp_name like '%".$searchValue."%' or 
	        email like '%".$searchValue."%' or 
	        city like'%".$searchValue."%' ) ";
	}

	$qry = "select student.*, student_academic_details.*, counselling_certificates.*, cons_web_prefe.*, counselling_payment.*, gat_call_letters.*, ma_user_profile.* from student left join student_academic_details on student_academic_details.primaryEmail=student.primaryEmail left join counselling_certificates on counselling_certificates.primaryEmail=student.primaryEmail left join cons_web_prefe on cons_web_prefe.primaryEmail=student.primaryEmail left join counselling_payment on counselling_payment.primaryEmail=student.primaryEmail left join gat_call_letters on gat_call_letters.email=student.primaryEmail left join ma_user_profile on ma_user_profile.email=student.primaryEmail";

	if( $status!='')  
	{	
		if( $status=='details')  
		{	
			$qry = $qry." where student.Verification!='Verified'";	
		}

		if( $status=='certificates')  
		{	
			$qry = $qry." where counselling_certificates.Verification!='Verified'";	
		}

		if( $status=='payment')  
		{	
			$qry = $qry." where counselling_payment.Verification!='Verified'";	
		}

		if( $status=='detailsverified')  
		{	
			$qry = $qry." where student.Verification='Verified'";	
		}

		if( $status=='certificatesverified')  
		{	
			$qry = $qry." where counselling_certificates.Verification='Verified'";	
		}

		if( $status=='paymentverified')  
		{	
			$qry = $qry." where counselling_payment.Verification='Verified'";	
		}	
	}

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
			if(isset($row[88]))
				$rank = "<span style='color:green;font-weight:bold;font-size:14px;'>".$row[88]."</span>";
			$tempArray["Personal_Details"] = "<b>Rank : </b>".$rank."<br/><b>Full Name : </b>".$row[0]." ".$row[1]."<br/><b>DOB : </b>".date("d-m-Y",strtotime($row[2]))."<br/><b>Govt ID : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[3]."'>".$row[3]."</a>"."<br/><br/> <b>GAT Details : </b><br/>Full Name : ".$row[94]."<br/>DOB : ".$row[96]."<br/>Gender : ".$row[95]."<br/>Photo : <a target='_blank' href='".$profile_file_path.$row[107]."'>".$row[107]."</a><br/><br/><Button class='btn btn-sm btn-success' onclick='verifyPersonalDetails(\"".$row[4]."\")'>Verify</Button>";
			$tempArray["Contact_Information"] = "<b>Email : </b>".$row[4]."<br/><b>Mobile : </b>".$row[5]."<br/><b>Alt Mobile : </b>".$row[6]."<br/><b>Father Name : </b>".$row[7]."<br/><b>Father Mobile : </b>".$row[8]."<br/><b>Father Email : </b>".$row[9]."<br/><b>Mother Name : </b>".$row[10]."<br/><b>Mother Mobile : </b>".$row[11]."<br/><b>Mother Email : </b>".$row[12]."<br/><b>Permanent Address : </b>".$row[13]."<br/><b>Temporary Address : </b>".$row[14];
			$tempArray["Academic_Details"] = "<b>SSC School Name : </b>".$row[22]."<br/> <b>Score/Points : </b>".$row[23]."<br/> <b>Year of Pass : </b>".$row[24]."<br/> <b>Inter College Name : </b>".$row[25]."<br/> <b>Score/Points : </b>".$row[26]."<br/> <b>Year of Pass : </b>".$row[27]."<br/> <b>B.Tech College Name : </b>".$row[28]."<br/> <b>Percentage : </b>".$row[29]."<br/> <b>Year of Pass : </b>".$row[30]."<br/> <b>Branch : </b>".$row[34];
			$tempArray["Uploaded_Certificates"] = "<b>SSC Certificate : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[36]."'>".$row[36]."</a>"."<br/> <b>Intermediate/Diploma Certificate : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[37]."'>".$row[37]."</a>"."<br/> <b>B.Tech CMM : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[38]."'>".$row[38]."</a>"."<br/> <b>B.Tech Provisional : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[39]."'>".$row[39]."</a>"."<br/> <b>B.Tech OD : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[40]."'>".$row[40]."</a>"."<br/> <b>B.Tech 1st Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[41]."'>".$row[41]."</a>"."<br/> <b>B.Tech 2nd Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[42]."'>".$row[42]."</a>"."<br/> <b>B.Tech 3rd Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[43]."'>".$row[43]."</a>"."<br/> <b>B.Tech 4th Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[44]."'>".$row[44]."</a>"."<br/> <b>B.Tech 5th Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[45]."'>".$row[45]."</a>"."<br/> <b>B.Tech 6th Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[46]."'>".$row[46]."</a>"."<br/> <b>B.Tech 7th Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[47]."'>".$row[47]."</a>"."<br/> <b>B.Tech 8th Sem : </b>"."<a target='_blank' href='".$file_path.$row[4]."/".$row[48]."'>".$row[48]."</a>"."<br/><br/><Button class='btn btn-sm btn-success' onclick='verifyCertificates(\"".$row[4]."\")'>Verify</Button>";
			$tempArray["Choice_of_learning_Center"] = $row[56]."<br/>".$row[57]."<br/>".$row[58]."<br/>".$row[59]."<br/>".$row[60]."<br/>";
			$tempArray["Payment_Details"] = "<b>Trans/Ref Num : </b>".$row[62]."<br/> <b>Amount : </b>".$row[63]."<br/> <b>Trasaction Date : </b>".date("d-m-Y",strtotime($row[64]))."<br/><br/><Button class='btn btn-sm btn-success' onclick='verifyPayment(\"".$row[4]."\")'>Verify</Button>";
			$tempArray["Remarks"] = "<b>Personal & Contact Details : </b><br/><b>Status : </b>".$row[15]."<br/><b>Remarks : </b>".$row[17]."<br/><b>Updated By : </b>".$row[18]."at ".date("d-m-Y h:iA",strtotime($row[20]))."<br/><br/><b>Certificates : </b><br/><b>Status : </b>".$row[49]."<br/><b>Remarks : </b>".$row[51]."<br/><b>Updated By : </b>".$row[52]."at ".date("d-m-Y h:iA",strtotime($row[54]))."<br/><br/><b>Payment Details : </b><br/><b>Status : </b>".$row[65]."<br/><b>Remarks : </b>".$row[67]."<br/><b>Updated By : </b>".$row[68]."at ".date("d-m-Y h:iA",strtotime($row[70]));
			$tempArray["Created_At"] =date("d-m-Y h:iA",strtotime($row[19]));
			$tempArray["Updates"] = " at ".date("d-m-Y h:iA",strtotime($row[19]));
			$tempArray["student_updates"] = "<b>Govt Id : </b><br/>".$row[16]."<br/><br/><b>Certificates : </b><br/>".$row[50]."<br/><br/><b>Payment Details : </b><br/>".$row[66];
			$tempArray["Actions"] = "<Button class='pull-right btn btn-sm btn-success' onclick='verifyStudent(\"".$row[4]."\")'>Verify</Button>";
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