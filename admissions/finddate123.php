<?php 
include('db_connect.php'); 
$d1 = strtotime("2016-02-24");
$d2 = strtotime("2016-04-28");
$datediff = $d1 - $d2;
echo "============".floor($datediff/(60*60*24))."<br/>";
			

	$count=0;
	if ($stmt = $mysqli->prepare("SELECT slotdate,(hyd_1+hyd_2+hyd_3) as count FROM slotavailability order by slotdate")) 
	{ 
		$stmt->execute();
		$stmt->bind_result($slotdate,$count); 
		$dropDownText = "<select class=\"width-20chosen-select centres\" id=\"date\" name=\"date\" data-placeholder=\"Preference 1\" onchange=\"getslot(this.value)\"><option value=\"\"> select your slot date  </option>";
		while($stmt->fetch())
		{
			$dateDiffr = abs(strtotime("2016-05-12") - strtotime($slotdate));
			$diffDays = floor($dateDiffr/(60*60*24));
			if($count>0 && $diffDays >= 7)
			{
				$dropDownText = $dropDownText."<option value=".$slotdate.">".date('F d Y', strtotime($slotdate))."</option>";
			}
		}
		$dropDownText = $dropDownText."</select>";
	}
	echo $dropDownText;

?>