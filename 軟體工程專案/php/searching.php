<?php
    include "db_conn_software.php";
    
    $searching_bar = $_REQUEST["q"]; //前端要設變數給我ˋˊ
    $query = ("SELECT product_name, product_info, product_pic, product_price, product_supply FROM product WHERE product_name LIKE '%" .$searching_bar ."%'");   
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    echo json_encode($result);
  
?>
