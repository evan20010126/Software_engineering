<?php
    include "db_conn_software.php";
    
    $query = ("select product_id, product_name, product_info, product_pic, product_price, product_supply from product");    
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    $error = $stmt->execute();
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    echo json_encode($result);
?>