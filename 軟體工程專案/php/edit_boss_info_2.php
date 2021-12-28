<?php
    include "db_conn_software.php";

    $boss_account =$_POST['boss_account'];//line4~7前端需對照
    $store_name = $_POST['store_name'];
    $store_address = $_POST['store_address'];
    $store_phone = $_POST['store_phone'];

    $query = ("UPDATE storeowner SET store_name=?, store_address=?,store_phone=? WHERE boss_account =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($store_name,$store_address,$store_phone,$boss_account)); //執行sql語法
?>