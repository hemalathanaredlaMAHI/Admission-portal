<?php
//require_once("db.php");
//
//$sql = "SELECT * FROM tbl_emp_details";
//$result = $conn->query($sql);	
//$conn->close();		
//
?>
<html>
    <head>
        <!--        <link href="style.css" rel="stylesheet" type="text/css" />-->
        <title>Update Profile</title>
    </head>
    <body>
        <form name="frmUser" method="POST" action="UserServices.php">

            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
                <thead>
                    <tr>
                        <th colspan="2" class="table-header">Update Profile</th>
                    </tr>
                </thead>
                <tbody>
                     <tr class="table-row">
                        <td><label>Email</label></td>
                        <td><input type="text" name="email" class="txtField" required></td>

                    </tr>
                    <tr class="table-row">
                        <td><label>Name</label></td>
                        <td><input type="text" name="FullName" class="txtField" required></td>

                    </tr>
                    <tr class="table-row">
                        <td><label>ParentNamme</label></td>
                        <td><input type="text" name="parent" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Relation</label></td>
                        <td><input type="text" name="relation" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>DOB</label></td>
                        <td><input type="text" name="DOB" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Nationality</label></td>
                        <td><input type="text" name="Nationality" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Gender</label></td>
                        <td><input type="text" name="Gender" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>AddressLine1</label></td>
                        <td><input type="text" name="ad1" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Addressline2</label></td>
                        <td><input type="text" name="ad2" class="txtField"required></td>
                    </tr>
                     <tr class="table-row">
                        <td><label>Village</label></td>
                        <td><input type="text" name="village" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>city/town</label></td>
                        <td><input type="text" name="city" class="txtField"required></td>
                    </tr>
                    <tr class="table">
                        <td><label>pincode</label></td>
                        <td><input type="text" name="pincode" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>PhoneNumber</label></td>
                        <td><input type="text" name="Phone_Num" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>ParentPhoneNumber</label></td>
                        <td><input type="text" name="Parent_Num" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Board</label></td>
                        <td><input type="text" name="Board" class="txtField"required></td>
                    </tr>
                    <tr class="table">
                        <td><label>boardnumber</label></td>
                        <td><input type="text" name="Board_number" class="txtField"required></td>
                    </tr>
                     <tr class="table">
                        <td><label>Btech</label></td>
                        <td><input type="text" name="Btech" class="txtField"required></td>
                    </tr>
                     <tr class="table">
                        <td><label>Image</label></td>
                        <td><input type="text" name="user_image" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td colspan="2"><input type="submit" id="UpdateProfile"name="UpdateProfile" value="UpdateProfile" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
//<?php
//if (isset($_GET['updateProfile'])) {
//
//    
//}
//?>