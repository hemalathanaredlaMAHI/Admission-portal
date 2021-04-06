<html>
    <head>
        <!--        <link href="style.css" rel="stylesheet" type="text/css" />-->
        <title>ApplyWalkin</title>
    </head>
    <body>
        <form name="frmUser" method="POST" action="WalkinServices.php">

            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
                <thead>
                    <tr>
                        <th colspan="2" class="table-header">ApplyWalkin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <td><label>ApplicationNumber</label></td>
                        <td><input type="text" name="applicationnumber" class="txtField" required></td>

                    </tr>
                    <tr class="table-row">
                        <td><label>Date</label></td>
                        <td><input type="text" name="date" class="txtField"required></td>
                    </tr>
                    <tr class="table-row">
                        <td><label>Time</label></td>
                        <td><input type="text" name="time" class="txtField"></td>
                    </tr>
<!--                    <tr class="table-row">
                        <td><label>PaymentStatus</label></td>
                        <td><input type="text" name="paymentstatus" class="txtField"required></td>
                    </tr>-->
<!--                    <tr class="table-row">
                        <td><label>SlotDate</label></td>
                        <td><input type="text" name="slotdate" class="txtField"></td>
                    </tr>-->
                    <tr class="table-row">
                        <td colspan="2"><input type="submit" id="Slotbooking" name="Slotbooking" value="Slotbooking" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>