<!DOCTYPE html>
<html lang="en">
<head>
    <meta chartset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,600;0,700;1,300;1,400&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="logo.png" length="120px" width="155px">
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="index.php">Home</a></li>
                <li><a href="loantypes.php">Loans </a></li>
                <li><a href="savings.html">Savings</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
        <img src="menu bar.png" class="menu-icon" onclick="menutoggle()">
    </div>
</div>
<!--account page-->
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="home 2.jpg" width="100%">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>
                    <form id="LoginForm" method="POST" action="login.php">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">

                        <label for="login-type">Login as:</label>
                        <select name="login-type" id="login-type">
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                        </select><br>
                        <input type="submit" name="login" class="btn" value="log in">
                        <a href="">Forgot password</a>
                    </form>

                    <?php
                    require_once("dbconnect.php");
                    // Verify user's credentials
                    if (isset($_POST["login"])) {
                        $email = $_POST['email'];
                        $password = $_POST["password"];
                        $role = $_POST["login-type"];
                        $encodedPassword = md5($password);

                        $checkUser = "SELECT * FROM members WHERE email = '$email'";
                        $checkUserQuery = mysqli_query($conn, $checkUser);
                        $result = mysqli_fetch_array($checkUserQuery);
                        if (mysqli_num_rows($checkUserQuery) > 0) {
                            if ($encodedPassword == $result["password"]) {
                                session_start();
                                $_SESSION['loggedin'] = true;
                                $_SESSION['role'] = $role;
                                $_SESSION['email'] = $email;
                                $_SESSION['memberID'] = $result["memberID"];

                                if ($role == "admin") {
                                    // Redirect the user to the admin dashboard page
                                    header('Location: admindashboard.php');
                                    exit;
                                } else {
                                    header('Location: dashboard.php');
                                    exit;
                                }
                            } else {
                                // If the user's credentials are invalid, display an error message
                                echo '
                                <script>
                                    alert("Invalid password");
                                </script>
                                ';
                                echo 'Invalid password';
                            }
                        } else {
                            echo '
                                <script>
                                    alert("Invalid email");
                                </script>
                                ';
                            echo "Invalid email";
                        }
                    }
                    ?>

                    <form id="RegForm" action="" method="POST">
                        <input type="text" name="name" placeholder="Full Name">
                        <input type="email" name="email" placeholder="Email">
                        <input type="tel" name="phone" placeholder="Phone Number">
                        <input type="text" name="ID number" placeholder="ID Number">
                        <input type="number" name="age" placeholder="Age">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" name="register" class="btn" value="Register">

                        <?php
                        require_once("dbconnect.php");
                        // Verify user's credentials
                        if (isset($_POST["register"])) {
                            $name = $_POST["name"];
                            $email = $_POST['email'];
                            $password = $_POST["password"];
                            $phone = $_POST['phone'];
                            $idNumber = $_POST["ID number"];
                            $age = $_POST["age"];
                            $encodedPassword = md5($password);

                            $checkUser = "SELECT * FROM members WHERE email = '$email'";
                            $checkUserQuery = mysqli_query($conn, $checkUser);
                            if (mysqli_num_rows($checkUserQuery) > 0) {
                                echo '
                                <script>alert("user already exists")</script>
                                ';
                            } else {
                                $insertSql = "INSERT INTO members (memberID, name, email, mobile_no, IDnumber, age, password) VALUES 
                                                                                    (NULL, '$name', '$email', '$phone', '$idNumber', '$age', '$encodedPassword')";
                                $insertQuery = mysqli_query($conn, $insertSql);
                                if ($insertQuery) {
                                    echo '
                                <script>alert("user added successfully")</script>
                                ';
                                } else {
                                    $error = mysqli_error($conn);
                                    echo '
                                <script>alert("error adding user: " + ' . $error . ')</script>
                                ';
                                }
                            }
                        }

                        ?>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download our App</h3>
                <p>Download App for Android and ios mobile phone</p>
                <div class="app-logo">
                    <img src="store.jpg">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="logo.png">
                <p>Our purpose its to offer a place where youths can save,borrow loans and be empowered in their
                    investments</p>
            </div>
            <div class="footer-col-3">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Twitter</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="Copyright">Copyright 2023 - JIINUE YOUTH SACCO</p>
    </div>
</div>
<!--js for toggle menu-->
<script>
    var MenuItems = document.getElementById("MenuItems")
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";

        }

    }
</script>
<!--js for toggle form-->
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }

    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }
</script>

</body>
</html>

