<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/objects.css">
        <link rel="stylesheet" href="style/slideshow.css">
        <script type="text/javascript" src="javascript/mainSlideShow.js"></script>
    </head>

    <body>
    <br>
    <?php 
            session_start();
            $system_userName = "";
            $system_userID = "";
            $system_type = "";       
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
                        
                        $sql = "SELECT `userID`,`userName`,`password`,`type` FROM `userdb` WHERE `email` = '". $_POST['email']."'";
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
                                $stype = $row["type"];
                            }

                            if($password==$_POST['password']){
                                header('Location:home.php');
                                session_start();
                                $_SESSION['regName'] = $username;
                                $_SESSION['uid'] = $userID;
                                $_SESSION['stype'] = $stype;
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

        

        <footer>
  <div class="box_level_xl" style="background-color: rgba(0, 0, 0, 0.2); text-align: center; font-family: Arial, Helvetica, sans-serif; height:50px; padding:1px;">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>
