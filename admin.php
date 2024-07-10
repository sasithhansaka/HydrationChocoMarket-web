<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="ad.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="home.js" defere></script>
    <title>Document</title>
</head>
<body>
<!-- <div class="sidebar">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div> -->
    <!-- <div class="hold" id="hold">
    <p class="create">ADMIN PANEL</p>
    <a  href="./admin.php">BACK</a>
    <form action="indrink.php" method="post" enctype="multipart/form-data" >
        <label for="name">NAME</label>
        <input type="text" name="name" required><br>
        <label for="type">TYPE</label>
        <select name="type" style="font-family:Squada One, sans-serif; margin-left: 100px;">
            <option value="drinks" required>drinks</option>
            <option value="feastables">feastables</option>
            <option value="sticks">sticks</option>
            <option value="bag">bag</option>
            <option value="energy">energy</option>
        </select><br><br>
        <label for="qnt">QUANTITY</label>
        <input type="number" name="qnt" required><br>
        <label for="image1">IMAGE1</label>
        <input type="file" name="image1" required><br>
        <label for="image2">IMAGE2</label>
        <input type="file" name="image2" required><br>
        <label for="price">PRICE</label>
        <input type="text" name="price" required><br>
        <label for="description">DESCRIPTION</label>
        <input type="text" name="description" required><br>
        <input type="submit" value="INSERT" name="insert"><br>
    </form>
    </div> -->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- <button id="in" value="in">in</button>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var recentOrders = document.getElementById("hold");
        var changeOpacityButton = document.getElementById("in");
        
        recentOrders.style.opacity = "0";
        
        changeOpacityButton.addEventListener("click", function() {
            if (recentOrders.style.opacity === "0") {
                recentOrders.style.opacity = "1";
            } else {
                recentOrders.style.opacity = "0";
            }
        });
        
    });
    </script> -->
    
    <a  href="./indrink.html">ALL UPDATES</a>
    <a  href="home.html">HOME</a>
    <p class="dashboard">DASHBOARD</p>
    <?php
    include "conf.php";
    $sql1 = "SELECT SUM(price) AS totalprice FROM information"; 
    $result = mysqli_query($conn, $sql1);
     if ($result) {

    $row = mysqli_fetch_assoc($result);

    $totalPrice = $row['totalprice'];
    ?>
      <div class="top">
        <div class="money">
        <img src="./price-tag_567600.png" class="pica">
            <p class="topa"><?php echo "LKR-".$totalPrice.".00"?></P>
            <p class="topb">TOTAL SALES</P>
     </div>
    <?php
     }
    ?>
    <?php
   $sql2 = "SELECT COUNT(*) AS totalRows FROM register"; 
   $result2 = mysqli_query($conn, $sql2);
   
   if ($result2) {
       $row = mysqli_fetch_assoc($result2); 
       $totalCount = $row['totalRows'];
   
       ?>
       <div class="countall">
       <img src="./team_171561.png" class="pica">
           <p class="topa"><?php echo $totalCount; ?></p>
           <p class="topb">TOTAL ENTRIES</p>
       </div>
       <?php
   }
   ?>
   <?php
   $sql2 = "SELECT COUNT(*) AS totalRows FROM information"; 
   $result2 = mysqli_query($conn, $sql2);
   
   if ($result2) {
       $row = mysqli_fetch_assoc($result2); 
       $totalCount = $row['totalRows'];
   
       ?>
       <div class="sellcount">
       <img src="./countdown_1378260.png" class="pica">
           <p class="topa"><?php echo $totalCount; ?></p>
           <p class="topb">TOTAL SALES</p>
       </div>
       <?php
   }
   ?>
   </div>

    <!-- <div class="first"> -->
        <div class="lefta" id="lefta">

       <p class="hh">RECENT ORDERS</p>
        <?php 
         include "conf.php";
            $sql = "SELECT * FROM information";
            $result = mysqli_query($conn, $sql);
            echo '<table  cellspacing="2" cellpadding="2" > 
                <tr> 
                <th>ID</th> 
                    <th>USER</th> 
                    <th>PRICE</th> 
                    <th>DATE</th> 
                    <th>STATUS</th>
                </tr>';

      if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id=$row["id"];
            $firstname = $row["firstname"];
            $price = $row["price"];
            $gender = $row["date"];
            $current = $row["current"];

        if ($current=="Deliver Progress"){
            $color="red";
        }
        else{
            $color="green";  
        }
       echo '<tr> 
       <td>'.$id.'</td>
            <td>'.$firstname.'</td>
            <td>LKR-'.$price.'</td>
            <td>'.$gender.'</td> 
            <td style="color: '.$color.';">'.$current.'</td>
            </tr>';
        }
    } 
    ?>
    </div>



</body>
</html>
   
