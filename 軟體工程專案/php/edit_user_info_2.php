<?php
    include "db_conn_software.php";
    $_POST = json_decode(file_get_contents("php://input"),true);
    // echo "<pre>";    //想要印出前端傳回的陣列資料可以這樣寫(在前端f12的Network的Response可以看到) by石貫志
    // print_r($_POST);
    // print_r($_POST['user_account']);
    // print_r($_POST['data']['user_account']); //倘若前段是2維陣列這樣用
    // echo "</pre>";   //想要印出前端傳回的陣列資料可以這樣寫(在前端f12的Network的Response可以看到) by石貫志
   
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