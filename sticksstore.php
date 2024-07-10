<?php 
include 'conf.php';

@$id = $_GET["id"];

if(isset($_POST['submit'])){
    @$firstname =$_POST["firstname"];
    @$password = $_POST["password"];
    @$items = (int)$_POST["items"];
    $currentdate = date('y-m-d');
    $id = $_POST["id"];
    $sql2="SELECT * from register where firstname='$firstname' and password='$password'";
    $result2=mysqli_query($conn,$sql2);
    if($result2->num_rows>0){
    $row=$result2->fetch_assoc();
    $sql="SELECT quantity,name,price FROM sticks WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $quantity=$row['quantity']; 
        $product=$row['name']; 
        $price=$row['price']; 
        if($quantity>0 ){
    if($items<=$quantity){
       
            $price2=$items*$price;
            $sql1="INSERT INTO information  (firstname,password,brand,quantity,price,date,current) VALUES('$firstname','$password','$product','$items','$price2','$currentdate','Deliver Progress')";                       
            $result1=mysqli_query($conn,$sql1);
            if($result1==true){
                $update="UPDATE sticks SET quantity=quantity-$items WHERE  id='$id'";
                    $result2=mysqli_query($conn,$update);
                    if($result2==true){
                        echo "<div style='color: #28a745;font-family:Roboto Condensed, sans-serif;margin-left: 240px;margin-top: 75px;'>Congratulations! Your order was successful. Thank you for shopping with us!</div>";

                    }
                    else{
                        echo"nooo";
                    }
                }
            }
            else{
                // echo "<div style='color: #dc3545; font-size: 18px;font-weight:bold;margin-left: 120px;'>Apologies, there is less stock available than the quantity requested!</div>";
                
               
            }
                      mysqli_close($conn);     
            }
            else{
                // echo "<div style='color: red; font-size: 18px;'>size unavailable</div>";
                
            }
        }
        else{ 
            // echo "<div style='color: #dc3545; font-size: 18px;font-weight:bold;margin-left: 120px;'>Unfortunately, the selected size is currently unavailable!</div>";   
        }
    }
    else{
         echo "<div style='color: #dc3545;font-family:Roboto Condensed, sans-serif;margin-left: 240px;margin-top: 75px;'>Sorry, the username and/or password provided is incorrect.if you are new member register before shopping !</div>";    
    }
} 
?>
<?php 
    include 'conf.php';
    $sql = "SELECT * FROM sticks WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="drinkstore.css">
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


    <?php 
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row["id"];
                $name = $row["name"];
                // $size = $row["size"];
                $qnt = $row["quantity"];
                $price = $row["price"];
                $des = $row["description"];
    $img1 = '<img class="m1" src="data:image/jpg;charset=utf8;base64,' . base64_encode($row["image"]) . '" />';
    $img2 = '<img class="m2" src="data:image/jpg;charset=utf8;base64,' . base64_encode($row["image2"]) . '" />';
?>
    <div class="first">
    <div class="obj">
       <div class="old">
          <div class="slider">
            <div class="image">
                <input type="radio" name="slide" id="im1" checked>
                <input type="radio" name="slide" id="im2">
                <?php echo $img1; ?>
                <?php echo $img2; ?>
            </div>
            <div class="dots">
                <label for="im1"></label>
                <label for="im2"></label>
            </div>
            <div class="add">
                <img src="./PR-icon-1-Coconut_76 (1).webp"class="addb">
                <img src="./PR-icon-2-Caffeine_73 (1).webp" class="addb">
                <img src="./PR-icon-3-Electrolytes_61.webp"class="addb">
                <img src="./PR-icon-4-BVitamins_21.webp"class="addb">
                <img src="./PR-icon-5-Antioxidants_6.webp"class="addb">
            </div>

        </div>
        </div>
        </div>

         <div class="obje">
                <p class="descri"><?php echo $des ?></p>
                <P class="money"><?php echo "LKR-" .$price .".00"?></P> 
                <p class= "underline" >__________________________________________<p>     
            
            <?php }} ?>
            
        <form action="sticksstore.php" method="POST"> 

        <input type="text" name="firstname" placeholder="firstname"required > <br>
        <input type="password" name="password" required placeholder="password"><br>
        <input type="number" name="items" min="1" value="1" max="<?php echo $qnt; ?>"required > 
        <input type="text" name="id" style="display: none;" readonly value="<?php echo $id ?>">
        <br><br>
        <?php
        if($qnt>0){
         ?>
        <input type="submit" name="submit" value="PLACE ORDER" class="submit1"><br>
          <?php
        }
        else{
          ?>
            <input type="submit" name="submit" value="FIND IN STORE" class="submit2" disabled><br>
+         <?php
        }
        ?>


        <a class="fow" href="sign.php">REGISTER HERE </a>

        <ul class="ull">
            <li class="lii">Cold-activated bottle </li>
            <li class="lii">Zero added sugar</li>
            <li class="lii">20 Calories​</li>
            <li class="lii">10% Coconut Water</li>
            <li class="lii">BCAAs + B Vitamins</li>
            <li class="lii">355mg Electrolytes </li>

        </ul>

        
    </form> 
     </div>
     </div>

     
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


