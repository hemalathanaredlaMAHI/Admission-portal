<?php include('accesscheck.php'); 
		require('../authentication/fpdf/fpdf.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard</title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
				<?php include('header.php'); ?>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<?php include('sidebar.php'); ?>
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						

						
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">

<div class="row">
						<div class="col-xs-12">
							<div class="widget-box widget-color-blue2 light-border" id="searchCustomersDiv">
								<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">Generate Halltickets</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
											<form class="form-horizontal" method="Get" action="genCallLetter.php">
												<div class="space-2"></div>
														<div class="form-group">
															<div class="col-sm-2">
																<br/>
																<input type="hidden" name="action" id="action" value="generate">
																<button class="pull-right btn btn-sm btn-success" type="submit">
																	<span class="bigger-110">&nbsp;&nbsp;GENERATE&nbsp;&nbsp;</span>
																</button>
															</div>
													</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div> 

		<?php
					if(isset($_GET['action']) && $_GET['action']=="generate"){ ?>
					<div class="row">
						<div class="col-xs-12">
							<div class="widget-box widget-color-blue2 light-border" id="ddPayDiv">
								<div class="widget-header widget-header-blue widget-header-flat">
									<h4 class="widget-title lighter">Generaring Call Letters for <b><?php echo $_GET['testcenter']; ?></b></h4>
								</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">


<?php
		$qry = "Select * from gat_call_letters";
		$result = $mysqli->query($qry);
		while($temp = $result->fetch_object())
		{
			$appno=$temp->appno;
			$rank=$temp->rank;
			$email=$temp->email;
			$name=$temp->fullName;
			$cdate =$temp->cdate;
			$date=date_create($cdate);
            $cdate = date_format($date,"d/m/Y");
			$ctime =$temp->ctime;
			$genDate = 'June 2,'.YEARTEXT;

			$pdf = new FPDF('P','mm','A4');
			$pdffilename='../authentication/callletters/'.$appno.'.pdf';
			$pdf->SetAuthor("MSIT");
			$pdf->SetTitle("MSIT");	
			$pdf->SetCreator("Callletter Generator");
			$pdf->SetSubject("Callletters ".YEARTEXT);
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
			$pdf->Image('../authentication/images/msit.jpg','25','35','35');
			$pdf->SetFont('times','B',14);			
			$pdf->SetXY(45,38);
			$pdf->Cell('','','Master of Science in Information Technology','','','C');
			$pdf->Cell('','3','');
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(155,44);
				
			$pdf->Cell('','',$genDate,'','','C');		
			$pdf->SetFont('times','B',16);
			$pdf->Cell('','3','');
			$pdf->SetXY(45,52);
			$pdf->Cell('','','CALL LETTER','','','C');

			

			$pdf->SetFont('times','B',12);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,60);
			$pdf->Cell('','','Dear Mr. / Ms. '.$name.',','','','');



			$pdf->SetFont('times','',12);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,70);
			$text = 'Sub: MSIT '.YEARTEXT.'  - Counseling and Allotment of MSIT Learning Center';
			$pdf->Cell('','',$text,'','','');



			$pdf->SetFont('times','',11);

			$pdf->Cell('','3','');

			$pdf->SetXY(25,80);

			/*if($rank <=360){
				$pdf->Cell('','','Your admission into MSIT program is confirmed based on your score obtained in GAT/GRE. You are ','','','');

			}
			else{*/
				$pdf->Cell('','','You have been shortlisted for admission into MSIT program based on your GAT/GRE score. You are required','','','');

			//}

			$pdf->SetXY(25,85);

			$pdf->Cell('','','to appear for the counseling for allotment of seat in MSIT Learning Center at IIITH/JNTUH (Direct Admission)','','','');



			$pdf->SetXY(25,90);
			$pdf->Cell('','','and at JNTUK/JNTUA/SVU (Preparatory program) at the venue on the date and time mentioned below.','','','');


			$pdf->SetXY(25,95);
			$pdf->Cell('','','Allotment of seats are as per the GAT/GRE ranks and subject to seats available in the learning centers.','','','');


			$pdf->SetFont('times','B',12);
			$pdf->SetXY(25,102);
			$pdf->Cell('','','Venue:','','','');



			$pdf->SetFont('times','',11);
			$pdf->SetXY(40,107);
			$pdf->Cell('','','Directorate of Admissions, New Admissions Block,','','','');


			$pdf->SetXY(40,112);
			$pdf->Cell('','','Jawaharlal Nehru Technological University Hyderabad ( JNTUH ),','','','');

			$pdf->SetXY(40,117);
			$pdf->Cell('','','Kukatpally, Hyderabad - 500085 ,','','','');
			
			$pdf->SetXY(40,122);
			$pdf->Cell('','','Mobile No: 7799834583, 7799834585','','','');
			
			$pdf->SetFont('times','B',11);
			$pdf->SetXY(25,130);
			$pdf->Cell('','','Date and Time                                : '.$cdate.' , '.$ctime.'','','','');

			$pdf->SetFont('times','B',11);
			$pdf->SetXY(25,135);
			$pdf->Cell('','','MSIT Entrance Rank                    : '.$rank,'','','');

			$pdf->SetXY(25,140);
			$pdf->Cell('','','Hall Ticket/Reference Number     : '.$appno,'','','');
			$pdf->SetFont('times','',11);
			
			$pdf->SetXY(25,150);
			$pdf->Cell('','','If you are interested to take admission into IIITH/JNTUH You are required to bring a crossed demand draft for ','','','');

			$pdf->SetXY(25,155);
			$pdf->Cell('','','Rs.30,000/-(Rs.Thirty thousand only) towards admission fee (part of annual fee). The balance amount of annual fee','','','');

			$pdf->SetXY(25,160);
			$pdf->Cell('','',' has to be paid on the reporting day. Loan documents for bank loan purpose will be issued on the counseling day. ','','','');

			$pdf->SetXY(25,170);
			$pdf->Cell('','','If you are interested to take admission into JNTUK/JNTUA/SVU for the preparatory program you are required','','','');

			$pdf->SetXY(25,175);
			$pdf->Cell('','','to bring a crossed demand draft for Rs.10,000/-(Rs.Ten Thousand only) towards preparatory fee.','','','');


			$pdf->SetXY(25,182);
			$pdf->Cell('','','The counseling may likely to continue until late in the evening. ','','','');



			$pdf->SetFont('times','B',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,190);
			$pdf->Cell('','','Note:','','','');

			
			$pdf->SetFont('times','',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,195);
			$pdf->Cell('','','1. The DD\'s either Rs.30,000/- or Rs.10,000/- are to be drawn in favor of "CIHL, Hyderabad" Payable at Hyderabad.','','','');

			

			$pdf->Cell('','3','');
			$pdf->SetXY(25,200);
			$pdf->Cell('','','2. Those who choose to pay the admission fee of Rs.30,000/- through Credit/Debit cards or net banking may do','','','');

			$pdf->Cell('','3','');
			$pdf->SetXY(25,205);
			$pdf->Cell('','','   so using the link www.msitprogram.net/admissions, one day before the date of counseling by 5 PM. ','','','');


			$pdf->Cell('','3','');
			$pdf->SetXY(25,210);
			$pdf->Cell('','','   Proof of payment must be produced during the counseling session. This payment facility is not available for','','','');

			
			$pdf->Cell('','3','');
			$pdf->SetXY(25,215);
			$pdf->Cell('','','   the candidates seeking admission into preparatory program.','','','');

			$pdf->Cell('','3','');
			$pdf->SetXY(25,220);
			$pdf->Cell('','','3. If you are not able to secure seat as per GAT/GRE rank the amount of Rs.30,000/- or Rs.10,000/- paid in the ','','','');	

			$pdf->Cell('','3','');
			$pdf->SetXY(25,225);
			$pdf->Cell('','','   form of DD or online will be refunded which ever is applicable.','','','');	

			$pdf->Cell('','3','');
			$pdf->SetXY(25,230);
			$pdf->Cell('','','4. The amount paid is non refundable, if admission is taken.','','','');	
	

			$pdf->SetFont('times','',12);
			$pdf->Image('../authentication/images/sign.jpg','25','250','40');



			$pdf->Cell('','3','');
			$pdf->SetXY(25,265);

			$pdf->Cell('','','Dean,','','','');
			$pdf->Cell('','3','');
			$pdf->SetXY(25,270);
			$pdf->Cell('','','CIHL, MSIT Division,','','','');

			

			$pdf->Cell('','3','');
			$pdf->SetXY(25,275);
			$pdf->Cell('','','IIIT Hyderabad.','','','');

			$pdf->SetFont('times','B',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,25);
			$pdf->Cell('','','Following are the documents to be submitted during counseling session: ','','','');

			
			$pdf->SetFont('times','',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,30);
			$pdf->Cell('','','1. Originals of BTech Provisional/Degree, Semester wise mark sheets, consolidated memo and','','','');

			

			$pdf->Cell('','3','');
			$pdf->SetXY(25,35);
			$pdf->Cell('','','SSC/CBSE, Intermediate pass certificates. If they are in the college custodian certificate from the ','','','');

			$pdf->Cell('','3','');
			$pdf->SetXY(25,40);
			$pdf->Cell('','','college has to be submitted.','','','');


			$pdf->Cell('','3','');
			$pdf->SetXY(25,45);
			$pdf->Cell('','','2. Original GRE score card (if applicable).','','','');

					
			$pdf->Cell('','3','');
			$pdf->SetXY(25,50);
			$pdf->Cell('','','3. A set of Xerox copies of all the above mentioned original certificates.','','','');


			$pdf->SetFont('times','',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,55);
			$pdf->Cell('','','4. Counseling letter (this letter), Qualification cum choice of learning center letter and Student Declaration form','','','');

			
			$pdf->Cell('','3','');
			$pdf->SetXY(25,60);
			$pdf->Cell('','','(page 2 and 3 of this document).','','','');


			$pdf->Cell('','3','');
			$pdf->SetXY(25,65);
			$pdf->Cell('','','5. If Provisional certificate is not issued by the concerned university, bring course pass certificate (Page 4 of this','','','');

			
			$pdf->Cell('','3','');
			$pdf->SetXY(25,70);
			$pdf->Cell('','','document) from your college principal on the college letter head with duly signed and stamped.','','','');
/*

			$pdf->SetFont('times','B',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,40);
			$pdf->Cell('','','Note:','','','');



			$pdf->SetFont('times','',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,45);
			$pdf->Cell('','','Those who choose to pay the admission fee of Rs.30,000/- through Credit/Debit cards or net banking may do so ','','','');

			$pdf->SetFont('times','',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,50);
			$pdf->Cell('','','using the link www.msitprogram.net/admissions, one day before the date of counseling by 5 PM. Proof of','','','');

			$pdf->SetFont('times','',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,55);
			$pdf->Cell('','','payment must be produced during the counseling session. If admission is not taken the amount will be refunded.','','','');*/

// 			$pdf->Cell('','3','');
// 			$pdf->SetXY(25,273);
// 			$pdf->Cell('','','fee paid is non refundable.','','','');
// 			$pdf->SetFont('times','B',12);
			
// 			$pdf->Cell('','3','');
// 			$pdf->SetXY(25,278);
// 			$pdf->Cell('','','Note: This counseling is for Left over seats available in JNTUH, JNTUK,

// JNTUA only.','','','');

			$pdf->Output($pdffilename,'F');
			$pdf->Close();

			echo $rank." === Generated Successfuly!!!";
		}


