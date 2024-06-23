<html lang ="eng">
<head>
	<meta charset="UTF-8">
	<title>Member's Dashboard</title>
	<style>
		body{
    font-family: 'Poppins', sans-serif;
 }
 .navbar{
    display: flex;
    align-items: center;
    padding: 20px;
}
.nav{
    flex: 1;
    text-align: right;
}
nav ul{
    display: inline-block;
    list-style-type: none;
}
nav ul li{
    display: inline-block;
    margin: 20px;
}
.savings {
         background-color: gray;
         width: 35%;
         float: left;
         margin-right: 80px;
         padding: 15px;
         border-radius: 10px;
         text-align: center;
         color: white;
         font-size: 20px;
         margin-bottom: 20px;
      }

      /* Style the loan section */
      .loan {
         background-color: palevioletred;
         width: 35%;
         float: left;
         padding: 15px;
         margin-left: 80px;
         border-radius: 10px;
         text-align: center;
         color: white;
         font-size: 20px;
         margin-bottom: 20px;
      }

      /* Style the footer */
      footer {
         background-color:green;
         padding: 20px;
         text-align: center;
         color: white;
         font-size: 16px;
         position: fixed;
         bottom: 0;
         width: 100%;
      }
</style>
<?php
	session_start();
    require "dbconnect.php";
?>
	<div class="container">
 <div class="navbar">
    <div class="logo">
        <img src="logo.png"  length="120px" width="155px">
    </div>
 <nav>
    <ul id="MenuItems">
        <li><a href="">Home</a></li>
        <li><a href="">Products and Servives</a></li>
        <li><a href="">About Us</a></li>
        <li><a href="">Contact</a></li>
      </ul>
</nav>
</div> 
</div>
<header>
		<h1>Welcome to your Dashboard!!</h1>
		<h2>Your Details</h2>
    <table>
        <tr>
            <th>Member ID:</th>
            <td>
                <?php
                $sql1 = "SELECT memberID FROM members WHERE email = '{$_SESSION['email']}'";
                $query = mysqli_query($conn, $sql1);
                $result = mysqli_fetch_array($query);
                echo $result["memberID"];
                ?>
            </td>
        </tr>
        <tr>
            <th>Account Number:</th>
            <td>
                <?php
                $sql2 = "SELECT `account number` FROM accounts WHERE memberID = '{$_SESSION['memberID']}'";
                $query = mysqli_query($conn, $sql2);
                $result = mysqli_fetch_array($query);
                if (mysqli_num_rows($query) > 0) {
                    echo $result["account number"];
                } else {
                    echo "No account created";
                }
                ?>
            </td>
        </tr>

    </table>
	</header>

	<div class="content">
		<div class="savings">
			<h2>Savings</h2>
<script type ="text/javascript" sc="function.js">
			</script>
			<a href ="savings.html"><input type ="button" onclick ="myfunction()" value = "Save">
			</a>
		</div>

		<div class="loan">
			<h2>Loan</h2>
			
			<script type ="text/javascript" sc="function.js">
			</script>
			<a href="loantypes.php"><input type ="button" onclick ="myfunction()" value = "Borrow Loan">
			</a>
		</div>
	</div>

<!--account page-->
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="home 2.jpg" width="100%">
            </div>		
</head>
<body>
	>
	
	<footer>
		<p>&copy; 2023 Jiinue Youth Sacco</p>
	</footer>
</body>
</html>