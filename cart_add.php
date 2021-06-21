<?php 
    session_start();

          $servername = "localhost:3306";
          $username = "root";
          $password = "";
          $dbname = "wadproject";
        
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          
            $sql = "SELECT MAX(`cartID`) FROM `cartdb`";
            $result = mysqli_query($conn, $sql);
          
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $setCartID = $row['MAX(`cartID`)']+1;
            }
            } else {
              echo "0 results";
            }

        $sql = "INSERT INTO `cartdb` (`cartID`, `itemID`, `userID`, `cartqty`) VALUES ('".$setCartID."', '".$_SESSION['itemNo']."', '".$_SESSION['uid']."', '".$_SESSION['cartQty']."');";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

          mysqli_close($conn);
          header('Location:home.php');
      
        ?>

