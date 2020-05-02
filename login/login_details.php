<?php

  session_start();
  //including for calling useful functions 
  include '../libraries/chocolates.php';

  $user_name = $_POST['user_name'];
  $password = $_POST['password'];


function check_password($user_name,$password)
{
    
  $con = getCon();
    
  $user = $con->query("select * from user where user_name='$user_name';");
  $res = $user->fetch_assoc();
  
  echo var_dump($res)."<br>";
  
  $password_hash=$res['password'];
    
  if(password_verify($password,$password_hash)){
    echo "password verified<br>";
    return True;
  }
  else{
    echo "password not verified<br>";
    return False;
  }
}


if(rowExists('user','user_name',$user_name)){
    if(check_password($user_name,$password)){
        //echo "Yes";
        if(isset($_SESSION('root')))
        {
          header("Location:admin.php");
          die();
        }
      else{
        $_SESSION['user_name']=$user_name;
        header("Location:../index.php");
        die();
      }
    }
    else{
        echo "no2 [password wrong]";
    }
}
else{
    //echo "no1 [user doesn't exist]";
    header("Location:../register/register.php");
    die();
}
  

?>
