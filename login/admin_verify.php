<?php
        session_start();
        include '../libraries/chocolates.php';
        
        /*$category=Array();
        $con = getCon();
        $res = $con->query("select * from categories");
        while($ele = $res->fetch_assoc())
            $category[]=$ele;*/
        
        
        //$con->query("insert into categories values('$cat_id','$cat_name')");
        if (isset($_POST['categories_submit'])) {
                $cat_id = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];
                $con = getCon();
              if(($con->query("insert into categories(cat_id,cat_name) values('$cat_id','$cat_name')"))===True){
                //echo "YES";
                header("Location:admin_display.php");
                die();
        }
        else
                echo $con->error;  
        }
           

        /*$sub_category=Array();
        $res = $con->query("select * from sub_categories");
        while($ele = $res->fetch_assoc())
            $sub_category[]=$ele;*/
        if (isset($_POST['sub_categories_submit'])) {
                $con = getCon();
                $sub_cat_id = $_POST['sub_cat_id'];
        $sub_cat_name = $_POST['sub_cat_name'];
        $cat_id = $_POST['cat_id'];
        //$con->query("insert into categories values('$sub_cat_id','$sub_cat_name')");
        
        if(($con->query("insert into sub_categories(sub_cat_id,sub_cat_name,cat_id) values('".mysqli_real_escape_string($con,$sub_cat_id)."','".mysqli_real_escape_string($con,$sub_cat_name)."','".mysqli_real_escape_string($con,$cat_id)."')"))===True){
                //echo "YES";
                header("Location:admin_display.php");
                die();
        }
        else
                echo $con->error;
        }


       
        

        if (isset($_POST['products'])) {
                $con = getCon();
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $sub_cat_id = $_POST['sub_cat_id'];
                $product_brand = $_POST['product_brand'];
                $product_description = $_POST['product_description'];
                $product_rating = $_POST['product_rating'];
        //$con->query("insert into product values('$product_id','$product_id', and so on)");
        
        if(($con->query("insert into products(product_id,product_name,sub_cat_id,product_brand,product_description,rating) values('".mysqli_real_escape_string($con,$product_id)."','".mysqli_real_escape_string($con,$product_name)."','".mysqli_real_escape_string($con,$sub_cat_id)."','".mysqli_real_escape_string($con,$product_brand)."','".mysqli_real_escape_string($con,$product_description)."','".mysqli_real_escape_string($con,$product_rating)."')"))===True){
                //echo "YES";
                header("Location:admin_display.php");
                die();
        }
        else
                echo $con->error;
        }

        
        
?>
<a href="admin_display.php">something is wrong let me go back</a>
