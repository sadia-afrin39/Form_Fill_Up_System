<?php
include 'header.php';
    if(isset($_GET['submitId'])){
    $id = mysqli_real_escape_string($db->link,$_GET['submitId']);
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $roll= mysqli_real_escape_string($db->link,$_POST['roll']);
    $session = mysqli_real_escape_string($db->link,$_POST['session']);
    $semester = mysqli_real_escape_string($db->link,$_POST['semester']);
        
    $query = "INSERT INTO formfillup(name,roll,session,semester,sid) VALUES('$name','$roll','$session','$semester','$id');";
    $data = $db->insert($query);
?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="css/styleformfillup.css">
    </head>
    <body>   
        <?php if($data){ ?>
            <div class="back">
              <div class="container2">
                  <h5>You have successfully completed your registration</h5>
                  <h2><u><center>Your Info</center></u></h2><br><br>    
                  
                  <form action="" method="">
                      <label>Name:</label>
                      <input type="text" value="<?php echo $name?>" readonly/>
                      <label>Roll:</label>
                      <input type="text" value="<?php echo $roll?>" readonly/>
                      <label>Session:</label>
                      <input type="text" value="<?php echo $session?>" readonly/>
                      <label>Semester:</label>
                      <input type="text" value="<?php echo $semester?>" readonly/>
                      <label>Courses:</label>
                      <?php
                            $host   = DB_HOST;
                            $user   = DB_USER;
                            $pass   = DB_PASS;
                            $dbname = DB_NAME;
                            $dsn = 'mysql:host='. $host .';dbname='. $dbname;
                            //create a PDO instance
                            $pdo = new PDO($dsn,$user,$pass);
                            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);  //set default fetch mode as object
                            $sql = 'SELECT * FROM courses WHERE semester = ?';
                            $stmt =  $pdo->prepare($sql);
                            $stmt->execute([$semester]);
                            $posts = $stmt->fetchAll();
                            foreach($posts as $post){
                                echo $post->coursename.'<br>';
                            }
                      ?>
                  </form>
              </div>
            </div>
        <?php } ?>
    </body>
</html>
<?php } ?>