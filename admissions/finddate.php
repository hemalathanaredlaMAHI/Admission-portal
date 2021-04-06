<?php 
include('db_connect.php'); 
$Hallticket=$_GET['Hallticket'];

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
	$count=0;
	/*if ($stmt = $mysqli->prepare("SELECT slotdate,(hyd_1+hyd_2+hyd_3) as count FROM slotavailability order by slotdate")) */ //original code
	if ($stmt = $mysqli->prepare("SELECT slotdate,(hyd_1+hyd_2+hyd_3) as count FROM slotavailability")) // change by Ranjith	
	{ 
		$stmt->execute();
		$stmt->bind_result($slotdate,$count); 
		$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" onchange=\"getslot(this.value)\"><option value=\"\"> select your slot date  </option>";
		while($stmt->fetch())
		{
			$systemdate = new DateTime();
			$slotdbDate = new DateTime($slotdate);
			$sysdifference  = date_diff($slotdbDate,$systemdate);
			$sysdaydiff = (int)$sysdifference->format("%r%a");
			//if($count>0)
			//change the below condition as count>0 to make no of slot avalaibles as per the requirement
			if($count>-13 && $sysdaydiff <=0) //change by Ranjith
			{
				$dropDownText = $dropDownText."<option value=".$slotdate.">".date('F d Y', strtotime($slotdate))."</option>";
			}
		}
		$dropDownText = $dropDownText."</select>";
	}
	echo $dropDownText;
}
else if($Testcenter=="2")
{
	$count1=0;
	/*if ($stmt = $mysqli->prepare("SELECT slotdate,(kakinada_1+kakinada_2+kakinada_3) as count FROM slotavailability order by slotdate")) */ //original code
	if ($stmt = $mysqli->prepare("SELECT slotdate,(kakinada_1+kakinada_2+kakinada_3) as count FROM slotavailability")) //change by Ranjith
	{ 
		$stmt->execute();
		$stmt->bind_result($slotdate,$count1); 
		$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" onchange=\"getslot(this.value)\"><option value=\"\"> select your slot date  </option>";
		while($stmt->fetch())
		{
			//if($count1>0)
			$systemdate = new DateTime();
			$slotdbDate = new DateTime($slotdate);
			$sysdifference  = date_diff($slotdbDate,$systemdate);
			$sysdaydiff = (int)$sysdifference->format("%r%a");
			if($count1>0 && $sysdaydiff <=0) //change by Ranjith
			{
				$dropDownText = $dropDownText."<option value=".$slotdate.">".date('F d Y', strtotime($slotdate))."</option>";
			}
		}
		$dropDownText = $dropDownText."</select>";
	}
	echo $dropDownText;
}
else if($Testcenter=="3")
{
	$count1=0;
	/*if ($stmt = $mysqli->prepare("SELECT slotdate,(kakinada_1+kakinada_2+kakinada_3) as count FROM slotavailability order by slotdate")) */ //original code
	if ($stmt = $mysqli->prepare("SELECT slotdate,(jntuh_1+jntuh_2+jntuh_3) as count FROM slotavailability")) //change by Ranjith
	{ 
		$stmt->execute();
		$stmt->bind_result($slotdate,$count1); 
		$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" onchange=\"getslot(this.value)\"><option value=\"\"> select your slot date  </option>";
		while($stmt->fetch())
		{
			//if($count1>0)
			$systemdate = new DateTime();
			$slotdbDate = new DateTime($slotdate);
			$sysdifference  = date_diff($slotdbDate,$systemdate);
			$sysdaydiff = (int)$sysdifference->format("%r%a");
			if($count1>0 && $sysdaydiff <=0) //change by Ranjith
			{
				$dropDownText = $dropDownText."<option value=".$slotdate.">".date('F d Y', strtotime($slotdate))."</option>";
			}
		}
		$dropDownText = $dropDownText."</select>";
	}
	echo $dropDownText;
}

else
{
	echo "";
}

?>