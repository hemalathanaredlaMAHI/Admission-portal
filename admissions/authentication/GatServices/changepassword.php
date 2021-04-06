<html>
    <head>
        <!--        <link href="style.css" rel="stylesheet" type="text/css" />-->
        <title>Login</title>
    </head>
    <body>
        <form name="frmUser" method="POST" action="UserServices.php">

            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
                <thead>
                    <tr>
                        <th colspan="2" class="table-header">Login</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="table-row">
                        <td><label>Email</label></td>
                        <td><input type="text" name="email" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>currentPassword</label></td>
                        <td><input type="text" name="current" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Password</label></td>
                        <td><input type="text" name="password" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>confirmPassword</label></td>
                        <td><input type="text" name="cpassword" class="txtField"required></td>
                    </tr>

                    <tr class="table-row">
                        <td colspan="2"><input type="submit" name="change_password" id="change_password" value="change_password" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
<?php
//if (isset($_GET['Login'])) {
//
//    require_once('database.php');
//
//
//    $email = $_GET['email'];
//    $password = $_GET['password'];
//    $result = array();
//    $data = array();
//    $querry = "select password,salt from ma_users where email='" . $email . "'";
//    if ($stmt = $mysqli->prepare($querry)) {
//        $stmt->execute();
//        $stmt->bind_result($db_password, $salt);
//        $stmt->fetch();
//        $password = hash('sha512', $password . $salt);
//        //$stmt->close();
//    }
//    $conn = mysql_connect("localhost", "root", "");
//
//if (!$conn) {
//    echo "Unable to connect to DB: " . mysql_error();
//    exit;
//}
//
//if (!mysql_select_db("msit_admissions")) {
//    echo "Unable to select mydbname: " . mysql_error();
//    exit;
//}
//    if (count($stmt) == 1) {
//
//        if ($db_password == $password) {
////            echo $email;
////            echo $password;
//            $sql = "select username,status,usertype,board_name,board_number,btech,phone_no,profileupdate from ma_users where email = '$email'";
//            $sql1 = mysql_query($sql);
//            //$row = $result->fetch_assoc();
//            if (!$sql1) {
//                echo "Could not successfully run query ($sql1) from DB: " . mysql_error();
//                exit;
//            }
//
//            if (mysql_num_rows($sql1) == 0) {
//                echo "No rows found, nothing to print so am exiting";
//                exit;
//            }
//
//            $index = 0;
//
//            //$rows = array();
//            while ($row = mysql_fetch_assoc($sql1)) {
//
//                $data[$index] = $row;
//                $index++;
//            }
////            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
////                $data=$row;
//
//            $result = array('result' => 'success', 'msg' => "Login Successful", "data" => $data);
//        } else {
//            $result = array('result' => 'failure', 'msg' => "Password you used is not correct.Please retry using the correct login details.");
//        }
//    } else {
//        $result = array('result' => 'failure', 'msg' => "Username / Password you used is not correct.Please retry using the correct login details.");
//    }
//    echo json_encode($result);
//}
?>