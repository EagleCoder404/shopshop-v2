<?php

    session_start();
    include '../libraries/chocolates.php';

   
?>

<!--HTML boiler plate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
  
    <!--bootstrap link-->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!--font awesome-->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!--bootstrap js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
     <!-- Compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->

    <!-- Compiled and minified JavaScript -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="../index.php" class="navbar-brand">ShopShop</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="../index.php" class="nav-item nav-link">Home</a>
            <a href="../about.php" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Products</a>
        </div>
        <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])){
                    echo '<a href="#" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
                    echo '<a href="logout.php" class="nav-item nav-link">Logout</a>';
                }
                else{
                    echo '<a href="register/register.php" class="nav-item nav-link">Register</a>
                            <a href="login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;';
                }
            ?>
        </div>
        <!--<form class="form-inline">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="search">
            <button type="submit" class="btn btn-light my-sm-0">Search</button>
        </form>-->
    </div>
</nav>
    
    
  <!--Enter data into categories-->
    <div class="jumbotron">
        <div class="text-center">
            <a href="admin_display.php"><button type="button" class="btn btn-dark">Display</button></a>
        </div>
    </div>
    
    
    
    <!--Show me Data-->
    <!--<form class="jumbotron m-4" method="POST" action="">
     <div class="form-group">
        <label for="inputtable">Show me data of table entered</label>
        <input type="text" class="form-control" id="inputtable" placeholder="tablename" name="table">
    </div>
    <button type="submit" class="btn btn-dark">Sure!</button>
    </form>-->
    
 
    
    <!--categories-->
    <form class="jumbotron m-4" method="POST" action="admin_verify.php">
     <div class="form-group">
        <label for="inputcat_id">category id</label>
        <input type="number" min="1" class="form-control" id="inputcat_id" placeholder="categoryid" name="cat_id" required>
    </div>
    <div class="form-group">
        <label for="inputcat_name">category name</label>
        <input type="text" class="form-control" id="inputcat_name" placeholder="categoryname" name="cat_name" required>
    </div>
    <button type="submit" name="categories_submit" class="btn btn-dark">Sure!</button>
    </form>
    
            
                                             
     <!--Sub_categories-->                                         
     <form class="jumbotron m-4" method="POST" action="admin_verify.php">
     <div class="form-group">
        <label for="inputsub_cat_id">Sub category id</label>
        <input type="number" min="1" class="form-control" id="inputsub_cat_id" placeholder="subcategoryid" name="sub_cat_id" required>
    </div>
    <div class="form-group">
        <label for="inputsub_cat_name">Sub category name</label>
        <input type="text" class="form-control" id="inputsub_cat_name" placeholder="subcategoryname" name="sub_cat_name" required>
    </div>
    <div class="form-group">
        <label for="inputcat_id">category id</label>
        <input type="number" min="1" class="form-control" id="inputcat_id" placeholder="categoryid" name="s_cat_id" required>
    </div>
    
    <button type="submit" name="sub_categories_submit" class="btn btn-dark">Sure!</button>
    </form>                                        
                                              
    
                                              
                                              
                                              
    </body>
</html>
