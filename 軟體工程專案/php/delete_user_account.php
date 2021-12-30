<?php
    include "db_conn_software.php";
    $user_account = $_REQUEST["user_account"]; //需與前端同步

    $query = ("DELETE FROM customer WHERE user_account = ?");    //刪除customer使用者資訊
    $stmt = $db->prepare($query); //db為db_conn.php新建的連線物件 
    $error = $stmt->execute(array($user_account));
    $result = $stmt->fetchAll();  //將所有搜尋結果存於result

    $query1 = ("DELETE FROM auto_order_list WHERE user_account = ?");//刪除auto_order_list內的使用者相關資訊
    $stmt = $db->prepare($query1); //db為db_conn.php新建的連線物件 
    $error = $stmt->execute(array($user_account));
    $result1 = $stmt->fetchAll();  //將所有搜尋結果存於result
    
    $query2 = ("DELETE FROM order_list WHERE user_account = ?");//刪除order_list內的使用者相關資訊
    $stmt = $db->prepare($query2); //db為db_conn.php新建的連線物件 
    $error = $stmt->execute(array($user_account));
    $result2 = $stmt->fetchAll();  //將所有搜尋結果存於result

    $query3 = ("DELETE FROM package WHERE user_account = ?");//刪除package內的使用者相關資訊
    $stmt = $db->prepare($query3); //db為db_conn.php新建的連線物件 
    $error = $stmt->execute(array($user_account));
    $result3 = $stmt->fetchAll();  //將所有搜尋結果存於result

    $bool =0;
    $query4 = ("SELECT user_account FROM customer where user_account =?"); //判斷是否有刪除該使用者資訊
    $stmt = $db->prepare($query4); //db為db_conn.php新建的連線物件 
    $error = $stmt->execute(array($user_account));
    $result4 = $stmt->fetchAll();  //將所有搜尋結果存於result
    if($user_account==$result4){
        echo json_encode($bool);
    }
    else{
        $bool = 1;
        echo json_encode($bool);
    }
?>