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
									<h4 class="widget-title lighter">Generating Call Letters for <b><?php echo $_GET['testcenter']; ?></b></h4>
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
			/***************************************************************/
			$qry1 = "Select * from counselling_payment";
			$result1 = $mysqli->query($qry1);
			while($temp1 = $result1->fetch_object())
		   {
                    if($temp1->primaryEmail==$email)
                    {
                    	$payment_id=$temp1->payment_mode;
                    	$payment_date=$temp1->trans_date;
                    	break;
                    }
            }





			/**************************************************************/

			$name=$temp->fullName;
			$cdate =$temp->cdate;
			$date=date_create($cdate);
   //          $cdate = date_format($date,"d/m/Y");
			// $ctime =$temp->ctime;

			$cdate = '21/06/2019';
			$ctime ='10.00 AM';

			$genDate = 'June 3,2018';

			$pdf = new FPDF('P','mm','A4');
				$pdffilename='../authentication/callletters/'.$appno.'.pdf';
				$pdf->SetAuthor("MSIT");
				$pdf->SetTitle("MSIT");	
				$pdf->SetCreator("Callletter Generator");
				$pdf->SetSubject("Callletters 2016");
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
					
	
			$pdf->SetFont('times','B',16);

			$pdf->Cell('','3','');

			$pdf->SetXY(45,52);
			$pdf->Cell('','','CALL LETTER','','','C');

			

			$pdf->SetFont('times','B',12);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,60);
			$pdf->Cell('','','Dear Mr. / Ms. '.$name.',','','','');



			$pdf->SetFont('times','B',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,68);
			$pdf->Cell('','','Sub: MSIT 2020  Counseling and Allotment of MSIT Learning Center.','','','');

		


			$pdf->SetFont('times','',11);

			$pdf->Cell('','3','');

			$pdf->SetXY(25,80);

			$pdf->Cell('','','Thank You for completing the online counseling registration process. You are required to appear ','','','');


			$pdf->SetXY(25,85);

			$pdf->Cell('','','for the Online counseling for allotment of seat in  MSIT   Learning   Center   at  ','','','');



			$pdf->SetXY(25,90);
			$pdf->Cell('','','IITH/JNTUH/JNTUK/JNTUA/SVU (direct admission) at the following online zoom link on the ','','','');


			$pdf->SetXY(25,95);
			$pdf->Cell('','','date and time mentioned below. Allotment of seats is as per the GAT/GRE ranks and subject to.','','','');

			$pdf->SetXY(25,100);
			$pdf->Cell('','','availability of seats in the learning centers. .','','','');
			



			$pdf->SetFont('times','B',12);
			$pdf->SetXY(25,110);
			$pdf->Cell('','','Online zoom link:','','','');



			$pdf->SetFont('times','B',11);
			$pdf->SetXY(40,115);
			$pdf->Cell('','','https://us02web.zoom.us/j/83319856063?pwd=ODR5YS9jeU13bDF3U1BkMFUrVDFrZz09,','','','');

            $pdf->SetFont('times','B',12);
			$pdf->SetXY(40,120);
$pdf->Cell('','','Meeting ID 						                    						               :Meeting ID here,','','','');
 

			$pdf->SetXY(40,125);
			$pdf->Cell('','','Meeting Password             	   				               : Meeting password here','','','');
			
			
			//$pdf->SetFont('times','B',11);
			$pdf->SetXY(40,130);
			$pdf->Cell('','','Date and Time               					                      : '.$cdate.' , '.$ctime.'','','','');

			$pdf->SetXY(40,135);
			$pdf->Cell('','','Rank                        					 				 	                     	: '.$rank,'','','');


			//$pdf->SetFont('times','B',11);
			$pdf->SetXY(40,140);
			$pdf->Cell('','','Hall Ticket/Reference Number  										   : '.$appno,'','','');
			
            //$pdf->SetFont('times','B',11);
			


           // $pdf->SetFont('times','B',11);
			$pdf->SetXY(40,145);    
			$pdf->Cell('','','Admission fee paid                        				 				  : Rs.30,000. /- ','','','');


            //$pdf->SetFont('times','B',11);
			$pdf->SetXY(40,150);
			$pdf->Cell('','','Payment reference ID                						 				   : '.$payment_id,'','','');

			 //$pdf->SetFont('times','B',11);
			$pdf->SetXY(40,155);
			$pdf->Cell('','','Payment Date       								 					     			              : '.$payment_date,'','','');


			$pdf->SetFont('times','',11);
			$pdf->SetXY(25,165);
			$pdf->Cell('','','The balance amount of annual fee has to be paid after admissions on the reporting/induction day. The amount ','','','');

			$pdf->SetXY(25,170);
			$pdf->Cell('','',' paid is non-refundable if admission is taken. Loan documents for bank loan  purpose will be issued on the ','','','');

			$pdf->SetXY(25,175);
			$pdf->Cell('','','counseling day. Please join the online counseling zoom link only in the specified time above (slot given to you).','','','');


            $pdf->SetFont('times','BI',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,180);
			$pdf->Cell('','','For any reason if you are unable to participate in the counseling at scheduled slot/time then it will be ','','','');


			$pdf->SetXY(25,185);
			$pdf->Cell('','','considered as absent, counseling process will go on and the seat will be allotted to the next Rank holder. ','','','');

			$pdf->SetXY(25,190);
			$pdf->Cell('','','All
the absentees will be called for the second phase of counseling and the remaining seats will be allotted  ','','','');
 $pdf->SetXY(25,195);
			$pdf->Cell('','','as per Rank order. ','','','');


			



			$pdf->SetFont('times','B',11);
			$pdf->Cell('','3','');
			$pdf->SetXY(25,205);
			$pdf->Cell('','','Note:','','','');


			
            $pdf->SetFont('times','',11);
			$pdf->SetXY(25,210);
			$pdf->Cell('','','1.If you are not able to secure seat as per GAT/GRE rank the amount of Rs.30,000 paid online will be refunded.','','','');
			$pdf->SetXY(25,215);
			$pdf->Cell('','','2.Please call help line numbers 7799834583, 7799834585 if you are having any difficulties during the ','','','');
			$pdf->SetXY(25,220);
			$pdf->Cell('','','admission process..','','','');
			$pdf->SetXY(25,225);
			$pdf->Cell('','','3.The amount paid is non refundable, if admission is taken..','','','');
			$pdf->SetXY(25,230);
			$pdf->Cell('','','4.If you need training material on zoom meetings, please go through document at this link https://bit.ly/30qK','','','');



			$pdf->SetFont('times','',12);
			$pdf->Image('../authentication/images/sign.jpg','25','235','40');



			$pdf->Cell('','3','');
			$pdf->SetXY(25,245);

			$pdf->Cell('','','Dean,','','','');
			$pdf->Cell('','3','');
			$pdf->SetXY(25,250);
			$pdf->Cell('','','CIHL, MSIT Division,','','','');

			

			$pdf->Cell('','3','');
			$pdf->SetXY(25,255);
			$pdf->Cell('','','IIIT Hyderabad.','','','');
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