?>

											<span style="font-color='red';"><b>GENERATED ALL WITH NO ERRORS!!!</b></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

<?php } else { ?>
					<br/><br/><div style="color:red;" align='center'><b>Please provide all the above inputs to generate Halltickets</b></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
<?php } ?>					
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include('footer.php'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/dataTables.buttons.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.flash.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.html5.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.print.js"></script>
		<script src="assets/js/dataTables/extensions/buttons/buttons.colVis.js"></script>
		<script src="assets/js/dataTables/extensions/select/dataTables.select.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
		<script src="assets/js/ace/elements.colorpicker.js"></script>
		<script src="assets/js/ace/elements.fileinput.js"></script>
		<script src="assets/js/ace/elements.typeahead.js"></script>
		<script src="assets/js/ace/elements.wysiwyg.js"></script>
		<script src="assets/js/ace/elements.spinner.js"></script>
		<script src="assets/js/ace/elements.treeview.js"></script>
		<script src="assets/js/ace/elements.wizard.js"></script>
		<script src="assets/js/ace/elements.aside.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.ajax-content.js"></script>
		<script src="assets/js/ace/ace.touch-drag.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="assets/js/ace/ace.submenu-hover.js"></script>
		<script src="assets/js/ace/ace.widget-box.js"></script>
		<script src="assets/js/ace/ace.settings.js"></script>
		<script src="assets/js/ace/ace.settings-rtl.js"></script>
		<script src="assets/js/ace/ace.settings-skin.js"></script>
		<script src="assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>

		

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		
		<script type="text/javascript"> ace.vars['base'] = '.'; </script>
		<script src="assets/js/ace/elements.onpage-help.js"></script>
		<script src="assets/js/ace/ace.onpage-help.js"></script>
				<script src="docs/assets/js/rainbow.js"></script>
		<script src="docs/assets/js/language/generic.js"></script>
		<script src="docs/assets/js/language/html.js"></script>
		<script src="docs/assets/js/language/css.js"></script>
		<script src="docs/assets/js/language/javascript.js"></script>

	</body>
</html>

