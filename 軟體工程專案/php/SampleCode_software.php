<?php
    /*---------------------connect database & prepare statement----------------------*/
    include "db_conn_software.php";

    $query = ("select * from customer");
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    $error = $stmt->execute();
    /*$error = $stmt->execute(array($no));*/
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    /*---------------------connect database & prepare statement----------------------*/
    echo $result[0]["user_account"];
?>