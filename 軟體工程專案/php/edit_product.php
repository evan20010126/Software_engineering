<?php
    include "db_conn_software.php";
    
    $product_name = $_REQUEST["product_name"];
    $edit_product_name = $_REQUEST["edit_product_name"];
    $product_info = $_REQUEST["edit_product_info"];
    $product_pic = $_REQUEST["edit_product_picture"];
    $product_price = $_REQUEST["edit_product_price"];
    //$product_supply = $_RESQUEST["product_supply"];

    /*-----用product_name找id */
    $query = ("SELECT product_id FROM product WHERE product_name = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($product_name)); //執行sql語法
    $result = $stmt->fetchAll();
    $val = $result[0][0];
    $product_id = $val;

    $product_name = $edit_product_name;
    /*-----更新產品資訊-----*/
    $query = ("UPDATE product SET product_name=?, product_info=?, product_pic=?,product_price=? WHERE product_id =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($product_name,$product_info,$product_pic,$product_price,$product_id)); //執行sql語法

?>