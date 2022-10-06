 <?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Record</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
<?php
    if(isset($_GET['updateId'])){
    $id = mysqli_real_escape_string($db->link,$_GET['updateId']);
    $sql = "SELECT * FROM students WHERE id = ?;";
    $stmt = mysqli_stmt_init($db->link);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed";
        }else{
           mysqli_stmt_bind_param($stmt, "s", $id); 
            mysqli_stmt_execute($stmt);
        }
    $row = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_assoc($row);
?>
      
      <div class="container">
        <h2>Update Data</h2>
        <form action="UpdateAction.php?UpdateId=<?php echo $result['id'];?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" value="<?php  echo $result['name']; ?>" name="name">
          </div>
          <div class="form-group">
            <label>Roll:</label>
            <input type="text" class="form-control" value="<?php  echo $result['roll']; ?>" name="roll">
          </div>         
          <div class="form-group">
            <label>Phone:</label>
            <input type="text" class="form-control" value="<?php  echo $result['phone']; ?>" name="phone">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" value="<?php  echo $result['email']; ?>" name="email">
          </div>
            <div class="form-group">
            <label>session:</label>
            <input type="text" class="form-control" value="<?php  echo $result['session']; ?>" name="session">
          </div>
            <div class="form-group">
            <label>address:</label>
            <input type="text" class="form-control" value="<?php  echo $result['address']; ?>" name="address">
          </div>
            <div class="form-group">
            <label>current semester:</label>
             <input type="text" class="form-control" value="<?php  echo $result['currentsemester']; ?>" name="semester">
          </div>
          <div class="form-group">
            <label>Photo:</label>
            <img src="upload/<?php echo $result['photo']; ?>" height="50px" width="60px"/>
            <input type="file" name="image"/>
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </form>
      </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <?php }?>
  </body>
</html>