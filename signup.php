<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style/userStyle.css">

    </head>

    <body>
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
                        <li><a href="signup.php"><span class="glyphicon glyphicon-plus-sign"></span> Sign up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<div class="container">
<form action="signup.php" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Name:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">NIC Number:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="idno">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">E-mail:</label><br>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="email">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Password:</label><br>
    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="" name="password">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Verify Password:</label><br>
    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="" name="vpassword">
  </div>
  <div class="form-group">
  <button type="Submit" class="btn btn-primary" name="sign_up">Submit</button>
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

          <footer class="container-fluid text-center">
            <p>Developed By <b>tharindu_johnson</b></p>
        </footer>
    </body>
</html>
