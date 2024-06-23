<html>
<body>
<li><a href="pendingloans.php">Pending loans </a></li>
<li><a href="loandetails.php"> Approved loans </a></li>

</body>
</html>

<?php
// Establish a connection to the database
require_once("dbconnect.php");

// Query the database for loan details
$sql = "SELECT * FROM loans"; 
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Display loan details in a table
    echo "<table>";
    echo "<tr>
    <th>Loan ID</th>
    <th>Member ID</th>
    <th>Loan Type</th>
    <th>Loan Amount</th>
    <th>Loan date</th>
    
    <th>Status</th>
    </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["loanID"] . "</td>";
        echo "<td>" . $row["memberID"] . "</td>";
        echo "<td>" . $row["loantype"] . "</td>";
        echo "<td>" . $row["loanamount"] . "</td>";
        echo "<td>" . $row["loan date"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No loan details found.";
}

// Close the database connection
mysqli_close($conn);
