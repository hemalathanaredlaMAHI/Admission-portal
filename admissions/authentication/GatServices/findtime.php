<?php 

//include('accesscheck.php');

// include('db_connect.php'); 
include '../../db_connect.php';
//include('accesscheck.php'); // change by Ranjith

$appnumber=$_POST['appno'];

//echo $appnumber;
$date=$_POST['date']; // change by Ranjith
$email=$_POST['email'];

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

	$stmt->bind_param('si', $email , $center); 

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
			$dropDownText=array();
			//$dropDownText[0] = "select your slot time";
			if($time1 >0 &&  $time1<=20)
			{
				$dropDownText[0] = "10:00 A.M"; 
				//$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 
			}
			else
			{
				$dropDownText[0]="";
			}
			
			if ($time2>0 && $time2<=20) {
				# code...
				$dropDownText[1] = "2:00 P.M"; 
			}
			else
			{
				$dropDownText[1]="";
			}
			$result=array('result'=>"success",'msg'=>"get times",'data'=>$dropDownText);
			

			echo json_encode($result);

		}

		else

		{
$result=array('result'=>"failure",'msg'=>"No time for this date");
			

			echo json_encode($result);


		}
	}
	else{
		 $result=array('result'=>"failure",'msg'=>"You should have one week gap to apply for walkin exam" );
		 echo json_encode($result);
	}// new change by Ranjith

}



else if($center=="2")

{
	if($days > 7 ){// new change by Ranjith

		//if ($stmt = $mysqli->prepare("SELECT hyd_1,hyd_2,hyd_3 FROM ma_slotavailability where slotdate=?"))
		if ($stmt = $mysqli->prepare("SELECT kakinada_1,kakinada_2 FROM slotavailability where slotdate=?"))

		{ 

			$stmt->bind_param('s', $date);

			$stmt->execute();

			$stmt->store_result();

			$stmt->bind_result($time1,$time2); 

			$stmt->fetch();
			$dropDownText=array();
			//$dropDownText[0] = "select your slot time";
			if($time1 >0 &&  $time1<=5)
			{
				$dropDownText[0] = "10:00 A.M"; 
				//$dropDownText = $dropDownText."<option value=\"2\">2:00 P.M.</option>"; 
			}
			else
			{
				$dropDownText[0]="";
			}
			if ($time2>0 && $time2<=5) {
				# code...
				$dropDownText[1] = "2:00 P.M"; 
			}
			else
			{
				$dropDownText[1]="";
			}
		$result=array('result'=>"success",'msg'=>"get times",'data'=>$dropDownText);
			

			echo json_encode($result);

		}

		else

		{
$result=array('result'=>"failure",'msg'=>"No time for this date");
			

			echo json_encode($result);

		}
	}
	else{
		$result=array('result'=>"failure",'msg'=>"You should have one week gap to apply for walkin exam" );
		 echo json_encode($result);
	}// new change by Ranjith

}

else

{

	echo "WRONG CENTER";

}

?>