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
    <title>Search</title>
  
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
    <a href="index.php" class="navbar-brand">ShopShop</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link active">Home</a>
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
            <input type="text" class="form-control mr-sm-2" placeholder="Search" name="search_product" required><br>
            <button type="submit" class="btn btn-outline-dark my-sm-0">Search</button>
      </div>
    </form>
  </div>
</div>
  
  
  
  
  <?php
    
    
    
    $con = getCon();
  
     $search_prod = mysqli_real_escape_string($con,$_GET['search_product']);
    $res = $con->query("select * from products where product_name like '%$search_prod%' or product_brand like '%$search_prod%' or product_description like '%$search_prod%'");
    
    $pro = Array();
    while($ele = $res->fetch_assoc())
      $pro[]=$ele;
    
    $prod_id=array();
    foreach($pro as $p)
      $prod_id[]=$p['product_id'];
      $n=count($prod_id);
    
    $prod_name=array();
    foreach($pro as $p)
      $prod_name[]=$p['product_name'];
    
    $prod_price=array();
    foreach($pro as $p)
      $prod_price[]=$p['product_price'];
    
    $prod_rating=array();
    foreach($pro as $p)
      $prod_rating[]=$p['rating'];
    
    $prod_description=array();
    foreach($pro as $p)
      $prod_description[]=$p['product_description'];
   
    //Min price array
    $min_price=array();
    for($i=0;$i<$n;$i++)
    {
      $res1 = $con->query("select min(price) from unique_product where product_id= '$prod_id[$i]'");
      while($ele1 = $res1->fetch_assoc())
      $min_price[]=$ele1["min(price)"];
    }
    print_r($prod_name);
  
  ?>
  
  
 
   <!--code from index.php card decks logic added-->
    <?$c=1; $lim=$n/4+1; for($j=1;$j<=$lim;$j++){ ?>
    <div class="container">
  <div class="row p-2">
    <? for($i=1;$i<=4;$i++){ ?> 
    <? if(4*($j-1)+$i>$n) break; ?>
   <div class="col-md-3">
     <!--<a href='../product/product_description.php?product_id=<?=$prod_id[$c-1]?>&&product_name=<?=$prod_name[$c-1]?>'>-->
      <figure class="figure">
        <a href='../product/product_description.php?product_id=<?=$prod_id[$c-1]?>&&product_name=<?=$prod_name[$c-1]?>'>
          <img src="/black.png" class="figure-img img-fluid rounded" alt="product">
        </a>
        <figcaption class="figure-caption text-center">
          <h5><?=$prod_name[$c-1]?>    <?php if(isset($_SESSION['user_name'])) {
                  echo '<a href="#"><i class="fa fa-heart-o"></i></a></h5>';  }?>
         <!--  <h5>Price : <?=$prod_price[$c-1]?>&nbsp;&nbsp;</h5>  -->
          <h5>Rating : <?=$prod_rating[$c-1]?>&nbsp;&nbsp;</h5>
           <h5>Price : <?=$min_price[$c-1]?>&nbsp;&nbsp;</h5> 
            <!--<p></p>-->
          <a href='../product/product_buy.php?product_id=<?=$prod_id[$c-1]?>&&product_name=<?=$prod_name[$c-1]?>' class="btn btn-dark mb-4 text-center" role="button">Buy</a>
          <!--<button type="button" class="btn btn-dark mb-4">Buy</button>-->
           </figcaption>
      </figure>
       <!--</a>-->
    </div>
  <? $c++;} ?>
      </div> 
     </div>
    <? } ?>

  
            
            
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
