<?php

  //including for calling useful functions 
  include '../libraries/chocolates.php';

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
  if(($con->query("insert into user(user_name,email,password) values('$u','$e','$p');"))===True)
    echo "YES";
  else
    echo $con->error;

?>
