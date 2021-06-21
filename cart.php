<!DOCtype html>
<html>
    <head>
        <title>Macro Super Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style/mainStyle.css">
        <script type="text/javascript" src="javascript/mainSlideShow.js"></script>
    </head>

    <body onload="currentSlide(1)">

    <?php 
            session_start();
            $system_userName= $_SESSION['regName'];
            $system_userID = $_SESSION['uid'];

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
          <li class="nav-item">
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

<br><br><br><br>


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

              <form method = "post" action = "cart.php?action=delete&id=<?php echo $productID[$x]; ?>">
            <div class="col">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="Card image cap"width="200" height="200">
              <div class="card-body">
              <h3 class="card-title"><?php echo $row["name"]; ?></h3>
                <ul>
                    <li>CartID: <?php echo $row["cartID"]; ?></li>
                    <li>Quantity: <?php echo $row["cartqty"].$row["unit"]; ?></li>
                    <li>Price: LKR. <?php echo $row["unitprice"]*$row["cartqty"]; ?></li>
                  </ul>
                  <input type="hidden" name= "cart_id" value="<?php echo $row['cartID'];?>"> 

                  <input type="submit" class="btn btn-danger" name = "delete" value = "Delete">
                  
              </div>
            </div>  
            </div>
            <br>
            <br>
            <br>
            </form>



            <?php }
            } else {
              echo "0 results";
            }
          }
          mysqli_close($conn);
        ?>

        

        </div>
        </div>

        <div class = "container">
        <button type="button" class="btn btn-success">Success</button>
        </div>

        <br><br><br><br><br><br>
        <footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>
