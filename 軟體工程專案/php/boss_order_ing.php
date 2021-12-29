<?php
    include "db_conn_software.php";
    
    $query = ("SELECT order_id, order_list.user_account, product_list, cost, T_stamp, preference FROM order_list,customer WHERE is_finish=0 and order_list.user_account = customer.user_account ");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    echo json_encode($result);
?>

