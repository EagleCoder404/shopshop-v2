<?php
  session_start();
  include '../libraries/chocolates.php';
  $cat_id = $_GET['cat_id']; 
  $cat_name = $_GET['cat_name']; 
?>

<!--HTML boiler plate-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-shop category</title>
  
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
  
  <!-- STYLE FOR ROWS AND COLUMNS-->
  <style media="screen">
            .figure {display: table;margin-right: auto;margin-left: auto;}
            .figure-caption {display: table-caption;caption-side: bottom;text-align: center;}
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="../index.php" class="navbar-brand">ShopShop</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="../index.php" class="nav-item nav-link active">Home</a>
            <a href="../about.php" class="nav-item nav-link">About</a>
            <a href="#" class="nav-item nav-link">Products</a>
        </div>
         <div class="navbar-nav ml-auto">
            <!--<a href="register/register.php" class="nav-item nav-link">Register</a>
            <a href="login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;-->
            <?php if(isset($_SESSION['user_name'])) {
                    echo '<a href="../profile.php" class="nav-item nav-link active"><i class="fa fa-user-o">  '.$_SESSION['user_name'].'</i></a>';
                    echo '<a href="../login/logout.php" class="nav-item nav-link">Logout</a>';
                }
                else{
                    echo '<a href="../register/register.php" class="nav-item nav-link">Register</a>
                            <a href="../login/login.php" class="nav-item nav-link">Login</a>&nbsp;&nbsp;';
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
    <form>
      <div class="text-center">
            <input type="text" class="form-control mr-sm-2" placeholder="Search"><br>
            <button type="submit" class="btn btn-outline-dark my-sm-0">Search</button>
      </div>
    </form>
  </div>
</div>
  
  
  
<div class="jumbotron">
  <div class="text-center">
    <?="cat_id : ".$cat_id."<br>"."cat_name : ".$cat_name?>
  </div>
  </div>
 
  
  
  <?php
    $con = getCon();
    $res = $con->query("select * from products where cat_id = '$cat_id'");
    
    $pro = Array();
    while($ele = $res->fetch_assoc())
      $pro[]=$ele;
    
    $prod_name=array();
    foreach($pro as $p)
      $prod_name[]=$p['product_name'];
    
    
    
    
    
    $n=count($prod_name);
    
  ?>
  
  
  <!--new cards -->
  <? for($j=0;$j<$n/5;$j++){ ?>
    <div class="container" id="category">
    <div class="row p-2">
    <? for($i=1;$i<=5;$i++){ ?> 
       <? $c=5*$j+$i; $if($c>$n) break; ?>
   <div class="col-md-3">
     <figure class="figure">
        <img src="/black.png" class="figure-img img-fluid rounded" alt="product">
        <figcaption class="figure-caption text-center">
            <h5 class="card-title">Product&nbsp;&nbsp;<a href="#"><i class="fa fa-heart-o"></i></a></h5>
            <p class="card-text"><? $prod_name[$c-1] ?></p>
          <a href="#" class="btn btn-dark mb-4 text-center" role="button">Buy</a>
          <!--<button type="button" class="btn btn-dark mb-4">Buy</button>-->
           </figcaption>
      </figure>
   </div> 
      </div> 
     </div>
    <? } ?>
  
  
<!--cards first code
<div class="container">
  <div class="row p-2">
  <? foreach($pro as $p) { ?>
    <div class="col-sm">
      <figure class="figure">
        <img src="/black.png" class="figure-img img-fluid rounded" alt="product">
        <figcaption class="figure-caption text-center">
            <h5 class="card-title">Product&nbsp;&nbsp;<a href="#"><i class="fa fa-heart-o"></i></a></h5>
            <p class="card-text"><?=$p['product_name']?></p>
          <a href="#" class="btn btn-dark mb-4 text-center" role="button">Buy</a>
          <!--<button type="button" class="btn btn-dark mb-4">Buy</button>-->
           </figcaption>
      </figure>
    </div>
  <? } ?>
</div>
</div>  -->
  
  
  
  
  <!--code from index.php card decks logic added
   <p class="display-4 text-center">Categories</p>
    <?$c=1; $lim=$n/4; for($j=1;$j<=$lim;$j++){ ?>
    <div class="container" id="category">
    <div class="card-deck">
    <? for($i=1;$i<=4;$i++){ ?> 
   <div class="card">
     <figure class="figure">
       <img src="../black.png" class="figure-img img-fluid rounded" alt="image">
       <figcaption class="figure-caption text-center"></figcaption>
     </figure>
   </div> 
  <? $c++;} ?>
      </div> 
     </div>
    <? } ?>
    
    
    
  
  
  <!--code from index.php card decks but logic is written
  <p class="display-4 text-center">Categories</p>
    <?$c=1; $rem=$n%4; for($j=1;$j<=1;$j++){ ?>
    <div class="container" id="category">
    <div class="card-deck">
    <? for($i=1;$i<=$rem;$i++){ ?> 
   <div class="card">
     <figure class="figure">
       <img src="../black.png" class="figure-img img-fluid rounded" alt="image">
       <figcaption class="figure-caption text-center"></figcaption>
     </figure>
   </div> 
  <? $c++;} ?>
      </div> 
     </div>
    <? } ?>-->
  
  
  
  
  
  
 
  
  
  
  
  
  
    
   
  
  
</body>
    
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
