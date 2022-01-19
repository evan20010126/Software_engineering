<?php
    include "db_conn_software.php";
    $nickname = $_REQUEST['nickname']; //前端需同步
    $phone = $_REQUEST['phone']; //前端需同步
    $birthday  = $_REQUEST['birthday']; //前端需同步
    $string = "";
    if($nickname!=NULL){
        if($string!=NULL){
            $string=$string." AND ";
        }
        $string=$string." nickname = ".$nickname;
    }
    if($phone!=NULL){
        if($string!=NULL){
            $string=$string." AND ";
        }
        $string=$string." phone = ".$phone;
    }
    if($birthday!=NULL){
        if($string!=NULL){
            $string=$string." AND ";
        }
        $string=$string." birthday = ".$birthday;
    }
    if($nickname==NULL){
        if($nickname==NULL){
            if($birthday==NULL){
                echo json_encode(NULL);
                exit;
            }
        }
    }
    $query = ("SELECT user_account, email, nickname, phone, birthday, preference FROM customer WHERE ".$string);
    
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(); //執行sql語法
    $result = $stmt->fetchAll();//執行結果儲存在 $result這個變數中

    echo json_encode($result);
?>