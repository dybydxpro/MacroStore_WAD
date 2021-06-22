<!DOCtype html>
<html>
    <head>
        <title>Macro Super Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"></script>
    </head>

    <body>
<br><br>
    <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand">Macro Seller Hub</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="sh_InsertNewItem.php">Insert New Item</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sh_UpdatePrice.php">Update Price</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sh_AddNewStock.php">Add New Stock</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sh_RemoveStock.php">Remove Stock</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sh_DeleteItem.php">Delete Items</a>
          </li>
        </ul>
        <form class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/../WAD Final ProX/sellerhub.php">Seller hub</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/../WAD Final ProX/home.php">Home</a>
          </li>
          </ul>
        </form>
      </div>
    </div>
  </nav>
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

	<div class="container">
    <form>
		<table class="table text-center">
			<thead>
				<tr>
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
        <footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  <p>Developed By <b>tharindu_johnson</b></p>
  </div>
</footer>
    </body>
</html>