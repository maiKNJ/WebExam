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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="/ExamProject/css/main.css">
  <link rel="stylesheet" href="/ExamProject/css/about.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>About</title>

</head>
<body>
<!--<h1 id="indexH1">Profile</h1>-->
<div id="intro" class="bg-image shadow-2-strong">
<div class="topnav">
  <a href="/ExamProject/index.html"> Home </a>
  <a href="/ExamProject/availSpons.html"> Available sponsors </a>
  <a class="active1" href="showAbout.php"> About</a>

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
            echo "<p>". $row['id']. "</p>";
            echo "<h1>". $row['name']. "</h1>";
      ?>
      <p class="sport">Køge</p>
      <!--<p>Archery</p>-->
      <?php echo "<p>". $row['sport']. "</p>"?>
      <div style="margin: 24px 0;">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
      </div>
      <p><button id="msgbtn" >Message for colab</button></p>
    </div>
  </div>
  <div class="column right">
    <?php echo "<a class ='btn btn-secondary' href='edit.php?id=" .$row['id']."'> Edit </a> ";?>
    <!--<p>lorem ipsum bla fghjklæ  lorem ipsum collu lorem ipsum collu lorem ipsum collu lorem ipsum collu lorem ipsum collu
      lorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collu
      lorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collu
      lorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collulorem ipsum collu
    </p>-->
    <?php echo "<p>". $row['about']. "</p>" ?>
  </div>
  <?php endwhile;?>
  <?php endif; ?>


</div>
<div class="container-fluid" style="padding-top: 250px;">
  <div class="row justify-content-center mb-2">
    <div class="col-lg-10">
      <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
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
        </ul>

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
