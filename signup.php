<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"></script>
        <link rel="stylesheet" href="style/userStyle.css">

    </head>

    <body>

    <?php 
            session_start();
            $system_userName= $_SESSION['regName'];
            $system_userID = $_SESSION['uid'];         
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

<br><br><br><br><br>

<div class="container">
<form action="signup.php" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Name:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">NIC Number:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="idno" required>
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
  <button type="Submit" class="btn btn-primary btn-lg" name="sign_up">Submit</button>
  </div>
</form>
</div>

<?php
            if(isset($_POST['sign_up'])) {
              if(!empty($_POST['name'])&&!empty($_POST['idno'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['vpassword'])){
                $id=0;
                $name = $_POST['name'];
                $idNo = $_POST['idno'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $vpassword = $_POST['vpassword'];

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


                    $sql = "INSERT INTO `userdb` (`userID`, `userName`, `email`, `password`, `type`) VALUES ('".$id."', '".$name."', '".$email."', '".$vpassword."', 'user');";
                    if (mysqli_query($conn, $sql)) {
                      echo '<script>alert("New record created successfully")</script>';
                    } else {
                      $txt ="Error: " . $sql . "<br>" . mysqli_error($conn);
                      echo '<script>alert("<?php echo $txt ?>")</script>';
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

          <footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>
