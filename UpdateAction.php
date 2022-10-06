<?php include 'header.php';?>
   
        <h2>Update Record</h2>
        <?php
                
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = mysqli_real_escape_string($db->link,$_GET['UpdateId']);
                  
                $name = mysqli_real_escape_string($db->link,$_POST['name']);
                $roll = mysqli_real_escape_string($db->link,$_POST['roll']);
                $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
                $email = mysqli_real_escape_string($db->link,$_POST['email']);
                $session = mysqli_real_escape_string($db->link,$_POST['session']);
                $address = mysqli_real_escape_string($db->link,$_POST['address']);
                $semester = mysqli_real_escape_string($db->link,$_POST['semester']);

                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/". $unique_image;
                $uploaded= $unique_image;
                
                $sql = "select * from users where email='$email' and (sid != $id or sid is null) limit 1;";
                $mailcheck = $db->select($sql); 
                $sql1 = "select * from users where phone='$phone' and (sid != $id or sid is null) limit 1;";
                $phonecheck = $db->select($sql1);
                  
                  
                   if($name == "" || $roll == ""|| $phone== ""|| $email == ""|| $session == ""|| $address == ""|| $semester == ""){
                      echo "<span class='error'>Field must not be empty!!</span>";
                  }else if($mailcheck != false){
                       echo "<div'>Email Already Exist!!</div>";
                  }else if($phonecheck != false){
                        echo "<div>Phone Already Exist!!</div>";
                  }
                  else{
                        if(!empty($file_name)){
                            $query = "select * from students where id = '$id';";
                            $getdata = $db->select($query);
                            if($getdata){
                                while($delimg = $getdata->fetch_assoc()){
                                    $dellink = "upload/".$delimg['photo'];
                                    unlink($dellink);
                                }
                            }
                            if ($file_size >1048567) {
                             echo "<span class='error'>Image Size should be less then 1MB!
                             </span>";
                          } elseif (in_array($file_ext, $permited) === false) {
                             echo "<span class='error'>You can upload only:-"
                             .implode(', ', $permited)."</span>";
                          } else{
                                move_uploaded_file($file_temp, $uploaded_image);
                            $query ="UPDATE students 
                                    SET name='$name', roll='$roll', phone='$phone', email='$email', session='$session', address = '$address', currentsemester= '$semester',photo='$uploaded' 
                                    WHERE id = '$id';"; 
                            $updated_rows = $db->update($query);
                            
                            if ($updated_rows) {
                                header("location:index.php");
                            }else {
                               header("location:index.php"); 
                            }
                        }
                }else{
                      $query ="UPDATE students 
                                    SET name='$name', roll='$roll', phone='$phone', email='$email', session='$session', address = '$address', currentsemester= '$semester' 
                                    WHERE id = '$id';"; 
                        $updated_rows = $db->update($query);
                        if ($updated_rows) {
                             $query = "Update users 
                             SET name='$name',phone='$phone', email='$email' where sid = $id ;";
                          $db->update($query);
                         header("location:index.php");
                        }
                    }
                }
                  
            }
        ?>
<?php include 'footer.php'; ?>         
