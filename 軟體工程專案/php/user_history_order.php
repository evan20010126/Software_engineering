<?php
    include "db_conn_software.php";

    $user_account = $_REQUEST["user_account"];

    $query = ("SELECT order_id, T_stamp, product_list, cost FROM order_list WHERE is_finish=1 AND user_account = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();
    echo json_encode($result);
?>

