<?php
    include "db_conn_software.php";
    
    $product_name = $_REQUEST["product_name"]; //Line4 ~ Line9 前端要同步
    $product_info = $_REQUEST["product_info"];
    $product_pic = $_REQUEST["product_pic"];
    $product_price = $_REQUEST["product_price"];
    $product_supply = $_REQUEST["product_supply"];
    $boss_account = "evan";
    $query = ("INSERT INTO product(product_name,product_info,product_pic,product_price,product_supply,boss_account) VALUES(?,?,?,?,?,?)");   
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $result = $stmt ->execute(array($product_name,$product_info,$product_pic,$product_price,$product_supply,$boss_account))
    //沒有回傳值
?>