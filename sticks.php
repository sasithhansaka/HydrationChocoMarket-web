<?php 
    include 'conf.php';
    $sql = "SELECT * FROM sticks";
    $result = mysqli_query($conn, $sql);
    if(isset($_POST['filter'])){
        $sql = "SELECT * FROM sticks ORDER BY price DESC";
        $result = mysqli_query($conn, $sql);
     }
     if(isset($_POST['filterl'])){
        $sql = "SELECT * FROM sticks ORDER BY price ASC";
        $result = mysqli_query($conn, $sql);
     }
     if(isset($_POST['out'])){
        $sql = "SELECT * FROM sticks  where  quantity='0'";
        $result = mysqli_query($conn, $sql);
     }
     if(isset($_POST['in'])){
        $sql = "SELECT * FROM sticks where  quantity>'0'";
        $result = mysqli_query($conn, $sql);
     }

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <script src="home.js" defere></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="drinks.css">
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
            <a class="navbar-brand" href="./login.php"><img name="pic" src="./user_1144760 (1).png" style="margin-right: 50px;margin-left: 500px; height: 30px;width: 30px;margin-top: 28px;"></a>
  
        </ul>
        </div>
        </div>
    </nav>


    <!-- <img src="./SB_Collection_Banner_Hydration_Desktop_2000x.webp" class="topim"> -->

    

    <div class="first">
    <div class="top">
    <form action="sticks.php" method="post">
        <input type="submit"name="in" value="IN STOCK" id="interst">
    </form>
    <form action="sticks.php" method="post">
        <input type="submit"name="out" value="OUT STOCK" id="interst">
    </form>
    <form action="sticks.php" method="post">
        <input type="submit" name="filter" value="PRICE,HIGH TO LOW" id="interst">
    </form>
</div>

    

    <div class="pc">
    <?php 
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row["id"];
                $name = $row["name"];
                $qnt = $row["quantity"];
                $price = $row["price"];
                $des = $row["description"];
                $img1 = '<img class="ima" src="data:image/jpg;charset=utf8;base64,' . base64_encode($row["image"]) . '" />';
                $img2 = '<img class="imb" src="data:image/jpg;charset=utf8;base64,' . base64_encode($row["image2"]) . '" />';
    ?>
    <div>
        <div class="bo">
            <div class="boa">
                <div class="obj">
                    <?php echo $img1 ?>
                    <?php echo $img2 ?>
                    <p class="band">LUXEB</P>
                </div>
                
            </div>
        </div>
        <div class="imagea">
            <div class="imageb">
                <p class="descri"><?php echo $des ?></p>
                <P class="money"><?php echo "LKR-" .$price .".00"?></P>
                <a class="ccc" href="sticksstore.php?id=<?php echo $id ?>">BUY NOW</a>
            </div>         
        </div> 
            </div>
    <?php }} ?>
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
