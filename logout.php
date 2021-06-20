<?php 
session_start();
$_SESSION['regName'] = "";
$_SESSION['uid'] = ""; 
header('Location:home.php');

?>