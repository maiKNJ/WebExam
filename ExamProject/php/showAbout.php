<?php
  require_once ("db.php");

  $sql = "SELECT * FROM `aboutme`";

  $result = $con->query($sql);

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
<h1 id="indexH1">Profile</h1>

<div class="topnav">
  <a href="index.html"> Home </a>
  <a href="availSpons.html"> Available sponsors </a>
  <a class="active" href="about.html"> About</a>
  <button onclick="document.getElementById('id01').style.display = 'block'"> Login</button>
</div>

<div class="row">
  <?php
  if ($result->num_rows > 0): ?>
  <?php while ($row = $result->fetch_assoc()): ?>
  <div class="column left">
    <div class="card">
      <img src="/ExamProject/icon.png" alt="profile pic">
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



</body>
