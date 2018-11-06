<?php   
session_start();
include '../connection.php';
session_destroy();
header("location:../Admin.php"); 
exit();
$db->close();
?>