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
                        <td colspan="2"><input type="submit" name="forget_password" id="forget_password" value="forget_password" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>