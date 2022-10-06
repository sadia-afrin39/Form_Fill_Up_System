<?php
include 'header.php';
    if(isset($_GET['deletId'])){
    $id = mysqli_real_escape_string($db->link,$_GET['deletId']);
        
    $query = "select * from students where id = '$id';";
    $getdata = $db->select($query);
    if($getdata){
        while($delimg = $getdata->fetch_assoc()){
            $dellink = "upload/".$delimg['photo'];
            unlink($dellink);
        }
    }
    $sql1 = "DELETE FROM users WHERE sid = $id;";
    $db->delete($sql1);
        
    $sql = "DELETE FROM students WHERE id = $id;";
    $db->delete($sql);
    
   header("location:index.php");
   }
?>