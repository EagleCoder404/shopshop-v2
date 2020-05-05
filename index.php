<?php
    session_start();
    include 'libraries/chocolates.php';
?>

<!--HTML boiler plate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop shop</title>
  
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
     <style media="screen">
            .figure {display: table;margin-right: auto;margin-left: auto;}
            .figure-caption {display: table-caption;caption-side: bottom;text-align: center;}
            .card{ border:none;}
    </style>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="#" class="navbar-brand">ShopShop</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Products</a>
        </div>
        <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])) {
                    echo '<a href="profile.php" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
                    echo '<a href="login/logout.php" class="nav-item nav-link">Logout</a>';
                }
                else{
                    echo '<a href="register/register.php" class="nav-item nav-link">Register</a>
                            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;';
                }
            ?>
        </div>
        <!--<form class="form-inline">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="search">
            <button type="submit" class="btn btn-light my-sm-0">Search</button>
        </form>-->
    </div>
</nav>
  
  <!--Search bar-->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <form  method="GET" action="search.php">
      <div class="text-center">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" name="search_product"><br>
            <button type="submit" class="btn btn-outline-dark my-sm-0">Search</button>
      </div>
    </form>
  </div>
</div>
  
 
<!--main card
  <div class="card m-4">
  <img class="card-img-top" src="black.png" alt="Card image top" style="height:12rem;">
  <div class="card-body text-center"> 
    <h3 class="card-title">Get Everything</h3>
    <button type="submit" class="btn btn-outline-dark">Explore</button>
  </div>
</div> -->
 
    
    
    
    <!--main card carousel-->
    <div id="main-card" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="../black.png" class="d-block w-100" alt="..." style="height:20rem;">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="../black.png" class="d-block w-100" alt="..." style="height:20rem;">
    </div>
    <div class="carousel-item">
      <img src="../black.png" class="d-block w-100" alt="..." style="height:20rem;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#main-card" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#main-card" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
    
    
    
    
    
    
    
    
    <?php
        // category for cards
        //$data = array("books","movies","sports","medicine","clothing","grocery","electronics","beauty");
          $con = getCon();
        
          $data=Array();
          $res = $con->query("select * from categories");
          while($ele = $res->fetch_assoc())
              $data[]=$ele;
          //echo "Associative array<br>"; 
          //print_r($data);
          $got = array();
          foreach($data as $dat)
          {
                $got[]=$dat['cat_name'];   
          }
          //echo "Associative array converted into normal array<br>"; 
          //print_r($got);
    ?>
    
    <br>
    <br>
 <!--Loop category-->
    <p class="display-4 text-center">Categories</p>
    <?$c=1; for($j=1;$j<=2;$j++){ ?>
    <div class="container" id="category">
    <div class="card-deck m-2">
    <? for($i=1;$i<=4;$i++){ ?> 
   <div class="card m-4">
     <figure class="figure">
       <img src="black.png" class="figure-img img-fluid rounded" alt="image">
       <figcaption class="figure-caption text-center"><a href='categories/category.php?cat_id=<?=$c;?>&&cat_name=<?=$got[$c-1];?>' class="stretched-link"><h5><?=$got[$c-1];?></h5></a></figcaption>
     </figure>
   </div> 
  <? $c++;} ?>
      </div> 
     </div>
    <? } ?>
    
    
    
    
   
  
  
<body>
    
 <!--footer-->
    <!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

  <!-- Footer Elements -->
  <div class="container">

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://shop-shop.herokuapp.com">shop-shop.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    
    
</html>
