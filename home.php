<!DOCtype html>
<html>
    <head>
        <title>Macro Super Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/mainStyle.css">
        <script type="text/javascript" src="javascript/mainSlideShow.js"></script>
    </head>

    <body onload="currentSlide(1)">
    <?php 
            session_start();
            $system_userName= $_SESSION['regName'];
            $system_userID;        
        ?> 
 
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar" href="image/icons/house.png"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand">Macro Super Center</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search</a></li>
                        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                        <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> <?php if($system_userName==""){ echo "User Name";} else {echo $system_userName;} ?></a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-plus-sign"></span> Sign up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

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
        <div class="row row-cols-2">


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
              /*echo "id: " . $row["itemNo"]. " - Name: " . $row["name"]. " - Unit: " . $row["unit"]. " - QTY: " . $row["qty"]. " - Unit Price: " . $row["unitprice"]. "<br>";*/
              $productID[$x] = $row["itemNo"];
              $productName[$x] = $row["name"];
              $unit[$x] = $row["unit"];
              $qty[$x] = $row["qty"];
              $price[$x] = $row["unitprice"]; ?>

              <div class="col">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="Card image cap"width="200" height="200">
                <div class="card-body">
                <h3 class="card-title"><?php echo $row["name"] ?></h3>
                  <ul>
                      <li>Quantity: <?php echo $row["qty"].$row["unit"] ?></li>
                      <li>Price: LKR. <?php echo $row["unitprice"] ?></li>
                    </ul>
                    <p>Qty: <input type="text" id="qtyBox" placeholder=""/></p>
                    <a href="#" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg> Add to cart</a>
                </div>
              </div>
              </div>
              <br>
              <br>
              <br>

            <?php }
            } else {
              echo "0 results";
            }
          }
          mysqli_close($conn);
        ?>

        </div>
        </div>


        <footer class="container-fluid text-center">
            <p>Developed By <b>tharindu_johnson</b></p>
        </footer>
    </body>
</html>