
<?php
//include 'securelogin_functions.php';
//include 'functions.php';
include dirname(dirname(__FILE__)).'/db_connect.php';
//include('class.phpmailer.php'); 

$get = (!empty($_GET)) ? true : false;
if($get)
{
	
				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
				  }
				$result = mysqli_query($con,"SELECT * FROM ma_offline_details where appID='".$_GET['appID']."'");
				$flag=0;
				while($row = mysqli_fetch_array($result))
					{
					     $flag=1;
					}
					if($flag==1)
					{
							$GAT_App_Number = "MSIT2014GAT";
		
							if ($insert_stmt = $mysqli->prepare("select LPAD(app_counter,5,'0') as counter from gat_applications")) {   			
							$insert_stmt->execute();
							$insert_stmt->store_result();
							$insert_stmt->bind_result($app_counter); 
							$insert_stmt->fetch();
							$GAT_App_Number = $GAT_App_Number.$app_counter;	
							$insert_stmt->close();
							echo "You are apllication ID is already registered.Please Try new ApplicationID  ".$GAT_App_Number;
							
							$app_counter = $app_counter+1;
							if ($insert_stmt = $mysqli->prepare("update gat_applications set app_counter =?")) {   			
								$insert_stmt->bind_param('s', $app_counter); 
								$insert_stmt->execute();
								$insert_stmt->close();
								}
								}
							
					}
					else
					{
							echo "You Application ID is Valid";
					}
					
}
?>
	