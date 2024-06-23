<!DOCTYPE html>
<html lang="en">
<head>
    <meta chartset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIINUE</title>
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <div class="container">
         <div class="navbar">
            <div class="logo">
            <a href="index.html"><img src="logo.png"  length="120px" width="155px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="">Home</a></li>
                    <?php
                    if (isset($_GET["id"])){
                        $id = $_GET["id"];
                        echo "<li><a href='loantypes.php'>loans</a></li>";
                    }
                    ?>
                    <li><a href="loantypes.php">Loans</a></li>
                    <li><a href="savings.html">Savings</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="">Contact </a></li>


                  </ul>
            </nav>
        </nav>
        <img src="email.png" width="30px" height="30px">
        <img src="menu bar.png" length="30px" width="30px"  class="menu-icon" onclick="menutoggle()">
        </div> 
        <div class="row">
            <div class="col-2">
                <h1>Next Generation<br>Online Banking!</h1>
                <p>Take your financial life online by saving,investing,budgeting and borrowing loans.</p>
                <a href="Login.php"class="btn">Register &#8594;</a>
            </div>
            <div class="col-2">
               <img src="home 2.jpg" length="1100px" width="1100px">
            </div>
        </div>   
        </div>
        </div>
        <!--upcoming events-->
<div class="small-container">
    <h2 class="title">THIS MONTH EVENTS</h2>
    <div class="row">
       <div class="col-4">
        <img src="training.jpg">
        <h4>Youth training and workshop</h4>
        
        <p>There will be a training and workshop
        held in the meeting hall on 12/03/2023</p>
    </div>
    <div class="col-4">
        <img src="meet.jpg">
        <h4>End month meeting</h4>
        
        <p>There will be a meeting between
        the youth representatives and management
        held in the confrence hall on 01/03/2023</p>
    </div>
    <div class="col-4">
        <img src="budget.jpg">
        <h4>Budget and savings guidance</h4>
        
        <p>There will be a budgetting and savings guidance
        held in the meeting hall on 12/03/2023</p>
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
                <p>Our purpose its to offer a place where youths can save,borrow loans and be empowered in their investments</p>
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

     function menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
        else
            {
                MenuItems.style.maxHeight = "0px";
 
            }

     }
</script>
            
           
     

</body>
</html>