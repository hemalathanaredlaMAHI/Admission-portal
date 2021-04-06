<?php
  include '../authentication/securelogin_functions.php';
  sec_session_start();
  include '../db_connect.php';

  $query="select declaration_form, learning_center, count(*) as seats from student_zoomlinks group by learning_center";
  $seats_arr = array();
  if($result=mysqli_query($mysqli,$query))
  {
    while($row = $result->fetch_assoc()){
      $learning_center = $row["learning_center"];
      $seats = $row["seats"];
      if($learning_center!=""){
        if($learning_center=="IIITH"){
          $seats_arr['iiith_seats'] = 125-$seats;
        }
        if($learning_center=="JNTUH"){
          $seats_arr['jntuh_seats'] = 100-$seats;
        }
        if($learning_center=="JNTUK"){
          $seats_arr['jntuk_seats'] = 50-$seats;
        }
        if($learning_center=="JNTUA"){
          $seats_arr['jntua_seats'] = 50-$seats;
        }
        if($learning_center=="SVU"){
          $seats_arr['svu_seats'] = 50-$seats;
        }        
      }     
    }
    mysqli_free_result($result);
  }

  $query="select count(*) as refunds from student_zoomlinks where admission_status='Refund'";
  $refunds = 0;
  if($result=mysqli_query($mysqli,$query))
  {
    if($row = $result->fetch_assoc()){
      $refunds = $row["refunds"];
    }
    mysqli_free_result($result);
  }
  $seats_arr["refs"] = $refunds;
  echo json_encode($seats_arr);  
  mysqli_close($mysqli);
	
?>