<?php
	include 'securelogin_functions.php';
	include 'functions.php';	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';


	$email = $_SESSION['email'];
	$upload_path = dirname(__FILE__).'/profile_images/';
	$file_exts = array("jpg", "jpeg", "png");
	$array = explode(".", $_FILES["file"]["name"]);
	$upload_exts = end($array);
	
	if (($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			/*if (file_exists($upload_path.$_FILES["file"]["name"]))
			{
				echo "already exists. "."</div>";
			}
			else
			{*/
				$photo_name_with_extension = "";
				if($_FILES["file"]["type"] == "image/jpg")
				{
					$photo_name_with_extension = $_SESSION["email"].".jpg";
				}
				elseif($_FILES["file"]["type"] == "image/jpeg")
				{
					$photo_name_with_extension = $_SESSION["email"].".jpeg";
				}
				else
				{
					$photo_name_with_extension = $_SESSION["email"].".png";
				}
				move_uploaded_file($_FILES["file"]["tmp_name"],$upload_path.$photo_name_with_extension);
				if ($insert_stmt = $mysqli->prepare("update ma_user_profile set image_url = ? where email = ?")) {   			
				$insert_stmt->bind_param('ss', $photo_name_with_extension, $email); 
				$insert_stmt->execute();
				$insert_stmt->close();
				
				if($_SESSION['photo_status']!="yes")
				{
					$photo_status = "yes";
					if ($insert_stmt = $mysqli->prepare("update ma_offline_users set photo_status = ? where email = ? ")) {   			
					$insert_stmt->bind_param('ss', $photo_status, $email ); 
					$insert_stmt->execute();
					$insert_stmt->close();
					}
					$_SESSION['photo_status'] = $photo_status;
				}

				echo "Successfully Uploaded.";
				exit;
				}
			/*}*/
		}
	}
	else
	{
		echo "Invalid file";
	}

?>