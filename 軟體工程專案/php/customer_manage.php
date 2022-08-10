<?php
    include "db_conn_software.php";
    $nickname = $_REQUEST['nickname']; //前端需同步
    $phone = $_REQUEST['phone']; //前端需同步
    $birthday  = $_REQUEST['birthday']; //前端需同步
    $string = "";
    if($nickname!="null"){
        if($string!=""){
            $string=$string." AND ";
        }
        $string=$string."nickname = ";
        $string=$string."'";
        $string=$string.$nickname;
        $string=$string."'";
    }
    if($phone!="null"){
        if($string!=""){
            $string=$string." AND ";
        }
        $string=$string." phone = ".$phone;
    }
    if($birthday!="null"){
        if($string!=""){
            $string=$string." AND ";
        }
       
        $string=$string." birthday = ";
        $string=$string."'";
        $string=$string.$birthday;
        $string=$string."'";
    }
    if(strval($string)==strval("")){
        echo json_encode(NULL);
            exit;
    }
    
    $query = ("SELECT user_account, email, nickname, phone, birthday, is_blank, preference FROM customer WHERE ".$string );
    //$query = ("SELECT user_account, email, nickname, phone, birthday, preference FROM customer WHERE nickname = 22222");
    //echo($query);

    $stmt = $db->prepare($query);        //db為db_conn.php新建的連線物件 
    $error = $stmt->execute();
    $result = $stmt->fetchAll();        //將所有搜尋結果存於result
    if($result==NULL) echo json_encode(NULL);
    else echo json_encode($result);
?>