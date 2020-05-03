<?php?>
<!--HTML boiler plate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-shop</title>
  
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
            <a href="#" class="nav-item nav-link active">Register</a>
            <a href="../login/login_seller.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;
            <!--<a href="#" class="nav-item nav-link active"><i class="fa fa-user-o"></i></a>-->
        </div>
        <!--<form class="form-inline">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="search">
            <button type="submit" class="btn btn-light my-sm-0">Search</button>
        </form>-->
    </div>
</nav>
  
  
 <div class="jumbotron">
     <div class="text-center">
        <p class="display-4">Vendor Register</p>       
     </div>
  </div>
  
  
 <!--Regsiter form-->   
  <form method="POST" action="register_details.php" class="jumbotron m-4">
     <div class="form-group">
        <label for="inputuser">Username</label>
        <input type="text" class="form-control" id="inputuser_name" placeholder="username" name="seller_user_name">
    </div>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="email" name="seller_email">
    </div>
    <!--<div class="form-group">
        <label for="inputname">Email</label>
        <input type="text" class="form-control" id="inputName" placeholder="name" name="name">
    </div>
    <div class="form-group">
        <label for="inputCity">city</label>
        <input type="text" class="form-control" id="inputCity" placeholder="city" name="city">
    </div>
    <div class="form-group">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" placeholder="state" name="state">
    </div>
    <div class="form-group">
        <label for="inputCountry">Country</label>
        <input type="text" class="form-control" id="inputCountry" placeholder="country" name="country">
    </div>-->
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="seller_password">
    </div>
    <!--<div class="form-group">
        <label class="form-check-label"><input type="checkbox"> Remember me</label>
    </div>-->
    <button type="submit" name="register_seller" class="btn btn-dark">Register</button>
</form>
    
    
 
  
  </body>
</html>
