<?php
    include "db_conn_software.php";

    $product_name =strval($_REQUEST['product_name']);
    echo( $product_name);
    $query = ("SELECT product_id FROM package WHERE product_name = ? ");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute($product_name); //執行sql語法
    $result = $stmt->fetchAll();
    echo json_encode($result);
?>
