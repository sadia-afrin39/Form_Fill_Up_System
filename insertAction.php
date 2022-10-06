<?php
include 'header.php';
?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
    
        $sql = "select * from users where email='$email' limit 1;";
        $mailcheck= $db->select($sql);
        $sql1 = "select * from users where phone='$phone' limit 1;";
        $phonecheck= $db->select($sql1);
    
          if($name == "" || $roll == ""|| $phone== ""|| $email == ""|| $session == ""|| $address == ""|| $semester == ""|| $file_name == ""){
              echo "<span class='error'>Field must not be empty!!</span>";
          } if($mailcheck != false){
                echo "<div'>Email Already Exist!!</div>";
          }if($phonecheck != false){
                echo "<div>Phone Already Exist!!</div>";
          }
            elseif ($file_size >1048567) {
             echo "<span class='error'>Image Size should be less then 1MB!
             </span>";
          } elseif (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
          } else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO students(name, roll, phone, email, session, address,currentsemester,photo) VALUES('$name','$roll','$phone','$email','$session','$address','$semester','$uploaded');";
            $inserted_rows = $db->insert($query);
            if ($inserted_rows) {
                  $sql = "Select id from students order by id desc limit 1;";
                  $getdata = $db->select($sql);
                 if($getdata){
                  while($data = $getdata->fetch_assoc()){
                      $id = $data['id'];
                      $query = "INSERT INTO users(name,email,phone,sid)
                      VALUES('$name','$email','$phone','$id');";
                      $db->insert($query);
                     header("location:index.php");
                  }
                }
             }
        }
    }
?>