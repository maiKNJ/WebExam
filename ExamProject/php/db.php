<?php
$server = "localhost";
$user = "root";
$pass = "";

$con = new mysqli($server, $user, $pass, "crud");

if ($con->connect_error){
  die("connection error");
}else{
  //echo "connected successfully";
}

?>
