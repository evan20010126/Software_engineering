<?php
    include "db_conn_software.php";
    
    $user_account = $_REQUEST["user_account"];

    $query = ("UPDATE customer SET is_blank = 0 WHERE user_account = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    
    $query = ("SELECT is_blank FROM customer WHERE user_account = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();
    echo json_encode($result);
?>

