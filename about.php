<!DOCtype html>
<html>
    <head>
        <title>Macro Super Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/objects.css">
        <link rel="stylesheet" href="style/slideshow.css">
        <link rel="stylesheet" href="style/about.css">
        <script type="text/javascript" src="javascript/mainSlideShow.js"></script>
    </head>

    <body onload="currentSlide(1)">
 
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

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!--<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://scontent.fcmb3-1.fna.fbcdn.net/v/t1.6435-0/s640x640/120202702_1506666032864309_808370040049715940_n.jpg?_nc_cat=110&ccb=1-3&_nc_sid=174925&_nc_ohc=dy9EE4vI4M8AX_vpZhz&_nc_ht=scontent.fcmb3-1.fna&tp=7&oh=0eed688e1f9c370805e2aaaa021e3257&oe=60D5D0D5" width ="150px" height="150px" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">K.D. Tharindu Theekshana Dayananad</h6>
                                <p>IT20750206</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">it20750206@my.sliit.lk</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">+(94) 77 920 00 39</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Subject</p>
                                        <h6 class="text-muted f-w-400">Web Application Development</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Lecture In-charge</p>
                                        <h6 class="text-muted f-w-400">Dr. Gayana Fernando</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Download</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="https://github.com/venom0039/MacroStore_WAD.git" class="m-b-10 f-w-600">github repository</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="wrapper">
    <div class="left">
        <img src="images/dp.jpg" alt="user" width="170">
        <h4 class="name">IT20750206</h4>
         <p>Software Developer</p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Tharindu T. Dayananda</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p>tharindutd1998@gmail.com</p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p>+94 77 92 00 039</p>
              </div>
            </div>
        </div>
      
      <div class="projects">
            <h3>Projects</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Subject</h4>
                    <p>Web Application Development</p>
                 </div>
                 <div class="data">
                   <h4>Lecture In-charge</h4>
                    <p>Dr. Gayana Fernando</p>
              </div>
            </div>
        </div>
      
        <div class="social_media">
            <ul>
              <li><a href="#"><img src="images/icon/facebook.png" alt="user" width="50"></a></li>
              <li><a href="#"><img src="images/icon/instagram.png" alt="user" width="50"></a></li>
              <li><a href="#"><img src="images/icon/github.png" alt="user" width="50"></a></li>
          </ul>
      </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



<footer>
  <div class="box_level_xl" style="background-color: rgba(0, 0, 0, 0.2); text-align: center; font-family: Arial, Helvetica, sans-serif; height:50px; padding:1px;">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>