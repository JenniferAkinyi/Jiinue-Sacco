<!DOCTYPE html>
<html>
<head>
	<title>jiinue SACCO Admin Dashboard</title>
    <?php
    require_once("dbconnect.php");
    ?>

<?php
// Verify that the user is logged in and is an admin
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
  // If the user is not logged in or is not an admin, redirect them to the login page
  header('Location: login.php');
  exit;
}
?>
	<style>
		/* CSS styles for the dashboard layout */
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		#sidebar {
			width: 180px;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			background-color:green;
			color: #fff;
			padding: 20px;
		}

		#main {
			margin-left: 200px;
			padding: 20px;
		}
        #activemembers{
            width: 230px;
            height: 100%;
            background-color: green;
            color: #fff;
            padding:20px ;
            margin-right: 250px;
            float: right;
        }

        #totalsavings{
            width: 230px;
            height: 50%;
            background-color: blue;
            color: #fff;
            padding:20px ;
            margin-left: auto;
            float: left;
        }
        #totalloans{
            width: 230px;
            height: 50%;
            background-color: grey;
            color: #fff;
            padding:20px ;
            margin-left: 300px;
            align-items: center;

        }

		/* CSS styles for the sidebar links */
		#sidebar a {
			display: block;
			color: #fff;
			text-decoration: none;
			margin-bottom: 10px;
		}

		#sidebar a:hover {
			background-color: #fff;
			color: green;
		}

		/* CSS styles for the page headings */
		h1 {
			font-size: 36px;
			margin-top: 0;
		}

		h2 {
			font-size: 24px;
		}
	</style>
</head>
<body>
	<div id="sidebar">
        
		<h2>Jiinue Youth Sacco</h2>
		<a href="adminmemberdetails.php">Members</a>
		<a href="loandetails.php">Loans</a>
		<a href="savings.php">Savings</a>
        <a href="logout.php">Logout</a>
	</div>
	<div id="main">
		<h1>Welcome to the Jiinue Youth Sacco Admin Dashboard</h1>
        <div id="activemembers">
           <?php
           $sql= "SELECT COUNT(*) AS active_members FROM members WHERE status = 'active'";
          
              // Get number of active members
              $active_members_result = mysqli_query($conn, "SELECT COUNT(*) AS active_members FROM members WHERE status = 'active';");
              $active_members_row = mysqli_fetch_assoc($active_members_result);
              $active_members = $active_members_row['active_members'];

            ?>
            <p> Active members: <?php echo $active_members; ?></p>
         </div>

        <div id="totalsavings">
            <?php 
            $sql= "SELECT SUM(savingsamount) AS total_savings FROM savings";
            
            // Get total savings
              $total_savings_result = mysqli_query($conn, "SELECT SUM(savingsamount) AS total_savings FROM savings;");
              $total_savings_row = mysqli_fetch_assoc($total_savings_result);
              $total_savings = $total_savings_row['total_savings'];
             ?>

             <p>Total Savings: <?php echo $total_savings; ?></p>

        </div>
        

        <div id="totalloans">
            <?php
            $sql = "SELECT SUM(loanamount) as total_loans FROM loans";
            
            $result = mysqli_query($conn, $sql);
            // Check if query returned any result
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $total_loans = $row['total_loans'];
            }
            ?> 
            <p>Total loans disbursed: <?php echo $total_loans;  ?></p>
            

        </div>
        <?php 
        // Close the database connection
           mysqli_close($conn);
           ?>
		
	</div>
<!--footer section
    <div class="footer-col-2">
        <img src="logo.png">
        <p>Our purpose its to offer a place where youths can save,borrow loans and be empowered in their investments</p>
    </div> -->
</body>
</html>
