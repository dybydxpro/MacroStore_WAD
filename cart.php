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

    <body>

    <?php 
            session_start();
            $system_userName= $_SESSION['regName'];
            $system_userID = $_SESSION['uid'];
            $system_type = $_SESSION['stype'];

            if(isset($_POST["delete"])){
              $_SESSION['cartID'] = $_POST['cart_id'];
            
          $servername = "localhost:3306";
          $username = "root";
          $password = "";
          $dbname = "wadproject";
        
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          
            $sql = "DELETE FROM `cartdb` WHERE `cartdb`.`cartID` = ".$_SESSION['cartID'].";";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_query($conn, $sql)) {
                echo "<script>window.alert('Successfully Deleted row..!')</script>";
            } else {
              echo "0 results";
            }

          mysqli_close($conn);
          }
        ?> 

<header>
<div class="box_level_free">
    <tr>
    <td width="550"> </td>
        <td width="500">
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

<br><br>


<div class="container">
        <div class="row row-cols-4 justify-content-center">


        <?php
          $servername = "localhost:3306";
          $username = "root";
          $password = "";
          $dbname = "wadproject";
          
          if($system_userID >= 1){
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT COUNT(`cartID`) FROM `cartdb` WHERE `userID` =".$system_userID;
            $result = mysqli_query($conn, $sql);
            $itemCount = 0;

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $itemCount = $row["COUNT(`cartID`)"];
              }
            } else {
              echo "0 results";
            }
            
            

          for($x = 0; $x < $itemCount; $x++){
            $sql = "SELECT `cartID`,`itemNo`,`name`,`image`,`unit`,`unitprice`,`cartqty` FROM `cartdb`,`userdb`,`itemsdb` WHERE `cartdb`.`itemID`= `itemsdb`.`itemNo` AND `cartdb`.`userID`= `userdb`.`userID` AND `userdb`.`userID` = ".$system_userID." LIMIT ".$x.",1";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { 
              
              ?>

              <div class="box_level_s">
              <div class="grid_box">
              <form method = "post" action = "cart.php?action=delete&id=<?php echo $productID[$x]; ?>">
              <div class="row">
                <div class="column">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="Card image cap" width="275px" height="275px">
                </div>

                <div class="column">
                    <h2 class="card-title"><?php echo $row["name"]; ?></h2>
                    
                        <p>CartID: <?php echo $row["cartID"]; ?></p>
                        <p>Quantity: <?php echo $row["cartqty"].$row["unit"];?></p>
                        <p>Price: LKR. <?php echo $row["unitprice"]; ?></p>
                      
                        <input type="hidden" name= "cart_id" value="<?php echo $row['cartID'];?>"> 
                        <br>
                        <input type="submit" class="btn_sl_red" name = "delete" value = "Delete">
                </div>
              </div> 
        </form></div></div>

        <br>

            <?php }
            } else {
              echo "0 results";
            }
          }
        
          mysqli_close($conn);
        }
        else{
          echo "<h1>Please sign in to the site..!</h1>";

        }
        ?>

        

        </div>
        </div>

        <?php if($system_userID <= 0) {echo "<style>#btnSubmit{display:none;}</style>";}?>
        
        <div class = "container">
        <button type="submit" class="btn_sl_green" id="btnSubmit">Success</button>
        </div>

        <br><br><br><br><br><br>
        <footer>
  <div class="box_level_xl" style="background-color: rgba(0, 0, 0, 0.2); text-align: center; font-family: Arial, Helvetica, sans-serif; height:50px; padding:1px;">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>
