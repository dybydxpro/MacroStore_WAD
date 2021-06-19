<?php
    $q = $_REQUEST["i"];
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "wadproject";
        
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        
    $sql = "SELECT `itemNo`, `name`, `image`, `unit`, `qty`, `unitprice` FROM `itemsdb`WHERE `itemNo`=".$q;
    $result = mysqli_query($conn, $sql);
        
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["itemNo"]. " - Name: " . $row["name"]. " - Unit: " . $row["unit"]. " - QTY: " . $row["qty"]. " - Unit Price: " . $row["unitprice"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
?>