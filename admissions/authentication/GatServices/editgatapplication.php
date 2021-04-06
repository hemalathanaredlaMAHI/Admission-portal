
<html>
    <head>
        <!--        <link href="style.css" rel="stylesheet" type="text/css" />-->
        <title>Registration</title>
    </head>
    <body>
        <form name="frmUser" method="POST" action="GatServices.php">

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
                        <td><label>TestCenter</label></td>
                        <td><input type="text" name="testcenter" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>ExamType</label></td>
                        <td><input type="text" name="examtype" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Quant</label></td>
                        <td><input type="text" name="quant" class="txtField"></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Analytical</label></td>
                        <td><input type="text" name="analytical" class="txtField"></td>
                    </tr>

                    <tr class="table-row">
                        <td colspan="2"><input type="submit" name="EditGatApplication" id="EditGatApplication" value="EditGatApplication" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>