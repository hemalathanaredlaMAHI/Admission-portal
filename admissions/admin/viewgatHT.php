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
											<form class="form-horizontal" method="Get" action="genGatHT.php">
												<div class="space-2"></div>
													<div class="form-group">
															
															<div class="col-sm-3">
																<div class="col-sm-12" align="center">SELECT TEST CENTER <br/>
																<select class="form-control" name="testcenter" id="testcenter">
																	<option <?php if( isset($_GET['testcenter']) && $_GET['testcenter']=="Hyderabad" ) echo "selected"; ?> value="Hyderabad">Hyderabad</option>
																	<option <?php if( isset($_GET['testcenter']) && $_GET['testcenter']=="Warangal" ) echo "selected"; ?> value="Warangal">Warangal</option>
																	<option <?php if( isset($_GET['testcenter']) && $_GET['testcenter']=="Visakhapatnam" ) echo "selected"; ?> value="Visakhapatnam">Visakhapatnam</option>
																	<option <?php if( isset($_GET['testcenter']) && $_GET['testcenter']=="Kakinada" ) echo "selected"; ?> value="Kakinada">Kakinada</option>
																	<option <?php if( isset($_GET['testcenter']) && $_GET['testcenter']=="Anantapur" ) echo "selected"; ?> value="Anantapur">Anantapur</option>
																	<option <?php if( isset($_GET['testcenter']) && $_GET['testcenter']=="Tirupati" ) echo "selected"; ?> value="Tirupati">Tirupati</option>
																	<option <?php if( isset($_GET['testcenter']) && $_GET['testcenter']=="Vijayawda" ) echo "selected"; ?> value="Vijayawda">Vijayawda</option>
																</select></div>
															</div>
															<div class="col-sm-3">
																<div class="col-sm-12" align="center">PLEASE ENTER DATE<br/>
																	<input <?php if(isset($_GET['testdate'])) echo "value='".$_GET['testdate']."'"; ?> class="form-control" name="testdate" id="testdate" placeholder="Example: 28-05-2016" type="text" />
																</div>
															</div>
															<div class="col-sm-3">
																<div class="col-sm-12" align="center">PLEASE ENTER TIME<br/>
																	<input <?php if(isset($_GET['testtime'])) echo "value='".$_GET['testtime']."'"; ?> class="form-control" name="testtime" id="testtime" placeholder="Example: 09:00AM" type="text" />
																</div>
															</div>
															
													</div>
													<div class="form-group">
															<div class="col-sm-3">
																<div class="col-sm-12" align="center">SYSTEMS IN SLOT <br/>
																	<input <?php if(isset($_GET['slotsystems'])) echo "value='".$_GET['slotsystems']."'"; ?> class="form-control" name="slotsystems" id="slotsystems" type="text" />
																</div>
															</div>
															<div class="col-sm-3">
																<div class="col-sm-12" align="center">ONLY FOR APP NO<br/>
																	<input <?php if(isset($_GET['onlyappno'])) echo "value='".$_GET['onlyappno']."'"; ?> class="form-control" name="onlyappno" id="onlyappno" type="text" />
																</div>
															</div>
															<div class="col-sm-2">
																<br/>
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
<div class="row">
						<div class="col-xs-12">
							<div class="widget-box widget-color-blue2 light-border" id="searchCustomersDiv">
								<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">View Halltickets</h4>
									</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
										<div class="row">
										<div class="col-sm-12" align="center">
											<div class="col-sm-3">
												<a class="pull-right btn btn-sm btn-success" href='../authentication/halltickets/Hyderabad' target='_blank'>
													<span class="bigger-110">&nbsp;&nbsp;HYDERABAD&nbsp;&nbsp;</span>
												</a><br/><br/><br/>
											</div>
											<div class="col-sm-3">
												<a class="pull-right btn btn-sm btn-success" href='../authentication/halltickets/Kakinada' target='_blank'>
													<span class="bigger-110">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KAKINADA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
												</a><br/><br/><br/>
											</div>
											<div class="col-sm-3">
												<a class="pull-right btn btn-sm btn-success" href='../authentication/halltickets/Anantapur' target='_blank'>
													<span class="bigger-110">&nbsp;&nbsp;ANANTAPUR&nbsp;&nbsp;</span>
												</a><br/><br/><br/>
											</div>
										</div>
										</div>	
										<div class="row">
										<div class="col-sm-12" align="center">
											<div class="col-sm-3">
												<a class="pull-right btn btn-sm btn-success" href='../authentication/halltickets/Tirupati' target='_blank'>
													<span class="bigger-110">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIRUPATI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
												</a><br/><br/><br/>
											</div>
											<div class="col-sm-3">
												<a class="pull-right btn btn-sm btn-success" href='../authentication/halltickets/Vijayawda' target='_blank'>
													<span class="bigger-110">&nbsp;&nbsp;&nbsp;&nbsp;VIJAYAWADA&nbsp;&nbsp;&nbsp;&nbsp;</span>
												</a><br/><br/><br/>
											</div>
											<div class="col-sm-3">
												<a class="pull-right btn btn-sm btn-success" href='../authentication/halltickets/Warangal' target='_blank'>
													<span class="bigger-110">&nbsp;&nbsp;WARANGAL&nbsp;&nbsp;&nbsp;</span>
												</a><br/><br/><br/>
											</div>
										</div>
										</div>	
										<div class="row">
										<div class="col-sm-12" align="center">
											<div class="col-sm-3"></div>
											<div class="col-sm-3">
												<a class="pull-right btn btn-sm btn-success" href='../authentication/halltickets/Visakhapatnam' target='_blank'>
													<span class="bigger-110">VISAKHAPATNAM</span>
												</a>
											</div>
										</div>
										</div>												
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
		<?php
					if( isset($_GET['slotsystems']) && $_GET['slotsystems']!="" && isset($_GET['testcenter']) && $_GET['testcenter']!="" && isset($_GET['testdate']) && $_GET['testdate']!="" && isset($_GET['testtime']) && $_GET['testtime']!=""){ ?>
					<div class="row">
						<div class="col-xs-12">
							<div class="widget-box widget-color-blue2 light-border" id="ddPayDiv">
								<div class="widget-header widget-header-blue widget-header-flat">
									<h4 class="widget-title lighter">Generaring Halltickets for <b><?php echo $_GET['testcenter']; ?></b></h4>
								</div>
								<div class="widget-body">
									<div class="widget-main">	
										<div id="fuelux-wizard-container">
					
					<?php	
						$testcenter = stripslashes($_GET['testcenter']);
						$timingslot = stripslashes($_GET['testtime']);
						$date_of_exam = stripslashes($_GET['testdate']);
						$slotsystems = stripslashes($_GET['slotsystems']);
						$qry = "SELECT 
									id, 
									gatAppNo, 
									email, 
									full_name, 
									image_url, 
									paymentType 
								FROM gat_halltickets 
								WHERE 
									examType = 'GAT' and 
									paymentStatus = 'yes' and 
									center = '".$testcenter."' and 
									htStatus = 'NO' 
									order by gatAppNo LIMIT ".$slotsystems;
						if(isset($_GET['onlyappno']) && $_GET['onlyappno']!="")
						{	
							$qry = "SELECT 
									id, 
									gatAppNo, 
									email, 
									full_name, 
									image_url, 
									paymentType 
								FROM gat_halltickets 
								WHERE 
									examType = 'GAT' and 
									paymentStatus = 'yes' and 
									center = '".$testcenter."' and 
									gatAppNo = '".$_GET['onlyappno']."'";			
						}
						
						$appcount = 1;
						if ($result = $mysqli->query($qry)) 
						{
							$appcount = 1;
							while($row = $result->fetch_object()) 
							{
								$gatAppId = $row->id;
								$appno = $row->gatAppNo;
								$email = $row->email;
								$name = $row->full_name;
								$profileimage = $row->image_url;
								$paymenttype = $row->paymentType;
		$path='../authentication/halltickets/'.$testcenter.'/';
		$id=$appno.'.pdf';
		$pdffilename=$path.$id;	
		$pdf = new FPDF('P','mm','A4');
		$pdf->SetAuthor("MSIT");
		$pdf->SetTitle("MSIT");
		$pdf->SetCreator("Hallticeket Generator");
		$pdf->SetSubject("Halltickets 2016");
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
		$pdf->Cell('','','Entrance Test 2016','','','C');			
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
		$type = "PNG";
		if(exif_imagetype($image)==2)
			$type = "JPG";
		$pdf->Image($image,'160','55','35','45',$type);		
		$pdf->Image('../authentication/images/table.jpg','28','110','165');
		$pdf->SetFont('times','B',12);			
		$pdf->SetXY(75,120);
		$pdf->Cell('20','','Venue','','','C');
		$pdf->SetXY(157,118);
		$pdf->Cell('20','','Time & Date','','','C');
		$pdf->SetXY(157,122);
		$pdf->Cell('20','','of the Test','','','C');
		if($testcenter=='Hyderabad')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','G Narayanamma Institute of Technology & Science,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Shaikpet, Mehdipatnam, Hyderabad-500008');	
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Contact: Col MS Raju');	
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Phone: 9949159160, 040-23565648');
		}
		if($testcenter=='Kakinada')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','MSIT programme, University college of Engineering (Autonomous),');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Principal Building Block, JNT University, Kakinada - 533003');
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Contact: S.Veerabhadraiah');	
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Phone: 7799834586');
		}		 
		if($testcenter=='Tirupati')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','Shree Vidyaniketan Engineering College, Sree Sainath Nagar,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','A Rangam Pet, Madanapalli Road,Tirupati-517102.(A.P)');
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Contact: Kishore');	
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Phone: 9160999973, 0877-2236711 / 2236712');
		}		 
		if($testcenter=='Vijayawda')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','Andhra Loyola College, Ring Road,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Vijayawada-520008');
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Contact: Prof KBS Sastry(HOD CS)');	
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Phone: 0866-2476082');
		}
		if($testcenter=='Warangal')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','Kakatiya Institute of Technology and Science,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Opp: Yerragattu Hillock, Bheemaram Village,');
			$pdf->SetXY(32,142);
			$pdf->Cell('20','','Hasanparthy Mandal, Warangal-506015(A.P)');
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Contact: Niranjan Reddy');	
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Phone: 9849270755, 0870-2564006');
		}
		if($testcenter=='Anantapur')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','JNTUA College of Engineering, Computer Science & Engg. Dept.,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Ananthapur - 515002');
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Contact: Shoba Bindhu');	
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Phone: 8143289089');
		}
		if($testcenter=='Visakhapatnam')
		{
			$pdf->SetFont('times','B',10);
			$pdf->SetXY(32,132);
			$pdf->Cell('20','','Sanketika Vidya Parishad Engineering College,');
			$pdf->SetXY(32,137);
			$pdf->Cell('20','','Behind Cricket Stadium, Pothinamallayyapalem');
			$pdf->SetXY(32,142);
			$pdf->Cell('20','','Visakhapatnam-530041.(A.P.)');
			$pdf->SetXY(32,147);
			$pdf->Cell('20','','Contact: KSP Rao');	
			$pdf->SetXY(32,152);
			$pdf->Cell('20','','Phone: 9949631256, 0891 - 2792525 / 2793535');
		}
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
		$pdf->SetXY(30,173);
		$pdf->Cell('','','1. Any error/change in your name/address must be communicated immediately through','','','');
		$pdf->Cell('','3','');
		$pdf->SetXY(30,178);
		$pdf->Cell('','','email to : enquiries2016@msitprogram.net.','','','');
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
		$pdf->Output($pdffilename,'F');
		$pdf->Close();

								$outputtext =  $appcount." - ".$appno." - ".$name." - GENERATED";
								$ht_status = 'YES'; 
								$ht_time = date('Y-m-d H:s');
			if ($insert_stmt = $mysqli->prepare("update gat_halltickets set testDate=?, testTime=?, htStatus=?, htTime=? where id = ? ")) 
			{   			
				$insert_stmt->bind_param('sssss', $date_of_exam, $timingslot, $ht_status, $ht_time, $gatAppId ); 
				if($insert_stmt->execute())
					$outputtext = $outputtext." $$ UPDATE SUCCESS";
				else
					$outputtext = $outputtext." $$ UPDATE FAILED";
				$insert_stmt->close();
			}
			else
			{
				$outputtext = $outputtext." $$ UPDATE FAILED";
			}
			echo $outputtext."<br/>";
								$appcount++;
							}
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
