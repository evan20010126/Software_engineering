<?php
    include "db_conn_software.php";

    $user_account = $_REQUEST["user_account"];
    $user_password = $_REQUEST["user_password"];
    $nickname = $_REQUEST["nickname"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $birthday = $_REQUEST["birthday"];
    
    try{
        //echo($user_account);
        $query = ("UPDATE customer SET  user_password=?, nickname=?,email=?,phone=? ,birthday=? WHERE user_account =?");
        $stmt = $db->prepare($query);    //db為db_conn.php新建的連線物件 
        $error = $stmt->execute(array($user_password,$nickname,$email,$phone,$birthday,$user_account));
        $bool = 1;
        echo json_encode($bool);
    }
    catch(Exception $e){ //若上述程式碼出現錯誤，便會執行以下動作
        $bool = 0;
        echo json_encode($bool);
    }
            //echo json_encode($result);
    //預設不用回傳值
    //$result = $stmt->fetchAll();
?>