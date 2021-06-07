<?php
  require_once ("db.php");

  $sql = "SELECT * FROM `aboutme`";

  $result = $con->query($sql);

  //second database for the images
  $msg = '';
  if (isset($_POST['upload'])){
    $image = $_FILES['image']['name'];
    $path = 'images/'.$image;

    $sql1 = $con1->query("INSERT INTO slider (image_path) VALUES ('$path')");
    if ($sql1){
      move_uploaded_file($_FILES['image']['tmp_name'], $path);
      $msg = 'image uploaded successfully';
    }else{
      $msg = 'image upload failed';
    }
  }
  $result1 = $con1->query("SELECT image_path FROM slider");
?>
<! DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.1">
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/ExamProject/css/main.css">
  <link rel="stylesheet" href="/ExamProject/css/about.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>About</title>

</head>
<body>
<!--<h1 id="indexH1">Profile</h1>-->
<div id="intro" class="bg-image shadow-2-strong">
<div class="topnav">
  <a class="active1" href="showAbout.php"> Profile</a>
  <a href="/ExamProject/availSpons.html"> Available sponsors </a>
  <a href="/ExamProject/index.html"> Home </a>

  <img src="/ExamProject/img/LOGO.PNG" style="height: 95px; width: 115px;">
  <!--<button onclick="document.getElementById('id01').style.display = 'block'"> Login</button>-->
</div>

<div class="row1">
  <?php
  if ($result->num_rows > 0): ?>
  <?php while ($row = $result->fetch_assoc()): ?>
  <div class="column left">
    <div class="card">
      <img src="/ExamProject/icon.png" alt="profile pic" style="width: 85%; height: 85%; padding: 40px 5px 5px 50px;">
      <!--<h1>Name Of Athlete</h1> -->

      <?php
            //echo "<p>". $row['id']. "</p>";
            echo "<h1 style='color: #ef6817;'>". $row['name']. "</h1>";
      ?>
      <p class="sport">Køge</p>
      <!--<p>Archery</p>-->
      <?php echo "<p style='color: white;'>". $row['sport']. "</p>"?>
      <div style="margin: 24px 0;">
        <a href="#"><i class="fa fa-twitter" style="color: white;"></i></a>
        <a href="#"><i class="fa fa-facebook" style="color: white;"></i></a>
        <a href="#"><i class="fa fa-instagram" style="color: white;"></i></a>
      </div>
      <p><a id="msgbtn" href="mailto: someone@something.net" >Message for colab</a></p>
    </div>
  </div>
      <?php echo "<a style = 'float: right; margin-right: 30px;' class ='btn btn-secondary' href='edit.php?id=" .$row['id']."'> Edit </a> ";?>
  <div class="column right">

    <!--<p>lorem ipsum bla fghjklæ  lorem ipsum collu lorem ipsum collu lorem ipsum collu lorem ipsum collu lorem ipsum collu
      lorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collu
      lorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collu
      lorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collu
    </p>-->
    <?php echo "<p style='color: whitesmoke;'>". $row['about']. "</p>" ?>
  </div>
  <?php endwhile;?>
  <?php endif; ?>


</div>
<div class="container-fluid" style="padding-top: 250px;">
  <div class="row justify-content-center mb-2">
    <div class="col-lg-10">
      <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php
          $i = 0;
          foreach ($result1 as $row):
            $actives ='';
            if ($i == 0){
              $actives = 'active';
            }

          ?>
          <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
          <?php $i++; endforeach; ?>
        </ol>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <?php
          $i = 0;
          foreach ($result1 as $row):
          $actives ='';
          if ($i == 0){
            $actives = 'active';
          }

          ?>
          <div class="carousel-item <?= $actives;?>">
            <a class="d-flex justify-content-center btn btn-light", style="background-color: rgba(0,0,0,0);" href="delete.php?op=delete&image_path=<?php echo $row['image_path'] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </a>
            <img src="<?= $row['image_path'] ?>" width="100%" height="400px">
          </div>
          <?php $i++; endforeach; ?>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-4 bg-dark rounded px-4">
      <h4 class="text-center text-light p-1">Select image to upload</h4>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="file" name="image" class="form-control p-1" required>
        </div>
        <div class="form-group">
          <input type="submit" name="upload" class="btn btn-warning btn-block" value="Upload Image">
        </div>
        <div class="form-group">
          <h5 class="text-center text-light"><?= $msg; ?> </h5>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
