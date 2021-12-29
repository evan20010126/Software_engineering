<?php
    include "db_conn_software.php";

    $user_account = $_POST['user_account'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $preference = $_POST['preference'];

    $query = ("UPDATE customer SET email=?, nickname=?, phone=?,birthday=?,preference=? WHERE user_account =?");
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($email,$nickname,$phone,$birthday,$preference,$user_account)); //執行sql語法

    //沒有回傳值
?>