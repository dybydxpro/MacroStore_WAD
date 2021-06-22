<?php 
session_start();
$_SESSION['regName'] = "";
$_SESSION['uid'] = "";
$_SESSION['stype'] = "";
header('Location:home.php');

?>