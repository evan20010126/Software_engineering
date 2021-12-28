<?php
    include "db_conn_software.php";
    
    $product_id = $_REQUEST["q"]; //前端需要與後端參數對應，object指前端需要抓的產品資訊
    $query = ("SELECT product_name, product_info, product_pic, product_price, product_supply FROM product WHERE product_id = ?");   
     
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    echo json_encode($result);
?>