<?php
    include "db_conn_software.php";
    date_default_timezone_set("Asia/Taipei"); //強制設置伺服器時區為亞洲/臺北
    $now_time = date("Y/m/d/H/i "); //"臺北的現在時間"

    $auto_order_id = $_REQUEST["auto_order_id"];
    $auto_time = $_REQUEST["auto_time"];//預設的下訂時間 ex:date("2021/12/28/20/00");
    $user_account = $_REQUEST["user_account"];//ex:"22222"
    $product_list = $_REQUEST["product_list"];//ex:"french soymilk"
    $cost = $_REQUEST["cost"];//ex:105
    $T_stamp = $now_time; //時間戳記必須是現在時間
    $is_finish = 0; //傳入 order_list 時是否完成必須要設為 false
    
    if($auto_time<=$now_time){ //判斷下訂時間是否比線在時間還要早
        $query = ("INSERT INTO order_list(user_account, product_list, cost, T_stamp, is_finish) VALUES(?,?,?,?,?)");
        $stmt = $db->prepare($query);    //db為db_conn.php新建的連線物件 
        $error = $stmt->execute(array($user_account,$product_list,$cost,$T_stamp,$is_finish));
        
        $query1 = ("DELETE FROM auto_order_list WHERE auto_order_id=?");
        $stmt = $db->prepare($query1);    //db為db_conn.php新建的連線物件 
        $error1 = $stmt->execute($auto_order_id);
    }
    //預設不用回傳值
?>