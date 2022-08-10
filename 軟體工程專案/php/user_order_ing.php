<?php
    include "db_conn_software.php";
    $user_account = $_REQUEST["user_account"];

    $query = ("SELECT order_id, T_stamp, product_list, cost, preference FROM order_list, customer WHERE is_finish = 0 AND order_list.user_account =? AND order_list.user_account = customer.user_account");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();
    echo json_encode($result);
?>
