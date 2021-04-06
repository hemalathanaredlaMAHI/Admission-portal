<?php
/*

It important not to just put "session_start();" on the top of every page that you want to use php sessions, If you're really concerned about security then this is how you should do it. 
We are going to create a function called "sec_session_start", this will start a php session in a secure way. You should call this function at the top of any page you wish to access a 
php session variable. If you are really concerned about security and the privacy of your cookies, have a look at this article Create-a-Secure-Session-Managment-System-in-Php-and-Mysql.

This function makes your login script a whole lot more secure. It stops hackers been able to access the session id cookie through javascript (For example in an XSS attack).
Also by using the "session_regenerate_id()" function, which regenerates the session id on every page reload, helping prevent session hijacking.

Note: If you are using https in your login application set the "$secure" variable to true.

*/
function sec_session_start() {
        $session_name = 'msitadmissions'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
		$cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        session_start(); // Start the php session
        session_regenerate_id(); // regenerated the session, delete the old one.  
}


function login($email, $password, $usertype, $mysqli) 
{
   if ($stmt = $mysqli->prepare("SELECT username, password, salt, status, photo_status, profileupdate, educationdetails_status FROM ma_users WHERE email = ? and usertype = ? LIMIT 1")) { 
      $stmt->bind_param('ss', $email,$usertype); 
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($username, $db_password, $salt, $status, $photo_status, $profileupdate, $educationdetails_status); 
      $stmt->fetch();
      $password = hash('sha512', $password.$salt); 
 
      if($stmt->num_rows == 1) 
	  { 
         if($db_password == $password) 
		 { 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; 
               $_SESSION['email'] = $email; 
               $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
               $_SESSION['username'] = $username;
               $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
			   $_SESSION['usertype'] = $usertype;
			   
			   $_SESSION['status'] = $status;
			   $_SESSION['photo_status'] = $photo_status;
			   $_SESSION['profileupdate'] = $profileupdate;
			   $_SESSION['educationdetails_status'] = $educationdetails_status;

				if ($stmt = $mysqli->prepare("SELECT image_url, mobile_no FROM userProfilesView WHERE email = ?")) 
				{ 
					$stmt->bind_param('s',$_SESSION['email']); 
					$stmt->execute();
					$stmt->bind_result($profile_pic_url, $mobile_no); 
					$stmt->fetch();
				}
				$thumb_pic_url = str_replace("-profile","-thumb",$profile_pic_url);
				$_SESSION['thumb_pic_url'] = $thumb_pic_url;
				$_SESSION['mobile_no'] = $mobile_no;
															
               return true;    
         } 
		 else 
		 {
            return false;
         }
      
      } 
	  else 
	  {
         return false;
      }
   }
}

function checkbrute($email, $mysqli) {
   // Get timestamp of current time
   $now = time();
   // All login attempts are counted from the past 2 hours. 
   $valid_attempts = $now - (2 * 60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE email = ? AND time > '$valid_attempts'")) { 
      $stmt->bind_param('i', $email); 
      // Execute the prepared query.
      $stmt->execute();
      $stmt->store_result();
      // If there has been more than 5 failed logins
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
}

function login_check($mysqli) 
{
   if(isset($_SESSION['email'], $_SESSION['username'], $_SESSION['login_string'])) 
   {
     $user_id = $_SESSION['email'];
     $login_string = $_SESSION['login_string'];
     $username = $_SESSION['username'];
	 $usertype = $_SESSION['usertype'];
 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
		
     if ($stmt = $mysqli->prepare("SELECT password FROM ma_users WHERE email = ? and usertype = ?")) 
	 { 
        $stmt->bind_param('ss', $user_id,$usertype); // Bind "$user_id" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
 
        if($stmt->num_rows == 1) 
		{ 
           $stmt->bind_result($password); // get variables from result.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
           if($login_check == $login_string) 
		   {
              // Logged In!!!!
              return true;
           } else {
              // Not logged in
              return false;
           }
        } else {
            // Not logged in
            return false;
        }
     } else {
        // Not logged in
        return false;
     }
   } else {
     // Not logged in
     return false;
   }
}

?>