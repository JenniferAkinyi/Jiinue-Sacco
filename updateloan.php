<?php
// Get input data from form submission
$loantype = $_POST['loantype'];
$amount = $_POST['amount'];
$duration = $_POST['duration'];
$status = $_POST['status'];



// Update loan details in the database
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "UPDATE loan_applications SET loan_amount='$loan_amount', loan_term='$loan_term', loan_purpose='$loan_purpose' WHERE loan_id='$loan_id'";
$conn->query($sql);
$conn->close();

// Redirect to a page that confirms the loan details were updated
header("Location: loan_updated.php");
?>

