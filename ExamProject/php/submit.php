<?php
require_once('db.php');

if (isset($_POST['submitForm'])){
  $name = $_POST['pname'];
  $sport = $_POST['psport'];
  $about = $_POST['about'];

  $sql = "INSERT INTO `aboutme`( `name`, `sport`, `about`)
          VALUES ('$name','$sport','$about')";
  //echo $sql;
 if ($con->query($sql) == true){
   echo "Added to database";
 }else{
   echo "something went wrong";
  }
}else{
  echo "no submit";
}




?>
