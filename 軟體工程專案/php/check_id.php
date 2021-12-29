<?php
    include "db_conn_software.php";
    $pn =$_REQUEST['product_name'];
    //echo( $pn);
    $query = ("SELECT product_id FROM product WHERE product_name = ").$pn;
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();
    $val = $result[0][0];
    echo json_encode($val);
?>
