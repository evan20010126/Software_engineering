<?php
    include "db_conn_software.php";

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $preference = $_POST['preference'];

    $query = ("UPDATE customer SET email=?, nickname=?, phone=?,birthday=?,preference=? WHERE user_account =?");
    //執行結果儲存再 $result這個變數中
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();

    echo json_encode($result);
?>