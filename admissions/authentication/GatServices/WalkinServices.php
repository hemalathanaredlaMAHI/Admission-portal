<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



include '../../db_connect.php';
include '../../ma_config.php';

if (array_key_exists('WalkinCenters', $_POST)) {
    $result = array();
    $data = array();
    $querry = "select * from walkinCenters";
    if (!$querry) {
        echo "Could not successfully run query ($querry) from DB: " . mysql_error();
        exit;
    }
    $sql1 = mysqli_query($con,$querry);


    if (mysqli_num_rows($sql1) == 0) {
        echo "No rows found, nothing to print so am exiting";
        exit;
    } else {
        $index = 0;
        while ($row = mysqli_fetch_assoc($sql1)) {

             $data[$index] = $row;
                    $index++;
                    //$data=$row;
        }
       // $result = array($data);
    }


    echo json_encode($data);
} else if (array_key_exists('ApplyWalkin', $_POST)) {
    $result = array();
    $data = array();

    $email = $_POST['email'];
    $test_center = $_POST['testcenter'];
    $payment_type = "none";
    //$slotdate = $_POST['slotdate'];
    $slotdate = null;
    $payment_status = "no";
    $test_taken = "no";
    $mobnumber=$_POST['mobile_no'];
    // $mo="select phone_no from ma_users where email='" . $email . "'";
    // if ($stmt = $mysqli->prepare($mo)) {
    //     $stmt->execute();

    //     $stmt->bind_result($mobnumber);
    // }
    // echo "------------------".$mobnumber;
    $query = "select * from walkinApplications where email = '" . $email . "'";
    if (!$query) {
        echo "Could not successfully run query ($query) from DB: " . mysql_error();
        exit;
    }
    $sql1 = mysqli_query($con,$query);


    if (mysqli_num_rows($sql1) < 3) {
        $GAT_walkin_Number = "";
        $GAT_walkin_Number=substr(YEARTEXT,2);
        $GAT_walkin_Number = $GAT_walkin_Number . $test_center . 'W';
        $inst = "insert into walkinAppCounter(email) VALUES('" . $email . "') ";
        $sql1 = mysqli_query($con,$inst);
        $querry = mysqli_insert_id($con);
        $padSeq = sprintf("%05d", $querry); //getting the count from the gatappcounter
        $GAT_walkin_Number = $GAT_walkin_Number  . $padSeq;
        $query1 = "insert into walkinApplications(email, walkinAppNo,testCenter, slotdate,testTaken,paymentType,"
                . " paymentStatus) values ('" . $email . "','" . $GAT_walkin_Number . "','" . $test_center . "',null,". "'" . $test_taken . "','" . $payment_type . "','" . $payment_status . "')";
        $query = $mysqli->prepare($query1);
        $query->execute();
        //return $this->db->que
        if ($query) {

            //sending sms
            $messageText = "Congratulations! Your MSIT Walk-In Application number is ".$GAT_walkin_Number.". Please pay the exam fee and book your slot. Please ignore if you already paid.";
            //$mobnumber="9493111157";
            if (strlen($mobnumber)!=12 || substr($mobnumber, 0, 2) !== '91')
            {
                $mobnumber = "91".$mobnumber;
            }
            $ch1 = curl_init('http://smslogin.mobi/spanelv2/api.php?');
            curl_setopt($ch1, CURLOPT_POST, 1);
            curl_setopt($ch1, CURLOPT_POSTFIELDS, "username=msitsmst&password=MsAdmin@2016&from=MSITAD&to=".$mobnumber."&message=".$messageText);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER,1);
            $data = curl_exec($ch1);
            curl_close($ch1);


        





            //sending email
             $ch = curl_init(SERVER.'communication/sendApplicationEmail.php?');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$email."&appno=".$GAT_walkin_Number);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 1);
                curl_exec($ch);
                curl_close($ch);
            $result = array('result' => 'Success',"applicationNumber"=>$GAT_walkin_Number,'msg' => "Successfully applied for Exam");
        } else {
            $result = array('result' => 'Failure', 'msg' => "Not able to submit the appliacation Please try Again or Contact the ");
        }
    } else {
        $result = array('result' => 'failure', 'msg' => "Walk-in entrance test can be taken maximum of three times only.You have already applied for 3 times.");
    }
    echo json_encode($result);
} else if (array_key_exists('PayWalkinDD', $_POST)) {
    // require_once('database.php');
    $result = array();
    $data = array();
    $email = $_POST['email'];
    $application = $_POST['applicationno'];
    $ddno = $_POST['ddno'];
    $bankname = $_POST['bankname'];
    $bankbranch = $_POST['bankbranch'];
    $date = $_POST['date'];
    $status = "pending";


    $i = 1;
    $query = "INSERT INTO ddtransactions(email, appno, ddno, bank_name, bank_branch, issue_date, status)
                VALUES ('$email','$application','$ddno','$bankname','$bankbranch','$date','$status')";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->execute();
        //$id=$stmt->testcenter;
        while ($stmt->fetch()) {
            $i = 0;
        }
        //$stmt->close();
    }

    if ($query) {
        $sql = "update walkinapplications set paymentType='dd',paymentStatus='yes' where email = '" . $email . "' and walkinAppNo = '" . $application . "'";
        $query1 = $mysqli->prepare($sql);
        $query1->execute();
        if ($query1) {
            $result = array('result' => 'Success', 'msg' => "Payment Sucess");
        }

        //$result = array('result' => 'Success', 'msg' => "Please Pay To Get Hall Tickets", "data" => $data);
    } else {
        $result = array('result' => 'Failure', 'msg' => "Not able to submit the appliacation Please try Again or Contact the ");
    }

    echo json_encode($result);
}
else if (array_key_exists('Get_walkin_tobook', $_POST)) {
    //require_once('database.php');
    $result = array();
    $data = array();
    $email = $_POST['email'];

    $i = 1;
    $query = "Select walkinAppNo from walkinApplications  WHERE email='" . $email."'  and paymentStatus='yes' and slotdate='NULL' ";
        $sql1 = mysqli_query($con,$query);
         if (mysqli_num_rows($sql1) != 0) {
        
            
            $index = 0;
            while ($row = mysqli_fetch_assoc($sql1)) {

                $data[$index] = $row;
                    $index++;
                    //$data=$row;
            }
            $result = array('result' => 'Success', 'msg' => "Please Book Your Slots", "data" => $data);
                }
                else
                {
                     $result = array('result' => 'failure', 'msg' => "NO Applcatins found to pay");
                }
    
    echo json_encode($result);
}


