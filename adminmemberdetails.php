<!DOCTYPE html>
<html>
<head>
	<title>Admin Member Details</title>
	<style>
        

.content {
	margin-left: 220px;
	padding: 20px;
}

table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	padding: 8px;
	text-align: left;
	border-bottom: 1px solid #ddd;
}

th {
	background-color: #333;
	color: #fff;
}
</style>

</head>
<body>
	
	<div class="content">
		<h1>Member Details</h1>
		<table>
			<thead>
				<tr>
					<th>Member ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
                    <th>ID Number </th>
                    <th>Role </th>
                    <th>Status </th>

				</tr>

            </thead>
			<tbody>
            <?php
            // Establish a connection to the database
            require_once "dbconnect.php";

            // Query the database for member details
            $sql = "SELECT * FROM members ";
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and display the member details
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
            <tr>
                <td>' . $row["memberID"] . '</td>
                <td>' . $row["name"] . '</td>
                <td>' . $row["email"] . '</td>
                <td>' . $row["mobile_no"] . '</td>
                <td>' . $row["IDnumber"] . '</td>
                <td>' . $row["role"] . '</td>
                <td>' . $row["status"] . '</td>
            </tr>
            ';
                }
            } else {
                echo "No member details found.";
            }

            // Close the database connection
            mysqli_close($conn);


            ?>
			</tbody>
		</table>
	</div>
</body>
</html>
