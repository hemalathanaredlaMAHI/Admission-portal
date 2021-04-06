<?php 

//include('accesscheck.php');

 include('db_connect.php'); 

$appnumber=$_GET['appno'];

//echo $appnumber;

$Testcenter="";

if ($stmt = $mysqli->prepare("SELECT testCenter FROM walkinApplications WHERE walkinAppNo = ?")) { 

									$stmt->bind_param('s', $appnumber); 

									$stmt->execute();

									$stmt->store_result();

									$stmt->bind_result($Testcenter); 

									$stmt->fetch();

									

									}

$date=$_GET['date'];

$center = $Testcenter;

//echo $center;

if($center=="1")

{

	//if ($stmt = $mysqli->prepare("SELECT hyd_1,hyd_2,hyd_3 FROM ma_slotavailability where slotdate=?"))
	if ($stmt = $mysqli->prepare("SELECT hyd_1,hyd_2 FROM slotavailability where slotdate=?"))

	{ 

		$stmt->bind_param('s', $date);

		$stmt->execute();

		$stmt->store_result();

		$stmt->bind_result($time1,$time2); 

		$stmt->fetch();

		$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"time\" name=\"time\" data-placeholder=\"Preference 1\"><option value=\"\"> select your slot time  </option>";

		/*if($time1<20)

		{

			//$dropDownText = $dropDownText."<option value=\"1\">9:00 A.M.</option>"; 
			$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 

		} */
		
		$dropDownText = $dropDownText."<option value=\"1\">10:00 A.M.</option>"; 

		/*if($time2<20)

		{

			//$dropDownText = $dropDownText."<option value=\"2\">11:30 A.M.</option>"; 
			$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

		}*/
		$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 

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



else if($center=="2")

{

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

		echo $dropDownText."</select>";;

	}

	else

	{

		echo "NONE";

	}

}

else

{

	echo "WRONG CENTER";

}

?>