<?php 
include("../conn/conn.php");
$object = New DbConnection();
session_destroy();
header('location: ./login');
?>
