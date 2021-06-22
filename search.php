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
        <link rel="stylesheet" href="style/search.css">
        
    </head>

    <body>
    <?php 
            session_start();
            $system_userName= $_SESSION['regName'];
            $system_userID = $_SESSION['uid'];      

            if(isset($_POST['search'])){
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
          
            $sql = 'SELECT COUNT(`itemNo`) FROM `itemsdb` WHERE `name` LIKE "%'.$_POST["searchtxt"].'%"';
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while(mysqli_fetch_assoc($result)) {
                $noOf_searchResults = $row["COUNT(`itemNo`)"];
            }
            } else {
              echo "0 results";
            }

            for($z = 0; $z < $noOf_searchResults; ++$z){
            $sql = 'SELECT `itemNo` FROM `itemsdb` WHERE `name` LIKE "%'.$_POST["searchtxt"].'%" LIMIT '.$z.',1';
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while(mysqli_fetch_assoc($result)) {
                $searchResults[$z] = $row["itemNo"];
            }
            } else {
              echo "0 results";
            }
          }
          ?>


        <div class="container">
        <div class="row row-cols-4 justify-content-center">


          <?php
          for($z = 0; $z < $noOf_searchResults; $z++){
            $sql = "SELECT `itemNo`, `name`, `image`, `unit`, `qty`, `unitprice` FROM `itemsdb` WHERE `itemNo` = ".$searchResults[$z];
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while(mysqli_fetch_assoc($result)) {
                $searchResults[$z] = $row["itemNo"];
              ?>


            <form method = "post" action = "home.php?action=search&id=<?php echo $searchResults[$z]; ?>">
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

          ?>
        </div>
        </div>
        <?php

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
 

<br><br>
<div class ="container">
<div class="main">
  <form><div class="input-group">
    <input type="text" name = "searchtxt"class="form-control" placeholder="Search">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="button" name = "search">
        <i class="fa fa-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></i>
      </button>
    </div>
    </form></div>
</div>
</div> 

        <footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>