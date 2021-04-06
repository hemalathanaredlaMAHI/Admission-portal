<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../../db_connect.php';
include '../../ma_config.php';

if (array_key_exists('GatCenters', $_POST)) {
    $result = array();
    $data = array();


    $querry = "select * from gatCenters";
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
                   // $data=$row;
        }
        //$result = array($data);
    }


    echo json_encode($data);
}


else if (array_key_exists('ApplyGatExam', $_POST)) {
    //require_once('database.php');
    $result = array();
    $data = array();
    $email = $_POST['email'];
    $testcenter = $_POST['testcenter'];
    $examtype = $_POST['examtype'];
    $quant_verbal = $_POST['quant'];
    $Analytical = $_POST['analytical'];
    $tofel_score = '0';
    $ielts_score = '0';
    $PaymentType = "none";
    $PaymentStatus = "no";
    $mobnumber=$_POST['mobile_no'];
    $i = 0;
    $query = "Select * from gatApplications where email='" . $email . "'";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->execute();
        while ($stmt->fetch()) {
            $i = 1;
        }
        $stmt->close();
    }
    if ($i == 1) {

        $result = array('result' => 'failure', 'msg' => "Already applied for Gat Exam");
    } else {
        
        //$GAT_App_Number = "";
        $GAT_App_Number=substr(YEARTEXT,2);
        $GAT_App_Number = $GAT_App_Number . $testcenter . 'G';
        $inst = "insert into gatAppCounter(email) VALUES('" . $email . "') ";
        $sql1 = mysqli_query($con,$inst);
        $querry = mysqli_insert_id($con);
        //echo "--------------------" . $querry;
        $padSeq = sprintf("%05d", $querry); //getting the count from the gatappcounter
        $GAT_App_Number = $GAT_App_Number . $padSeq;
        //echo $GAT_App_Number;
        $query1 = "insert into gatApplications(email, gatAppNo,testCenter, examType, greAnalytical,greScore, toeflScore, ieltsScore,
    paymentType, paymentStatus) values ('$email','$GAT_App_Number','$testcenter','$examtype','$Analytical','$quant_verbal',"
                . "'$tofel_score','$ielts_score','$PaymentType','$PaymentStatus')";
        $query = $mysqli->prepare($query1);
        $query->execute();
        //return $this->db->que
        if ($query) {

        		 //sending sms
            $messageText = "Congratulations! Your MSIT GAT - Application number is ".$GAT_App_Number.". Please pay the exam fee and book your slot. Please ignore if you already paid.";
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


            $result = array('result' => 'Success', 'msg' => "successfully applied", "application_number"=>$GAT_App_Number);
        } else {
            $result = array('result' => 'Failure', 'msg' => "Not able to submit the appliacation Please try Again or Contact the ");
        }
    }
    echo json_encode($result);
}


