<!DOCtype html>
<html>
    <head>
        <title>Macro Super Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"></script>
        <link rel="stylesheet" href="style/mainStyle.css">
        <script type="text/javascript" src="javascript/mainSlideShow.js"></script>
    </head>

    <body onload="currentSlide(1)">
    <?php 
            session_start();
            $system_userName= $_SESSION['regName'];
            $system_userID = $_SESSION['uid'];      

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
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">Macro Super Center</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="search.php">Search</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="cart.php">Cart</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sellerhub.php">Seller hub</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="about.php">About</a>
          </li>
        </ul>
        <form class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item dropdown">
          <a class="nav-link" aria-current="page" href="logout.php"><?php if($system_userName==""){ echo "";} else {echo $system_userName;} ?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="signup.php">Sign up</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="login.php">Log in</a>
          </li>
          </ul>
        </form>
      </div>
    </div>
  </nav>
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
            
              <form method = "post" action = "home.php?action=add&id=<?php echo $productID[$x]; ?>">
            <div class="col">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="Card image cap"width="200" height="200">
              <div class="card-body">
              <h3 class="card-title"><?php echo $row["name"]; ?></h3>
                <ul>
                    <li>Item No: <?php echo $row["itemNo"] ?></li>
                    <li>Quantity: <?php echo $row["qty"].$row["unit"]; ?></li>
                    <li>Price: LKR. <?php echo $row["unitprice"]; ?></li>
                  </ul>
                  <input type="hidden" name= "product_id" value="<?php echo $row['itemNo'];?>"> 

                  <p>Qty: <input type="text" id="qtyBox" name ="qtyBox" placeholder="<?php echo $row["qty"]; ?>" required/></p>
                  <input type="submit" class="btn btn-primary" name = "add" value = "Add to cart">
                  
              </div>
            </div>  
            </div>
            <br>
            <br>
            <br>
            </form>

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


<footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>