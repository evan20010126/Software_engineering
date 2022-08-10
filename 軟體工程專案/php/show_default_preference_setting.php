<?php
    /*by 石貫志*/
    include "db_conn_software.php";
    $user_account = $_REQUEST["user_account"];
    $query = ("SELECT preference FROM customer WHERE user_account = ?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($user_account)); //執行sql語法
    $result = $stmt->fetchAll();
    $bool = 'False';
    if($result!=NULL){
        $bool = 'True';      

    } 
    echo json_encode($result); 
    // echo $bool; 測試用
?>