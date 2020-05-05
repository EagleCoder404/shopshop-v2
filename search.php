<?php
        session_start();
        
      if (isset($_POST['search_results'])) {
                $con = getCon();
                $search_prod = $_POST['search_product'];
                
                $res = $con->query("select * from products where product_description like '%$search_prod%'");

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
                  $prod_description[]=$p['description'];

                //Min price array
                $min_price=array();
                for($i=0;$i<$n;$i++)
                {
                  $res1 = $con->query("select min(price) from unique_product where product_id= '$prod_id[$i]'");
                  while($ele1 = $res1->fetch_assoc())
                  $min_price[]=$ele1["min(price)"];
                }

                die();
        }
        else
                echo $con->error;
        }
      
?>
