<?php
	include('accesscheck.php');
	require('../authentication/fpdf/fpdf.php');
	
	$app_no = $_POST['app_no'];
	$center = $_POST['center'];
	$cdate = $_POST['date'];
	$dis_date = date('d M Y',strtotime($cdate));
	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$dd_no = $_POST['dd_no'];
	$dd_date = $_POST['dddate'];
	$bank = $_POST['bank'];
	$branch = $_POST['branch'];
	$amount = $_POST['amount'];
	$rank = $_POST['rank'];
	
	/*$qry1 = "Select regno from gen_admit_letters where appno = '".$app_no."'";
	$result1 = $mysqli->query($qry1);
	$temp1 = $result1->fetch_object();
	$reg_no = $temp1->regno;
	if($reg_no!=null && $reg_no!="")
	{
		$existCenter = explode("-",$reg_no);
		if($center!=$existCenter[0])
			$reg_no = "";
	}
	$roll_no = $reg_no;
	$filled = "-1";
	if($reg_no=="" || $reg_no==null)
	{
		$qry = "Select count(*) filled from gen_admit_letters where learning_center = '".$center."' group by learning_center";
		$result = $mysqli->query($qry);
		$temp = $result->fetch_object();
		$filled = $temp->filled;
		$reg_no = $filled + 1;
		$roll_no = $center.'-'.$reg_no;
	}*/
	$filled = "-1";
	
	if($center=="IIITH"){
		
		$doj = "July 13th, ".YEARTEXT;
		$roll_no = 2019501001;
		$fee = "Rs. 2,00,000/- (Rupees Two Lakhs only)";
		$qry = "Select count(*) filled from gen_admit_letters where learning_center = '".$center."'  and appno != '".$app_no."' group by learning_center ";
		$result = $mysqli->query($qry);
		$temp = $result->fetch_object();
		if($temp == null){
			$filled = 0;
		}
		else{
			$filled = $temp->filled;
		}
		$roll_no = $roll_no+$filled;
		//$roll_no = $center.'-'.$reg_no;

	}
	if($center=="JNTUH"){
		
		$roll_no = "19031J0";
		$doj = "July 15th, ".YEARTEXT;
		$fee = "Rs.1,70,000/-(Rupees One Lakhs Seventy Thousand only)";

		$qry = "Select count(*) filled from gen_admit_letters where learning_center = '".$center."'  and appno != '".$app_no."' group by learning_center ";
		$result = $mysqli->query($qry);
		$temp = $result->fetch_object();
		if($temp == null){
			$filled = 0;
		}
		else{
			$filled = $temp->filled;
		}
		if($filled<9){
			$roll_no = $roll_no."00".($filled+1);
		}
		if($filled>=9 && $filled<99){
			$roll_no = $roll_no."0".($filled+1);
		}
		if($filled>=99){
			$roll_no = $roll_no.($filled+1);
		}

	}
	if($center=="JNTUK"){

		$doj = "June 23rd, ".YEARTEXT;
		$roll_no = "JNTUK";

		$fee = "Rs.10,000/-(Rupees Ten Thousand only)";

		$qry = "Select count(*) filled from gen_admit_letters where learning_center = '".$center."'  and appno != '".$app_no."' group by learning_center ";
		$result = $mysqli->query($qry);
		$temp = $result->fetch_object();
		if($temp == null){
			$filled = 0;
		}
		else{
			$filled = $temp->filled;
		}
		if($filled<9){
			$roll_no = $roll_no."00".($filled+1);
		}
		if($filled>=9 && $filled<99){
			$roll_no = $roll_no."0".($filled+1);
		}
		if($filled>=99){
			$roll_no = $roll_no.($filled+1);
		}
	}
	if($center=="JNTUA"){
		$doj = "June 23rd, ".YEARTEXT;
		$roll_no = "JNTUA";
		$fee = "Rs.10,000/-(Rupees Ten Thousand only)";

		$qry = "Select count(*) filled from gen_admit_letters where learning_center = '".$center."'  and appno != '".$app_no."' group by learning_center ";
		$result = $mysqli->query($qry);
		$temp = $result->fetch_object();
		if($temp == null){
			$filled = 0;
		}
		else{
			$filled = $temp->filled;
		}
		if($filled<9){
			$roll_no = $roll_no."00".($filled+1);
		}
		if($filled>=9 && $filled<99){
			$roll_no = $roll_no."0".($filled+1);
		}
		if($filled>=99){
			$roll_no = $roll_no.($filled+1);
		}
	}
	if($center=="SVU"){
		$doj = "June 29, ".YEARTEXT;
		$roll_no = "SVU";
		$fee = "Rs.10,000/-(Rupees Ten Thousand only)";

		$qry = "Select count(*) filled from gen_admit_letters where learning_center = '".$center."'  and appno != '".$app_no."' group by learning_center ";
		$result = $mysqli->query($qry);
		$temp = $result->fetch_object();
		if($temp == null){
			$filled = 0;
		}
		else{
			$filled = $temp->filled;
		}
		if($filled<9){
			$roll_no = $roll_no."00".($filled+1);
		}
		if($filled>=9 && $filled<99){
			$roll_no = $roll_no."0".($filled+1);
		}
		if($filled>=99){
			$roll_no = $roll_no.($filled+1);
		}
	}

	$pdffilename = "";
	$pdf = new FPDF('P','mm','A4');
	$pdffilename='../authentication/admitletters/'.$app_no.'.pdf';
	$pdf->SetAuthor("MSIT");
	$pdf->SetTitle("MSIT");
	$pdf->SetCreator("Admit Letter Generator");
	$subject = "Admit Letter ".YEARTEXT;
	$pdf->SetSubject($subject);
	$pdf->AddPage();	
	$pdf->SetFont('times','B',20);
	$pdf->SetXY(18,15);
	$pdf->Cell('','5','Consortium of Institutions of Higher Learning  ','','','C');		
	$pdf->Cell('','3','');
	$pdf->SetXY(15,25);
	$pdf->SetFont('times','B',10);
	$pdf->Cell('','','IIIT Campus, Gachibowli, Hyderabad - 32, Phone: 040-23001970 Mobile: 7799834583, 7799834585','','','C');
	$pdf->Cell('','3','');
	$pdf->Image('../authentication/images/line.jpg','25','30','162');
	$pdf->Cell('','3','');
	$pdf->SetFont('times','B',14);			
	$pdf->SetXY(25,38);
	$pdf->Cell('','','Master of Science in Information Technology','','','C');
	$pdf->Cell('','3','');
	$pdf->SetXY(20,44);
	$pdf->Cell('','','Letter of Admission into MSIT Program','','','C');			
	$pdf->Image('../authentication/images/line.jpg','50','48','120');
	$pdf->Cell('','3','');
	$pdf->SetFont('times','B',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(25,58);

	if(($center=="IIITH") || ($center=="JNTUH")){
		$heading = 'Admission No: CIHL/MSIT '.YEARTEXT.'/'.$roll_no.'                                                  Date: '.$dis_date;
	}
	if(($center=="JNTUK") || ($center=="JNTUA") || ($center=="SVU")){
		$heading = 'Registration No: CIHL/MSIT '.YEARTEXT.'/'.$roll_no.'                                                  Date: '.$dis_date;
	}

	$pdf->Cell('','',$heading,'','','');
	$pdf->SetFont('times','',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(25,68);
	$pdf->Cell('','','Mr/Ms. '.$name.' S/o/D/o. '.$fname.' is ','','','');
	$pdf->Cell('','3','');
	$pdf->SetXY(25,73);
	
	//$pdf->Cell('','','admitted into the MSIT program Provisional/Conditional at '.$center.' Learning Center.','','','');
	
	if(($center=="IIITH") || ($center=="JNTUH")){
		$pdf->Cell('','','admitted into the MSIT program Provisional/Conditional at '.$center.' Learning Center.','','','');
	}
	if(($center=="JNTUK") || ($center=="JNTUA") || ($center=="SVU")){
		$pdf->Cell('','','admitted into the Preparatory program Provisional/Conditional at '.$center.' Learning Center.','','','');
	}

	$pdf->Image('../authentication/images/bullet.jpg','35','78','');
	$pdf->SetXY(38,79);
	//$pdf->Cell('','','The duration of the program is 2 Years.','','','');
	if(($center=="IIITH") || ($center=="JNTUH")){
		$pdf->Cell('','','The duration of the program is 2 Years.','','','');
	}
	if(($center=="JNTUK") || ($center=="JNTUA") || ($center=="SVU")){
		$pdf->Cell('','','The duration of the program is four (4) Weeks.','','','');
	}

	$pdf->Image('../authentication/images/bullet.jpg','35','83','');
	$pdf->SetXY(38,84);
	//$pdf->Cell('','','The Fee payable for the MSIT program is '.$fee.' ','','','');
	
	if(($center=="IIITH") || ($center=="JNTUH")){
		$pdf->Cell('','','The Fee payable for the MSIT program is '.$fee.' ','','','');
	}
	if(($center=="JNTUK") || ($center=="JNTUA") || ($center=="SVU")){
		$pdf->Cell('','','The Fee payable for the Preparatory program is '.$fee.' ','','','');
	}
	$pdf->SetXY(38,89);
	//$pdf->Cell('','','per annum and the same is non refundable.','','','');
	
	if(($center=="IIITH") || ($center=="JNTUH")){
		$pdf->Cell('','','per annum and the same is non refundable.','','','');
	}
	if(($center=="JNTUK") || ($center=="JNTUA") || ($center=="SVU")){
		$pdf->Cell('','','This amount is non refundable.','','','');
	}

	$pdf->Image('../authentication/images/bullet.jpg','35','93','');
	$pdf->SetXY(38,94);
	$pdf->Cell('','','In addition to the above, you are also liable for payment of any deposits / fee charged by','','','');

	$pdf->SetXY(38,99);
	$pdf->Cell('','','Learning Centre concerned viz., Library, Caution deposit, Hostel, Mess etc.','','','');

	$pdf->SetXY(25,109);
	
	if(($center=="IIITH") || ($center=="JNTUH")){
		$pdf->Cell('','','The receipt of fee for MSIT program, Rs.30,000/-(Rupees Thirty Thousand only) as detailed','','','');
	}
	else{
		$pdf->Cell('','','The receipt of fee for MSIT program, '.$fee.' as detailed','','','');
	}
	
	$pdf->SetXY(25,114);
	$pdf->Cell('','','below, is here by acknowledged:','','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,124);
	$pdf->Cell('','','DD No / Txn Ref 	           :  '.$dd_no,'','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,129);
	$pdf->Cell('','','DD Date/ Txn Date    		  	 :  '.$dd_date,'','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,134);
	$pdf->Cell('','','Name of the Bank 	          :  '.$bank,'','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,139);
	$pdf->Cell('','','Name of the Branch         :  '.$branch,'','','');
	$pdf->SetXY(25,149);
	$pdf->Cell('','','The student should submit all the required documents and balance amount of the annual fee on or','','','');
	$pdf->SetXY(25,154);
	$pdf->Cell('','',' before 10:00 AM on '.$doj.' at the allotted Learning Center. Failure to do so will result','','','');
	$pdf->SetXY(25,159);
	$pdf->Cell('','',' in forfeiting claim to admission and fee already paid.','','','');
	$pdf->SetFont('times','',12);
	/*$pdf->SetXY(40,164);
	$pdf->Cell('','','1. Degree / Provisional Certificate of the qualifying degree','','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,169);
	$pdf->Cell('','','2. Original Transfer Certificate','','','');*/
	$pdf->SetXY(25,169);
	$pdf->Cell('','','Certificates Due:    Provisional/   Course Completion/   Consolidated Marks Memo/','','','');
	/*$pdf->SetXY(25,179);
	$pdf->Cell('','','Certificates Due: Provisional/ Course Completion/ Consolidated Marks Memo/ Original Degree /','','','');*/
	$pdf->SetXY(25,184);
	$pdf->Cell('','','					Original Degree /   4-II Marks Memo     /   TC  / 		SSC   /   INTER','','','');
	$pdf->SetXY(25,194);
	$pdf->Cell('','','For Hostel fee and other details contact :7799834585','','','');
	$pdf->SetXY(25,199);
	
	if($center=="JNTUH")
	{
		$pdf->SetXY(30,214);
		$pdf->Cell('','','Head MSIT,','','','');
		$pdf->SetXY(30,219);
		
		$pdf->Cell('','','Mr.P.Mohankrishna,','','','');
		$pdf->SetXY(30,224);
		$pdf->Cell('','','School of Information Technology, JNTU,','','','');
		$pdf->SetXY(30,229);
		$pdf->Cell('','','Kukatpally, Hyderabad- 500072.','','','');
		$pdf->SetXY(30,234);
		$pdf->Cell('','','Mob.7799834581.','','','');
	}
	if($center=="JNTUA")
	{
		$pdf->SetXY(30,214);
		$pdf->Cell('','','Dr.Shoba Bindu,','','','');
		$pdf->SetXY(30,219);
		$pdf->Cell('','','Co-ordinator, MSIT Program,','','','');
		$pdf->SetXY(30,224);
		$pdf->Cell('','','Central Computer Center,','','','');
		$pdf->SetXY(30,229);
		$pdf->Cell('','','JNTU College of Engineering Anantapur,','','','');
		$pdf->SetXY(30,234);
		$pdf->Cell('','','Ananthapuramu - 515002, Mobile: 7799265000.','','','');
	}
	if($center=="JNTUK")
	{
		$pdf->SetXY(30,214);
		$pdf->Cell('','','Dr.K.Sahadeviah,','','','');
		$pdf->SetXY(30,219);
		$pdf->Cell('','','Co-ordinator, MSIT Program,','','','');
		$pdf->SetXY(30,224);
		$pdf->Cell('','','University College of Engineering (Autonomous),','','','');
		$pdf->SetXY(30,229);
		$pdf->Cell('','','Principal Building Block, JNT University,','','','');
		$pdf->SetXY(30,234);
		$pdf->Cell('','','Kakinada - 533003, Mobile: 7799834586.','','','');
	}
	if($center=="IIITH")
	{
		$pdf->SetXY(30,214);
		$pdf->Cell('','','Mr.Manjunath Mattam,','','','');
		$pdf->SetXY(30,219);
		$pdf->Cell('','','Head MSIT,','','','');
		$pdf->SetXY(30,224);
		$pdf->Cell('','','MSIT Division, IIIT Campus,','','','');
		$pdf->SetXY(30,229);
		$pdf->Cell('','','Gachibowli, Hyderabad- 500032.','','','');
		$pdf->SetXY(30,234);
		$pdf->Cell('','','Ph.040 - 23001970, Mob.7799834582.','','','');
	}
	if($center=="SVU")
	{
		$pdf->SetXY(30,214);
		$pdf->Cell('','','Dr.G.V.Marutheswar,','','','');
		$pdf->SetXY(30,219);
		$pdf->Cell('','','Professor Of EEE,','','','');
		$pdf->SetXY(30,224);
		$pdf->Cell('','','Co-ordinator, MSIT Program,','','','');
		$pdf->SetXY(30,229);
		$pdf->Cell('','','S .V. University College of Engineering,','','','');
		$pdf->SetXY(30,234);
		$pdf->Cell('','','TIRUPATI - 517502, Mobile: +91-7799265000.','','','');
	}
	$pdf->SetXY(30,240);
	$pdf->Cell('','','On behalf of MSIT '.YEARTEXT.' Admission Committee','','','');
	$pdf->Cell('','3','');
	$pdf->SetXY(30,255);
	$pdf->Cell('','','Dean,CIHL','','','');
	$pdf->Cell('','3','');
	$pdf->SetXY(30,260);
	$pdf->Cell('','','CIHL, MSIT Division,','','','');
	$pdf->Cell('','3','');
	$pdf->SetXY(30,265);
	$pdf->Cell('','','Date: '.$dis_date.'','','','');
	$pdf->Output($pdffilename,'F');
	$pdf->Close();
	$insert_query = "UPDATE gen_admit_letters 
							set fullName = '$name',
							parent_name = '$fname',
							learning_center = '$center',
							regno = '$roll_no',
							cdate = '$cdate',
							ddno = '$dd_no',
							dd_date = '$dd_date',
							dd_bank = '$bank',
							dd_branch = '$branch',
							dd_amount = '$amount' WHERE appno = '$app_no'";
							
	$res = $mysqli->query($insert_query);
			
	$pdf->Output($pdffilename,'I');
	$pdf->Close();
	
?>