<?php
require_once ('db.php');

if (isset($_GET['id']) && isset($_POST['editForm'])){
  $id = $_GET['id'];
  $name = $_POST['pname'];
  $sport = $_POST['psport'];
  $about = $_POST['about'];
  //$id2 = $_POST['id'];

  $sql = "UPDATE `aboutme` SET
          `name`='$name',
          `sport`='$sport',
          `about`='$about'
           WHERE 1";
  if ($con->query($sql) === true){
    echo "Modified the database";
    header("location: showAbout.php");
  }else{
    echo "something went wrong";
  }


}else{
  echo "invalid";
}
