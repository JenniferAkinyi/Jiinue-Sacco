<!DOCTYPE html>
<html>
  <head>
    <title>Loan Calculator</title>
	<style>
	body {
    font-family: Arial, sans-serif;
    padding: 20px;
	background-color: #4CAF50;
  }
  h1{
    text-align: center;
  }
  h2{
    text-align: center;
    color: #4CAF50;
    font-style: italic;
    font-size: large;
  }
  
  form {
    border: 1px solid #ccc;
    padding: 10px;
    max-width: 500px;
    margin: auto;
	background-color: aliceblue;
  }
  
  label {
    display: inline-block;
    width: 150px;
  }
  
  input[type="number"], input[type="text"] {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 200px;
    margin-bottom: 10px;
  }
  
  button {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
  }
  
  button:hover {
    background-color: #3e8e41;
  }

  button{
    text-align: center;
  }
  
  
  
  
  


	</style>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
	<h2>JIINUE YOUTH SACCO</h2>
    <h1>Loan Calculator</h1>

	
    <form>
		<label for="loantype">Loan type:</label>
        <select id="loantype" name="loantype" onchange="checkOption()">
            <?php
            require "dbconnect.php";
            $getLoans = "SELECT * FROM `loan_types`";
            $getLoansFX = mysqli_query($conn, $getLoans);
            $loanType = isset($_GET["loanType"]) ? $_GET["loanType"] : "";

            while ($result = mysqli_fetch_assoc($getLoansFX)) {
                $selected = ($result["Name"] == $loanType) ? ' selected' : '';
                echo '<option value="' . $result["Name"] . '"' . $selected . '>' . $result["Name"] . '</option>';
            }
            ?>
        </select>
        <br><br>
      <label for="loan-amount">Loan Amount:</label>
      <input type="number" id="loan-amount" max="50000" required><br><br>
        <span id="overflow-alert"></span>
      <label for="interest-rate">Interest Rate:</label>
      <input type="number" id="interest-rate" step="0.01" value="10" disabled><br><br>
      <label for="loan-term">Loan Term (in years):</label>
      <input type="number" id="loan-term" required><br><br>
      <button type="button" onclick="calculate()">Calculate</button><br><br>
      <label for="monthly-payment">Monthly Payment:</label>
      <input type="text" id="monthly-payment" disabled><br><br>
      <label for="total-interest">Total Interest:</label>
      <input type="text" id="total-interest" disabled><br><br>
      <label for="total-amount">Total Amount:</label>
      <input type="text" id="total-amount" disabled><br><br>
	  
    </form>
	<a href="loanapplication%20form.php"><button>Apply Now</button></a>
    <script src="assets/js/main.js"></script>
  </body>
</html>



