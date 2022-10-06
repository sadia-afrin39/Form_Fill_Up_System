<?php
	  include 'inc/Database.php';
    include "inc/Session.php";
    include "inc/Format.php";
    include "inc/config.php";
    Session::checkSession();
    $db = new Database();
?>
 <?php 
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSE Family</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font Awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="css/styleformfillup.css">
    <style>
      .black{
          background-color: #000000;
          color: #ffffff;
      }
    </style>
  </head>
  <body>
 
      <div style="float:right;font-size:20px">
          Hello <?php echo Session::get('username'); ?>
         <a href="?action=logout">Logout</a>
      </div>