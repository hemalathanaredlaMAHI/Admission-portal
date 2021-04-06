<?php
	require('../../authentication/fpdf/fpdf.php');
	$firstName = "Renuka";
	$lastName = "Last Name";
	$father_name = "Father Name";
	$admission_code = "3";
	$learning_center = "JNTUH";
	$appno = "renuka";
	$fullName = $firstName." ".$lastName;
	$name = ucwords($fullName);
	$pdf = new FPDF('P','mm','A4');
	$pdffilename='../../authentication/admitletters/'.$appno.'.pdf';
	$pdf->SetAuthor("MSIT");
	$pdf->SetTitle("MSIT");	
	$pdf->SetCreator("MIST");
	$pdf->SetSubject("MSIT 2020 – Counseling and Allotment of MSIT Learning Center");
	$pdf->AddPage();	
	//$pdf->SetFont('times','B',20);
	//$pdf->SetXY(18,15);
	//$pdf->Cell('','5','Consortium of Institutions of Higher Learning  ','','','C');	25','30','55	
	
	$pdf->Cell('','3','');
	$pdf->Image('../../authentication/images/IIIT.jpg','160','10','35');	
	$pdf->Cell('','3','');
	$pdf->Image('../../authentication/images/line.jpg','100','30','180');

	$pdf->SetFont('times','',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(115,35,39);
	$pdf->Cell('','','International Institute of Information Technology, Hyderabad','','','C');
	$pdf->SetXY(145,40,39);
	$pdf->Cell('','','A Research University','','','C');



	$pdf->SetFont('times','',11);			
	$pdf->SetXY(20,45);
	$pdf->Cell('','','Manjunath Kumar Mattam,','','');

	$pdf->SetXY(20,50);
	$pdf->Cell('','','Head MSIT, IIIT-H.,','','');
	$pdf->SetXY(20,55);
	$pdf->Cell('','','Phone: +91 40 6653 1268.,','','');
	$pdf->SetXY(20,65);
	$pdf->Cell('','','Reference:','','');
	$pdf->SetFont('times','B',11);

	$pdf->SetXY(20,65);
	$pdf->Cell('','',"\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tIIIT-H/MSIT/2020-2021/First year fee/001,",'','');

	$pdf->SetFont('times','B',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(160,70,39);
	$pdf->Cell('','','Hyderabad,','','','C');


	

	$pdf->SetFont('times','B',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(160,75);
	$dt = date("d-m-Y");
	$pdf->Cell('','','Date : '.$dt.'','','','C');

	$pdf->SetFont('times','',12);
	$pdf->Cell('','3','');

	$pdf->SetXY(20,80);
	$pdf->Cell('','','To Whom It May Concern:','','');
	$pdf->SetXY(20,90);
	$pdf->Cell('',''," Subject: First year tuition fee & other charges due for Mr. /Ms.".$firstName.",",'','');

    $pdf->Ln();

	$pdf->SetFont('times','',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(25,95);
	//$txt = "\t\t\t\t1. The duration of the program is 2 Years.\n\t\t\t\t2. Due to COVID-19 special circumstances, this year students are regularized only after \t\t\t\t\t\t\t\t\tcompletion of the eligibility degree (BE/BTECH).\n\t\t\t\t3.The Fee payable for the MSIT program is Rs. 2,00,000/- (Rupees Two Lakhs only) per annum \t\t\t\t\t\t\t\tand the same is non-refundable. Last date for fee payment is 1 st September 2020. Students \t\t\t\t\t\t\tcan pay the remaining Rs.1,70, 000. /- (excluding admission fee Rs 30,000/-) through wire \t\t\t\t\t\t\ttransfer or pay online through the admissions portal. For wire transfer use Account name: CIHL, \t\t\t\t\t\t\taccount number: 52081085235, IFSC code: SBIN0021161, and branch name: SBI, IIIT Campus, \t\t\t\t\t\t\tGachibowli.\n\t\t\t\t4.In addition to the above, student is also liable for payment of any deposits / fee charged by \t\t\t\t\t\t\tLearning Centre concerned viz., Library, Caution deposit, Hostel, Mess etc.";
    $txt = "\t\t\t\tMr./Ms ".$firstName."	is admitted into International Institute of Information Technology, Hyderabad (IIIT-H) to pursue Master of Science in Information Technology (MSIT) with roll number 2020501001. Mr./Ms. ".$firstName."		has completed all entrance procedures and is admitted into MSIT first year.";


	$pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    //$pdf->Ln();
    $pdf->SetFont('times','B',12);
	$pdf->Cell('','3','');
    $pdf->SetXY(20,125);
	$pdf->Cell('','',' The fee and other charges for MSIT first year (Academic year 2020-2021) shall be as below:
','','');



	
	$pdf->SetXY(25,130);
	$txt = "The course fee: Rs 200000/- (Two lakhs). After adjustment of Rs 30,000/- (Rupees thirty thousand) paid at the time of admission, the balance amount of Rs. 1,70,000/- (Rupees one lakh seventy thousand only) must be paid through demand draft payable at Hyderabad in favor of CIHL Hyderabad (Consortium of Institutions of Higher Learning). Or maybe remitted into CIHL bank account (Account number: 52081085235, Bank: SBI, Branch: IIIT Campus Gachibowli, IFSC Code: SBIN0021161)";
    // Times 12
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();

    $pdf->SetXY(25,170);
	$txt = "Laptop: Students are instructed to procure a laptop of their own directly from the vendor. The institute has decided the suitable configuration of the laptop. Approximate market rate of the same would be around Rs.50,000 /- (Rupees fifty thousand only).";
    // Times 12
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();

     $pdf->SetXY(25,190);
	$txt = "Caution deposit: One-time refundable caution deposit amounting to Rs. 10,000 /- (Rupees ten thousand only) must be paid through demand draft payable at Hyderabad drawn in favor of CIHL Hyderabad (Consortium of Institutions of Higher Learning)";
    // Times 12
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();

     $pdf->SetXY(25,210);
	$txt = "Student medical insurance: Rs. 1000 /- (Rupees One Thousand only) must be paid through demand draft payable at Hyderabad in favor of CIHL Hyderabad.";
    // Times 12
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();

     $pdf->SetXY(25,225);
	$txt = "Above mentioned course fee and other charges must be paid on or before 1st September 2020. In case of delay a fine of Rs 5000/- will be levied till 6th September 2020. Beyond this period, admission will be cancelled, and the student has to drop from the MSIT program.";
    // Times 12
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();

   
   

    $pdf->SetFont('times','',12);
	$pdf->Image('../../authentication/images/manjunath.jpg','25','248','40');

	$pdf->Cell('','3','');
	$pdf->SetXY(25,270);
	$pdf->Cell('','','(Manjunath Kumar Mattam),','','','');
	$pdf->Cell('','3','');
	$pdf->SetXY(25,275);
	$pdf->Cell('','','Head MSIT, IIIT-H,','','','');

	$pdf->Output($pdffilename,'F');
	$pdf->Close();
	echo "PDF Generated Successfuly, ";
?>