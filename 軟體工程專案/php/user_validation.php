<?php
    include "db_conn_software.php";
    $user_account = $_REQUEST["user_account"];
    $password = $_REQUEST["password"];

    $query = ("SELECT user_account FROM customer WHERE user_account = ? AND password = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account,$password)); //執行sql語法
    $result = $stmt->fetchAll();
    $bool = 0;
    if($result!=NULL){
        $bool = 1;
    } 
    echo json_encode($bool);
?>