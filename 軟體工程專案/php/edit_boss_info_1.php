<?php
    include "db_conn_software.php";
    $boss_account = $_REQUEST["q"];//需與前端對應;
    
    $query = ("SELECT store_name,store_address,store_phone FROM storeowner WHERE boss_account =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($boss_account)); //執行sql語法
    $result = $stmt->fetchAll();   //將所有搜尋結果存於result
    echo json_encode($result); //回傳json格式
?>