else if (array_key_exists('EditGatApplication', $_POST)) {
    //require_once('database.php');
    $result = array();
    $data = array();
    $email = $_POST['email'];
    $testcenter = $_POST['testcenter'];
    $examtype = $_POST['examtype'];
    $quant_verbal = $_POST['quant'];
    $Analytical = $_POST['analytical'];
    $tofel_score = '';
    $ielts_score = '';

    $i = 1;
    $query = "Select * from gatApplications where email='" . $email . "'";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->execute();
        while ($stmt->fetch()) {
            $i = 0;
        }
        $stmt->close();
    }
    if ($i == 1) {

        $result = array('result' => 'failure', 'msg' => "No Application found for You please apply Gat exam");
    } else {
        
        $update="UPDATE gatApplications SET testCenter = '".$testcenter."',examtype='".$examtype."',greAnalytical='".$Analytical."',greScore='".$quant_verbal."' WHERE email = '".$email."'";
        $query1 = $mysqli->prepare($update);
        $query1->execute();
         if (!$query1) {
                echo "Could not successfully run query ($query1) from DB: " . mysql_error();
                exit;
            }
        
        if ($query1) {
            $sql = "Select * from gatApplications where email='" . $email . "'";
            $sql1 = mysqli_query($con,$sql);
            if (!$sql1) {
                echo "Could not successfully run query ($sql1) from DB: " . mysql_error();
                exit;
            }

            if (mysqli_num_rows($sql1) == 0) {
                echo "No rows found, nothing to print so am exiting";
                exit;
            }
            $index = 0;
            while ($row = mysqli_fetch_assoc($sql1)) {

                // $data[$index] = $row;
                    // $index++;
                    $data=$row;
            }
            $result = array('result' => 'Success', 'msg' => "Updated Successfully ", "data" => $data);
        } else {
            $result = array('result' => 'Failure', 'msg' => "Not able to submit the appliacation Please try Again or Contact the ");
        }
    }
    echo json_encode($result);
}
else if(array_key_exists(Get_Gat_Application, $_POST))
{
    $result = array();
    $data = array();
    $email = $_POST['email'];
    //echo "string";
    $query="Select * from gatApplications where email='".$email."'";
    $sql1=mysqli_query($con,$query);
    if (mysqli_num_rows($sql1)!=0) {
            $index = 0;
            while ($row = mysqli_fetch_assoc($sql1)) {

                // $data[$index] = $row;
                    // $index++;
                    $data=$row;
            }
            $id=$data['testCenter'];
           // echo $id;
            $data1="select center from gatCenters where id='".$id."'";
            $sql_center=mysqli_query($con,$data1);
            while ($center_row = mysqli_fetch_assoc($sql_center)) {

                // $data[$index] = $row;
                    // $index++;
                    $data_center=$center_row;
            }
           // echo $sql_center;
            $result = array('result' => 'Success', 'msg' => "Please Pay To Get Hall Tickets",'test_center'=>$data_center['center'], "data" => $data);
                }
                else
                {
                     $result = array('result' => 'failure', 'msg' => "NO Applcatins found to pay");
                }
    
    echo json_encode($result);

}
else if(array_key_exists(Get_Gat_toPay, $_POST))
{
    $result = array();
    $data = array();
    $email = $_POST['email'];
    //echo "string";
    $query="Select * from gatApplications where email='".$email."' and paymentStatus='no'";
    $sql1=mysqli_query($con,$query);
    if (mysqli_num_rows($sql1)!=0) {
            $index = 0;
            while ($row = mysqli_fetch_assoc($sql1)) {

                // $data[$index] = $row;
                    // $index++;
                    $data=$row;
            }
            $id=$data['testCenter'];
           // echo $id;
            $data1="select center from gatCenters where id='".$id."'";
            $sql_center=mysqli_query($con,$data1);
            while ($center_row = mysqli_fetch_assoc($sql_center)) {

                // $data[$index] = $row;
                    // $index++;
                    $data_center=$center_row;
            }
           // echo $sql_center;
            $result = array('result' => 'Success', 'msg' => "Please Pay To Get Hall Tickets",'test_center'=>$data_center['center'], "data" => $data);
                }
                else
                {
                     $result = array('result' => 'failure', 'msg' => "NO Applcatins found to pay");
                }
    
    echo json_encode($result);

}

else if (array_key_exists('GetApplicationstopay', $_POST)) {
   //require_once('database.php');
    $result = array();
    $data = array();
    $email = $_POST['email'];

    $i = 1;
    $query = "SELECT gatAppNo as num FROM `gatApplications` 
    where email = '$email' AND paymentStatus = 'no'
    UNION 
    SELECT walkinAppNo as num FROM `walkinApplications` 
    where email = '$email' AND paymentStatus = 'no'";
              //echo $query;exit;

    $today = new DateTime();
    $gat_ends = new DateTime(GAT_END);
    $sysdifference  = date_diff($gat_ends,$today);
    $sysdaydiff = (int)$sysdifference->format("%r%a");



    $sql1 = mysqli_query($con,$query);
    if ((mysqli_num_rows($sql1)!=0) && ($sysdaydiff <=0 )) {
        $index = 0;
        
       $query1 = "SELECT gatAppNo as num FROM `gatApplications` 
            where email = '$email' AND paymentStatus = 'no'";
       
        $gatApps = mysqli_query($con,$query1);
        if (mysqli_num_rows($gatApps)!=0) {
            while ($row = mysqli_fetch_assoc($gatApps)) {
               $data[$index] = $row;
               $index++;
                //     $data=$row;
            }
        }

        $today = new DateTime();
        $walkin_ends = new DateTime(WALKIN_END_DATE);
        $sysdifference  = date_diff($walkin_ends,$today);
        $sysdaydiff = (int)$sysdifference->format("%r%a");


        if($sysdaydiff <=0){
            $query2 = "SELECT walkinAppNo as num FROM `walkinApplications` 
                where email = '$email' AND paymentStatus = 'no'";
            $walkinApps = mysqli_query($con,$query2);
            if (mysqli_num_rows($walkinApps)!=0) {
                while ($row = mysqli_fetch_assoc($walkinApps)) {
                   $data[$index] = $row;
                   $index++;
                    //     $data=$row;
                }
            }
        }
       $result = array('result' => 'Success', 'msg' => "Please Pay To Get Hall Tickets", "data" => $data);
   }
   else
   {
       $result = array('result' => 'failure', 'msg' => "No Applcations Found to Pay");
   }
   
   echo json_encode($result);
}