<?php
	include('accesscheck.php');
	include('../ma_config.php'); 

	$appno = stripslashes($_GET['appno']);
		require('../authentication/fpdf/fpdf.php');
		$pdf = new FPDF('P','mm','A4');
		$path='../authentication/halltickets/';
		$id=$appno.'.pdf';
		$pdffilename=$path.$id;	
		$pdf->SetAuthor("MSIT");
		$pdf->SetTitle("MSIT");
		$pdf->SetCreator("Hallticeket Generator");
		
		$subject = "Halltickets ".YEARTEXT;
		$pdf->SetSubject($subject);

		$pdf->AddPage();	
		$pdf->SetFont('times','B',20);
		$pdf->SetXY(18,15);
		$pdf->Cell('','5','Consortium of Institutions of Higher Learning  ','','','C');		
		$pdf->Cell('','3','');
		$pdf->SetXY(15,25);
		$pdf->SetFont('times','B',10);
		$pdf->Cell('','','IIIT Campus, Gachibowli, Hyderabad - 32, Phone: 040-23001970,Mobile: 7799834583, 7799834585','','','C');
		$pdf->Cell('','3','');
		$pdf->Image('../authentication/images/line.jpg','25','30','162');
		$pdf->Cell('','3','');
		$pdf->Image('../authentication/images/msit.jpg','25','35','35');
		$pdf->SetFont('times','B',14);			
		$pdf->SetXY(45,38);
		$pdf->Cell('','','Master of Science in Information Technology','','','C');
		$pdf->Cell('','3','');
		$pdf->SetXY(45,44);

		$var = "Entrance Test ".YEARTEXT;

		$pdf->Cell('','',$var,'','','C');			
		$pdf->SetFont('times','B',16);
		$pdf->Cell('','3','');
		$pdf->SetXY(45,52);
		$pdf->Cell('','','HALLTICKET','','','C');
		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,70);
		$pdf->Cell('','','Hall Ticket No :','','','');
		$pdf->SetXY(75,70);
		$pdf->Cell('','',$appno,'','','');
		
		$name="";
		$profileimage = "";
		$paymenttype = "";
		$testcenter = "";
		$slotno = "";
		$date_of_exam = "";
		$email = "";
		if ($stmt = $mysqli->prepare("SELECT u.full_name, u.image_url, u.email, w.paymentType, w.center, w.slotNo, w.slotdate FROM walkinApplicationsView w, userProfilesView u where w.email = u.email and w.walkinAppNo = ?")) { 
			$stmt->bind_param('s', $appno); 
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($name,$profileimage,$email,$paymenttype,$testcenter,$slotno,$date_of_exam); 
			$stmt->fetch();
		}
		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,80);
		$pdf->Cell('','','Name of the Candidate :','','','');
		$pdf->SetXY(75,80);
		$pdf->Cell('','',$name,'','','');
		$pdf->SetFont('times','B',12);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,90);
		$pdf->Cell('','','Payment Type :','','','');
		$pdf->SetXY(75,90);
		$pdf->Cell('','',$paymenttype,'','','');
		$upload_path = dirname(dirname(__FILE__)).'/authentication/profile_images/';
		$image = $upload_path.$profileimage;
		$pdf->Image($image,'160','55','35','45');		
		$pdf->Image('../authentication/images/table.jpg','28','110','165');
		$pdf->SetFont('times','B',12);			
		$pdf->SetXY(75,120);
		$pdf->Cell('20','','Venue','','','C');
		$pdf->SetXY(157,118);
		$pdf->Cell('20','','Time & Date','','','C');
		$pdf->SetXY(157,122);
		$pdf->Cell('20','','of the Test','','','C');
		if($testcenter=='HYDERABAD')
		{
			//Old Address
			/*$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','Eduquity Career Technologies PVT LTD,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','403, 4th Floor, Myhome Sarovar Plaza,');	
			$pdf->SetXY(32,142);
			$pdf->Cell('20','','Behind British Library, adjacent to medicity,');	
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Secretariat road, Hyderabad-63');
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Ph:040-23243010');*/

			//New Address
			$pdf->SetFont('times','B',9);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','Eduquity Career Technologies PVT LTD, CHANDRAYAAN 2nd Floor');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Building No 6-1-116/19, Above Ushodaya Supermarket,');	
			$pdf->SetXY(32,142);
			$pdf->Cell('20','','Adj to Padmarao Nagar Park,Opp to SP college(Govt),');	
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Street 13 Padmarao Nagar, Secunderabad-500025.');
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Contact No: 7989476020 / 9849656730 , 040-23243010');
		}
		if($testcenter=='KAKINADA')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','MSIT Learning Center,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','University College of Engineering(Autonomous),');	
			$pdf->SetXY(32,142);
			$pdf->Cell('20','','Principal Building Block, JNTUK,');	
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Kakinada - 533003,');
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Mobile: 7799834586');
		}
		if($testcenter=='JNTUH')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','Directorate of University Industry Interaction Centre (UIIC),');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Jawaharlal Nehru Technological University Hyderabad,,');	
			$pdf->SetXY(32,142);
			$pdf->Cell('20','','Ground Floor,Computer Lab, Admissions Block,,');	
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Hyderabad - 500085, Telangana, India.,');
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Contact No: 7799834583/ 9346152700');
		}
		$timingslot = "";
		if($slotno==1){ $timingslot="10:00 A.M.";}
		if($slotno==2){ $timingslot="2:00 P.M.";}
		$pdf->SetXY(158,140);
		$pdf->Cell('20','',$timingslot,'','','C');
		$pdf->SetXY(158,134);
		$pdf->Cell('20','',$date_of_exam,'','','C');
		$pdf->SetFont('times','B',14);
		$pdf->Cell('','3','');
		$pdf->SetXY(25,165);
		$pdf->Cell('','','Instructions for Candidates:','','','');
		$pdf->SetFont('times','B',10);
		$pdf->Cell('','3','');
		/*$pdf->SetXY(30,173);
		$pdf->Cell('','','1. If you did not pay through online, please carry your DD along with this hall ticket form','','','');			
		$pdf->Cell('','3','');
		$pdf->SetXY(30,178);
		$pdf->Cell('','','without fail.','','','');
		$pdf->Cell('','3','');*/
		$pdf->SetXY(30,173);
		$pdf->Cell('','','1. Any error/change in your name/address must be communicated immediately through','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(30,178);
		$pdf->Cell('','','email to : enquiries@msitprogram.net.','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(30,183);
		$pdf->Cell('','','2. The candidate is being conditionally allowed to appear in the entrance examination','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(30,188);
		$pdf->Cell('','','without verifying whether he/she satisfies the eligibility criterion. This will be examined','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(30,193);
		$pdf->Cell('','','at the time of final admission, if granted.','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(40,220);
		$pdf->Cell('','','Signature of the Candidate','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(150,220);
		$pdf->Cell('','','(Dean, CIHL)','','','');
		$pdf->Image('../authentication/images/sign.jpg','138','205','40');
		$pdf->Output($pdffilename,'I');
		$pdf->Close();
?>