<?php       /*By 石貫志*/ 
    include "db_conn_software.php";
    $_POST = json_decode(file_get_contents("php://input"),true);   // $_POST 只能取得 Content-type 為 application/x-www-form-urlencoded 或 multipart/form-data 的資料。
    //前端傳入json格式字串('Content-Type': 'application/json')
    /*=========偵錯用==========*/ 
    // echo "<pre>";    //想要印出前端傳回的陣列資料可以這樣寫(在前端f12的Network的Response可以看到) by石貫志
    // print_r($_POST);
    // print_r($_POST['user_account']);
    // print_r($_POST['data']['user_account']); //倘若前段是2維陣列這樣用
    //echo "</pre>";   //想要印出前端傳回的陣列資料可以這樣寫(在前端f12的Network的Response可以看到) by石貫志
    /*=========================*/ 

    $user_account = $_POST['user_account'];
    $preference = $_POST['preference_text'];
    /*=========偵錯用==========*/
    // echo gettype($user_account);
    // echo gettype($email);
    // echo gettype($nickname);
    // echo gettype($phone);
    // echo gettype($birthday);
    /*=========================*/
    $query = ("UPDATE customer SET preference=? WHERE user_account =?"); 
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $result = $stmt->execute(array($preference,$user_account)); //執行sql語法
    $bool = "False";
    if($result != null)
    {
        $bool = "True";        
    }
    echo($bool);
    //沒有回傳值
?>