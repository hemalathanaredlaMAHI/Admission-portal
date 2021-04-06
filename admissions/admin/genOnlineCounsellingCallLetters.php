<?php
	include('accesscheck.php'); 
	require('../authentication/fpdf/fpdf.php');
	$qry = "select zoom_link, online_counselling_slots.meeting_id, password, date, time, student_zoomlinks.rank, payment_mode, trans_no, trans_date, appno, fullName from counselling_payment join student_zoomlinks on student_zoomlinks.email=counselling_payment.primaryEmail  join online_counselling_slots on student_zoomlinks.zoomlinkId=online_counselling_slots.id  join gat_call_letters on counselling_payment.primaryEmail=gat_call_letters.email";
	$result = $mysqli->query($qry);
	$total = 0;
	while($temp = $result->fetch_object())
	{
		$zoom_link=$temp->zoom_link;
		$meeting_id=$temp->meeting_id;
		$password=$temp->password;
		$date_time =date("d-m-Y h:i A",strtotime($temp->date." ".$temp->time));
		$rank =$temp->rank;
		$payment_mode =$temp->payment_mode;
		$trans_no =$temp->trans_no;
		$trans_date =date("d-m-Y",strtotime($temp->trans_date));
		$appno = $temp->appno;
		$name = ucwords($temp->fullName);
		$pdf = new FPDF('P','mm','A4');
		$pdffilename='../authentication/callletters/'.$appno.'.pdf';
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
		$pdf->Image('../authentication/images/msit.jpg','25','35','35');
		$pdf->SetFont('times','B',14);			
		$pdf->SetXY(45,38);
		$pdf->Cell('','','Master of Science in Information Technology','','','C');
		$pdf->Cell('','3','');
		$pdf->SetXY(45,44);
		//$pdf->Cell('','','Entrance Test '.YEARTEXT.'::Second Phase Counseling','','','C');		

		$pdf->SetFont('times','B',16);
		$pdf->Cell('','3','');
		$pdf->SetXY(15,52);
		$pdf->Cell('','','CALL LETTER','','','C');

		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(140,52);
		$dt = date("d-m-Y");
		$pdf->Cell('','','Date : '.$dt.'','','','C');

		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,64);
		$pdf->Cell('','','Dear Mr. / Ms. '.$name.',','','','');



		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,72);
		$pdf->Cell('','','Sub: MSIT 2020 - Counseling and Allotment of MSIT Learning Center,','','','');

		$pdf->SetFont('times','',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,77);
		$txt = "Thank You for completing the online counseling registration process. You are required to appear for the counseling for allotment of seat in MSIT Learning Center at IIITH/JNTUH/JNTUK/JNTUA/SVU (direct admission) at the following online zoom link on the date and time mentioned below. Allotment of seats are as per the GAT/GRE ranks and subject to availability of seats in the learning centers.";
	    // Times 12
	    $pdf->SetFont('Times','',12);
	    $pdf->MultiCell(0,5,$txt);
	    $pdf->Ln();

		$pdf->SetFont('times','B',12);
		$pdf->SetXY(25,108);
		$pdf->Cell('','','Online zoom link: ','','','');
		$pdf->SetXY(25,114);
		$pdf->SetFont('times','',12);
		$pdf->Cell('','',$zoom_link,'','','');
		$pdf->SetFont('times','B',12);
		$pdf->SetXY(25,120);
		$pdf->Cell('','','Meeting ID                                  : '.$meeting_id.'','','','');
		$pdf->SetXY(25,126);
		$pdf->Cell('','','Meeting Password                      : '.$password.'','','','');
		$pdf->SetXY(25,132);
		$pdf->Cell('','','Date and Time                            : '.$date_time.'','','','');
		$pdf->SetXY(25,138);
		$pdf->Cell('','','MSIT Rank                                 : '.$rank.'','','','');
		$pdf->SetXY(25,144);
		$pdf->Cell('','','Hall Ticket/Reference Number : '.$appno.'','','','');
		$pdf->SetXY(25,150);
		$pdf->Cell('','','Admission fee paid                     : Rs. '.$trans_no.'','','','');
		$pdf->SetXY(25,156);
		$pdf->Cell('','','Payment reference ID                : '.$payment_mode.'','','','');
		$pdf->SetXY(25,162);
		$pdf->Cell('','','Date of payment                          : '.$trans_date.'','','','');
		$pdf->SetFont('times','B',11);
		
		$pdf->SetXY(25,166);
		$txt = "The balance amount of annual fee has to be paid after admissions on the reporting/induction day.  The amount paid is non refundable, if admission is taken. Loan documents for bank loan purpose will be issued on the counseling day. Please join online counseling zoom link only in the specified time above (slot given to you).";
	    // Times 12
	    $pdf->SetFont('Times','',12);
	    $pdf->MultiCell(0,5,$txt);
	    $pdf->Ln();

	    $pdf->SetXY(25,187);
	    $txt = "For any reason if you are unable to participate in the counseling at scheduled slot/time then it will be considered as absent, counseling process will go on and the seat will be allotted to the next rank holder. Absentees can only obtain seats in the second phase of counseling, for the remaining/available seats as per rank order.";
	    $pdf->SetFont('Times','BI',11);
	    $pdf->MultiCell(0,5,$txt);
	    $pdf->Ln();
		
		$pdf->SetFont('times','B',11);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,212);
		$pdf->Cell('','','Note:','','','');
		
		$pdf->SetFont('times','',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,215);
		$txt = "1.	If you are not able to secure seat as per GAT/GRE rank the amount of Rs.30,000 paid online will \t\t\t\tbe refunded.\n2.	Please call help line numbers 7799834583, 7799834584, 7799834585 if you are having any difficulties during \t\t\t\tadmissions process.\n3.	The amount paid is non refundable, if admission is taken. \n4.	If you need training material on zoom meetings, please go through document at this link \t\t\t\thttps://bit.ly/30qKSCr";
	    // Times 12
	    $pdf->SetFont('Times','',12);
	    $pdf->MultiCell(0,5,$txt);
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
		sleep(1);
	}
?>	

		

		