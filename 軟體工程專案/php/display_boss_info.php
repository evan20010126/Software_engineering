<?php
    include "db_conn_software.php";
    
    $query = ("SELECT store_name, store_address, store_phone, score FROM storeowner");   //score不確定要不要用 
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    $error = $stmt->execute();
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    echo json_encode($result);

?>