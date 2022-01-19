<?php
    include "db_conn_software.php";
    $boos_account = $_REQUEST["boos_account"];
    $boos_password = $_REQUEST["boos_password"];

    $query = ("SELECT admin_account FROM administrator WHERE admin_account = ? AND admin_password = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($boos_account,$boos_password)); //執行sql語法
    $result = $stmt->fetchAll();
    $bool = "False";
    // PRINT $boos_account;     /*偵錯用：有沒有抓到boos_account*/
    // PRINT $boos_password;    /*偵錯用：有沒有抓到boos_password*/

    // PRINT $result;           /*偵錯用：有沒有抓到reslut*/
    if($result!=NULL){
        $bool = "True";      
        session_start();
        $_SESSION['boos']=$user_account;
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