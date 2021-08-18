<!DOCTYPE html>
<html>
    <head>
        <title>Sign up</title>
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

<br><br><br><br><br>

<div class="box_level_xs">
<form action="signup.php" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Name:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">NIC Number:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="nicNo" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">E-mail:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="email" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Password:</label><br>
    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="" name="password" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Verify Password:</label><br>
    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="" name="vpassword" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Account type:</label><br>
    <div class="input-group">
    <select class="form-select" id="formGroupExampleInput" name="accountType" aria-label="Example select with button addon" required>
      <option value="Buyer">Buyer</option>
      <option value="Seller">Seller</option>
    </select>
  </div>
  </div>
  <div class="form-group">
  <br>
  <button type="Submit" class="btn btn-primary btn-lg" name="sign_up">Submit</button>
  </div>
</form>
</div>

<?php
            if(isset($_POST['sign_up'])) {
              if(!empty($_POST['name']) && !empty($_POST['nicNo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['vpassword'])){
                $name = $_POST['name'];
                $nicNo = $_POST['nicNo'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $vpassword = $_POST['vpassword'];
                $accountType = $_POST['accountType'];

                if($password==$vpassword){
                  $servername = "localhost:3306";
                  $username = "root";
                  $password = "";
                  $dbname = "wadproject";
            
                  $conn = mysqli_connect($servername, $username, $password, $dbname);
                  if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                  }


                  $sql = "SELECT COUNT(`userID`) FROM `userdb`";
                  $result = mysqli_query($conn, $sql);
                  $itemCount = 0;

                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $itemCount = $row["COUNT(`userID`)"];
                    }
                  } else {
                    echo "0 results";
                  }


                  $sql = "SELECT `userID` FROM `userdb` ";
                  $result = mysqli_query($conn, $sql);
                  $userIDArray;

                  for($i = 0; $i < $itemCount; $i++){
                    $sql = "SELECT `userID` FROM `userdb` LIMIT ".$i.",1";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                        $userIDArray[$i] = $row["userID"];
                      }
                    }
                    else {
                      echo "0 results";
                    }
                  }


                  $sql = "SELECT MAX(`userID`) FROM `userdb`";
                  $result = mysqli_query($conn, $sql);
                  $itemCount = 0;

                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $id = $row["MAX(`userID`)"]+1;
                    }
                  } else {
                    echo "0 results";
                  }


                    $sql = "INSERT INTO `userdb` (`userID`,`userName`,`nicNo`, `email`, `password`, `type`) VALUES ('".$id."', '".$name."', '".$nicNo."', '".$email."', '".$vpassword."', '".$accountType."');";
                    if (mysqli_query($conn, $sql)) {
                      echo '<script>window.alert("New record created successfully")</script>';
                    } else {
                      $txt ="Error: " . $sql . "<br>" . mysqli_error($conn);
                      echo '<script>window.alert("<?php echo $txt ?>")</script>';
                    }
                  

                  mysqli_close($conn);

                }
                else{
                  echo '<script>alert("Password not match...!")</script>';
                }
              }
              else{
                echo '<script>alert("Fill all!")</script>';
              }
            }
        ?>

          <br><br><br><br><br><br><br>

          <footer>
  <div class="box_level_xl" style="background-color: rgba(0, 0, 0, 0.2); text-align: center; font-family: Arial, Helvetica, sans-serif; height:50px; padding:1px;">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>
