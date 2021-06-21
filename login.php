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
    <br>
    <?php 
            session_start();
            $system_userName = "";
            $system_userID = "";       
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

        <?php
            if(isset($_POST['log_in'])) {
                if(!empty($_POST['email']) && !empty($_POST['password'])){
                        $servername = "localhost:3306";
                        $username = "root";
                        $password = "";
                        $dbname = "wadproject";
                  
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if (!$conn) {
                          die("Connection failed: " . mysqli_connect_error());
                        }
                        
                        $sql = "SELECT `userID`,`userName`,`password` FROM `userdb` WHERE `email` = '". $_POST['email']."'";
                        $result = mysqli_query($conn, $sql);

                        $password;
                        $username = "";
                        $userID = "";



                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              
                                $password = $row["password"];
                                $username = $row["userName"];
                                $userID = $row["userID"];
                            }

                            if($password==$_POST['password']){
                                header('Location:home.php');
                                session_start();
                                $_SESSION['regName'] = $username;
                                $_SESSION['uid'] = $userID; 
                            }
                            else{
                                echo "<script>alert('Wrong password..!')</script>";
                            }

                        } 
                        
                        else {
                           echo "<script>alert('Wrong email adress..!')</script>";
                        }


                }
            }
        ?>

        <br><br><br><br><br><br><br><br><br>

        <div class="container">
            <div id="form-group">

              <form action="login.php" method="post">
                <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder = "email" required>
                </div>
                <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder = "password" required> <br><br>
                </div>
                <div class="form-group">
                <button type="Submit" class="btn btn-primary btn-lg" name="log_in">Log in</button>
                </div>
              </form>
            </div>
          </div>

        <br><br><br><br><br><br><br><br><br><br>

        

        <footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>
