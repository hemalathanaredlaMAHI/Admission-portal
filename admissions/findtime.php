<?php 

//include('accesscheck.php');

// include('db_connect.php'); 

include('accesscheck.php'); // change by Ranjith

$appnumber=$_GET['appno'];

//echo $appnumber;
$date=$_GET['date']; // change by Ranjith


$Testcenter="";

if ($stmt = $mysqli->prepare("SELECT testCenter FROM walkinApplications WHERE walkinAppNo = ?")) { 

									$stmt->bind_param('s', $appnumber); 

									$stmt->execute();

									$stmt->store_result();

									$stmt->bind_result($Testcenter); 

									$stmt->fetch();

									

									}


//$date=$_GET['date'];

$center = $Testcenter;

//Change by Ranjith
//-----------------------------------
$days = 0;

if ($stmt = $mysqli->prepare("SELECT slotdate , count(walkinAppNo) FROM walkinApplications WHERE email = ? and testCenter=? and slotdate is not null order by walkinAppNo desc limit 1")) 
{ 

	$stmt->bind_param('si', $_SESSION['email'] , $center); 

	$stmt->execute();

	$stmt->store_result();

	$stmt->bind_result($slotdate , $count); 

	$stmt->fetch();
	if($count == 0){
		$days = 8;
	}
	else{
		$date1=date_create($slotdate);
		$date2=date_create($date);
		$diff=date_diff($date1,$date2);
		$days =  abs($diff->format("%R%a"));
	}
	//echo "Days ".$days;
}
/*if ($stmt = $mysqli->prepare("SELECT slotdate FROM walkinApplications WHERE email = ? and testCenter=? and slotdate is not null order by walkinAppNo desc limit 1")) 
{ 

	$stmt->bind_param('si', $_SESSION['email'] , $center); 

	$stmt->execute();

	$stmt->store_result();

	$stmt->bind_result($slotdate); 

	$stmt->fetch();

	$date1=date_create($slotdate);
	$date2=date_create($date);
	$diff=date_diff($date1,$date2);
	$days =  $diff->format("%R%a");

	//echo "Days ".$days;
}*/

//-----------------------------------




//echo $center;

if($center=="1")
{
	if($days > 7 ){// new change by Ranjith

		//if ($stmt = $mysqli->prepare("SELECT hyd_1,hyd_2,hyd_3 FROM ma_slotavailability where slotdate=?"))
		if ($stmt = $mysqli->prepare("SELECT hyd_1,hyd_2 FROM slotavailability where slotdate=?"))

		{ 

			$stmt->bind_param('s', $date);

			$stmt->execute();

			$stmt->store_result();

			$stmt->bind_result($time1,$time2); 

			$stmt->fetch();

			$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"time\" name=\"time\" data-placeholder=\"Preference 1\"><option value=\"\"> select your slot time  </option>";

			//update on Dec 20, 2017 by RB
			//here 25 is the seating capacity for walkin exam at Ediquity 
			if($time1<=25 && $time1>0)

			{

				//$dropDownText = $dropDownText."<option value=\"1\">9:00 A.M.</option>"; 
				$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 

			} 
			
			//update on Dec 20, 2017 by RB
			//$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 
			//here 25 is the seating capacity for walkin exam at Ediquity 
			if($time2<=25 && $time2>0)

			{

				//$dropDownText = $dropDownText."<option value=\"2\">11:30 A.M.</option>"; 
				$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

			}
			//$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

			/*if($time3<20)

			{

				$dropDownText = $dropDownText."<option value=\"3\">2:00 P.M.</option>"; 

			}*/

			echo $dropDownText."</select>";

		}

		else

		{

			echo "NONE";

		}
	}
	else{
		echo "<p><font color='red'><strong>Note:</strong>You should have one week gap to apply for walkin exam </font></p>" ;
	}// new change by Ranjith

}



else if($center=="2")

{
	if($days > 7 ){// new change by Ranjith

		//if ($stmt = $mysqli->prepare("SELECT kakinada_1,kakinada_2,kakinada_3 FROM ma_slotavailability where slotdate=?"))
		if ($stmt = $mysqli->prepare("SELECT kakinada_1,kakinada_2 FROM slotavailability where slotdate=?"))

		{ 

			$stmt->bind_param('s', $date);

			$stmt->execute();

			$stmt->store_result();

			$stmt->bind_result($time1,$time2); 

			$stmt->fetch();

			$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"time\" name=\"time\" data-placeholder=\"Preference 1\"><option value=\"\"> select your slot time  </option>";

			/*if($time1<6)

			{

				//$dropDownText = $dropDownText."<option value=\"1\">9:00 A.M.</option>"; 
				$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 

			} 

			if($time2<6)

			{

				//$dropDownText = $dropDownText."<option value=\"2\">11:30 A.M.</option>"; 
				$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

			}*/
			$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 
			$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

			/*if($time3<5)

			{

				$dropDownText = $dropDownText."<option value=\"3\">2:00 P.M.</option>"; 

			}*/

			echo $dropDownText."</select>";

		}

		else

		{

			echo "NONE";

		}
	}
	else{
		echo "<p><font color='red'><strong>Note:</strong>You should have one week gap to apply for walkin exam </font></p>" ;
	}// new change by Ranjith



}
/********/


else if($center=="3")

{
	if($days > 7 ){// new change by Ranjith

		//if ($stmt = $mysqli->prepare("SELECT kakinada_1,kakinada_2,kakinada_3 FROM ma_slotavailability where slotdate=?"))
		if ($stmt = $mysqli->prepare("SELECT jntuh_1,jntuh_2 FROM slotavailability where slotdate=?"))

		{ 

			$stmt->bind_param('s', $date);

			$stmt->execute();

			$stmt->store_result();

			$stmt->bind_result($time1,$time2); 

			$stmt->fetch();

			$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"time\" name=\"time\" data-placeholder=\"Preference 1\"><option value=\"\"> select your slot time  </option>";

			/*if($time1<6)

			{

				//$dropDownText = $dropDownText."<option value=\"1\">9:00 A.M.</option>"; 
				$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 

			} 

			if($time2<6)

			{

				//$dropDownText = $dropDownText."<option value=\"2\">11:30 A.M.</option>"; 
				$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

			}*/
			$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 
			$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

			/*if($time3<5)

			{

				$dropDownText = $dropDownText."<option value=\"3\">2:00 P.M.</option>"; 

			}*/

			echo $dropDownText."</select>";

		}

		else

		{

			echo "NONE";

		}
	}
	else{
		echo "<p><font color='red'><strong>Note:</strong>You should have one week gap to apply for walkin exam </font></p>" ;
	}// new change by Ranjith



}

else

{

	echo "WRONG CENTER";

}

?>