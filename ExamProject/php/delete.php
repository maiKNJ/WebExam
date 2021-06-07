<?php
require_once ('db.php');

if ($_GET['op'] == "delete"){
  $del_img = $_GET['image_path'];
  $query = "DELETE FROM `slider` WHERE image_path = '$del_img' ";
  $result = mysqli_query($con1, $query);
  if ($result){
    ?>
    <script>
      alert('the image has been deleted');
      window.location.href = 'showAbout.php?deleted';
    </script>
<?php
    unlink("images/$del_img");
  }else{
    ?>
  <script>
    alert('the image has not yet been deleted');
    window.location.href = 'showAbout.php?error';
  </script>
<?php
  }
}
