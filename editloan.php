<html>
<head>
    <h1>JIINUE YOUTH SACCO</h1>
</head>
</html>


<?php
require_once ("dbconnect.php");
?>

<form action="updateloan.php" method="post">
    <label for="loantype">Loan Type:</label>
    <input type="text" name="loantype" value="<?php echo $loantype; ?>" required><br><br>

    <label for="amount">Loan Amount:</label>
    <input type="number" name="amount" value="<?php echo $amount; ?>" required><br><br>

    <label for="duration">Loan Term (months):</label>
    <input type="number" name="duration" value="<?php echo $duration; ?>" required><br><br>

    <label for="status"> Status:</label>
    <input type="text" name="status" value="<?php echo $status; ?>" required><br><br>

    <input type="submit" value="Update">
</form>

