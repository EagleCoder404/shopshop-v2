<?php
  
  session_start();
  include '../libraries/chocolates.php';
  $con = getCon();  

  $product_id=$_GET['product_id'];
  $user=$_SESSION['user_name'];
  
  if(isset($_SESSION['user_name']))
  {
      if($con->query("insert into wish(usern,prod) values('$user','$product_id')")===True)
      {
        header("Location:product_description.php");
        die();
      }
      else
        echo $con->error;
  }
    
?>
