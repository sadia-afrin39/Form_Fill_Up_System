<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Record</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome cdn link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
      <div class="container">
        <h2>Create New Student Record</h2>
        <form action="insertAction.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Tarin039" name="name">
          </div>
          <div class="form-group">
            <label>Roll:</label>
            <input type="text" class="form-control" placeholder="18CSE039" name="roll">
          </div>         
          <div class="form-group">
            <label>Phone:</label>
            <input type="text" class="form-control" name="phone">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email">
          </div>
            <div class="form-group">
            <label>session:</label>
            <input type="text" class="form-control" name="session">
          </div>
            <div class="form-group">
            <label>address:</label>
            <input type="text" class="form-control" name="address">
          </div>
            <div class="form-group">
            <label>current semester:</label>
             <input type="text" class="form-control" name="semester">
          </div>
          <div class="form-group">
            <label>Photo:</label>
            <input type="file" name="image" />
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>