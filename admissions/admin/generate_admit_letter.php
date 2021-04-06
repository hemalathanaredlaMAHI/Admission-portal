<?php
	include('accesscheck.php'); 
	require('../authentication/fpdf/fpdf.php');
	$qry = "select firstName, lastName, fatherName, admission_code, learning_center, appno from student_zoomlinks join student on student.primaryEmail=student_zoomlinks.email join gat_call_letters on gat_call_letters.email=student_zoomlinks.email where student_zoomlinks.email='renukabandi.7@gmail.com'";
	$result = $mysqli->query($qry);
	$total = 0;
	while($temp = $result->fetch_object())
	{
		$firstName=$temp->firstName;
		$lastName=$temp->lastName;
		$father_name=$temp->fatherName;
		$admission_code =$temp->admission_code;
		$learning_center =$temp->learning_center;
		$appno = $temp->appno;
		$fullName = $firstName." ".$lastName;
		$name = ucwords($fullName);
		$pdf = new FPDF('P','mm','A4');
		$pdffilename='../authentication/admitletters/'.$appno.'.pdf';
		$pdf->SetAuthor("MSIT");
		$pdf->SetTitle("MSIT");	
		$pdf->SetCreator("MIST");
		$pdf->SetSubject("MSIT 2020 – Counseling and Allotment of MSIT Learning Center");
		$pdf->AddPage();	
		$pdf->SetFont('times','B',20);
		$pdf->SetXY(18,15);
		$pdf->Cell('','5','Consortium of Institutions of Higher Learning  ','','','C');		
		$pdf->Cell('','3','');
		$pdf->SetXY(15,25);
		$pdf->SetFont('times','B',10);
		$pdf->Cell('','','IIIT Campus, Gachibowli, Hyderabad - 32, Phone: 040-23001970 Mobile: 7799834583 / 84 / 85','','','C');
		$pdf->Cell('','3','');
		$pdf->Image('../authentication/images/line.jpg','25','30','162');	
		$pdf->Cell('','3','');
		$pdf->Image('../authentication/images/msit.jpg','25','31','35');

		$pdf->SetFont('times','B',16);
		$pdf->Cell('','3','');
		$pdf->SetXY(30,39);
		$pdf->Cell('','','Letter of Admission into ','','','C');

		$pdf->SetFont('times','B',14);			
		$pdf->SetXY(30,46);
		$pdf->Cell('','','Master of Science in Information Technology (MSIT)','','','C');

		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,58);
		$admission_no = 'Admission No: CIHL/MSIT 2020/'.$learning_center.' '.$admission_code.'/2019501010';
		$pdf->Cell('','',$admission_no.$dt.'','','','');

		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(140,58);
		$dt = date("d-m-Y");
		$pdf->Cell('','','Date : '.$dt.'','','','C');

		$pdf->SetFont('times','',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,65);
		
		$txt = "Mr/Ms. ".$name." S/o/D/o. ".$father_name." is admitted into the MSIT program at ".$learning_center." Learning Center.";
	    // Times 12
	    $pdf->SetFont('Times','',12);
	    $pdf->MultiCell(0,6,$txt);
	    $pdf->Ln();

		$pdf->SetFont('times','',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,80);
		$txt = "\t\t\t\t1. The duration of the program is 2 Years.\n\t\t\t\t2. Due to COVID-19 special circumstances, this year students are regularized only after \t\t\t\t\t\t\t\t\tcompletion of the eligibility degree (BE/BTECH).\n\t\t\t\t3.The Fee payable for the MSIT program is Rs. 2,00,000/- (Rupees Two Lakhs only) per annum \t\t\t\t\t\t\t\tand the same is non-refundable. Last date for fee payment is 1 st September 2020. Students \t\t\t\t\t\t\tcan pay the remaining Rs.1,70, 000. /- (excluding admission fee Rs 30,000/-) through wire \t\t\t\t\t\t\ttransfer or pay online through the admissions portal. For wire transfer use Account name: CIHL, \t\t\t\t\t\t\taccount number: 52081085235, IFSC code: SBIN0021161, and branch name: SBI, IIIT Campus, \t\t\t\t\t\t\tGachibowli.\n\t\t\t\t4.In addition to the above, student is also liable for payment of any deposits / fee charged by \t\t\t\t\t\t\tLearning Centre concerned viz., Library, Caution deposit, Hostel, Mess etc.";
		$pdf->SetFont('Times','',12);
	    $pdf->MultiCell(0,6,$txt);
	    $pdf->Ln();
		
		$pdf->SetXY(25,150);
		$txt = "Institute will conduct an online Induction program between 2 nd September 2020 and 4 th September
2020 to which all admitted students must attend and submit all required documents and show fee payment proofs. Failure to do so will result in forfeiting claims to admission and fee paid during counseling. The commencement of class work is 7 th September 2020. \n\nUntil campuses are reopened, all MSIT classes will be conducted online. Students must procure a competent laptop as per specifications, along with a broadband connection before 1 st September 2020. Please download guidelines for the purchasing the laptop and internet, loan documents, MSIT estimates, etc. in addition to this document from the admissions portal.";
	    // Times 12
	    $pdf->SetFont('Times','',12);
	    $pdf->MultiCell(0,6,$txt);
	    $pdf->Ln();

	    $pdf->SetXY(25,210);
	    if($learning_center=="IIITH"){
			$txt = "Report to\nMr.Manjunath Mattam, Head MSIT,\nMSIT Division, IIIT Campus, Gachibowli, Hyderabad- 500032.\nPh.040 - 66531342, Mob.7799834582.\n\nOn behalf of MSIT 2020 Admission Committee";
		}
		else if($learning_center=="JNTUH"){
	    	$txt = "Report to\nHead MSIT,Mr.P.Mohankrishna,\nSchool of Information Technology, JNTU,\nKukatpally, Hyderabad- 500072.\nMob.7799834581.\n\nOn behalf of MSIT 2019 Admission Committee";
		}
	    $pdf->SetFont('Times','',12);
	    $pdf->MultiCell(0,6,$txt);
	    $pdf->Ln();


	    $pdf->SetFont('times','',12);
		$pdf->Image('../authentication/images/sign.jpg','25','253','40');

		$pdf->Cell('','3','');
		$pdf->SetXY(25,265);
		$pdf->Cell('','','Dean,','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(25,270);
		$pdf->Cell('','','CIHL, MSIT Division,','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(25,275);
		$pdf->Cell('','','IIIT Hyderabad.','','','');

		$pdf->Output($pdffilename,'F');
		$pdf->Close();
		$total++;
		echo "<br/>PDF Generated for App No : ".$appno.", Rank : ".$rank." Successfuly!!!. Total : ".$total;
	}
?>	

		

		