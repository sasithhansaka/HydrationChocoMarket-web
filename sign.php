<?php
include 'conf.php';
if(isset($_POST['sign'])){
    
    $firstname = $_POST["firstname"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $sql = "SELECT * FROM register WHERE firstname='$firstname'";
    $result1 = mysqli_query($conn, $sql); 
    if($result1){
        $num = mysqli_num_rows($result1);
        if($num > 0){
            $error = "user already exist.";
        }
        else{
           $sql="INSERT INTO  register (firstname,password,email,address) Values ('$firstname','$password','$email','$address')";
            $result=mysqli_query($conn,$sql); 
            if($result==true){        
                   $success = "succefully regiter."; 
                }
                    else{
                      $error = "Incorrect firstname or password.";  
                      }  
        }
    }
}
?>

    


<!DOCTYPE html>
<html lang="en">
<head>   
<script type="text/javascript" src="sign.js"></script>
     <link rel="stylesheet" href="createe.css">
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
       <title>Document</title>
</head>
<body>
        <!-- //bootstrp -->
        <nav class="navbar navbar-expand-lg " style="background-color: whitesmoke;height: 75px;border-color:rgb(46, 46, 46);border-bottom: 1px solid;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
                  <li class="nav-item">
            <a class="nav-link" href="./home.html" style="color: rgb(0, 0, 0);margin-top: 30px;font-family: Pathway Gothic One, sans-serif;margin-left: 19px;">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./drinks.php" style="color: rgb(0, 0, 0);margin-top: 30px; font-family: Pathway Gothic One, sans-serif;margin-left: 19px;">DRINKS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./sticks.php" style="color: rgb(0, 0, 0);margin-top: 30px; font-family: Pathway Gothic One, sans-serif;margin-left: 19px;">STICKS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./energy.php" style="color: rgb(0, 0, 0);margin-top: 30px; font-family: Pathway Gothic One, sans-serif;margin-left: 19px;">ENERGY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./feastables.php" style="color: rgb(0, 0, 0);margin-top: 30px; font-family: Pathway Gothic One, sans-serif;margin-left: 19px;">FEASTABLES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./home.html" style="color: rgb(0, 0, 0);font-size: 48px;margin-top: 0px;  font-family:Squada One, sans-serif; margin-left: 150px;font: bold;margin-right: 35px;font-weight: 800;line-height: 1.75; ">LUXEB</a>
          </li>
            <a class="navbar-brand" href="./login.php"><img name="pic" src="./user_1144760 (1).png" style="margin-right: 50px;margin-left: 450px; height: 30px;width: 30px;margin-top: 28px;"></a>
  
        </ul>
        </div>
        </div>
    </nav>
    <form action="sign.php" method="post"id="myform" onsubmit="return dovalidate()">
    <h2 class="create">CREATE ACCOUNT</h2>
    <input type="text" name="firstname" placeholder="firstname"><BR>
    <input type="text" name="password" placeholder="password"><BR>
    <input type="email" name="email" placeholder="email-address"><BR>
    <input type="text" name="address" placeholder="address"><BR>

    <input type="submit" name="sign" value="CREATE"><br>
    <?php 
   if (!empty($error)) { 
    echo "<p style='color: red;font-family:Squada One, sans-serif;margin-left:580px;padding: 10px; 5px;width: 370px;'>$error</p>"; 
} 
if (!empty($success)) { 
    echo "<p style='color: green;font-family:Squada One, sans-serif;margin-left: 580px;padding: 10px;width: 370px;'>$success</p>"; 
} 
?>

<div class="footer">
        
        <div class="foa">
            <p>MENU</p><br>
            <p style="margin-bottom: 1pX;">HOME</p>
            <p style="margin-bottom: 1px;">DRINKS</p>
            <p style="margin-bottom: 1px;">STICKS</p>
            <p style="margin-bottom: 1px;">ENERGY</p>
        
            <P style="color: rgb(168, 168, 168);">__________________________________________________________________________________________________________________________________________________________</P>
            <p style="font-size: small;">Copyright @2024 LUXEB<br>Greater London House, Hampstead Road, London NW1 7FB<br>+44 20 3540 8063<br>
            <a style="text-decoration: none;color: rgb(187, 184, 184);margin-left: 500px;margin-top: 100px;" href="adminsign.php">admin</a></p>
        
        </div>


        <div class="fob">
            <p>SUPPORT</p>
        </div>

        <div class="foc"><p>Join the Community!<br><br>LUXEB was developed to fill the void where
           great taste meets function. With bold, thirst-quenching flavors to help you refresh, 
           replenish, and refuel, PRIME is the perfect boost for any endeavor. We're confident
            you'll love it as much as we do..</p>
        </div>
    
    </div>
</body>
</html>