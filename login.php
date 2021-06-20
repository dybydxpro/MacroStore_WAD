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
                        $userID;



                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              
                                $password = $row["password"];
                                $username = $row["userName"];
                                $userID = $row["userID"];
                            }

                            if($password==$_POST['password']){
                                header('Location:home.php');
                                $system_userName = $username;
                                $system_userID = $userID;
                                session_start();
                                $_SESSION['regName'] = $username;
                                echo "<a href='home.php'><a>";
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

        <br><br><br><br><br><br><br><br><br><br><br><br>

        <div class="container">
            <div id="form-group">

              <form action="login.php" method="post">
                <div class="form-group">
                <input type="text" id="email" name="email" placeholder = "email" required>
                </div>
                <div class="form-group">
                <input type="password" id="password" name="password" placeholder = "password" required> <br><br>
                </div>
                <div class="form-group">
                <button type="Submit" class="btn btn-primary" name="log_in">Log in</button>
                </div>
              </form>
            </div>
          </div>

        <br><br><br><br><br><br><br><br><br><br><br><br>

        

          <footer class="container-fluid text-center">
            <p>Developed By <b>tharindu_johnson</b></p>
        </footer>
    </body>
</html>
