<?php 
include '../../db_connect.php';
$Hallticket=$_POST['Hallticket'];

// if ($stmt = $mysqli->prepare("SELECT testCenter FROM walkinapplications WHERE walkinAppNo = ?")) 
// 	echo "Hallticket".$Hallticket.'/n';
// { 
// 	$stmt->bind_param('s', $Hallticket); 
// 	$stmt->execute();
// 	$stmt->store_result();
// 	$stmt->bind_result($Testcenter); 
// 	$stmt->fetch();
// }
// $_SESSION['slotcenter']=$Testcenter;
// echo "testCenter".$Testcenter.'/n';
// if($Testcenter=="1")
// {
// 	$count="";
// 	/*if ($stmt = $mysqli->prepare("SELECT slotdate,(hyd_1+hyd_2+hyd_3) as count FROM slotavailability order by slotdate")) */ //original code
// 	if ($stmt = $mysqli->prepare("SELECT slotdate,(hyd_1+hyd_2+hyd_3) as count FROM slotavailability")) // change by Ranjith	
// 	{ 
// 		$stmt->execute();
// 		$stmt->bind_result($slotdate,$count); 
// 		// $dropDownText = "<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" onchange=\"getslot(this.value)\"><option value=\"\"> select your slot date  </option>";
// 		echo "-----".$count;
// 		echo "++++++".$count;
// 		$dropDownText=array();
// 		while($stmt->fetch())
// 		{
// 			$systemdate = new DateTime();
// 			$slotdbDate = new DateTime($slotdate);

// 			$sysdifference  = date_diff($slotdbDate,$systemdate);
// 			$sysdaydiff = (int)$sysdifference->format("%r%a");

// 			//if($count>0)
// 			if($count>0 && $sysdaydiff <=0) //change by Ranjith
// 			{

// 				// $dropDownText = $dropDownText."<option value=".$slotdate.">".date('F d Y', strtotime($slotdate))."</option>";
// 				$index = 0;
//             while ($row = mysqli_fetch_assoc($stmt)) {

//                 $dropDownText[$index] = $row;
//                 $index++;
//             }

// 			}
// 		}
// 		//$dropDownText = $dropDownText."</select>";
// 	}
// 	echo json_encode ($dropDownText);
// }
// else if($Testcenter=="2")
// {
// 	$count1=0;
// 	/*if ($stmt = $mysqli->prepare("SELECT slotdate,(kakinada_1+kakinada_2+kakinada_3) as count FROM slotavailability order by slotdate")) */ //original code
// 	if ($stmt = $mysqli->prepare("SELECT slotdate,(kakinada_1+kakinada_2+kakinada_3) as count FROM slotavailability")) //change by Ranjith
// 	{ 
// 		$stmt->execute();
// 		$stmt->bind_result($slotdate,$count1); 
// 		// $dropDownText = "<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" onchange=\"getslot(this.value)\"><option value=\"\"> select your slot date  </option>";
// 		$dropDownText=array();
// 		while($stmt->fetch())
// 		{
// 			//if($count1>0)
// 			$systemdate = new DateTime();
// 			$slotdbDate = new DateTime($slotdate);
// 			$sysdifference  = date_diff($slotdbDate,$systemdate);
// 			$sysdaydiff = (int)$sysdifference->format("%r%a");
// 			if($count1>0 && $sysdaydiff <=0) //change by Ranjith
// 			{
// 				$index = 0;
//            		 while ($row = mysqli_fetch_assoc($stmt)) {

//                 $dropDownText[$index] = $row;
//                 $index++;
//             }
// 			}
// 		}
// 		//$dropDownText = $dropDownText."</select>";
// 	}
// 	echo json_encode ($dropDownText);
	
// }
// else
// {
// 	echo "------------";
// }


if ($stmt = $mysqli->prepare("SELECT testCenter FROM walkinApplications WHERE walkinAppNo = ?")) 
{ 
	$stmt->bind_param('s', $Hallticket); 
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($Testcenter); 
	$stmt->fetch();
}
$_SESSION['slotcenter']=$Testcenter;
if($Testcenter=="1")
{
	$dropDownText=array();
	
	$count=0;
	
	$query="SELECT slotdate,(hyd_1+hyd_2+hyd_3) as count FROM slotavailability";
	if($stmt=$mysqli->prepare($query))
	{
		$result=$stmt->execute();
		$stmt->bind_result($slotdate,$count); 
		$index = 0;
		while ($stmt->fetch()) {
			
			// printf ("%s (%s)\n", $slotdate, $count);
			$systemdate = new DateTime();
			$slotdbDate = new DateTime($slotdate);
			$sysdifference  = date_diff($slotdbDate,$systemdate);
			$sysdaydiff = (int)$sysdifference->format("%r%a");
			// echo "string".$count;
			// echo "difff".$sysdaydiff;
            if($count>0 && $sysdaydiff <=0) 
			{
				//echo "count".$slotdate;
            //while ($row = mysqli_fetch_assoc($stmt)) {

                $dropDownText[$index] = $slotdate;
                $index++;
            //}
			}
                }

	}
	echo json_encode($dropDownText);
}
if($Testcenter=="2")
{
	$dropDownText=array();
	
	$count=0;
	
	$query="SELECT slotdate,(kakinada_1+kakinada_2+kakinada_3) as count FROM slotavailability";
	if($stmt=$mysqli->prepare($query))
	{
		$result=$stmt->execute();
		$stmt->bind_result($slotdate,$count); 
		$index = 0;
		while ($stmt->fetch()) {
			
			// printf ("%s (%s)\n", $slotdate, $count);
			$systemdate = new DateTime();
			$slotdbDate = new DateTime($slotdate);
			$sysdifference  = date_diff($slotdbDate,$systemdate);
			$sysdaydiff = (int)$sysdifference->format("%r%a");
			// echo "string".$count;
			// echo "difff".$sysdaydiff;
            if($count>0 && $sysdaydiff <=0) 
			{
				//echo "count".$slotdate;
            //while ($row = mysqli_fetch_assoc($stmt)) {

                $dropDownText[$index] = $slotdate;
                $index++;
            //}
			}
                }

	}
	echo json_encode($dropDownText);
}
	
else
{
	$result=array('result'=>"failure",'msg'=>"No dates for the selected date" );
		 echo json_encode($result);
	
}


?>




