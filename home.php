<!DOCtype html>
<html>
    <head>
        <title>Macro Super Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/objects.css">
        <link rel="stylesheet" href="style/slideshow.css">
        <script type="text/javascript" src="javascript/mainSlideShow.js"></script>
    </head>

    <body onload="currentSlide(1)">
    <?php 
            session_start();

            if(empty($_SESSION['regName'])||empty($_SESSION['uid'])||empty($_SESSION['stype'])){
              $_SESSION['regName'] = "";
              $_SESSION['uid'] = "";
              $_SESSION['stype'] = "";
            }

            $system_userName= $_SESSION['regName'];
            $system_userID = $_SESSION['uid'];
            $system_type = $_SESSION['stype'];      

            if(isset($_POST["add"])){
              $_SESSION['itemNo'] = $_POST['product_id'];
              $_SESSION['cartQty'] = $_POST['qtyBox'];

          $servername = "localhost:3306";
          $username = "root";
          $password = "";
          $dbname = "wadproject";
        
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          
            $sql = "SELECT MAX(`cartID`) FROM `cartdb`";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $setCartID = $row['MAX(`cartID`)']+1;
            }
            } else {
              echo "0 results";
            }

        $sql = "INSERT INTO `cartdb` (`cartID`, `itemID`, `userID`, `cartqty`) VALUES ('".$setCartID."', '".$_SESSION['itemNo']."', '".$system_userID."', '".$_SESSION['cartQty']."');";

        if (mysqli_query($conn, $sql)) {

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

          mysqli_close($conn);

            }
               
        ?> 

<header>
<div class="box_level_free">
    <tr>
        <td width="429"> </td>
        <td width="471">
            <ul class="nos">
                <li class="li_left"><b class="ad">Macro Super Center</b></li>
                <li class="li_left"><a class="ad" href="home.php"> Home</a></li>
                <li class="li_left"><a class="ad" href="search.php">Search</a></li>
                <li class="li_left"><a class="ad" href="cart.php">Cart</a></li>
                <li class="li_left"><a class="ad" href="sellerhub.php">Seller hub</a></li>
                <li class="li_left"><a class="ad" href="about.php">About Us</a></li>
                
                <li class="li_right"><a class="ad" href="login.php">Log in</a></li>
                <li class="li_right"><a class="ad" href="signup.php">Sign up</a></li>
                <li class="li_right"><a class="ad" href="logout.php"><?php if($system_userName==""){ echo "";} else {echo $system_userName;} ?></a></li>
            </ul>
        </td>
    </tr>
  </div>
</header>
            
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 4</div>
                    <img src="images/slideshow/1.png" style="width:100%">
                </div>
                  
                <div class="mySlides fade">
                    <div class="numbertext">2 / 4</div>
                    <img src="images/slideshow/2.png" style="width:100%">
                </div>
                  
                <div class="mySlides fade">
                    <div class="numbertext">3 / 4</div>
                    <img src="images/slideshow/3.png" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 4</div>
                    <img src="images/slideshow/4.png" style="width:100%">
                </div>
                  
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                </div>
            </div>
        <br><br>

        <?php
            $servername = "localhost:3306";
            $username = "root";
            $password = "";
            $dbname = "wadproject";
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT COUNT(`itemNo`) FROM `itemsdb`";
            $result = mysqli_query($conn, $sql);
            $itemCount = 0;

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $itemCount = $row["COUNT(`itemNo`)"];
              }
            } else {
              echo "0 results";
            }
            
            $sql = "SELECT `itemNo` FROM `itemsdb` ";
            $result = mysqli_query($conn, $sql);
            $itemNumArray;

            for($i = 0; $i < $itemCount; $i++){
              $sql = "SELECT `itemNo` FROM `itemsdb` LIMIT ".$i.",1";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $itemNumArray[$i] = $row["itemNo"];
                }
              }
              else {
                echo "0 results";
              }
            }
            mysqli_close($conn);
        ?>

        <div class="container">
        <div class="row row-cols-4 justify-content-center">


        <?php
          $servername = "localhost:3306";
          $username = "root";
          $password = "";
          $dbname = "wadproject";
        
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          
          for($x = 0; $x < $itemCount; $x++){
            $sql = "SELECT `itemNo`, `name`, `image`, `unit`, `qty`, `unitprice` FROM `itemsdb` LIMIT ".$x.",1";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $productID[$x] = $row["itemNo"];
              $productName[$x] = $row["name"];
              $unit[$x] = $row["unit"];
              $qty[$x] = $row["qty"];
              $price[$x] = $row["unitprice"]; ?>
            
            <div class="box_level_s">
        <div class="grid_box">
        <form method = "post" action = "home.php?action=add&id=<?php echo $productID[$x];?>">
            <div class="row">
                <div class="column">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="Card image cap" width="275px" height="275px">
                </div>

                <div class="column">
                    <h2 class="card-title"><?php echo $row["name"]; ?></h2>
                    
                        <p>Item No: <?php echo $row["itemNo"] ?></p>
                        <p>Quantity: <?php echo $row["qty"].$row["unit"]; ?></p>
                        <p>Price: LKR. <?php echo $row["unitprice"]; ?></p>
                      
                      <input type="hidden" name= "product_id" value="<?php echo $row['itemNo'];?>"> 
    
                      <p>Qty: <input type="text" id="qtyBox" name ="qtyBox" placeholder="<?php echo $row["qty"]; ?>" required/></p>
                      <input type="submit" class="btn_sl_blue" name = "add" value = "Add to cart">
                </div>
              </div> 
        </form></div></div>

        <br>

            <?php
            }
            
            } else {
              echo "0 results";
            }
          }
          mysqli_close($conn);
        ?>


        </div>
        </div>
            <br>
            <br><br>
            <br>  

<footer>
  <div class="box_level_xl" style="background-color: rgba(0, 0, 0, 0.2); text-align: center; font-family: Arial, Helvetica, sans-serif; height:50px; padding:1px;">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>