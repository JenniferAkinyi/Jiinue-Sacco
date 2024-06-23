<div class="dashboard">
    <h2>Pending Loans</h2>
    <table>
        <tr>
            <th>Member ID</th>
            <th>Loan Type</th>
            <th>Loan Amount</th>
            <th>Loan Term</th>
            <th>Application Date</th>
            <th>Status</th>
        </tr>
        <?php
        // Retrieve all loan applications with status "Pending"
        require_once ("dbconnect.php");
        $sql = "SELECT * FROM customerloandetails WHERE status='pending'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output each loan application as a row in the table
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                   <td>" . $row["memberID"] . "</td>
                   <td>" . $row["loantype"] . "</td>
                   <td>" . $row["loan amount"] . "</td>
                   <td>" . $row["duration"] . "</td>
                   <td>" . $row["application date"] . "</td>
                   <td>" . $row["status"] . "</td>
                    <td><a href = 'editloan.php'> Edit</a ></td>
                </tr>";
            }
        } else {
            echo "No pending loan applications";
        }
        mysqli_close($conn);
        ?>
    </table>
</div>

