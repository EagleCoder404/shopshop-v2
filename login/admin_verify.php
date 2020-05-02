<?php
        session_start();
    include '../libraries/chocolates.php';
        $category=Array();
        $con = getCon();
        $res = $con->query("select * from categories");
        while($ele = $res->fetch_assoc())
            $category[]=$ele;
        
        $category_id = $_POST['cat_id'];
        $category_name = $_POST['cat_name'];
        $con->query("insert into categories values('$category_id','$category_name')");
        
        
?>
    <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">categories</a>
      </h4>
    </div>
    <div class="text-center">
    <div id="collapse1" class="panel-collapse collapse in">
      <? foreach($category as $cat) { ?>
            <p><?=$cat['cat_id']."=>".$cat['cat_name']?></p>
            <? } ?>
    </div>
    </div>
  </div>
  </div>


<a href='admin_enter.php'>click me to go back</a>
