<?php
    include "db_conn_software.php";
    
    $product_name = $_POST["name"]; //Line4 ~ Line9 前端要同步
    $product_info = $_POST["info"];
    $product_pic = $_POST["pic"];
    $product_price = $_POST["price"];
    $product_supply = $_POST["supply"];
    $boss_account = $_POST["boss_acc"];
   
    $query = ("INSERT INTO product VALUES(NULL,?,?,?,?,?,?)");   
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $result = $stmt ->execute(array($product_id,$product_name,$product_info,$product_pic,$product_price,$product_supply,$boss_account))

?>