<?php session_start(); 
if (!isset($_SESSION["userName"]))
{
	header('Location:login.html');

}
?>

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

        <br><br>
        <br><br>



        <footer class="container-fluid text-center">
            <p>Developed By <b>tharindu_johnson</b></p>
        </footer>
    </body>
</html>