<! DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.1">
  <title>Edit profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <div class="jumbotron">
    <h1 class="text-center"> Edit profile </h1>
  </div>

  <div class="container2">
    <div class="row2">
      <div class="col-md-6 offset-md-3 col-sm-12">
        <form action="submit.php" method="post">
          <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" class="form-control" name="pname" id="name">
          </div>
          <div class="form-group">
            <label for="sport"> Sport</label>
            <input type="text" class="form-control" name="psport" id="sport">
          </div>
          <div class="form-group">
            <label for="about"> About</label>
           <textarea class="form-control" name="about" id="about" cols="30" rows="10"></textarea>
          </div>
          <input type="submit" name="submitForm" value="submit" class="btn btn-primary btn-block">
        </form>
      </div>
    </div>
  </div>

</body>
</html>
