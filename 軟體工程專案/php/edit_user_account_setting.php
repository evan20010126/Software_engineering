<?php       /*By 石貫志*/ 
    include "db_conn_software.php";
    $_POST = json_decode(file_get_contents("php://input"),true);   //_POST在PHP中預設只能由前端的From傳遞
    //但我使用axios框架，所以要自動讀取前端傳回的json格式字串並轉換為一維陣列(file_get_contents為_REQUEST底層函式，後面是固定寫法)
    /*=========偵錯用==========*/ 
    // echo "<pre>";    //想要印出前端傳回的陣列資料可以這樣寫(在前端f12的Network的Response可以看到) by石貫志
    // print_r($_POST);
    // print_r($_POST['user_account']);
    // print_r($_POST['data']['user_account']); //倘若前段是2維陣列這樣用
    //echo "</pre>";   //想要印出前端傳回的陣列資料可以這樣寫(在前端f12的Network的Response可以看到) by石貫志
    /*=========================*/ 

    $user_account = $_POST['user_account'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    /*=========偵錯用==========*/
    // echo gettype($user_account);
    // echo gettype($email);
    // echo gettype($nickname);
    // echo gettype($phone);
    // echo gettype($birthday);
    /*=========================*/
    $query = ("UPDATE customer SET email=?, nickname=?, phone=?,birthday=? WHERE user_account =?"); 
    $stmt = $db->prepare($query);    //db為db_conn_sofware.php新建的連線物件 
    $error = $stmt->execute(array($email,$nickname,$phone,$birthday,$user_account)); //執行sql語法
    echo json_encode(true);
    //沒有回傳值
?>