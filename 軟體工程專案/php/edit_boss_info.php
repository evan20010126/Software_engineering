<?php
    include "db_conn_software.php";

    $password = $_POST['password'];
    $store_name = $_POST['store_name'];
    $store_address = $_POST['store_address'];
    $store_phone = $_POST['store_phone'];

    $query = ("UPDATE storeowner SET password=?, store_name=?, store_address=?,store_phone=? WHERE boss_account =?");
    //執行結果儲存再 $result這個變數中
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    echo json_encode($result);
?>