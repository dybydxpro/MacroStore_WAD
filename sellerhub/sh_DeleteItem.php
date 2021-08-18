<!DOCtype html>
<html>
    <head>
        <title>Macro Super Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../style/shub_header.css">
        <link rel="stylesheet" href="../style/shub_objects.css">
        <link rel="stylesheet" href="../style/table.css">
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
                <li class="li_left"><a class="ad" href="sh_InsertNewItem.php">Insert New Item</a></li>
                <li class="li_left"><a class="ad" href="sh_UpdatePrice.php">Update Price</a></li>
                <li class="li_left"><a class="ad" href="sh_AddNewStock.php">Add New Stock</a></li>
                <li class="li_left"><a class="ad" href="sh_RemoveStock.php">Remove Stock</a></li>
                <li class="li_left"><a class="ad" href="sh_DeleteItem.php">Delete Items</a></li>
                
                <li class="li_right"><a class="ad" href="/../MacroStore_WAD/sellerhub.php">Seller Hub</a></li>
                <li class="li_right"><a class="ad" href="/../MacroStore_WAD/home.php">Home</a></li>
                <li class="li_right"><b class="ad"><i><?php if($system_userName==""){ echo "";} else {echo $system_userName;} ?><i></b></li>
            </ul>
        </td>
    </tr>
  </div>
</header>

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

  <br><br>
<br><br>
<footer>
  <div class="box_level_xl" style="background-color: rgba(0, 0, 0, 0.2); text-align: center; font-family: Arial, Helvetica, sans-serif; height:50px; padding:1px;">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>