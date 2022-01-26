<?php
    include "db_conn_software.php";

    $query = ("SELECT order_id, user_account, product_list, cost, T_stamp FROM order_list WHERE is_finish=-1");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();
    echo json_encode($result);
?>

