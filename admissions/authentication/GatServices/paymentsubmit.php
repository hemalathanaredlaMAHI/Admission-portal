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
        <form name="frmUser" method="POST" action="PaymentServices.php">

            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
                <thead>
                    <tr>
                        <th colspan="2" class="table-header">Regisration</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="table-row">
                        <td><label>Email</label></td>
                        <td><input type="text" name="email" class="txtField"required></td>
                    </tr>
                        <tr class="table-row">
                        <td><label>appno</label></td>
                        <td><input type="text" name="transappno" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>msg</label></td>
                        <td><input type="text" name="msg" class="txtField"required></td>
                    </tr>
                 
                    <tr class="table-row">
                        <td colspan="2"><input type="submit" id="payment_submission" name="payment_submission" value="payment_submission" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
