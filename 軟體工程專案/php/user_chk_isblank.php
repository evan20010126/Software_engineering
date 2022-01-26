<?php
    include "db_conn_software.php";

    $user_account = $_REQUEST("user_account");

	$query = ("SELECT is_blank FROM customer WHERE user_account =?");    
    $stmt = $db->prepare($query);           //db為db_conn.php新建的連線物件 
    $error = $stmt->execute(array($user_account));
    $result = $stmt->fetchAll();                //將所有搜尋結果存於result
    echo json_encode($result);
?>