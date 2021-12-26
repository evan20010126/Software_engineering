<?php
    //連線到資料庫 
    require_once('db_conn_software.php');

    //判斷使用者帳號是否為NULL
    if(empty($_POST['user_account'])){
        die('請輸入使用者帳號');
    }

    $user_account = $_POST['user_account'];
    $nickname = $_POST['nickname'];
    $birthday = $_POST['birthday'];
    $preference = $_POST['preference'];
    $sql = sprintf(
        //帶入參數: %s , %d
        "UPDATE Customer SET nickname='%s', birthday='DATE', preference='%s' WHERE user_account = user_account",
        $nickname,
        $birthday,
        $preference
    );

    echo $sql . '<br>';

    //執行結果儲存再 $result這個變數中
    $result = $edit -> query($sql);
    if(!$result){
        die($edit->error);
    }

    header("Location: ");//會自動跳轉的地方 但不知道要跳到哪個頁面暫時為空
?>