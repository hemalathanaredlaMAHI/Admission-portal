<?php
	include('accesscheck.php');
	
	$app_no = $_POST['app_no'];
	$email = $_POST['email'];
	$alt_email = $_POST['alt_email'];
	$cdate = $_POST['cdate'];
	$dis_date = date('d M Y',strtotime($cdate));
	$parentName = $_POST['parentName'];
	$fullName = $_POST['fullName'];
	$address_line1 = $_POST['address_line1'];
	$address_line2 = $_POST['address_line2'];
	$place_town = $_POST['place_town'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$rank = $_POST['rank'];
	$gender = $_POST['gender'];
	$mobile = $_POST['mobile'];
	$landline_no = $_POST['landline_no'];
	$btech = $_POST['btech'];
	
	$update_query1 = "UPDATE ma_user_profile 
							set full_name = '$fullName',
							parent_name = '$parentName',
							gender = '$gender',
							address_line1 = '$address_line1',
							address_line2 = '$address_line2',
							place_town = '$place_town',
							city = '$city',
							pincode = '$pincode',
							mobile_no = '$mobile',
							landline_no = '$landline_no' WHERE email = '$email'";

							
	$res = $mysqli->query($update_query1);

	$update_query2 = "UPDATE student_reg_counseling 
							set counseling_date = '$cdate',
							isUpdated = 1,
							alt_email='$alt_email' WHERE applicationNo = '$app_no'";

							
	$res = $mysqli->query($update_query2);
			
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Registration Form</title>
</head>
<body>
	<h2 align="center"><u>Student Registration Form</u></h2>
<table align="center" border="0" width="80%"> 
	<tr>
		<td align="left">Student Name  </td>
		<td>: <?php echo $fullName; ?></td>
	</tr>
	<tr>
		<td align="left">Hall Ticket Number  </td>
		<td>: <?php echo $app_no; ?></td>
	</tr>
	<tr>
		<td align="left">Rank  </td>
		<td>: <?php echo $rank; ?></td>
	</tr>
	<tr>
		<td align="left">Parent/Guardian Name  </td>
		<td>: <?php echo $parentName; ?></td>
	</tr>
	<tr>
		<td align="left">Parent Phn No </td>
		<td align="left"> : <?php echo $landline_no; ?></td>
	</tr>
	<tr>
		<td align="left">Student Phn No</td>
		<td align="left"> : <?php echo $mobile; ?></td>
	</tr>
	<tr>
		<td align="left">BTech College</td>
		<td align="left"> : <?php echo $btech; ?></td>
	</tr>
	<tr>
		<td align="left">Address </td>
		<td>: <?php echo $address_line1;?>,
			<br>&nbsp;&nbsp;<?php echo $address_line2; ?>,
			<br>&nbsp;&nbsp;<?php echo $place_town.', '.$city.' - '.$pincode; ?></td>
	</tr>
	<tr>
		<td align="left">Date of Counseling</td>
		<td align="left">: <?php echo $cdate; ?></td>
	</tr>		
</table>

<br>
<table border="0" align="center" width="80%">
	<tr>
		<th colspan="2" align="left">Following are the Certificate / Photocopies cerified :</th>
	</tr>
</table>
<table border="1" align="center" width="80%">
	<tr>
		<td align="left"><br>
			<input type="checkbox" name="">SSC / CBSE / ICSE 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="">Intermediate / 12th
		<br><br>&nbsp;BTech / BE &nbsp;&nbsp;&nbsp;
			<input type="checkbox" name=""> Complete &nbsp;&nbsp;&nbsp;
			<input type="checkbox" name=""> Passed &nbsp;&nbsp;&nbsp;
			<input type="checkbox" name=""> No Certificates
		<br><br>
			<input type="checkbox" name=""> PG &nbsp;&nbsp;&nbsp;
			<input type="checkbox" name=""> Other Certificates ______________________
		<br><br>
			<input type="checkbox" name=""> GRE
		<br>	
		</td>
		
	</tr>
</table>
<br>
<table border="0" align="center" width="80%">
	<tr>
		<td align="left">I here by declare all the information provided by me is true to my knowledge.</td>
	</tr>
	<tr>
		<td align="left">The certificates not submitted (if any) will be submitted by me on ______________________.</td>
	</tr>
	<tr>
		<th align="left"><br>(Student Signature)</th>
	</tr>
</table>
<br>
<table border="0" align="center" width="80%">
	<tr>
		<td align="left">Above mentioned student is eligible / not eligible for admission.</td>
	</tr>
	<tr>
		<td align="left">All his/her certificates / photocopies were verfied.</td>
	</tr>
	<tr>
		<th align="right">(Verified By)</th>
	</tr>
	</table>
	<table align="center" border="0" width="80%" >
		<tr><th align="left">Certificates Due:</th></tr>
		<tr>
			<td><br>Provisional/ Course Completion/ Consolidated Marks Memo/</td>
		</tr>
		<tr>
			<td><br>Original Degree / 4-II Marks Memo / TC / SSC / INTER</td>
		</tr>
	</table>
		

			

<br><br>
<table  border="0" align="center" width="80%">
	<tr>
		<td width="40%">Learning Center Allotted</td>
		<td>:</td>
	</tr>
	<tr>
		<td width="40%"><br>Serial/Roll Number</td>
		<td><br>:</td>
	</tr>
</table>

<p align="right">
<button onclick="myFunction()">Print</button>
</p>
<script>
function myFunction() {
  window.print();
}
</script>
</body>
</html>