else if (array_key_exists('get_walkin_application', $_POST)) {
    //require_once('database.php');
    $result = array();
    $data = array();
    $email = $_POST['email'];

    $i = 1;
    $query = "Select walkinAppNo,paymentStatus,paymentType,slotNo,testCenter,testTaken,slotdate from  walkinApplications   WHERE"
            . " email='" . $email . "'";
        $sql1 = mysqli_query($con,$query);
         if ($sql1) {
        
            if (mysqli_num_rows($sql1) == 0) {
                echo "No rows found, nothing to print so am exiting";
                exit;
            }
            $index = 0;
            while ($row = mysqli_fetch_assoc($sql1)) {
                 $id=$row['testCenter'];
                 $data1="select name from walkinCenters where id='".$id."'";
                 $sql_center=mysqli_query($con,$data1);
                 $center_row = mysqli_fetch_assoc($sql_center);
                 $row['testCenterName'] = $center_row ['name'];
                 $data[$index] = $row;
                    $index++;
                    //$data=$row;
                   
            }
            $result = array('result' => 'Success', 'msg' => "You Applications", "data" => $data);
                }
                else
                {
                     $result = array('result' => 'failure', 'msg' => "NO Applcatins found to pay");
                }
    
    echo json_encode($result);
}


 else if (array_key_exists('Slotbooking', $_POST)) {
    // require_once('database.php');
    $result = array();
    $data = array();
    $ApplicationNumber = $_POST['applicationnumber'];

    $date = $_POST['date'];

    $time = $_POST['time'];
    //echo $date;
    //echo $time;
    //$center = '';
    $app_counter = 0;
    $query = mysqli_query($con,"select testCenter from walkinApplications where walkinAppNo = '" . $ApplicationNumber . "'");
    $res1 = mysqli_fetch_row($query);
    if ($res1[0] > 0) {
        //$stmt->execute();
        //echo "uuuuuuuuuuuuu";
        $center = $res1[0];
        //echo $center;

        if ($center == 1 && $time == 1) {
            $hyd1 = mysqli_query($con,"select hyd_1 from slotavailability where slotdate='" . $date . "'");
            $res = mysqli_fetch_row($hyd1);
            $hydcount1 = $res[0];
            if ($hydcount1 > 0) {
                $sql = "update walkinApplications  set slotdate ='" . $date . "' ,slotNo='" . $time . "' where walkinAppNo='" . $ApplicationNumber . "'";
                //echo "update1111";
                $query1 = $mysqli->prepare($sql);
                $query1->execute();
                if ($query1) {
                    $hydcount1 = $hydcount1 - 1;
                    $sql = "update slotavailability set hyd_1 ='" . $hydcount1 . "' where slotdate='" . $date . "'";
                    //echo "update222222222222222";
                    $query1 = $mysqli->prepare($sql);
                    $query1->execute();
                    $result = array('result' => 'Success', 'msg' => "Your SlotBooking is Successfully Completed");
                }
            } else {
                $result = array('result' => 'Failure', 'msg' => "No slot Available for that date");
            }
        } else if ($center == 1 && $time == 2) {
            $hyd2 = mysqli_query($con,"select hyd_2 from slotavailability where slotdate='" . $date . "'");
            $res = mysqli_fetch_row($hyd2);
            $hydcount2 = $res[0];
            if ($hydcount2 > 0) {
            	
                $sql = "update walkinApplications  set slotdate ='" . $date . "' ,slotNo='" . $time . "' where walkinAppNo='" . $ApplicationNumber . "'";
                $query1 = $mysqli->prepare($sql);
                $query1->execute();
                if ($query1) {
                    $hydcount2 = $hydcount2 - 1;
                    $sql = "update slotavailability set hyd_2 ='" . $hydcount2 . "' where slotdate='" . $date . "'";
                    $query1 = $mysqli->prepare($sql);
                    $query1->execute();
                    $result = array('result' => 'Success', 'msg' => "Your SlotBooking is Successfully Completed");
                }
            } else {
                // echo '213123123';
                $result = array('result' => 'Failure', 'msg' => "No slot Available for that date");
            }
        } else if ($center == 2 && $time == 1) {
            $kkd1 = mysqli_query($con,"select kakinada_1 from slotavailability where slotdate='" . $date . "'");
            $res = mysqli_fetch_row($kkd1);
            $kkdcount1 = $res[0];
            if ($kkdcount1 > 0) {
                $sql = "update walkinApplications  set slotdate ='" . $date . "' ,slotNo='" . $time . "' where walkinAppNo='" . $ApplicationNumber . "'";
                $query1 = $mysqli->prepare($sql);
                $query1->execute();
                if ($query1) {
                    $kkdcount1 = $kkdcount1 - 1;
                    $sql = "update slotavailability set kakinada_1 ='" . $kkdcount1 . "' where slotdate='" . $date . "'";
                    $query1 = $mysqli->prepare($sql);
                    $query1->execute();
                    $result = array('result' => 'Success', 'msg' => "Your SlotBooking is Successfully Completed");
                }
            } else {
                $result = array('result' => 'Failure', 'msg' => "No slot Available for that date");
            }
        }
      else  if ($center == 2  && $time == 2) {
            $kkd2 = mysqli_query($con,"select kakinada_2 from slotavailability where slotdate='" . $date . "'");
            $res = mysqli_fetch_row($kk2);
            $kkdcount2 = $res[0];
            if ($kkdcount2 > 0) {
                $sql = "update walkinApplications  set slotdate ='" . $date . "' ,slotNo='" . $time . "' where walkinAppNo='" . $ApplicationNumber . "'";
                $query1 = $mysqli->prepare($sql);
                $query1->execute();
                if ($query1) {
                    $kkdcount2 = $kkdcount2 - 1;
                    $sql = "update slotavailability set kakinada_2 ='" . $kkdcount2 . "' where slotdate='" . $date . "'";
                    $query1 = $mysqli->prepare($sql);
                    $query1->execute();
                    $result = array('result' => 'Success', 'msg' => "Your SlotBooking is Successfully Completed");
                }
            } else {
                $result = array('result' => 'Failure', 'msg' => "No slot Available for that date");
            }
        } else {
            $result = array('result' => 'Failure', 'msg' => "No slot Available for that date");
        }
    }

    echo json_encode($result);
}


    