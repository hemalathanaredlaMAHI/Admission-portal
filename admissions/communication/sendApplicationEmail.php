<?php



include("class.phpmailer.php"); 

include dirname(dirname(__FILE__)).'/ma_config.php';

include dirname(dirname(__FILE__)).'/db_connect.php';



error_log("========== Sending Email ==========\n", 3, "logfile.txt");



if(!isset($_POST['email']) || $_POST['email']=="")

{

	exit;

}

if(!isset($_POST['appno']) || $_POST['appno']=="")

{

	exit;

}

$email = $_POST['email'];

$appno = $_POST['appno'];



error_log("Got email and app no ".$email." / ".$appno."\n", 3, "logfile.txt");

	  

			$mail = new PHPMailer(); 

			$mail->IsSMTP(); 

			$mail->SMTPAuth   = true;                  

			$mail->SMTPSecure = "ssl"; 

			$mail->Host       = gethostbyname("smtp.gmail.com"); //"smtp.gmail.com";      

			$mail->Port       = 465;                  

			$mail->Username   = "*******";

			$mail->Password   = "*******";           

			$mail->SMTPKeepAlive = true;

			$mail->Timeout =100000000;

			$mail->From       = "msitadmissions@gmail.com"; 

			$mail->FromName   = "MSIT Admissions ".YEARTEXT;

			

			$mail->WordWrap = 40;                               

			$mail->IsHTML(true);                              

			$mail->Subject  =  "MSIT Admissions ".YEARTEXT." Application"; 

			$mail->Body     =  "<html>

<body>

<table style=\"border: 1px solid #2E9AFE;\" cellspanning='0' cellspacing='0' width='600px'>

<tr>

<td align='center' height='50px' bgcolor='#2E9AFE'><font color='#FFFFFF' size='+2'>MSIT ADMISSIONS ".YEARTEXT."</font></td>

</tr>

<tr>

<td width='100%'>

	<table width='100%'>

	<tr><td>

	<font size='+1'><br/>Congratulations! You have successfully submitted the application for MSIT ADMISSIONS ".YEARTEXT.". <br/><br/>Your Application Number is <font color='red'>".$appno."</font>. <br/><br/>

	If you didn't pay the exam fee, please pay at the earliest.

	<br/><br/>

	For any queries, please call us at 7799834583 / 85</font></td></tr>

	</table>

</td>

</tr>

</table>

</body>

</html>";  



			$mail->AddAddress($email); 

			$flag=1;

			while($flag==1)

			{

				if($mail->Send())

				{

					error_log("Mail Sent successfully\n", 3, "logfile.txt");

					$mail->ClearAddresses();

					$flag=0;

				}

			}

	?>

