
<html>
    <head>
        <!--        <link href="style.css" rel="stylesheet" type="text/css" />-->
        <title>Registration</title>
    </head>
    <body>
        <form name="frmUser" method="POST" action="WalkinServices.php">

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
                    </tr><!--
-->                    <tr class="table-row">
                        <td><label>ApplicationNumber</label></td>
                        <td><input type="text" name="applicationno" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>DDNO</label></td>
                        <td><input type="text" name="ddno" class="txtField"required></td>
                    </tr><!--
-->                    <tr class="table-row">
                        <td><label>BankName</label></td>
                        <td><input type="text" name="bankname" class="txtField"required></td>
                    </tr>
<!--                     <tr class="table-row">
                        <td><label>DDNO</label></td>
                        <td><input type="text" name="ddno" class="txtField"required></td>
                    </tr>
-->                    <tr class="table-row">
                        <td><label>BankBranch</label></td>
                        <td><input type="text" name="bankbranch" class="txtField"required></td>
                    </tr>
                    </tr><!--
-->                    <tr class="table-row">
                        <td><label>Date</label></td>
                        <td><input type="text" name="date" class="txtField"required></td>
                    </tr>

                    <tr class="table-row">
                        <td colspan="2"><input type="submit" name="PayWalkinDD" id="PayWalkinDD" value="PayWalkinDD" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>

