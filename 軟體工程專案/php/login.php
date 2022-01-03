<?php
    include "db_conn_software.php";
    $user_account = $_REQUEST["user_account"];
    $user_password = $_REQUEST["user_password"];

    $query = ("SELECT user_account FROM customer WHERE user_account = ? AND user_password = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account,$user_password)); //執行sql語法
    $result = $stmt->fetchAll();
    $bool = "False";
    // PRINT $user_account;     /*偵錯用：有沒有抓到user_account*/
    // PRINT $user_password;    /*偵錯用：有沒有抓到user_password*/
    // PRINT $result;           /*偵錯用：有沒有抓到reslut*/
    if($result!=NULL){
        $bool = "True";
    } 
    echo '{"success":'.$bool.'}';
    // echo ($bool); //json_encode
    header("Location:")
    // header("Location:javascript://history.go(-1)");     /*讓前端來執行此php後，返回原本之頁面*/
?>