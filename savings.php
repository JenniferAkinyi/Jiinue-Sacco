<?php
require_once("dbconnect.php");
$sql ="SELECT memberID, savingsamount FROM savings";


// Execute SQL query
$result = mysqli_query($conn, "SELECT memberID, savingsamount FROM savings;");

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<table>
  <tr>
    <th>Member ID</th>
    <th>Savings Amount</th>
  </tr>
  <?php
  // Loop through the results and display each row in the table
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['member_id'] . "</td>";
    echo "<td>" . $row['savings_amount'] . "</td>";
    echo "</tr>";
  }
  ?>
</table>



