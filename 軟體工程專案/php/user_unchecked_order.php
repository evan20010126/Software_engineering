<?php
    include "db_conn_software.php";

    $user_account = $_REQUEST['user_account'];
    /*----- 我覺得我應該要回傳is_finish給你，
            這樣你才能判斷這筆訂單是被拒絕還是尚未接單
            如果不需要is_finish的話再告訴我---------------*/
    $query = ("SELECT order_id, product_list, cost, T_stamp, is_finish FROM order_list WHERE (is_finish=-1 OR is_finish = -2) AND user_account =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();
    echo json_encode($result);
?>

