<!DOCTYPE html>
<html>
<head>
    <title>Loan Application Form</title>
    <style>
        h1 {
            font-size: larger;
            color: #4CAF50;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"], select {
            display: block;
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 20px;
            overflow: hidden;
        }

        .form-group label {
            float: left;
            width: 30%;
            padding-right: 10px;
            font-weight: bold;
            text-align: right;
            line-height: 40px;
        }

        .form-group input {
            float: left;
            width: 65%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            line-height: 40px;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<h1>JIINUE YOUTH SACCO</h1>
<h2>Loan Application Form</h2>
<form method="post">
    <h2>Customer Details</h2>
    <div class="form-group">
        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="phone"> Mpesa /Airtel Money Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
    </div>
    <div class="form-group">
        <label for="KRApin">KRA PIN:</label>
        <input type="text" id="KRApin" name="KRApin" required>
    </div>
    <fieldset>
        <legend>Work Information</legend>
        <label for="occupation">Current Occupation</label>
        <input type="text" name="occupation"/>
        <label for="company name">Employer Name</label>
        <input type="text" name="employername"/>
        <label for="company location">Employer Address</label>
        <input type="text" name="employeraddress"/>
    </fieldset>

    <fieldset>
        <legend>Guarantor details</legend>
        <label for="name">Guarantor Name</label>
        <input type="text" name="guarantorname"/>
        <label for="contacts">Guarantor Contacts</label>
        <input type="text" name="guarantorcontacts"/>

    </fieldset>

    <h2>Loan Details</h2>
    <div class="form-group">
        <label for="loan-type">Loan Type:</label>
        <select id="loan-type" name="loantype" onchange="checkOption()">
            <?php
            require_once("dbconnect.php");
            ?>
            <?php
            $getLoans = "SELECT * FROM `loan_types`";
            $getLoansFX = mysqli_query($conn, $getLoans);
            $loanType  =$_GET["loanType"];

            while ($result = mysqli_fetch_assoc($getLoansFX)) {
                $selected = ($result["Name"] == $loanType) ? ' selected' : '';
                echo '<option value="'.$result["Name"].'">'.$result["Name"].'</option>';
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="amount">Loan Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <br>
        <br>
    </div>
    <div class="form-group">
        <label for="duration">Loan Duration (in months):</label>
        <input type="number" id="duration" name="duration" required>
    </div>
    <div class="form-group">
        <label for="interest-rate">Interest Rate:</label>
        <input type="hidden" class="interest-rate" name="interestrate">
        <input type="text" id="interest-rate" value="3" name="interestrate" disabled>


    </div>


    <input type="submit" name="submit" value="Apply Now">

</form>

<script>
    var option = document.getElementById("loan-type");
    var loanType = option.options[option.selectedIndex].value;

    function checkOption() {
        loanType = option.options[option.selectedIndex].value;
        if (loanType === "Emergency Loan") {
            $('#interest-rate').val(10);
            $('.interest-rate').val(10);
        }
        if (loanType === "Development Loan") {
            $('#interest-rate').val(12);
            $('.interest-rate').val(12);
        }
        if (loanType === "Instant Loan") {
            $('#interest-rate').val(1);
            $('.interest-rate').val(1);
        }
    }

    var amount = document.getElementById('amount').innerHTML;
    $("#amount").on("change paste keyup", function () {
        if (amount > 500000) {
            $('#overflow-alert').append();
        }
    });

</script>

</body>
</html>
<?php
require_once "dbconnect.php";
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $mpesanumber =$_POST["phone"];
    $address = $_POST["address"];
    $KRApin = $_POST["KRApin"];
    $occupation = $_POST["occupation"];
    $employername = $_POST["employername"];
    $employeraddress = $_POST["employeraddress"];
    $guarantorname = $_POST["guarantorname"];
    $guarantorcontacts = $_POST["guarantorcontacts"];
    $loantype = $_POST["loantype"];
    $amount = $_POST["amount"];
    $duration = $_POST["duration"];
    $interestrate = $_POST["interestrate"];
    $status = "pending";


    $registerQuery = "INSERT INTO `customerloandetails` VALUES (NULL, '$email', '$name', '$mpesanumber', '$address', '$KRApin', '$occupation',
    '$employername','$employeraddress','$guarantorname','$guarantorcontacts', '$loantype', '$amount', '$duration' ,
       '$interestrate', CURRENT_TIMESTAMP, '$status')";
    $registerfx = mysqli_query($conn, $registerQuery);

    if ($registerfx) {
        echo '
            <script>
            alert("Your loan application has been received and is awaiting approval.");
            </script>
            ';
    } else {
        $error = mysqli_error($conn);
        echo '
            <script>
            alert("Failed" + ' . $error . ');
            </script>
            ';
    }
}
?>