<?php
	include 'securelogin_functions.php';
	include 'functions.php';
	sec_session_start();
	include dirname(dirname(__FILE__)).'/db_connect.php';
	$post = (!empty($_POST)) ? true : false;

	if($post)
	{
		$usertype = "student";
		$email = trim($_POST['email']);
		$password = stripslashes($_POST['p']);
		

			if(isset($_POST['email'], $_POST['p'])) 
			{ 
				$email = $_POST['email'];
				$password = stripslashes($_POST['p']); // The hashed password.
				if(login($email, $password, $usertype, $mysqli) == true) 
				{
					echo 'success';
					$ip_address = get_client_ip();
					date_default_timezone_set('Asia/Kolkata');
					$created_at = date("Y-m-d H:i");
					$sql = "INSERT INTO login_log (email, ip_address, created_at) VALUES ('$email', '$ip_address', '$created_at')";   
					if ($mysqli->query($sql) ===TRUE) {
						$mysqli->close();
					}
				} 
				else 
				{
					echo 'failed';
				}
			} 
			else 
			{ 
				// The correct POST variables were not sent to this page.
				echo 'invalid';
			}
	}

	function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
?>