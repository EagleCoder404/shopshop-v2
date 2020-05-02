<?php
        session_start();
        include '../libraries/chocolates.php';
        /*$category=Array();
        $con = getCon();
        $res = $con->query("select * from categories");
        while($ele = $res->fetch_assoc())
            $category[]=$ele;*/
        
        $cat_id = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];
        //$con->query("insert into categories values('$cat_id','$cat_name')");
        
        if(($con->query("insert into categories(cat_id,cat_name) values('$cat_id','$cat_name')"))===True){
                //echo "YES";
                header("Location:admin_display.php");
                die();
        }
        else
                echo $con->error;   

        /*$sub_category=Array();
        $res = $con->query("select * from sub_categories");
        while($ele = $res->fetch_assoc())
            $sub_category[]=$ele;*/
        
        $sub_cat_id = $_POST['sub_cat_id'];
        $sub_cat_name = $_POST['sub_cat_name'];
        //$con->query("insert into categories values('$sub_cat_id','$sub_cat_name')");
        
        if(($con->query("insert into sub_categories(sub_cat_id,sub_cat_name,cat_id) values('$sub_cat_id','$sub_cat_name','$cat_id')"))===True){
                //echo "YES";
                header("Location:admin_display.php");
                die();
        }
        else
                echo $con->error;
        
?>
