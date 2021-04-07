<?php
require('fpdf/fpdf.php');
include dirname(dirname(__FILE__)).'/db_connect.php';
include dirname(dirname(__FILE__)).'/ma_config.php';

//$GAT_App_Number = "18";	
$GAT_App_Number = substr(YEARTEXT,2);	
$GAT_App_Number = $GAT_App_Number.'0D';	
if ($insert_stmt = $mysqli->prepare("insert into gatAppCounter(email) values ('Downloaded')")) 
{   			
	$insert_stmt->execute();
	$seqNumGen = $insert_stmt->insert_id;
	$padSeq = sprintf("%05d", $seqNumGen);
	$GAT_App_Number = $GAT_App_Number.$padSeq;
	$insert_stmt->close();
}		
$pdf = new FPDF();
$pdf->SetAuthor("MSIT");
$pdf->SetTitle("MSIT");
$pdf->SetCreator("MSIT APPLICATION");
$pdf->SetSubject("MSIT APPLICATION");
$pdf->AddPage();	
$pdf->SetFont('times','',12);
$pdf->Image('appimages/image_1.JPG','5','8','200');
$pdf->SetXY(75,88);
$pdf->SetFont('times','B',12);
$pdf->Cell(3,13,'Application No : '.$GAT_App_Number,0,1);	
$pdf->Image('appimages/image_2.jpg','5','100','200');
$pdf->Image('appimages/image_3.jpg','5','210','200');
$pdf->AddPage();	
$pdf->Image('appimages/image_4.JPG','5','10','200');
$pdf->Image('appimages/image_5.jpg','5','150','200');
$pdf->Output('apps/'.$GAT_App_Number.'.pdf','F');
$pdf->Close();
header("Location: apps/".$GAT_App_Number.".pdf");
?>

      

