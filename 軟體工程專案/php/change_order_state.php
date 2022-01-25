<?php
    include "db_conn_software.php";

    $order_id = $_REQUEST['order_id'];//line4~5前端需對照
    $is_finish = $_REQUEST['is_finish'];

    $query = ("UPDATE order_list SET is_finish = ? WHERE order_id =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($is_finish,$order_id)); //執行sql語法
?>