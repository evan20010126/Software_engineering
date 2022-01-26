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
        session_start();
        $_SESSION['user']=$user_account;
        //$_SESSION['password']=$user_password;
    } 
    echo $bool;
    // echo '{"success":'.$bool.'}';       /*回傳登入成功與否之布林值(自製JSON格式)*/
    // echo ($bool); //json_encode
    // if($bool === "True")  
    //     header("Location:../food_menu.html");       /*登入成功，重新導向至菜單頁面*/ 
    // else 
    //     header("Location:../customer_sign_in.html");    /*登入失敗，重整顧客登入頁面*/
?>