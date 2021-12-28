<?php
    include "db_conn_software.php";

    $auto_order_id = $_REQUEST["auto_order_id"];//ex: "1";
    $user_account = $_REQUEST["user_account"];//ex: "user";
    $boss_account = $_REQUEST["boss_account"];//ex: "boss";
    $product_list = $_REQUEST["product_list"];//ex: "Nothing";
    $cost = $_REQUEST["cost"];"111";//ex: "438";
    $week_day = $_REQUEST["week_day"];//ex: "0";
    $time = $_REQUEST["time"];//ex: '1970-01-01 08:00:00';

    try{
        $query = ("INSERT INTO auto_order_list VALUES(?,?,?,?,?,?,?)");
        $stmt = $db->prepare($query);    
        $error = $stmt->execute(array($auto_order_id,$user_account,$boss_account,$product_list,$cost,$week_day,$time)); //執行sql語法
        $result = $stmt->fetchAll();
        $bool = 1;
        echo json_encode($bool);
    }catch(Exception $e){ //若上述程式碼出現錯誤，便會執行以下動作
        $bool = 0;
        echo json_encode($bool);
    }
?>

