<?php

  //including for calling useful functions 
  include '../libraries/chocolates.php';
  if(isset($_POST['register_user'])){
  //to get connection from db
  $con=getCon();

  //getting username and password from regsiter.php
  $u = $_POST['user_name'];
  $e = $_POST['email'];
  //$n = $_POST['name'];
  $p = $_POST['password'];
  /*$city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];*/
  $p = password_hash($p,PASSWORD_DEFAULT);


  //checking if query is valid if yes then yes else respective error will be displayed
  if(($con->query("insert into user(user_name,email,password) values('$u','$e','$p');"))===True){
     //echo "YES";
      header("Location:../login/login.php");
      die();
  }
  else
    echo $con->error;
  }


  if(isset($_POST['register_seller'])){
  //to get connection from db
  $con=getCon();

  //getting username and password from regsiter.php
  $s_u = $_POST['seller_user_name'];
  $s_e = $_POST['seller_email'];
  //$n = $_POST['name'];
  $s_p = $_POST['seller_password'];
  /*$city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];*/
  $s_p = password_hash($p,PASSWORD_DEFAULT);


  //checking if query is valid if yes then yes else respective error will be displayed
  if(($con->query("insert into seller(seller_user_name,seller_email,password) values('$s_u','$s_e','$s_p');"))===True){
     //echo "YES";
      header("Location:../login/login.php");
      die();
  }
  else
    echo $con->error;
  }
  
?>
