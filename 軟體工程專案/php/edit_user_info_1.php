<?php
    include "db_conn_software.php";

    $user_account = $_REQUEST['user_account']; //前端需同步

    $query = ("SELECT email, nickname, phone, birthday, preference FROM customer WHERE user_account =?");
    
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();//執行結果儲存在 $result這個變數中

    echo json_encode($result);
?>