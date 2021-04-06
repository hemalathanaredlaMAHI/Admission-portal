<?php
	require('../../authentication/fpdf/fpdf.php');
	$firstName = "Renuka";
	$lastName = "Last Name";
	$father_name = "Father Name";
	$admission_code = "3";
	$learning_center = "JNTUH001";
	$appno = "20031J0001";
	$rollno = "20031J0001";
	$fullName = $firstName." ".$lastName;
	$name = ucwords($fullName);
	$pdf = new FPDF('P','mm','A4');
	$pdffilename='../../authentication/admitletters/'.$appno.'.pdf';
	$pdf->SetAuthor("MSIT");
	$pdf->SetTitle("MSIT");	
	$pdf->SetCreator("MIST");
	$pdf->SetSubject("MSIT 2020 –JNTUH Loan Document Letter");
	$pdf->AddPage();	
	//$pdf->SetFont('times','B',20);
	//$pdf->SetXY(18,15);
	//$pdf->Cell('','5','Consortium of Institutions of Higher Learning  ','','','C');	25','30','55	
	$pdf->Cell('','3','');
	$pdf->Image('../../authentication/images/Jntuhletterhead.JPG','20','10','180');
	
	

	$pdf->SetFont('times','B',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(20,55,39);
	$pdf->Cell('','','Dr. A. Damodaram,','','','');
	$pdf->SetXY(20,60,39);
	$pdf->Cell('','','                                  M.Tech, Ph.D.,','','','');
    $pdf->SetXY(20,65,39);
	$pdf->Cell('','','DIRECTOR  &  Professor of CSE.,','','');



	$pdf->SetFont('times','B',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(160,70);
	$dt = date("d-m-Y");
	$pdf->Cell('','','Date : '.$dt.'','','','C');

	$pdf->SetFont('times','BU',12);
	$pdf->Cell('','3','');

	$pdf->SetXY(65,80);
	$pdf->Cell('','','TO WHOM SO EVER IT MAY CONCERN','','C');

	$pdf->SetFont('times','',12);
	$pdf->Cell('','3','');
	$pdf->SetXY(25,85);
     $txt = "\t\t\t\tThis is to certify that ".$firstName."	Bearing  Roll No. ".$rollno."		got admission into the two years of MSIT Program (Master of Science in Information Technology) at School of Information Technology, JNT University  Hyderabad  for the academic years  2020-21 and 2021-22.";


	$pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();
    $pdf->SetFont('times','',12);
	$pdf->Cell('','3','');
    $pdf->SetXY(20,110);
	$pdf->Cell('','',' The Fee Structure for the two year MSIT Program is as given below.','','');

    
    $pdf->SetXY(25,115);
    $width_cell=array(15,20,30,40,25,25);
    $pdf->SetFont('times','',12);
    $pdf->SetFillColor(20,229,252);
    $pdf->Cell($width_cell[0],10,'S.No',1,0,C,false);
    $pdf->Cell($width_cell[1],10,'Year',1,0,C,false);
    $pdf->Cell($width_cell[2],10,'Tuition Fee',1,0,C,false);
    $pdf->Cell($width_cell[3],10,'Development Fee',1,0,C,false);
    $pdf->Cell($width_cell[4],10,'Laptop Fee',1,0,C,false);
    $pdf->Cell($width_cell[5],10,'Total',1,1,C,false);
    $pdf->SetXY(25,125);

    $pdf->Cell($width_cell[0],10,'1',1,0,C,false);
    $pdf->Cell($width_cell[1],10,'I Year',1,0,C,false);
    $pdf->Cell($width_cell[2],10,'1,70,000/-',1,0,C,false);
    $pdf->Cell($width_cell[3],10,'6,200/-',1,0,C,false);
    $pdf->Cell($width_cell[4],10,'50,000/-',1,0,C,false);
    $pdf->Cell($width_cell[5],10,'2,26,200/-',1,1,C,false);

    $pdf->SetXY(25,135);

    $pdf->Cell($width_cell[0],10,'2',1,0,C,false);
    $pdf->Cell($width_cell[1],10,'II Year',1,0,C,false);
    $pdf->Cell($width_cell[2],10,'1,70,000/-',1,0,C,false);
    $pdf->Cell($width_cell[3],10,'3000/-',1,0,C,false);
    $pdf->Cell($width_cell[4],10,'',1,0,C,false);
    $pdf->Cell($width_cell[5],10,'1,73,000/-',1,1,C,false);

    $width_cell=array(130,25);
    $pdf->SetXY(25,145);
    $pdf->Cell($width_cell[0],10,'Total',1,0,C,false);
    $pdf->Cell($width_cell[1],10,'3,99,200/-',1,1,C,false);


	
	

     $pdf->SetXY(25,165);
	$txt = "\t\t\t\t\tThe student has to pay the first Year fee into CIHL Bank Account( Account Number: 52081085235, Bank: SBI, Branch : IIIT Campus Gachibowli, IFSC Code : SBIN0021161 )  on or before 31-08-2020.";
    // Times 12
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();

     $pdf->SetXY(25,190);
	$txt = "The laptop amount would be disbursed to the student directly by the bank to facilitate the student for procuring laptop .";
	 
    // Times 12
    $pdf->SetFont('Times','B',12);
    $pdf->MultiCell(0,6,$txt);
    $pdf->Ln();

   
   

    $pdf->SetFont('times','',12);
	//$pdf->Image('../../authentication/images/ravi.jpeg','25','205','40');

	$pdf->Cell('','3','');
	

    $pdf->Image('../../authentication/images/ravi.jpeg','25','215','40');

    $pdf->SetXY(25,230);
	$pdf->Cell('','',' for Director ','','','');
	

	$pdf->Output($pdffilename,'F');
	$pdf->Close();
	echo "PDF Generated Successfuly, ";
?>