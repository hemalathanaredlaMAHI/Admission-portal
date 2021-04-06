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
        <title>Registeration</title>
    </head>
    <body>
        <form name="frmUser" method="POST" action="UserServices.php">

            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
                <thead>
                    <tr>
                        <th colspan="2" class="table-header">Regisration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <td><label>Name</label></td>
                        <td><input type="text" name="name" class="txtField" required></td>

                    </tr>
                    <tr class="table-row">
                        <td><label>Email</label></td>
                        <td><input type="text" name="email" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Password</label></td>
                        <td><input type="text" name="password" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Board</label></td>
                        <td><input type="text" name="board" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Boardnumber</label></td>
                        <td><input type="text" name="boardnumber" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td colspan="2"><input type="submit" id="Register" name="Register" value="Register" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
<?php
if (isset($_GET['Register'])) {

   

}
?>