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
        <link rel="stylesheet" href="style/table.css">
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
                <li class="li_left"><a class="ad">Macro Super Center</a></li>
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


        <br><br>
        <br><br>

        <?php if($system_type == "Seller" || $system_type == "Admin"){  ?>

<div class="box_level_xs">
<form>
<div class="row">
    <div style="text-align: center;">
    <h1><i>Hi <?php echo $system_userName ?>.</i></h1>
    </div>
  </div>

<br>
  <div class="row">
    <div class="column2">
    <a href="sellerhub/sh_InsertNewItem.php">
    <input type="button" class="btn_sl_green" value="Insert New Item">
    </a>
    </div>
    <div class="column2">
    <a href="sellerhub/sh_UpdatePrice.php">
    <input type="button" class="btn_sl_gray" value="Update Price">
    </a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="column3">
    <a href="sellerhub/sh_AddNewStock.php">
    <input type="button" class="btn_sl_blue" value="Add New Stock">
    </a>
    </div>
    <div class="column3">
    <a href="sellerhub/sh_RemoveStock.php">
    <input type="button" class="btn_sl_yellow" value="Remove Stock">
    </a>
    </div>
    <div class="column3">
    <a href="sellerhub/sh_DeleteItem.php">
    <input type="button" class="btn_sl_red" value="Delete Items">
    </a>
    </div>
  </div>
  </form>
</div>

        <?php
            $servername = "localhost:3306";
            $username = "root";
            $password = "";
            $dbname = "wadproject";
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT COUNT(`itemNo`) FROM `itemsdb`";
            $result = mysqli_query($conn, $sql);
            $itemCount = 0;

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $itemCount = $row["COUNT(`itemNo`)"];
              }
            } else {
              echo "0 results";
            }
            
            $sql = "SELECT `itemNo` FROM `itemsdb` ";
            $result = mysqli_query($conn, $sql);
            $itemNumArray;

            for($i = 0; $i < $itemCount; $i++){
              $sql = "SELECT `itemNo` FROM `itemsdb` LIMIT ".$i.",1";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $itemNumArray[$i] = $row["itemNo"];
                }
              }
              else {
                echo "0 results";
              }
            }
            mysqli_close($conn);
        ?>
<br><br>
	<div class="box_level">
    <form>
		<table id="customers">
			<thead>
				<tr class="green_field">
					<th><b>Item ID</b></th>
					<th><b>Name</b></th>
					<th><b>Qty</b></th>
					<th><b>Unit</b></th>
					<th><b>Unit Price (LKR.)</b></th>
				</tr>
			</thead>
      <br>
			<tfoot>

<?php
          $servername = "localhost:3306";
          $username = "root";
          $password = "";
          $dbname = "wadproject";
        
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          
          for($x = 0; $x < $itemCount; $x++){
            $sql = "SELECT `itemNo`, `name`, `unit`, `qty`, `unitprice` FROM `itemsdb` LIMIT ".$x.",1";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {  ?>

				<tr>
					<th><?php echo $row["itemNo"]; ?></th>
					<th><?php echo $row["name"]; ?></th>
					<th><?php echo $row["qty"]; ?></th>
					<th><?php echo $row["unit"]; ?></th>
					<th>LKR. <?php echo $row["unitprice"]; ?>.00</th>
				</tr>

              <?php
            }
            
            } else {
              echo "0 results";
            }
          }
          mysqli_close($conn);
        ?>



			</tfoot>
		</table>
    </form>
	</div>

<?php } else { ?>
<br><br><br><br><br><br><br>
<div class="container d-flex justify-content-center">
<form>
<div class="row">
    <div class="col d-flex justify-content-around">
    <h1><i>Sorry <?php echo $system_userName ?>. You are not a <b>Seller</b>.</i></h1>
    </div>
  </div>
  </form>
  </div>
  <br><br><br><br><br><br><br><br><br><br>


<?php } ?>


<br><br>
<br><br>
<footer>
  <div class="box_level_xl" style="background-color: rgba(0, 0, 0, 0.2); text-align: center; font-family: Arial, Helvetica, sans-serif; height:50px; padding:1px;">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>