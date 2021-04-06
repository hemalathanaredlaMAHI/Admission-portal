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
	
	$qry1 = "Select regno from gen_admit_letters where appno = '".$app_no."'";
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
	}
	$pdffilename = "";
	$pdf = new FPDF('P','mm','A4');
	$pdffilename='../authentication/admitletters/'.$app_no.'.pdf';
	$pdf->SetAuthor("MSIT");
	$pdf->SetTitle("MSIT");
	$pdf->SetCreator("Admit Letter Generator");
	$pdf->SetSubject("Admit Letter 2016");
	$pdf->AddPage();	
	$pdf->SetFont('times','B',20);
	$pdf->SetXY(18,15);
	$pdf->Cell('','5','Consortium of Institutions of Higher Learning  ','','','C');		
	$pdf->Cell('','3','');
	$pdf->SetXY(15,25);
	$pdf->SetFont('times','B',10);
	$pdf->Cell('','','IIIT Campus, Gachibowli, Hyderabad - 32, Phone: 040-23001970 Mobile: 7799834583, 7799834585','','','C');
	$pdf->Cell('','3','');
	$pdf->Image('../authentication/images/line.jpg','20','30','162');
	$pdf->Cell('','3','');
	$pdf->SetFont('times','B',14);			
	$pdf->SetXY(25,38);
	$pdf->Cell('','','Master of Science in Information Technology','','','C');
	$pdf->Cell('','3','');
	$pdf->SetXY(20,44);
	$pdf->Cell('','','Letter of admission into the Preparatory Programme','','','C');			
	$pdf->Image('../authentication/images/line.jpg','50','48','120');
	$pdf->Cell('','3','');
	$pdf->SetFont('times','B',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(20,58);
	$pdf->Cell('','','Registration No: CIHL/MSIT 2016/'.$roll_no.'                                       Date: '.$dis_date.'','','','');
	$pdf->SetFont('times','',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(25,68);
	$pdf->Cell('','','Mr/Ms. '.$name.' S/o/D/o. '.$fname.' is ','','','');
	$pdf->Cell('','3','');
	$pdf->SetXY(25,73);
	$pdf->Cell('','','admitted into the Preparatory programme Provisional/Conditional at '.$center.' Learning Center.','','','');
	$pdf->Image('../authentication/images/bullet.jpg','35','78','');
	$pdf->SetXY(38,79);
	$pdf->Cell('','','The duration of the programme is five (5) Weeks.','','','');
	$pdf->Image('../authentication/images/bullet.jpg','35','83','');
	$pdf->SetXY(38,84);
	$pdf->Cell('','','Fee for the Preparatory programme is Rs.20, 000/- (Rupees twenty thousand only).','','','');
	$pdf->SetXY(38,89);
	$pdf->Cell('','','This amount is non-refundable.','','','');
	$pdf->Image('../authentication/images/bullet.jpg','35','93','');
	$pdf->SetXY(38,94);
	$pdf->Cell('','','Any fee/deposits etc charged by the Learning Center concerned - like library, caution deposit','','','');
	$pdf->SetXY(38,99);
	$pdf->Cell('','','etc are additional. The coordinator of the Learning Center may be contacted for further details.','','','');
	$pdf->SetXY(25,109);
	$pdf->Cell('','','The receipt of fee for preparatory programme, Rs. 20,000/- (Rupees twenty thousand only) as detailed','','','');
	$pdf->SetXY(25,114);
	$pdf->Cell('','','below, is here by acknowledged:','','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,124);
	$pdf->Cell('','','Demand Draft 	           :  '.$dd_no,'','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,129);
	$pdf->Cell('','','Demand Draft Date     :  '.$dd_date,'','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,134);
	$pdf->Cell('','','Name of the Bank 	     :  '.$bank,'','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,139);
	$pdf->Cell('','','Name of the Branch    :  '.$branch,'','','');
	$pdf->SetXY(25,149);
	$pdf->Cell('','','The student is required to submit the following documents and confirm admission before 10:00 AM on','','','');
	$pdf->SetXY(25,154);
	$pdf->Cell('','','June 25th, 2016 at the allotted Learning Center. Failure to do so will result in forfeiting claim to','','','');
	$pdf->SetXY(25,159);
	$pdf->Cell('','','admission and fee already paid.','','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,164);
	$pdf->Cell('','','1. Degree / Provisional Certificate of the qualifying degree','','','');
	$pdf->SetFont('times','',12);
	$pdf->SetXY(40,169);
	$pdf->Cell('','','2. Original Transfer Certificate','','','');
	$pdf->SetXY(25,179);
	$pdf->Cell('','','Certificates Due: Provisional/Course Completion/Consolidated Marks Memo/','','','');
	$pdf->SetXY(25,184);
	$pdf->Cell('','','4-II Marks Memo/TC/SSC/INTER','','','');
	$pdf->SetXY(25,194);
	$pdf->Cell('','','For Hostel fee and other details contact MSIT co-ordinate at the Learning Center','','','');
	$pdf->SetXY(25,199);
	$pdf->Cell('','','as given below:','','','');
	if($center=="JNTUH")
	{
		$pdf->SetXY(30,214);
		$pdf->Cell('','','Mr.P.Mohankrishna,','','','');
		$pdf->SetXY(30,219);
		$pdf->Cell('','','MSIT Coordinator,','','','');
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
		$pdf->Cell('','','MSIT Coordinator,','','','');
		$pdf->SetXY(30,224);
		$pdf->Cell('','','MSIT Division, IIIT Campus,','','','');
		$pdf->SetXY(30,229);
		$pdf->Cell('','','Gachibowli, Hyderabad- 500032.','','','');
		$pdf->SetXY(30,234);
		$pdf->Cell('','','Ph.23001970, Mob.7799834582.','','','');
	}
	$pdf->SetXY(30,240);
	$pdf->Cell('','','On behalf of MSIT 2016 Admission Committee','','','');
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